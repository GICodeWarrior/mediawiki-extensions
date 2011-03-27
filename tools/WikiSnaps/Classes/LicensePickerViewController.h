//
//  LicensePickerViewController.h
//  WikiSnaps
//
//  Created by Derk-Jan Hartman on 26-03-11.
//  Copyright 2011 Wikimedia Commons. All rights reserved.
//

#import <UIKit/UIKit.h>

@protocol LicensePickerDelegate
- (void)licensePickerDidFinish: (int)selectedLicense;
@end

@interface LicensePickerViewController : UIViewController {
        id <LicensePickerDelegate> delegate;

        IBOutlet UIBarButtonItem  *dismissButton;
        IBOutlet UINavigationItem *navItem;
        IBOutlet UIPickerView   *pickerControl;
        IBOutlet UIWebView      *descriptionText;
        IBOutlet UILabel        *pickerLabel;
        
        NSArray *licenses;
        int selectedLicense;

}

@property (retain, nonatomic) id <LicensePickerDelegate> delegate;
@property (retain, nonatomic) UIWebView     *descriptionText;
@property (retain, nonatomic) UILabel       *pickerLabel;
@property (retain, nonatomic) NSArray       *licenses;
@property (nonatomic) int selectedLicense;

-(IBAction)dismissLicensePicker:(id)sender;

@end
