//
//  SettingsViewController.h
//  photopicker
//
//  Created by Derk-Jan Hartman on 14-01-11.
//  Copyright 2011 Wikimedia Commons. All rights reserved.
//

#import <UIKit/UIKit.h>

#define COMMONS_USERNAME_KEY @"CommonsUsernameKey"
// FIXME insecure
#define COMMONS_PASSWORD_KEY @"CommonsPasswordKey"


@interface SettingsViewController : UIViewController <UINavigationControllerDelegate,
														 UITextFieldDelegate>{

	IBOutlet UITextField *username;
	IBOutlet UITextField *password;
	IBOutlet UIButton *save;
}

@property (retain, nonatomic) UITextField *username;
@property (retain, nonatomic) UITextField *password;
@property (retain, nonatomic) UIButton *save;

-(IBAction)textFieldDidEnd:(id)sender;

-(IBAction)saveAction:(id)sender;
@end
