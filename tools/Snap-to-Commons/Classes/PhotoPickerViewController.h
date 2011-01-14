//
//  PhotoPickerViewController.h
//
//  Copyright yourcompanyname 2009. All rights reserved.
//

#import <UIKit/UIKit.h>

#import "Configuration.h"


@interface PhotoPickerViewController : UIViewController <UIActionSheetDelegate,
                                                         UIImagePickerControllerDelegate,
                                                         UINavigationControllerDelegate> {
    BOOL cameraAvailable;
    NSURLConnection *connection;
    BOOL fakeCameraAvailable;
    NSData *imageData;
    UIActionSheet *photoSourceActionSheet;
    NSHTTPURLResponse *response;
    NSMutableData *responseData;
    int retryCounter;
    IBOutlet UIButton *takePhotoButton;
    IBOutlet UIView *uploadPhotoOverlay;
    IBOutlet UIImageView *uploadOverlayImage;
    IBOutlet UIProgressView *uploadProgress;
    IBOutlet UILabel *uploadProgressMessage;
}

- (IBAction)onCameraClicked;
- (IBAction)onCancelUploadClicked;
- (IBAction)onPhotoLibraryClicked;

@end

