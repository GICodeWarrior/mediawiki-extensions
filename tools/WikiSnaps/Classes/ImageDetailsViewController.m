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
    self.title = NSLocalizedString( @"Image details", "Title of the Image Details view" );
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
    self.titleField = nil;
    self.descriptionText = nil;
    self.upload = nil;
    [super dealloc];
}

-(IBAction)textFieldDidEnd:(id)sender {
    [self textFieldDidEndEditing:sender];
}

-(void)textFieldDidEndEditing:(id)sender {
    if(sender == titleField ) {
        /* Verify name */
        if( ![self.upload verifyTitle: self.titleField.text] ) {
            self.titleField.textColor = [UIColor redColor];
        } else {
            self.titleField.textColor = [UIColor blackColor];
            [self.descriptionText becomeFirstResponder];
        }
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
    self.upload.imageTitle = [NSString stringWithFormat: @"%@.jpg", self.titleField.text];
    self.upload.description = self.descriptionText.text;
    [self.descriptionText resignFirstResponder];
    
    ImageUploadViewController *uploadViewController = [[ImageUploadViewController alloc] init];
    uploadViewController.upload = self.upload;
    [self.navigationController pushViewController:uploadViewController animated:YES];
    [uploadViewController release];
}

@end
