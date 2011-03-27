//
//  CommonsUpload.h
//  WikiSnaps
//
//  Created by Derk-Jan Hartman on 15-01-11.
//  Copyright 2011 Derk-Jan Hartman
//
//  Dual-licensed MIT and BSD

#import <Foundation/Foundation.h>

@class CommonsUpload;
@protocol CommonsUploadDelegate <NSObject>
@required

- (void)uploadSucceeded;
- (void)uploadFailed:(NSString *)error;

@end


@interface CommonsUpload : NSObject {
	UIImage *originalImage;
        NSURL   *imageURL;
	NSString *imageTitle;
	NSString *description;
	NSString *token;
	NSString *editToken;

	id <CommonsUploadDelegate> delegate;
}

@property (nonatomic, retain) UIImage  *originalImage;
@property (nonatomic, retain) NSURL    *imageURL;
@property (nonatomic, retain) NSString *imageTitle;
@property (nonatomic, retain) NSString *description;
@property (nonatomic, assign) id <CommonsUploadDelegate> delegate;

- (NSString *)getUploadText;
- (NSString *)getUploadDescription;

- (void)uploadImage;
- (BOOL)verifyTitle:(NSString *)possibleTitle;

@end
