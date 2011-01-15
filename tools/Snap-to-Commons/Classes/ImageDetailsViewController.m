//
//  ImageDetailsViewController.m
//  photopicker
//
//  Created by Derk-Jan Hartman on 15-01-11.
//  Copyright 2011 Wikimedia Commons. All rights reserved.
//

#import "ImageDetailsViewController.h"


@implementation ImageDetailsViewController

@synthesize titleField;
@synthesize descriptionText;
@synthesize upload;

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
	self.navigationItem.rightBarButtonItem = [[UIBarButtonItem alloc] initWithTitle: @"Upload" style: UIBarButtonItemStyleDone target: self action: @selector( doUpload: ) ];
}


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
	[titleField release];
	[descriptionText release];
	[upload release];
    [super dealloc];
}

-(IBAction)textFieldDidEnd:(id)sender {
	if(sender == titleField ) {
		[descriptionText becomeFirstResponder];
		return;
	}
	[sender resignFirstResponder];
}

- (BOOL)textView:(UITextView *)textView shouldChangeTextInRange:(NSRange)range 
 replacementText:(NSString *)text
{
	return YES;
}

- (void)doUpload:(id)sender {
	upload.title = [NSString stringWithFormat: @"%@.jpg", titleField.text];
	upload.description = descriptionText.text;
	[descriptionText resignFirstResponder];
	upload.delegate = self;
	
	[upload uploadImage];
}

- (void)uploadSucceeded {
	UIAlertView *alert =
	[[UIAlertView alloc] initWithTitle: @"Upload succeeded"
							   message: nil
							  delegate: self
					 cancelButtonTitle: @"Show upload"
					 otherButtonTitles: nil];
    [alert show];
    [alert release];
}

- (void)uploadFailed:(NSString *)error {
	NSLog(error);
	[self.navigationController popToRootViewControllerAnimated:YES];
}

- (void) alertView: (UIAlertView *) alertView clickedButtonAtIndex: (NSInteger) buttonIndex {
    [[UIApplication sharedApplication] openURL:[NSURL URLWithString: [NSString stringWithFormat:@"http://commons.wikimedia.org/wiki/File:%@", [upload.title stringByAddingPercentEscapesUsingEncoding:NSUTF8StringEncoding]]]];
	//[self.navigationController popToRootViewControllerAnimated:YES];
} // clickedButtonAtIndex

@end
