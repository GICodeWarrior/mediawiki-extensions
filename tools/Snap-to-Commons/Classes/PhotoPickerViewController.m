//
//  PhotoPickerViewController.m
//
//  Copyright yourcompanyname 2009. All rights reserved.
//

#import "PhotoPickerViewController.h"

#import "NSData+PhotoPicker.h"
#import "PhotoPickerAppDelegate.h"
#import "UIImage+PhotoPicker.h"
#import "ASIFormDataRequest.h"


#define API_URL @"http://commons.wikimedia.org/w/api.php"

static int kPhotoPickerViewControllerSourceIndexCamera = 0;
static int kPhotoPickerViewControllerSourceIndexPhotoLibrary = 1;


@interface PhotoPickerViewController ()
    @property (nonatomic, retain) NSURLConnection *connection;
    @property (nonatomic, retain) NSData *imageData;
    @property (nonatomic, retain) NSHTTPURLResponse *response;
    @property (nonatomic, retain) NSMutableData *responseData;
    - (void)cancelApp;
    - (void)pickPhoto:(UIImagePickerControllerSourceType)sourceType;
    - (void)showPhotoSourceMenu;
    - (void)showPhotoSourceMenuOrPhotoSourceDirectly;
    - (void)uploadImage;
@end


@implementation PhotoPickerViewController


@synthesize connection;
@synthesize imageData;
@synthesize response;
@synthesize responseData;


#pragma mark UIActionSheetDelegate Methods


- (void)actionSheet:(UIActionSheet *)anActionSheet clickedButtonAtIndex:(NSInteger)buttonIndex {
    [anActionSheet dismissWithClickedButtonIndex:buttonIndex animated:NO];

    if (buttonIndex == [anActionSheet cancelButtonIndex]) {
        [self cancelApp];
    }

    if (buttonIndex == kPhotoPickerViewControllerSourceIndexCamera) {
        [self onCameraClicked];
    } else if (buttonIndex == kPhotoPickerViewControllerSourceIndexPhotoLibrary) {
        [self onPhotoLibraryClicked];
    }
}


- (void)actionSheetCancel:(UIActionSheet *)actionSheet {
    // Do nothing.  Overriding default of simulating clicking cancel, when user hits home button.
}


#pragma mark UIImagePickerControllerDelegate Methods


- (void)imagePickerController:(UIImagePickerController *)picker
        didFinishPickingMediaWithInfo:(NSDictionary *)info {
    UIImage *image = [info valueForKey:UIImagePickerControllerOriginalImage];

    image = [image correctOrientation:image];

    self.imageData = UIImageJPEGRepresentation(image, 0.85f);

    uploadOverlayImage.image = image;
    uploadProgressMessage.text = @"uploading";
    uploadProgress.progress = 0.0f;

    uploadPhotoOverlay.frame = CGRectMake(0, 20, 320, 460);
    [[UIApplication sharedApplication].keyWindow addSubview:uploadPhotoOverlay];

    [self uploadImage];

    [picker.view removeFromSuperview];
    [picker release];
}


- (void)imagePickerControllerDidCancel:(UIImagePickerController *)picker {
    BOOL shouldCancelApp = !cameraAvailable;
    #ifndef SHOW_SOURCE_MENU_IF_DEFAULT_SOURCE_CANCELLED
        PhotoPickerAppDelegate *appDelegate =
            (PhotoPickerAppDelegate *) [UIApplication sharedApplication].delegate;

        shouldCancelApp = shouldCancelApp || appDelegate.defaultImageSource >= 0;
    #endif

    if (shouldCancelApp) {
        [self cancelApp];
    } else {
        [picker.view removeFromSuperview];
        [picker release];

        [self showPhotoSourceMenuOrPhotoSourceDirectly];
    }
}


#pragma mark UIViewController Methods


- (void)viewDidLoad {
    #ifdef FORCE_ENABLE_CAMERA
        cameraAvailable = YES;
        fakeCameraAvailable = ![UIImagePickerController
            isSourceTypeAvailable:UIImagePickerControllerSourceTypeCamera];
    #else
        cameraAvailable =
            [UIImagePickerController isSourceTypeAvailable:UIImagePickerControllerSourceTypeCamera];
    #endif
    takePhotoButton.enabled = cameraAvailable;
}


