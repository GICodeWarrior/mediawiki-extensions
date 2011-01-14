//
//  PhotoPickerAppDelegate.m
//
//  Copyright yourcompanyname 2009. All rights reserved.
//

#import "PhotoPickerAppDelegate.h"

#import "PhotoPickerViewController.h"


@interface PhotoPickerAppDelegate ()
    - (void)checkIfJustInstalled;
    - (void)setupForUrl:(NSURL *)url;
@end


@implementation PhotoPickerAppDelegate

@synthesize defaultImageSource;
@synthesize justInstalled;
@synthesize launchedAsUrlHandler;
@synthesize postContext;
@synthesize viewController;
@synthesize window;


- (BOOL)application:(UIApplication *)application
        didFinishLaunchingWithOptions:(NSDictionary *)launchOptions {
    self.launchedAsUrlHandler = !!launchOptions;

    self.defaultImageSource = -1;
    self.postContext = @"";

    if (launchOptions) {
        NSURL *url = [launchOptions valueForKey:@"UIApplicationLaunchOptionsURLKey"];
        [self setupForUrl:url];
    }

    [self checkIfJustInstalled];

    [window addSubview:viewController.view];
    [window makeKeyAndVisible];

    return YES;
}


- (void)dealloc {
    self.postContext = nil;
    self.viewController = nil;
    self.window = nil;

    [super dealloc];
}


#pragma mark Private


- (void)checkIfJustInstalled {
    self.justInstalled = NO;
    NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
    id testForInstallKey = [defaults valueForKey:@"installed"];
    if (!testForInstallKey) {
        self.justInstalled = YES;
        [defaults setBool:YES forKey:@"installed"];
    }
}


- (void)setupForUrl:(NSURL *)url {
    NSString *query = [url query];
    if ([query length]) {
        NSArray *queryParts = [query componentsSeparatedByString:@"&"];
        for (NSString *queryPart in queryParts) {
            NSArray *kvp = [queryPart componentsSeparatedByString:@"="];
            NSString *key = [kvp objectAtIndex:0];
            NSString *value = [kvp objectAtIndex:1];

            if ([key isEqualToString:@"context"]) {
                self.postContext = value;
            } else if ([key isEqualToString:@"source"]) {
                if ([value isEqualToString:@"camera"]) {
                    self.defaultImageSource = UIImagePickerControllerSourceTypeCamera;
                } else if ([value isEqualToString:@"library"]) {
                    self.defaultImageSource = UIImagePickerControllerSourceTypePhotoLibrary;
                }
            }
        }
    }
}


@end
