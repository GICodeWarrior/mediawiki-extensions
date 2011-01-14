//
//  CommonsUpload.m
//  photopicker
//
//  Created by Derk-Jan Hartman on 15-01-11.
//  Copyright 2011 Wikimedia Commons. All rights reserved.
//

#import "CommonsUpload.h"
#import "Configuration.h"


@implementation CommonsUpload

@synthesize imageData, title, description;

- (NSString *)getUploadText {
	return @"";
}

- (NSString *)getUploadDescription {
	NSDateFormatter *formatter = [[[NSDateFormatter alloc] init] autorelease];
	[formatter setDateFormat:@"%Y-%m-%d"];
	NSString *date = [formatter stringFromDate:[NSDate date] ];
	
	return [NSString stringWithFormat: @"{{Information\n|Description={{en|1=%@}}\n|Author=[[User:%@]]\n|Source={{own}}\n|Date=%@\n|Permission=\n|other_versions=\n}}\n\n== {{int:license}} ==\n%@\n\n[[Category:%@]]",
	 description,
	 [[NSUserDefaults standardUserDefaults] valueForKey: COMMONS_USERNAME_KEY],
	 date,
	 DEFAULT_LICENSE,
	 APPLICATION_CATEGORY,
	 nil
	 ];
}

@end
