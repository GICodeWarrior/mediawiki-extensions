//
//  ImageDetailsViewController.h
//  photopicker
//
//  Created by Derk-Jan Hartman on 15-01-11.
//  Copyright 2011 Wikimedia Commons. All rights reserved.
//

#import <UIKit/UIKit.h>


@interface ImageDetailsViewController : UIViewController <UINavigationControllerDelegate,
															UITextFieldDelegate> {
	IBOutlet UITextField *titleField;
	IBOutlet UITextView *descriptionText;
}

@property (nonatomic, retain) UITextField *titleField;
@property (nonatomic, retain) UITextView *descriptionText;

@end
