//
//  PhotoPickerAppDelegate.h
//
//  Created by Derk-Jan Hartman on 14-01-11.
//  Copyright 2011 Derk-Jan Hartman
//
//  Dual-licensed MIT and BSD
//  Based on Photopicker (MIT)

#import <UIKit/UIKit.h>

#import "Configuration.h"


@class PhotoPickerViewController;


@interface PhotoPickerAppDelegate : NSObject <UIApplicationDelegate> {
    int defaultImageSource;
    BOOL justInstalled;
    NSString *postContext;
    UIWindow *window;
    PhotoPickerViewController *viewController;
	UINavigationController *navController;
}

@property (nonatomic, assign) int defaultImageSource;

// Checking the justInstalled property could be useful if you want to point the somewhere special
// the first time they run the app.
@property (nonatomic, assign) BOOL justInstalled;

@property (nonatomic, retain) NSString *postContext;
@property (nonatomic, retain) IBOutlet PhotoPickerViewController *viewController;
@property (nonatomic, retain) IBOutlet UINavigationController *navController;
@property (nonatomic, retain) IBOutlet UIWindow *window;

@end