- (void)viewDidAppear:(BOOL)animated {
    [self showPhotoSourceMenuOrPhotoSourceDirectly];
    
    #ifdef SHOW_SOURCE_MENU_IF_DEFAULT_SOURCE_CANCELLED
        PhotoPickerAppDelegate *appDelegate =
            (PhotoPickerAppDelegate *) [UIApplication sharedApplication].delegate;

        // Clearing the default image source in case the user goes back to the menu.
        appDelegate.defaultImageSource = -1;
    #endif
}


#pragma mark URL Connection Event Handlers


// Final event, memory is cleaned up at the end of this.
- (void)connection:(NSURLConnection *)connection didFailWithError:(NSError *)error {
    self.connection = nil;
    self.response = nil;

    uploadProgress.progress = 0.0f;
    uploadProgressMessage.text = @"An error occurred, retrying in 10 seconds...";

    retryCounter = 10;
    [self performSelector:@selector(retry) withObject:nil afterDelay:1.0f];
}


// Final event, memory is cleaned up at the end of this.
- (void)connectionDidFinishLoading:(NSURLConnection *)connection {
    self.connection = nil;

    if ([self.response statusCode] == 200) {
        uploadProgress.progress = 1.0f;
        
        NSString *responseString = [[[NSString alloc] initWithBytes:[self.responseData bytes]
                                                      length:[self.responseData length]
                                                      encoding:NSUTF8StringEncoding] autorelease];
        responseString =
            [responseString stringByAddingPercentEscapesUsingEncoding:NSUTF8StringEncoding];
        
        NSString *successContinueUrl = CONTINUE_URL;

        successContinueUrl =
            [successContinueUrl stringByReplacingPercentEscapesUsingEncoding:NSUTF8StringEncoding];

        BOOL hasQuestionMark = [successContinueUrl rangeOfString:@"?"].location != NSNotFound;

        successContinueUrl =
            [successContinueUrl stringByAppendingString:hasQuestionMark ? @"&" : @"?"];
        successContinueUrl = [successContinueUrl stringByAppendingFormat:@"success=1&response=%@",
                                                                         responseString];

        [[UIApplication sharedApplication] openURL:[NSURL URLWithString:successContinueUrl]];
    } else {
        uploadProgress.progress = 0.0f;
        uploadProgressMessage.text = @"An error occurred, retrying in 10 seconds...";

        retryCounter = 10;
        [self performSelector:@selector(retry) withObject:nil afterDelay:1.0f];
    }
    
    self.response = nil;
}


- (void)connection:(NSURLConnection *)connection didReceiveData:(NSData *)newData {
  [responseData appendData:newData];
}


- (void)connection:(NSURLConnection *)connection didReceiveResponse:(NSURLResponse *)newResponse {
  self.response = (NSHTTPURLResponse *) newResponse;
}


- (void)connection:(NSURLConnection *)connection
        didSendBodyData:(NSInteger)bytesWritten
        totalBytesWritten:(NSInteger)totalBytesWritten
        totalBytesExpectedToWrite:(NSInteger)totalBytesExpectedToWrite {
    uploadProgress.progress = (float) totalBytesWritten / totalBytesExpectedToWrite;
}


#pragma mark Public


- (IBAction)onCameraClicked {
    [self pickPhoto:UIImagePickerControllerSourceTypeCamera];
}


- (IBAction)onCancelUploadClicked {
    [self.connection cancel];
    self.connection = nil;

    [NSObject cancelPreviousPerformRequestsWithTarget:self
              selector:@selector(retry)
              object:nil];
    [NSObject cancelPreviousPerformRequestsWithTarget:self
              selector:@selector(uploadImage)
              object:nil];

    [uploadPhotoOverlay removeFromSuperview];

    [self showPhotoSourceMenuOrPhotoSourceDirectly];
}


- (IBAction)onContinueRecommendationClicked {
    [self showPhotoSourceMenu];
}


- (IBAction)onPhotoLibraryClicked {
    [self pickPhoto:UIImagePickerControllerSourceTypePhotoLibrary];
}


#pragma mark Private


