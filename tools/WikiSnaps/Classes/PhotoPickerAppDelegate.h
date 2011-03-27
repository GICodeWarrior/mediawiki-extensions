//
//  PhotoPickerAppDelegate.h
//
//  Created by Derk-Jan Hartman on 14-01-11.
//  Copyright 2011 Derk-Jan Hartman
//
//  Dual-licensed MIT and BSD
//  Based on Photopicker (MIT)

#import <UIKit/UIKit.h>
#import <CoreLocation/CoreLocation.h>

#import "Configuration.h"


@class PhotoPickerViewController;


@interface PhotoPickerAppDelegate : NSObject <UIApplicationDelegate,
                                            CLLocationManagerDelegate> {
    int         defaultImageSource;
    BOOL        justInstalled;

    NSString    *postContext;
    UIWindow    *window;
    PhotoPickerViewController   *viewController;
    UINavigationController      *navController;

    NSArray     *licenses;

    CLLocationManager *locationManager;
    CLLocation  *lastLocation;
}

@property int defaultImageSource;

// Checking the justInstalled property could be useful if you want to point the somewhere special
// the first time they run the app.
@property BOOL justInstalled;

@property (nonatomic, retain) NSString *postContext;
@property (nonatomic, retain) IBOutlet PhotoPickerViewController *viewController;
@property (nonatomic, retain) IBOutlet UINavigationController *navController;
@property (nonatomic, retain) IBOutlet UIWindow *window;

@property (nonatomic, retain) NSArray  *licenses;

@property (nonatomic, assign) CLLocationManager *locationManager;
@property (nonatomic, retain) CLLocation *lastLocation;

@end

