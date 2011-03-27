//
//  SourcePickerViewController.m
//  WikiSnaps
//
//  Created by Derk-Jan Hartman on 20-01-11.
//  Copyright 2011 Derk-Jan Hartman
//
//  Dual-licensed MIT and BSD
//  Based on Photopicker (MIT)

#import "PhotoPickerAppDelegate.h"
#import <AssetsLibrary/AssetsLibrary.h>
#import <ImageIO/ImageIO.h>

#import "SourcePickerViewController.h"
#import "SettingsViewController.h"
//#import "AboutViewController.h"
#import "ImageDetailsViewController.h"

#import "UIImage+PhotoPicker.h"
#import "NSData+PhotoPicker.h"
#import "CommonsUpload.h"

static int kSourcePickerViewControllerSourceIndexCamera = 0;
static int kSourcePickerViewControllerSourceIndexPhotoLibrary = 1;

/* Private */
@interface SourcePickerViewController ()
    - (void)pickPhoto:(UIImagePickerControllerSourceType)sourceType;
    - (void)detailsForImageWithURL:(NSURL *)assetURL;
@end

@implementation SourcePickerViewController

@synthesize image;
@synthesize imagePicker;

#pragma mark -
#pragma mark Actions

/* Load the settings panel */
- (IBAction)settingsPressed:(id)sender {
    SettingsViewController *settingsController = [[SettingsViewController alloc] init];
    [self.navigationController pushViewController:settingsController animated:YES];
    [settingsController release];
}

/* Load the About panel */
- (IBAction)infoPressed:(id)sender {
    return;
    
//    AboutViewController *aboutController = [[AboutViewController alloc] init];
//    [self.navigationController pushViewController:AboutViewController animated:YES];
//    [AboutViewController release];
}

/* Open the camera */
- (IBAction)onCameraClicked: (id)sender {
    [self pickPhoto:UIImagePickerControllerSourceTypeCamera];
}

/* Open the photo library */
- (IBAction)onPhotoLibraryClicked: (id)sender {
    [self pickPhoto:UIImagePickerControllerSourceTypePhotoLibrary];
}

/* Open a photopicker */
- (void)pickPhoto:(UIImagePickerControllerSourceType)sourceType {
    self.imagePicker = [[[UIImagePickerController alloc] init] autorelease];
    self.imagePicker.delegate = self;

    // If the camera is force enabled, show the library instead.
    #ifdef FORCE_ENABLE_CAMERA
        if (fakeCameraAvailable && sourceType == UIImagePickerControllerSourceTypeCamera) {
            sourceType = UIImagePickerControllerSourceTypePhotoLibrary;
        }
    #endif

    self.imagePicker.sourceType = sourceType;
    // imagePickerController.allowsImageEditing = YES;

    [self presentModalViewController:self.imagePicker animated:YES];
}

- (NSMutableDictionary*)currentLocation {
    NSMutableDictionary *locDict = [[NSMutableDictionary alloc] init];
    PhotoPickerAppDelegate *appDelegate =
        (PhotoPickerAppDelegate *) [UIApplication sharedApplication].delegate;
    CLLocation *lastLocation = appDelegate.lastLocation;

    if (lastLocation != nil) {
        CLLocationDegrees exifLatitude = lastLocation.coordinate.latitude;
        CLLocationDegrees exifLongitude = lastLocation.coordinate.longitude;
        CLLocationDistance exifAltitude = lastLocation.altitude;

        [locDict setObject:@"2.2.0.0" forKey:(NSString *)kCGImagePropertyGPSVersion];
        [locDict setObject:lastLocation.timestamp forKey:(NSString*)kCGImagePropertyGPSTimeStamp];

        if (exifLatitude < 0.0) {
          exifLatitude = exifLatitude*(-1);
          [locDict setObject:@"S" forKey:(NSString*)kCGImagePropertyGPSLatitudeRef];
        } else {
          [locDict setObject:@"N" forKey:(NSString*)kCGImagePropertyGPSLatitudeRef];
        }
        [locDict setObject:[NSNumber numberWithFloat:exifLatitude] forKey:(NSString*)kCGImagePropertyGPSLatitude];

        if (exifLongitude < 0.0) {
          exifLongitude=exifLongitude*(-1);
          [locDict setObject:@"W" forKey:(NSString*)kCGImagePropertyGPSLongitudeRef];
        } else {
          [locDict setObject:@"E" forKey:(NSString*)kCGImagePropertyGPSLongitudeRef];
        }
        [locDict setObject:[NSNumber numberWithFloat:exifLongitude] forKey:(NSString*) kCGImagePropertyGPSLongitude];
        
        if (!isnan(exifAltitude)){
            if (exifAltitude < 0) {
                exifAltitude = -exifAltitude;
                [locDict setObject:@"1" forKey:(NSString *)kCGImagePropertyGPSAltitudeRef];
            } else {
                [locDict setObject:@"0" forKey:(NSString *)kCGImagePropertyGPSAltitudeRef];
            }
            [locDict setObject:[NSNumber numberWithFloat:exifAltitude] forKey:(NSString *)kCGImagePropertyGPSAltitude];
        }
        
        // Speed, must be converted from m/s to km/h
        if (lastLocation.speed >= 0){
            [locDict setObject:@"K" forKey:(NSString *)kCGImagePropertyGPSSpeedRef];
            [locDict setObject:[NSNumber numberWithFloat:lastLocation.speed*3.6] forKey:(NSString *)kCGImagePropertyGPSSpeed];
        }

        // Heading
        if (lastLocation.course >= 0){
            [locDict setObject:@"T" forKey:(NSString *)kCGImagePropertyGPSTrackRef];
            [locDict setObject:[NSNumber numberWithFloat:lastLocation.course] forKey:(NSString *)kCGImagePropertyGPSTrack];
        }
    }

    return [locDict autorelease];
}