- (void)cancelApp {
    NSString *cancelContinueUrl = CONTINUE_URL;

    cancelContinueUrl =
        [cancelContinueUrl stringByReplacingPercentEscapesUsingEncoding:NSUTF8StringEncoding];

    BOOL hasQuestionMark = [cancelContinueUrl rangeOfString:@"?"].location != NSNotFound;

    cancelContinueUrl =
        [cancelContinueUrl stringByAppendingString:hasQuestionMark ? @"&" : @"?"];
    cancelContinueUrl = [cancelContinueUrl stringByAppendingString:@"success=0"];

    [[UIApplication sharedApplication] openURL:[NSURL URLWithString:cancelContinueUrl]];
}


- (void)pickPhoto:(UIImagePickerControllerSourceType)sourceType {
    PhotoPickerAppDelegate *appDelegate =
        (PhotoPickerAppDelegate *) [UIApplication sharedApplication].delegate;

    UIImagePickerController *imagePickerController = [[UIImagePickerController alloc] init];
    imagePickerController.delegate = self;

    // If the camera is force enabled, show the library instead.
    #ifdef FORCE_ENABLE_CAMERA
        if (fakeCameraAvailable && sourceType == UIImagePickerControllerSourceTypeCamera) {
            sourceType = UIImagePickerControllerSourceTypePhotoLibrary;
        }
    #endif

    imagePickerController.sourceType = sourceType;

    [appDelegate.window addSubview:imagePickerController.view];
}


- (void)retry {
    retryCounter--;

    if (retryCounter <= 0) {
        [self uploadImage];
    } else {
        uploadProgressMessage.text =
            [NSString stringWithFormat:@"An error occurred, retrying in %d second%@...",
                                       retryCounter,
                                       retryCounter != 1 ? @"s" : @""];

        [self performSelector:@selector(retry) withObject:nil afterDelay:1.0f];
    }
}


- (void)showPhotoSourceMenu {
    if (cameraAvailable) {
        photoSourceActionSheet = [[UIActionSheet alloc]
            initWithTitle:nil
            delegate:self
            cancelButtonTitle:@"Cancel"
            destructiveButtonTitle:nil
            otherButtonTitles:@"Camera", @"Photo Library", nil];
        kPhotoPickerViewControllerSourceIndexCamera = 0;
        kPhotoPickerViewControllerSourceIndexPhotoLibrary = 1;
    } else {
        photoSourceActionSheet = [[UIActionSheet alloc]
            initWithTitle:nil
            delegate:self
            cancelButtonTitle:@"Cancel"
            destructiveButtonTitle:nil
            otherButtonTitles:@"Choose Photo", nil];
        kPhotoPickerViewControllerSourceIndexCamera = -99;
        kPhotoPickerViewControllerSourceIndexPhotoLibrary = 0;
    }
    photoSourceActionSheet.actionSheetStyle = UIBarStyleDefault;

    UIImage *backgroundImage = [UIImage imageNamed:@"home-background.png"];
    UIView *background = [[UIImageView alloc] initWithImage:backgroundImage];
    background.frame = CGRectMake(0, cameraAvailable ? -253 : -320, 320, 460);
    [photoSourceActionSheet insertSubview:background atIndex:0];

    [photoSourceActionSheet showInView:self.view];
}


- (void)showPhotoSourceMenuOrPhotoSourceDirectly {
    PhotoPickerAppDelegate *appDelegate =
        (PhotoPickerAppDelegate *) [UIApplication sharedApplication].delegate;

    if (!cameraAvailable ||
            appDelegate.defaultImageSource == UIImagePickerControllerSourceTypePhotoLibrary) {
        [self onPhotoLibraryClicked];
    } else if (appDelegate.defaultImageSource == UIImagePickerControllerSourceTypeCamera &&
                   cameraAvailable) {
        [self onCameraClicked];
    } else {
        [self showPhotoSourceMenu];
    }
}


