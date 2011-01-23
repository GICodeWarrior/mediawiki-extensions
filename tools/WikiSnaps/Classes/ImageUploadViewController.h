//
//  ImageUploadViewController.h
//  WikiSnaps
//
//  Created by Derk-Jan Hartman on 23-01-11.
//  Copyright 2011 Derk-Jan Hartman
//
//  Dual-licensed MIT and BSD
//  Based on Photopicker (MIT)

#import <UIKit/UIKit.h>

#import "CommonsUpload.h"


@interface ImageUploadViewController : UIViewController <UINavigationControllerDelegate,
                                                        CommonsUploadDelegate,
                                                        UIAlertViewDelegate> {
    IBOutlet UIView *view;
    IBOutlet UIImageView *uploadOverlayImage;
    IBOutlet UIProgressView *uploadProgress;
    IBOutlet UILabel *uploadProgressMessage;
    
    CommonsUpload *upload;
    
}
@property (nonatomic, retain) CommonsUpload *upload;


- (IBAction)onCancelUploadClicked: (id)sender;

@end
