//
//  SettingsViewController.h
//  WikiSnaps
//
//  Created by Derk-Jan Hartman on 14-01-11.
//  Copyright 2011 Derk-Jan Hartman
//
//  Dual-licensed MIT and BSD

#import <UIKit/UIKit.h>
#import "Configuration.h"

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