- (void)uploadImage {
    uploadProgress.progress = 0.0f;
    uploadProgressMessage.text = @"uploading";

    PhotoPickerAppDelegate *appDelegate =
        (PhotoPickerAppDelegate *) [UIApplication sharedApplication].delegate;
	
	NSURL *url = [NSURL URLWithString:API_URL];
	ASIFormDataRequest *request = [ASIFormDataRequest requestWithURL:url];
	[request setPostFormat:ASIURLEncodedPostFormat];
	
	[request addPostValue:@"login" forKey:@"action"];
	[request addPostValue:@"xml" forKey: @"format"];
	[request addPostValue:[[NSUserDefaults standardUserDefaults] valueForKey:COMMONS_USERNAME_KEY] forKey: @"lgname"];
	[request addPostValue:[[NSUserDefaults standardUserDefaults] valueForKey:COMMONS_PASSWORD_KEY] forKey: @"lgpassword"];
	
	[request setDelegate:self];
	[request setDidFinishSelector:@selector(requestTokenFinished:)];
	[request setDidFailSelector:@selector(requestTokenFailed:)];
	[request startAsynchronous];

/*
    NSMutableURLRequest *request =
        [NSMutableURLRequest requestWithURL:[NSURL URLWithString:UPLOAD_URL]];

    [request setHTTPMethod:@"POST"];
      
    NSString *boundary = @"---------------------------PhOTopiCkER-mUlTiPaRtFoRm";
    NSString *contentType = [NSString stringWithFormat:@"multipart/form-data; boundary=%@",
                                                       boundary];
    [request addValue:contentType forHTTPHeaderField:@"Content-Type"];

    NSMutableData *body = [NSMutableData data];

    [body appendData:[NSData utf8DataWithFormat:
        @"--%@\r\nContent-Disposition: form-data; name=\"%@\"\r\n\r\n%@\r\n",
        boundary,
        @"context",
        appDelegate.postContext]];
            
    [body appendData:[NSData utf8DataWithFormat:@"--%@\r\n", boundary]];
    [body appendData:[NSData utf8DataWithFormat:
        @"Content-Disposition: form-data; name=\"%@\"; filename=\"%@\"\r\nContent-Type: image/jpeg\r\n\r\n",
        @"image_file",
        @"photopicker.jpg"]];
    [body appendData:self.imageData];
    [body appendData:[NSData utf8DataWithFormat:@"\r\n"]];
      
    [body appendData:[NSData utf8DataWithFormat:@"--%@--\r\n", boundary]];

    [request setHTTPBody:body];

    self.responseData = [NSMutableData data];
    self.connection = [NSURLConnection connectionWithRequest:request delegate:self];
*/
}

- (void)requestTokenFinished:(ASIHTTPRequest *)request
{
	// Use when fetching text data
	NSString *responseString = [request responseString];
	NSLog(responseString );
	NSScanner *aScanner = [NSScanner scannerWithString:responseString];

	[aScanner scanUpToString:@"result=\"" intoString: nil];
	[aScanner scanString:@"result=\"" intoString: nil];
	NSString *result;
	[aScanner scanUpToString:@"\"" intoString:&result];
	if( ![result isEqualToString:@"NeedToken"] ) {
		NSLog( @"no needtoken response: %@", result);
		return;
	}
	
	[aScanner scanUpToString:@"token=\"" intoString: nil];\
	[aScanner scanString:@"token=\"" intoString: nil];
	[aScanner scanUpToString:@"\"" intoString:&token];
	
	//New request
	NSURL *url = [NSURL URLWithString:API_URL];
	ASIFormDataRequest *newRequest = [ASIFormDataRequest requestWithURL:url];
	[newRequest setPostFormat:ASIURLEncodedPostFormat];
	
	[newRequest addPostValue:@"login" forKey:@"action"];
	[newRequest addPostValue:@"xml" forKey: @"format"];
	[newRequest addPostValue:token forKey:@"lgtoken"];
	[newRequest addPostValue:[[NSUserDefaults standardUserDefaults] valueForKey:COMMONS_USERNAME_KEY] forKey: @"lgname"];
	[newRequest addPostValue:[[NSUserDefaults standardUserDefaults] valueForKey:COMMONS_PASSWORD_KEY] forKey: @"lgpassword"];
	
	[newRequest setDelegate:self];
	[newRequest setDidFinishSelector:@selector(requestLoginFinished:)];
	[newRequest setDidFailSelector:@selector(requestLoginFailed:)];
	[newRequest startAsynchronous];

	
	
	// Use when fetching binary data
	// FIXME Use this for building xml parser
	//NSData *responseData = [request responseData];
}

