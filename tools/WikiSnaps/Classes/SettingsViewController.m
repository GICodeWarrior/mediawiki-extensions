//
//  SettingsViewController.m
//  WikiSnaps
//
//  Created by Derk-Jan Hartman on 14-01-11.
//  Copyright 2011 Derk-Jan Hartman
//
//  Dual-licensed MIT and BSD

#import "SettingsViewController.h"
#import "ASIFormDataRequest.h"
#import "SFHFKeychainUtils.h"


@implementation SettingsViewController

@synthesize usernameLabel, passwordLabel, licenseLabel;
@synthesize username,password,license;
@synthesize save;

// The designated initializer.  Override if you create the controller programmatically and want to perform customization that is not appropriate for viewDidLoad.
/*
- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil {
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        // Custom initialization.
    }
    return self;
}
*/


// Implement viewDidLoad to do additional setup after loading the view, typically from a nib.
- (void)viewDidLoad {
    [super viewDidLoad];
    self.title = NSLocalizedString( @"Settings", @"Title of the settings view" );
    usernameLabel.text = NSLocalizedString( @"Username", @"Label of the username textfield" );
    usernameLabel.text = NSLocalizedString( @"Password", @"Label of the password textfield" );
    usernameLabel.text = NSLocalizedString( @"License", @"Label of the license textfield" );
    
    username.text = [[NSUserDefaults standardUserDefaults] valueForKey: COMMONS_USERNAME_KEY];
    license.text = [[NSUserDefaults standardUserDefaults] valueForKey: COMMONS_LICENSE_KEY];

    NSError *error = nil;
    password.text = [SFHFKeychainUtils getPasswordForUsername:username.text andServiceName:COMMONS_KEYCHAIN_KEY error: &error];
    if( error ) {
        NSLog( @"pasword storage problem: %@", [error localizedDescription] );
    }
}

/*
- (void)viewWillAppear:(BOOL)animated {
    [super viewWillAppear:animated];
}
*/
/*
- (void)viewDidAppear:(BOOL)animated {
    [super viewDidAppear:animated];
}
*/

- (void)viewWillDisappear:(BOOL)animated {
    [super viewWillDisappear:animated];

    NSError *error = nil;
    NSString *oldUsername = [[NSUserDefaults standardUserDefaults] valueForKey: COMMONS_USERNAME_KEY];
    if( [username.text compare:oldUsername] != NSOrderedSame ) {
        /* Delete password for previous username */
        [SFHFKeychainUtils deleteItemForUsername:oldUsername andServiceName:COMMONS_KEYCHAIN_KEY error:&error];
        if( error ) {
            NSLog( @"pasword deletion problem: %@", [error localizedDescription] );
            error = nil;
        }
    }

    /* Save the data */
    [[NSUserDefaults standardUserDefaults] setObject:username.text forKey:COMMONS_USERNAME_KEY];
    [[NSUserDefaults standardUserDefaults] setObject:license.text forKey:COMMONS_LICENSE_KEY];

    /* Store the password in the keychain */
    [SFHFKeychainUtils storeUsername: username.text andPassword: password.text forServiceName:COMMONS_KEYCHAIN_KEY updateExisting: YES error: &error];
    
    if( error ) {
        NSLog( @"pasword storage problem: %@", [error localizedDescription] );
    }
    [[NSUserDefaults standardUserDefaults] synchronize];
}

/*
- (void)viewDidDisappear:(BOOL)animated {
    [super viewDidDisappear:animated];
}
*/

/*
// Override to allow orientations other than the default portrait orientation.
- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation {
    // Return YES for supported orientations.
    return (interfaceOrientation == UIInterfaceOrientationPortrait);
}
*/

- (void)didReceiveMemoryWarning {
    // Releases the view if it doesn't have a superview.
    [super didReceiveMemoryWarning];
    
    // Release any cached data, images, etc. that aren't in use.
}

- (void)viewDidUnload {
    [super viewDidUnload];
    // Release any retained subviews of the main view.
    // e.g. self.myOutlet = nil;
}


- (void)dealloc {
    [username release];
    [password release];
    [save release];
    [super dealloc];
}

- (BOOL)textFieldShouldBeginEditing:(UITextField *)textField {
    // Show UIPickerView
    if( textField == license ) {
        [self pickLicensePicker:textField];
        return NO;
    }
    return YES;
}

- (IBAction)textFieldDidEnd:(id)sender {
    if(sender == username ) {
        [password becomeFirstResponder];
        return;
    } else if (sender == license) {
        [self dismissLicensePicker:sender];
    }
    [sender resignFirstResponder];
}

- (IBAction)saveAction:(id)sender {
    /* Return to Primary view */
    [self.navigationController popViewControllerAnimated:YES];
}

- (IBAction) pickLicensePicker:(id)sender{
    navItem.title = NSLocalizedString( @"License", @"Title for the license picker" );
    dismissButton.title = NSLocalizedString( @"Select", "Title for the select button in license picker" );
    dismissButton.target = self;
    dismissButton.action = @selector( dismissLicensePicker: );
    
    /* Select the row that is selected by default atm */
    //[pickerControl selectRow: 0 inComponent: 0 animated: NO];
            
    // Slide picker view in
    [self popupView: pickerView];

}


- (IBAction) dismissLicensePicker: (id) sender
{
    // Get the data we need
    [self popdownView: pickerView];
}


#pragma mark Helper functions to pop up a view
- (void)popupView: (UIView *)popupView
{
    CGRect settingsFrame = self.view.frame;
    
    // Move view under the screen
    popupView.frame = CGRectMake(popupView.frame.origin.x,
                                   settingsFrame.size.height,
                                   popupView.frame.size.width,
                                   popupView.frame.size.height);
    // Add view as subview
    [self.view addSubview: popupView];		
    
    // Animate view slide (as keyboard shows)
    
    [UIView beginAnimations: @"addPopupView" context: popupView];
    
    [UIView setAnimationDuration: 0.3];
    [UIView setAnimationDelegate: self];
    [UIView setAnimationDidStopSelector: @selector(animationDidStop: finished: context:)];
    
    popupView.frame = CGRectMake(popupView.frame.origin.x,
                                   settingsFrame.size.height - popupView.frame.size.height,
                                                               popupView.frame.size.width,
                                                               popupView.frame.size.height);
    
    [UIView commitAnimations];
}


- (void)popdownView: (UIView *)popupView
{
    [UIView beginAnimations: @"removePopupView" context: popupView];
    
    [UIView setAnimationDuration: 0.3];
    [UIView setAnimationDelegate: self];
    [UIView setAnimationDidStopSelector: @selector(animationDidStop: finished: context:)];
    
    popupView.frame = CGRectMake(popupView.frame.origin.x,
                                   popupView.frame.origin.y + popupView.frame.size.height,
                                   popupView.frame.size.width,
                                   popupView.frame.size.height);
    
    [UIView commitAnimations];
}


#pragma mark UIPickerViewDelegate

- (NSString*)pickerView: (UIPickerView *)pickerView 
			 titleForRow: (NSInteger)row 
			 forComponent: (NSInteger)component
{
	return [NSString stringWithFormat: @"TEST %d" ];
        return @"";
}



#pragma mark UIPickerViewDataSource

- (NSInteger)numberOfComponentsInPickerView: (UIPickerView *)pickerView
{
    return 1;
}


- (NSInteger)pickerView: (UIPickerView *)pickerView numberOfRowsInComponent: (NSInteger)component
{
    NSInteger numberOfRows = 1;
    
    return numberOfRows;
}

@end
