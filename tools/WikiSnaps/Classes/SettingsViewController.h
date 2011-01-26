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

	IBOutlet UILabel *usernameLabel;
	IBOutlet UILabel *passwordLabel;
	IBOutlet UILabel *licenseLabel;

	IBOutlet UITextField *username;
	IBOutlet UITextField *password;
	IBOutlet UITextField *license;
	IBOutlet UIButton *save;
        
        IBOutlet UIView *pickerView;
        IBOutlet UIBarButtonItem *dismissButton;
        IBOutlet UINavigationItem *navItem;
        IBOutlet UIPickerView *pickerControl;

}

@property (retain, nonatomic) UILabel *usernameLabel;
@property (retain, nonatomic) UILabel *passwordLabel;
@property (retain, nonatomic) UILabel *licenseLabel;

@property (retain, nonatomic) UITextField *username;
@property (retain, nonatomic) UITextField *password;
@property (retain, nonatomic) UITextField *license;
@property (retain, nonatomic) UIButton *save;

-(IBAction)textFieldDidEnd:(id)sender;
-(IBAction)pickLicensePicker:(id)sender;
-(IBAction)dismissLicensePicker:(id)sender;

-(IBAction)saveAction:(id)sender;

- (void)popupView: (UIView*) popupView;
- (void)popdownView: (UIView*) popupView;

@end