- (void)requestTokenFailed:(ASIHTTPRequest *)request
{
	NSError *error = [request error];
}


- (void)requestLoginFinished:(ASIHTTPRequest *)request
{
	// Use when fetching text data
	NSString *responseString = [request responseString];
	NSLog(responseString );
	NSScanner *aScanner = [NSScanner scannerWithString:responseString];
	
	[aScanner scanUpToString:@"result=\"" intoString: nil];
	[aScanner scanString:@"result=\"" intoString: nil];
	NSString *result;
	[aScanner scanUpToString:@"\"" intoString:&result];
	if( ![result isEqualToString:@"Success"] ) {
		NSLog( @"no success response, %@", result);
		return;
	}
	
	[aScanner scanUpToString:@"token=\"" intoString: nil];
	[aScanner scanString:@"token=\"" intoString: nil];
	[aScanner scanUpToString:@"\"" intoString:&token];
	
	//New request
	NSURL *url = [NSURL URLWithString:API_URL];
	ASIFormDataRequest *newRequest = [ASIFormDataRequest requestWithURL:url];
	[newRequest setPostFormat:ASIURLEncodedPostFormat];
	
	[newRequest addPostValue:@"query" forKey:@"action"];
	[newRequest addPostValue:@"xml" forKey: @"format"];
	[newRequest addPostValue:@"edit" forKey:@"intoken"];
	[newRequest addPostValue:@"WikiSnaps.jpg" forKey:@"titles"];
	[newRequest addPostValue:@"info" forKey:@"prop"];
	
	[newRequest setDelegate:self];
	[newRequest setDidFinishSelector:@selector(requestEditTokenFinished:)];
	[newRequest setDidFailSelector:@selector(requestEditTokenFailed:)];
	[newRequest startAsynchronous];
	
	
	// Use when fetching binary data
	// Use this for building xml parser
	//NSData *responseData = [request responseData];
}

- (void)requestLoginFailed:(ASIHTTPRequest *)request
{
	NSError *error = [request error];
}

- (void)requestEditTokenFinished:(ASIHTTPRequest *)request
{
	// Use when fetching text data
	NSString *responseString = [request responseString];
	NSLog(responseString );
	NSScanner *aScanner = [NSScanner scannerWithString:responseString];
	
	[aScanner scanUpToString:@"edittoken=\"" intoString: nil];
	[aScanner scanString:@"edittoken=\"" intoString: nil];

	BOOL res;
	res = [aScanner scanUpToString:@"\"" intoString:&editToken];
	if( !res ) {
		NSLog( @"could not find edittoken");
		return;
	}
	
	//New request
	NSURL *url = [NSURL URLWithString:API_URL];
	ASIFormDataRequest *newRequest = [ASIFormDataRequest requestWithURL:url];
	[newRequest setPostFormat:ASIMultipartFormDataPostFormat];
	
	[newRequest addPostValue:@"upload" forKey:@"action"];
	[newRequest addPostValue:@"xml" forKey: @"format"];
	[newRequest addPostValue:editToken forKey:@"token"];
	[newRequest addPostValue:@"WikiSnaps.jpg" forKey:@"filename"];
	[newRequest addPostValue:@"TestComment" forKey:@"comment"];
	[newRequest addPostValue:@"TestText" forKey:@"text"];
	[newRequest addData:self.imageData forKey:@"file"];

	
	[newRequest setDelegate:self];
	[newRequest setDidFinishSelector:@selector(requestUploadFinished:)];
	[newRequest setDidFailSelector:@selector(requestUploadFailed:)];
	[newRequest startAsynchronous];
	
	// Use when fetching binary data
	// Use this for building xml parser
	//NSData *responseData = [request responseData];
}

- (void)requestEditTokenFailed:(ASIHTTPRequest *)request
{
	NSError *error = [request error];
}

- (void)requestUploadFinished:(ASIHTTPRequest *)request
{
	// Use when fetching text data
	NSString *responseString = [request responseString];
	NSLog(responseString );
}

- (void)requestUploadFailed:(ASIHTTPRequest *)request
{
	NSError *error = [request error];
}


@end
