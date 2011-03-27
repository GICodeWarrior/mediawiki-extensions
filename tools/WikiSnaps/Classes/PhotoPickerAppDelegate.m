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
    - (void)startLocationUpdates;
    - (void)stopLocationUpdates;
@end


@implementation PhotoPickerAppDelegate

@synthesize defaultImageSource;
@synthesize justInstalled;
@synthesize postContext;
@synthesize viewController;
@synthesize navController;
@synthesize licenses;

@synthesize locationManager, lastLocation;


- (BOOL)application:(UIApplication *)application
        didFinishLaunchingWithOptions:(NSDictionary *)launchOptions {

    [self checkIfJustInstalled];

    self.defaultImageSource = -1;

    NSString *path = [[NSBundle mainBundle] pathForResource:@"Licenses" ofType:@"plist"];
    self.licenses = [[NSMutableArray alloc] initWithContentsOfFile:path];
    if( self.licenses == nil ) {
        NSLog( @"Could not load the licenses information" );
    }

    [window addSubview:navController.view];
    [window makeKeyAndVisible];
    
    [self startLocationUpdates];
    return YES;
}

- (void)applicationWillTerminate:(UIApplication *)application {
    [self stopLocationUpdates];
}

- (void)applicationWillEnterForeground:(UIApplication *)application {
    [self startLocationUpdates];
}


- (void)applicationDidEnterBackground:(UIApplication *)application {
    [self stopLocationUpdates];
}


- (void)dealloc {
    self.viewController = nil;
    self.navController = nil;
    self.window = nil;
    self.licenses = nil;
    self.lastLocation = nil;

    [super dealloc];
}

#pragma mark Location services
- (void)startLocationUpdates {
    // Create the location manager if this object does not
    // already have one.
    if( [CLLocationManager locationServicesEnabled] &&
        //[[NSUserDefaults standardUserDefaults] boolForKey: GEOTAGGING_KEY] )
        TRUE )
    {
        if (nil == self.locationManager)
            self.locationManager = [[CLLocationManager alloc] init];
     
        self.locationManager.delegate = self;
        self.locationManager.desiredAccuracy = kCLLocationAccuracyKilometer;
     
        // Set a movement threshold for new events.
        self.locationManager.distanceFilter = 500;
     
        [self.locationManager startUpdatingLocation];
        
        if( [self.locationManager headingAvailable] ) {
            [self.locationManager startUpdatingHeading];
        }
    }
}

- (void)stopLocationUpdates {
    if( self.locationManager != nil ) {
        [self.locationManager stopUpdatingHeading];
        [self.locationManager stopUpdatingLocation];
        [self.locationManager release];
        self.locationManager = nil;
    }
}

#pragma mark LocationManager Delegate

// Delegate method from the CLLocationManagerDelegate protocol.
- (void)locationManager:(CLLocationManager *)manager
    didUpdateToLocation:(CLLocation *)newLocation
    fromLocation:(CLLocation *)oldLocation
{
    // If it's a relatively recent event, turn off updates to save power
    NSDate* eventDate = newLocation.timestamp;
    NSTimeInterval howRecent = [eventDate timeIntervalSinceNow];
    if (abs(howRecent) < 15.0)
    {
        NSLog(@"latitude %+.6f, longitude %+.6f\n",
                newLocation.coordinate.latitude,
                newLocation.coordinate.longitude);
    }
    self.lastLocation = newLocation;
}

- (void)locationManager:(CLLocationManager *)manager didFailWithError:(NSError *)error
{
    NSLog(@"%@", error );
}

#pragma mark Private


- (void)checkIfJustInstalled {
    self.justInstalled = NO;
    NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
    id testForInstallKey = [defaults valueForKey:@"installed"];
    if (!testForInstallKey) {
        self.justInstalled = YES;
        [defaults setBool:YES forKey:@"installed"];
        [defaults setBool:NO forKey:GEOTAGGING_KEY];
    }
}


@end
