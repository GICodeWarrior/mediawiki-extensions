//
//  PhotoPickerAppDelegate.m
//
//  Created by Derk-Jan Hartman on 14-01-11.
//  Copyright 2011 Derk-Jan Hartman
//
//  Dual-licensed MIT and BSD
//  Based on Photopicker (MIT)

#import "PhotoPickerAppDelegate.h"


@interface PhotoPickerAppDelegate ()
    - (void)checkIfJustInstalled;
@end


@implementation PhotoPickerAppDelegate

@synthesize defaultImageSource;
@synthesize justInstalled;
@synthesize postContext;
@synthesize viewController;
@synthesize navController;
@synthesize window;


- (BOOL)application:(UIApplication *)application
        didFinishLaunchingWithOptions:(NSDictionary *)launchOptions {

    self.defaultImageSource = -1;

    [self checkIfJustInstalled];

    [window addSubview:navController.view];
    [window makeKeyAndVisible];

    return YES;
}


- (void)dealloc {
    self.viewController = nil;
    self.navController = nil;
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


@end
