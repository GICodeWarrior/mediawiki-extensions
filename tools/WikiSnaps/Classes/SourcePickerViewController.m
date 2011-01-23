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
    @property (nonatomic, retain) NSData *imageData;
    - (void)pickPhoto:(UIImagePickerControllerSourceType)sourceType;
@end

@implementation SourcePickerViewController

@synthesize imageData;

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
    UIImagePickerController *imagePickerController = [[UIImagePickerController alloc] init];
    imagePickerController.delegate = self;

    // If the camera is force enabled, show the library instead.
    #ifdef FORCE_ENABLE_CAMERA
        if (fakeCameraAvailable && sourceType == UIImagePickerControllerSourceTypeCamera) {
            sourceType = UIImagePickerControllerSourceTypePhotoLibrary;
        }
    #endif

    imagePickerController.sourceType = sourceType;
    // imagePickerController.allowsImageEditing = YES;
    
    [self presentModalViewController:imagePickerController animated:YES];
    [imagePickerController release];
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

    UIImage *image = [info valueForKey:UIImagePickerControllerOriginalImage];

    image = [image correctOrientation:image];

    CommonsUpload *ourUpload = [[CommonsUpload alloc] init];
    ourUpload.imageData = UIImageJPEGRepresentation(image, 0.85f);

    ImageDetailsViewController *detailsController = [[ImageDetailsViewController alloc] init];

    detailsController.upload = ourUpload;
    [ourUpload release];

    //to push the UIView.
    [self.navigationController pushViewController:detailsController animated:YES];
    [detailsController release];

    [picker dismissModalViewControllerAnimated:YES];
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
        [picker dismissModalViewControllerAnimated:YES];

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
    [super dealloc];
}


@end

