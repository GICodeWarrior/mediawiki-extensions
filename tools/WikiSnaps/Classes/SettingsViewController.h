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
#import "LicensePickerViewController.h"

@interface SettingsViewController : UIViewController <UINavigationControllerDelegate,
                                                        UITextFieldDelegate,
                                                        LicensePickerDelegate>{

	IBOutlet UILabel *usernameLabel;
	IBOutlet UILabel *passwordLabel;
	IBOutlet UILabel *licenseLabel;

	IBOutlet UITextField *username;
	IBOutlet UITextField *password;
	IBOutlet UITextField *license;
	IBOutlet UIButton    *save;
        int                  selectedLicense;
}

@property (retain, nonatomic) UILabel *usernameLabel;
@property (retain, nonatomic) UILabel *passwordLabel;
@property (retain, nonatomic) UILabel *licenseLabel;

@property (retain, nonatomic) UITextField *username;
@property (retain, nonatomic) UITextField *password;
@property (retain, nonatomic) UITextField *license;
@property (retain, nonatomic) UIButton *save;

@property (retain, nonatomic) NSArray       *licenses;
@property (nonatomic) int selectedLicense;

-(void)loadData;
-(void)saveData;

-(IBAction)textFieldDidEnd:(id)sender;
-(IBAction)pickLicensePicker:(id)sender;

-(IBAction)saveAction:(id)sender;

@end
