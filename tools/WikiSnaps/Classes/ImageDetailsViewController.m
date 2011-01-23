//
//  ImageDetailsViewController.m
//  WikiSnaps
//
//  Created by Derk-Jan Hartman on 15-01-11.
//  Copyright 2011 Derk-Jan Hartman
//
//  Dual-licensed MIT and BSD

#import "ImageDetailsViewController.h"

#import "ImageUploadViewController.h"

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
	self.navigationItem.rightBarButtonItem = [[UIBarButtonItem alloc] initWithTitle: NSLocalizedString( @"Upload", @"Title for upload buton on image details view" )
                        style: UIBarButtonItemStyleDone
                        target: self
                        action: @selector( doUpload: ) ];
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
    
    ImageUploadViewController *uploadViewController = [[ImageUploadViewController alloc] init];
    uploadViewController.upload = upload;
    [self.navigationController pushViewController:uploadViewController animated:YES];
    [uploadViewController release];
}

@end