#pragma mark -
#pragma mark View lifecycle


- (void)viewDidLoad {
    [super viewDidLoad];

    // Uncomment the following line to display an Edit button in the navigation bar for this view controller.
    // self.navigationItem.rightBarButtonItem = self.editButtonItem;
    self.title = NSLocalizedString( @"Image source", @"Title for image source picker view" );
    
    // Add a settings button etc
    UIBarButtonItem *settingsButton = [[UIBarButtonItem alloc] 
        initWithTitle: NSLocalizedString( @"Settings", @"A button to go to the settings view" )
        style: UIBarButtonItemStylePlain
        target:self
        action: @selector(settingsPressed:)];
    self.navigationItem.leftBarButtonItem = settingsButton;
    [settingsButton release];
    
    UIButton *infoButton = [UIButton buttonWithType:UIButtonTypeInfoLight];
    [infoButton addTarget:self action:@selector(infoPressed:) forControlEvents:UIControlEventTouchUpInside];
    UIBarButtonItem *infoBarButton = [[UIBarButtonItem alloc] initWithCustomView: infoButton];
    self.navigationItem.rightBarButtonItem = infoBarButton;
    [infoBarButton release];

    #ifdef FORCE_ENABLE_CAMERA
        cameraAvailable = YES;
        fakeCameraAvailable = ![UIImagePickerController
            isSourceTypeAvailable:UIImagePickerControllerSourceTypeCamera];
    #else
        cameraAvailable =
            [UIImagePickerController isSourceTypeAvailable:UIImagePickerControllerSourceTypeCamera];
    #endif
}


/*
- (void)viewWillAppear:(BOOL)animated {
    [super viewWillAppear:animated];
}
*/

- (void)viewDidAppear:(BOOL)animated {
    [super viewDidAppear:animated];
    
    #ifdef SHOW_SOURCE_MENU_IF_DEFAULT_SOURCE_CANCELLED
        PhotoPickerAppDelegate *appDelegate =
            (PhotoPickerAppDelegate *) [UIApplication sharedApplication].delegate;

        // Clearing the default image source in case the user goes back to the menu.
        appDelegate.defaultImageSource = -1;
    #endif
}

/*
- (void)viewWillDisappear:(BOOL)animated {
    [super viewWillDisappear:animated];
}
*/
/*
- (void)viewDidDisappear:(BOOL)animated {
    [super viewDidDisappear:animated];
}
*/
/*
// Override to allow orientations other than the default portrait orientation.
- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation {
    // Return YES for supported orientations.
    return (interfaceOrientation == UIInterfaceOrientationPortrait);
}
*/


#pragma mark -
#pragma mark Table view data source

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView {
    // Return the number of sections.
    return 1;
}


- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {
    // Return the number of rows in the section.
    if (cameraAvailable) {
        return 2;
    }

    return 1;
}


