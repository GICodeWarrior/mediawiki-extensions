//
//  SourcePickerViewController.h
//  WikiSnaps
//
//  Created by Derk-Jan Hartman on 20-01-11.
//  Copyright 2011 Derk-Jan Hartman
//
//  Dual-licensed MIT and BSD
//  Based on Photopicker (MIT)

#import <UIKit/UIKit.h>

#import "Configuration.h"

@interface SourcePickerViewController : UITableViewController <UINavigationControllerDelegate,
                                                                UIImagePickerControllerDelegate> {
    BOOL cameraAvailable;
    BOOL fakeCameraAvailable;
    NSData *imageData;
}

- (IBAction)settingsPressed:(id)sender;
- (IBAction)infoPressed:(id)sender;
- (IBAction)onCameraClicked:(id)sender;
- (IBAction)onPhotoLibraryClicked:(id)sender;

@end
