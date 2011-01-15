//
//  ImageDetailsViewController.h
//  photopicker
//
//  Created by Derk-Jan Hartman on 15-01-11.
//  Copyright 2011 Wikimedia Commons. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "CommonsUpload.h"


@interface ImageDetailsViewController : UIViewController <UINavigationControllerDelegate,
															UITextFieldDelegate,
															UITextViewDelegate,
															CommonsUploadDelegate,
															UIAlertViewDelegate> {
	IBOutlet UITextField *titleField;
	IBOutlet UITextView *descriptionText;
	CommonsUpload *upload;
}

@property (nonatomic, retain) UITextField *titleField;
@property (nonatomic, retain) UITextView *descriptionText;
@property (nonatomic, retain) CommonsUpload *upload;

- (IBAction)textFieldDidEnd:(id)sender;
- (void)doUpload:(id)sender;
@end