// Customize the appearance of table view cells.
- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath {
    
    static NSString *CellIdentifier = @"Cell";
    
    UITableViewCell *cell = [tableView dequeueReusableCellWithIdentifier:CellIdentifier];
    if (cell == nil) {
        cell = [[[UITableViewCell alloc] initWithStyle:UITableViewCellStyleDefault reuseIdentifier:CellIdentifier] autorelease];
    }
    
    cell.accessoryType = UITableViewCellAccessoryDisclosureIndicator;
    
    if (indexPath.row == kSourcePickerViewControllerSourceIndexCamera ) {
        cell.textLabel.text = NSLocalizedString( @"Camera", @"Title for source selection item; Camera");
    } else if (indexPath.row == kSourcePickerViewControllerSourceIndexPhotoLibrary ) {
        cell.textLabel.text = NSLocalizedString( @"Photo Library", @"Title for source selection item; Photo Library");
    }
    return cell;
}


#pragma mark -
#pragma mark Table view delegate

- (void)tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath {
    [tableView deselectRowAtIndexPath:indexPath animated:YES];

    if (indexPath.row == kSourcePickerViewControllerSourceIndexCamera) {
        [self onCameraClicked: tableView];
    } else if (indexPath.row == kSourcePickerViewControllerSourceIndexPhotoLibrary) {
        [self onPhotoLibraryClicked: tableView];
    }
}

#pragma mark UIImagePickerControllerDelegate Methods


- (void)imagePickerController:(UIImagePickerController *)picker
        didFinishPickingMediaWithInfo:(NSDictionary *)info {
    NSLog(@"Image info: %@",info);

    self.image  = [info valueForKey:UIImagePickerControllerOriginalImage];
    NSURL *imageURL = [info valueForKey:UIImagePickerControllerMediaURL];
    NSMutableDictionary *metaData = [NSMutableDictionary dictionaryWithDictionary:[info valueForKey:UIImagePickerControllerMediaMetadata]];

    [metaData setObject:[self currentLocation] forKey: (NSString *)kCGImagePropertyGPSDictionary];
    
    // Store the image on the Camera Roll
    if( picker.sourceType == UIImagePickerControllerSourceTypeCamera ) {
        Class assestsLibClass = (NSClassFromString(@"ALAssetsLibrary"));
        if( assestsLibClass != nil ) {
            ALAssetsLibrary *library = [[[ALAssetsLibrary alloc] init] autorelease];
            
            ALAssetsLibraryWriteImageCompletionBlock completionBlock = ^(NSURL *newURL, NSError *error) {
                if (error) {
                    NSLog( @"Could not write image to photoalbum: %@", error );
                } else {
                    [self detailsForImageWithURL: newURL];
                }
            };

            [library writeImageToSavedPhotosAlbum:[self.image CGImage] metadata:metaData completionBlock:completionBlock];
            return;
        } else {
            self.image = [self.image correctOrientation:self.image];
            UIImageWriteToSavedPhotosAlbum( self.image, nil, nil, nil );
        }
    }
    [self detailsForImageWithURL: imageURL];
    
}

- (void)detailsForImageWithURL:(NSURL *)assetURL {
    // Prepare upload
    CommonsUpload *ourUpload = [[CommonsUpload alloc] init];
    ourUpload.originalImage = self.image;
    ourUpload.imageURL = assetURL;

    ImageDetailsViewController *detailsController = [[ImageDetailsViewController alloc] init];

    detailsController.upload = ourUpload;
    [ourUpload release];

    //to push the UIView.
    [self.navigationController pushViewController:detailsController animated:YES];
    [detailsController release];
    
    [self dismissModalViewControllerAnimated:YES];
}


- (void)imagePickerControllerDidCancel:(UIImagePickerController *)picker {
    BOOL shouldCancelApp = !cameraAvailable;
    #ifndef SHOW_SOURCE_MENU_IF_DEFAULT_SOURCE_CANCELLED
        PhotoPickerAppDelegate *appDelegate =
            (PhotoPickerAppDelegate *) [UIApplication sharedApplication].delegate;

        shouldCancelApp = shouldCancelApp || appDelegate.defaultImageSource >= 0;
    #endif

    if (shouldCancelApp) {
        //[self cancelApp];
    } else {
        [self dismissModalViewControllerAnimated:YES];

        //[self showPhotoSourceMenuOrPhotoSourceDirectly];
    }
}

#pragma mark -
#pragma mark Memory management

- (void)didReceiveMemoryWarning {
    // Releases the view if it doesn't have a superview.
    [super didReceiveMemoryWarning];
    
    // Relinquish ownership any cached data, images, etc. that aren't in use.
}

- (void)viewDidUnload {
    // Relinquish ownership of anything that can be recreated in viewDidLoad or on demand.
    // For example: self.myOutlet = nil;
}


- (void)dealloc {
    self.image = nil;
    self.imagePicker = nil;
    [super dealloc];
}


@end

