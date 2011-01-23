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


@implementation SettingsViewController

@synthesize username,password,save;

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
    username.text = [[NSUserDefaults standardUserDefaults] valueForKey: COMMONS_USERNAME_KEY];
    password.text = [[NSUserDefaults standardUserDefaults] valueForKey: COMMONS_PASSWORD_KEY];

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
    /* Save the data */
    [[NSUserDefaults standardUserDefaults] setObject:username.text forKey:COMMONS_USERNAME_KEY];
    // FIXME insecure
    [[NSUserDefaults standardUserDefaults] setObject:password.text forKey:COMMONS_PASSWORD_KEY];
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


-(IBAction)textFieldDidEnd:(id)sender {
    if(sender == username ) {
        [password becomeFirstResponder];
        return;
    }
    [sender resignFirstResponder];
}

-(IBAction)saveAction:(id)sender {
    /* Return to Primary view */
    [self.navigationController popViewControllerAnimated:YES];
}

@end
