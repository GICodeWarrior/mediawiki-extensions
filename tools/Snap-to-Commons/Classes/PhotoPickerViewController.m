//
//  PhotoPickerViewController.m
//
//  Copyright yourcompanyname 2009. All rights reserved.
//

#import "PhotoPickerViewController.h"

#import "NSData+PhotoPicker.h"
#import "PhotoPickerAppDelegate.h"
#import "UIImage+PhotoPicker.h"
#import "CommonsUpload.h"
#import "ImageDetailsViewController.h"

static int kPhotoPickerViewControllerSourceIndexCamera = 0;
static int kPhotoPickerViewControllerSourceIndexPhotoLibrary = 1;
static int kPhotoPickerViewControllerSettings = 2;


@interface PhotoPickerViewController ()
    @property (nonatomic, retain) NSData *imageData;
    - (void)cancelApp;
    - (void)pickPhoto:(UIImagePickerControllerSourceType)sourceType;
    - (void)showPhotoSourceMenu;
    - (void)showPhotoSourceMenuOrPhotoSourceDirectly;
@end


@implementation PhotoPickerViewController

@synthesize imageData;


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
	} else if (buttonIndex == kPhotoPickerViewControllerSettings) {
		[self onSettingsClicked];
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

	CommonsUpload *ourUpload = [[CommonsUpload alloc] init];
	ourUpload.imageData = UIImageJPEGRepresentation(image, 0.85f);

    //uploadOverlayImage.image = image;
    //uploadProgressMessage.text = @"uploading";
    //uploadProgress.progress = 0.0f;

    //uploadPhotoOverlay.frame = CGRectMake(0, 20, 320, 460);
    //[[UIApplication sharedApplication].keyWindow addSubview:uploadPhotoOverlay];
	
	ImageDetailsViewController *detailsController = [[ImageDetailsViewController alloc] init];
	
	detailsController.upload = ourUpload;
	[ourUpload release];

	//to push the UIView.
	[self.navigationController pushViewController:detailsController animated:YES];
	[detailsController release];
	
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
	[super viewDidLoad];

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

#pragma mark Public


- (IBAction)onCameraClicked {
    [self pickPhoto:UIImagePickerControllerSourceTypeCamera];
}

- (IBAction)onPhotoLibraryClicked {
    [self pickPhoto:UIImagePickerControllerSourceTypePhotoLibrary];
}

- (IBAction)onSettingsClicked {
	[self.navigationController popToRootViewControllerAnimated:YES];
}

- (IBAction)onCancelUploadClicked {
/*
    [NSObject cancelPreviousPerformRequestsWithTarget:self
              selector:@selector(uploadImage)
              object:nil];
*/
    [uploadPhotoOverlay removeFromSuperview];

    [self showPhotoSourceMenuOrPhotoSourceDirectly];
}


- (IBAction)onContinueRecommendationClicked {
    [self showPhotoSourceMenu];
}




#pragma mark Private


- (void)cancelApp {
    [self.navigationController popToRootViewControllerAnimated:YES];
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


- (void)showPhotoSourceMenu {
    if (cameraAvailable) {
        photoSourceActionSheet = [[UIActionSheet alloc]
            initWithTitle:nil
            delegate:self
            cancelButtonTitle:@"Cancel"
            destructiveButtonTitle:nil
            otherButtonTitles:@"Camera", @"Photo Library", @"Settings", nil];
        kPhotoPickerViewControllerSourceIndexCamera = 0;
        kPhotoPickerViewControllerSourceIndexPhotoLibrary = 1;
		kPhotoPickerViewControllerSettings = 2;
    } else {
        photoSourceActionSheet = [[UIActionSheet alloc]
            initWithTitle:nil
            delegate:self
            cancelButtonTitle:@"Cancel"
            destructiveButtonTitle:nil
            otherButtonTitles:@"Choose Photo", @"Settings", nil];
        kPhotoPickerViewControllerSourceIndexCamera = -99;
        kPhotoPickerViewControllerSourceIndexPhotoLibrary = 0;
		kPhotoPickerViewControllerSettings = 1;
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

@end
