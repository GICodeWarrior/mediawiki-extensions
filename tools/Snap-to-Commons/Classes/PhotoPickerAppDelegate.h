//
//  PhotoPickerAppDelegate.h
//
//  Copyright yourcompanyname 2009. All rights reserved.
//

#import <UIKit/UIKit.h>

#import "Configuration.h"


@class PhotoPickerViewController;


@interface PhotoPickerAppDelegate : NSObject <UIApplicationDelegate> {
    int defaultImageSource;
    BOOL justInstalled;
    BOOL launchedAsUrlHandler;
    NSString *postContext;
    UIWindow *window;
    PhotoPickerViewController *viewController;
}

@property (nonatomic, assign) int defaultImageSource;

// Checking the justInstalled property could be useful if you want to point the somewhere special
// the first time they run the app.
@property (nonatomic, assign) BOOL justInstalled;

@property (nonatomic, assign) BOOL launchedAsUrlHandler;
@property (nonatomic, retain) NSString *postContext;
@property (nonatomic, retain) IBOutlet PhotoPickerViewController *viewController;
@property (nonatomic, retain) IBOutlet UIWindow *window;

@end

