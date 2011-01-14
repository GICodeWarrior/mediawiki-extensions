//
//  CommonsUpload.h
//  photopicker
//
//  Created by Derk-Jan Hartman on 15-01-11.
//  Copyright 2011 Wikimedia Commons. All rights reserved.
//

#import <Foundation/Foundation.h>


@interface CommonsUpload : NSObject {
	UIImage *imageData;
	NSString *title;
	NSString *description;
	
}

@property (nonatomic, retain) UIImage *imageData;
@property (nonatomic, retain) NSString *title;
@property (nonatomic, retain) NSString *description;


- (NSString *)getUploadText;
- (NSString *)getUploadDescription;


@end
