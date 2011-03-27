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
#import "PhotoPickerAppDelegate.h"

@implementation SettingsViewController

@synthesize usernameLabel, passwordLabel, licenseLabel;
@synthesize username,password,license;
@synthesize save;
@synthesize licenses;
@synthesize selectedLicense;

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
    
    PhotoPickerAppDelegate *appDelegate =
            (PhotoPickerAppDelegate *) [UIApplication sharedApplication].delegate;
            
    self.licenses = appDelegate.licenses;
    self.selectedLicense = 0;
    
    [self loadData];

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

/*
- (void)viewWillDisappear:(BOOL)animated {
    [super viewWillDisappear:animated];
}
*/

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
    self.username = nil;
    self.password = nil;
    self.license = nil;
    self.save = nil;
    
    self.licenses = nil;

    [super dealloc];
}

#pragma mark Data loading and saving

- (void)loadData {
    self.username.text = [[NSUserDefaults standardUserDefaults] valueForKey: COMMONS_USERNAME_KEY];

    NSString *licenseDefault = [[NSUserDefaults standardUserDefaults] stringForKey: COMMONS_LICENSE_KEY];
    NSEnumerator *enumerator = [self.licenses objectEnumerator];
    NSDictionary *aLicense;
    while( licenseDefault != nil && (aLicense = [enumerator nextObject]) ) {
        if( [licenseDefault compare: [aLicense objectForKey:@"short"]] == NSOrderedSame ) {
            self.license.text = [aLicense objectForKey:@"name"];
            break;
        }
        self.selectedLicense++;
    }
    if( self.selectedLicense == [self.licenses count] )
        self.selectedLicense = 0;

    NSError *error = nil;
    self.password.text = [SFHFKeychainUtils getPasswordForUsername:username.text andServiceName:COMMONS_KEYCHAIN_KEY error: &error];
    if( error ) {
        NSLog( @"pasword storage problem: %@", [error localizedDescription] );
    }
}

- (void)saveData {
    NSError *error = nil;
    NSString *oldUsername = [[NSUserDefaults standardUserDefaults] valueForKey: COMMONS_USERNAME_KEY];
    if( [self.username.text compare:oldUsername] != NSOrderedSame ) {
        /* Delete password for previous username */
        [SFHFKeychainUtils deleteItemForUsername:oldUsername andServiceName:COMMONS_KEYCHAIN_KEY error:&error];
        if( error ) {
            NSLog( @"pasword deletion problem: %@", [error localizedDescription] );
            error = nil;
        }
    }

    /* Save the data */
    [[NSUserDefaults standardUserDefaults] setObject:self.username.text forKey:COMMONS_USERNAME_KEY];

    NSDictionary *aLicense = [self.licenses objectAtIndex:self.selectedLicense];
    [[NSUserDefaults standardUserDefaults] setObject:[aLicense objectForKey:@"short"] forKey:COMMONS_LICENSE_KEY];

    /* Store the password in the keychain */
    [SFHFKeychainUtils storeUsername: self.username.text andPassword: self.password.text forServiceName:COMMONS_KEYCHAIN_KEY updateExisting: YES error: &error];
    
    if( error ) {
        NSLog( @"pasword storage problem: %@", [error localizedDescription] );
    }
    [[NSUserDefaults standardUserDefaults] synchronize];
}

#pragma mark UITextField Delegate

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
        [self.password becomeFirstResponder];
        return;
    }
    [sender resignFirstResponder];
}

#pragma mark Actions

- (IBAction)saveAction:(id)sender {
    [self saveData];
    /* Return to Primary view */
    [self.navigationController popViewControllerAnimated:YES];
}

- (IBAction) pickLicensePicker:(id)sender{
    LicensePickerViewController *picker = [[LicensePickerViewController alloc] initWithNibName:@"LicensePickerViewController" bundle:nil];
    picker.delegate = self;
    picker.licenses = self.licenses;
    picker.selectedLicense = self.selectedLicense;
    [self presentModalViewController:picker animated:YES];
    [picker release];
}

#pragma mark LicensePicker Delegate

-(void)licensePickerDidFinish:(int)theSelectedLicense {
    NSDictionary *licenseDict = [licenses objectAtIndex:theSelectedLicense];
    self.license.text = [licenseDict objectForKey:@"name"];
    self.selectedLicense = theSelectedLicense;
    [self dismissModalViewControllerAnimated:YES];
}

@end
