//
//  CommonsUpload.m
//  photopicker
//
//  Created by Derk-Jan Hartman on 15-01-11.
//  Copyright 2011 Wikimedia Commons. All rights reserved.
//

#import "CommonsUpload.h"
#import "Configuration.h"
#import "ASIFormDataRequest.h"


@implementation CommonsUpload

@synthesize imageData, title, description, delegate;

- (NSString *)getUploadText {
	return @"";
}

- (NSString *)getUploadDescription {
	NSDate *today = [NSDate date];
	NSDateFormatter *formatter = [[NSDateFormatter alloc] init];
	[formatter setDateFormat:@"yyyy-MM-dd"];
	NSString *dateString = [formatter stringFromDate:today];
	NSLog(dateString);
	
	return [NSString stringWithFormat: @"{{Information\n|Description={{en|1=%@}}\n|Author=[[User:%@]]\n|Source={{own}}\n|Date=%@\n|Permission=\n|other_versions=\n}}\n\n== {{int:license}} ==\n%@\n\n[[Category:%@]]",
	 description,
	 [[NSUserDefaults standardUserDefaults] valueForKey: COMMONS_USERNAME_KEY],
	 dateString,
	 DEFAULT_LICENSE,
	 APPLICATION_CATEGORY,
	 nil
	 ];
}

- (void)uploadImage {
	NSURL *url = [NSURL URLWithString:API_URL];
	ASIFormDataRequest *request = [ASIFormDataRequest requestWithURL:url];
	[request setPostFormat:ASIURLEncodedPostFormat];
	
	[request addPostValue:@"login" forKey:@"action"];
	[request addPostValue:@"xml" forKey: @"format"];
	[request addPostValue:[[NSUserDefaults standardUserDefaults] valueForKey:COMMONS_USERNAME_KEY] forKey: @"lgname"];
	[request addPostValue:[[NSUserDefaults standardUserDefaults] valueForKey:COMMONS_PASSWORD_KEY] forKey: @"lgpassword"];
	
	[request setDelegate:self];
	[request setDidFinishSelector:@selector(requestTokenFinished:)];
	[request setDidFailSelector:@selector(requestTokenFailed:)];
	[request startAsynchronous];
}

- (void)requestTokenFinished:(ASIHTTPRequest *)request
{
	// Use when fetching text data
	NSString *responseString = [request responseString];
	NSLog(responseString );
	NSScanner *aScanner = [NSScanner scannerWithString:responseString];
	
	[aScanner scanUpToString:@"result=\"" intoString: nil];
	[aScanner scanString:@"result=\"" intoString: nil];
	NSString *result;
	[aScanner scanUpToString:@"\"" intoString:&result];
	if( ![result isEqualToString:@"NeedToken"] ) {
		NSLog( @"no needtoken response: %@", result);
		return;
	}
	
	[aScanner scanUpToString:@"token=\"" intoString: nil];\
	[aScanner scanString:@"token=\"" intoString: nil];
	[aScanner scanUpToString:@"\"" intoString:&token];
	
	//New request
	NSURL *url = [NSURL URLWithString:API_URL];
	ASIFormDataRequest *newRequest = [ASIFormDataRequest requestWithURL:url];
	[newRequest setPostFormat:ASIURLEncodedPostFormat];
	
	[newRequest addPostValue:@"login" forKey:@"action"];
	[newRequest addPostValue:@"xml" forKey: @"format"];
	[newRequest addPostValue:token forKey:@"lgtoken"];
	[newRequest addPostValue:[[NSUserDefaults standardUserDefaults] valueForKey:COMMONS_USERNAME_KEY] forKey: @"lgname"];
	[newRequest addPostValue:[[NSUserDefaults standardUserDefaults] valueForKey:COMMONS_PASSWORD_KEY] forKey: @"lgpassword"];
	
	[newRequest setDelegate:self];
	[newRequest setDidFinishSelector:@selector(requestLoginFinished:)];
	[newRequest setDidFailSelector:@selector(requestLoginFailed:)];
	[newRequest startAsynchronous];
	
	
	
	// Use when fetching binary data
	// FIXME Use this for building xml parser
	//NSData *responseData = [request responseData];
}

- (void)requestTokenFailed:(ASIHTTPRequest *)request
{
	NSError *error = [request error];
}


- (void)requestLoginFinished:(ASIHTTPRequest *)request
{
	// Use when fetching text data
	NSString *responseString = [request responseString];
	NSLog(responseString );
	NSScanner *aScanner = [NSScanner scannerWithString:responseString];
	
	[aScanner scanUpToString:@"result=\"" intoString: nil];
	[aScanner scanString:@"result=\"" intoString: nil];
	NSString *result;
	[aScanner scanUpToString:@"\"" intoString:&result];
	if( ![result isEqualToString:@"Success"] ) {
		NSLog( @"no success response, %@", result);
		return;
	}
	
	[aScanner scanUpToString:@"token=\"" intoString: nil];
	[aScanner scanString:@"token=\"" intoString: nil];
	[aScanner scanUpToString:@"\"" intoString:&token];
	
	//New request
	NSURL *url = [NSURL URLWithString:API_URL];
	ASIFormDataRequest *newRequest = [ASIFormDataRequest requestWithURL:url];
	[newRequest setPostFormat:ASIURLEncodedPostFormat];
	
	[newRequest addPostValue:@"query" forKey:@"action"];
	[newRequest addPostValue:@"xml" forKey: @"format"];
	[newRequest addPostValue:@"edit" forKey:@"intoken"];
	[newRequest addPostValue:title forKey:@"titles"];
	[newRequest addPostValue:@"info" forKey:@"prop"];
	
	[newRequest setDelegate:self];
	[newRequest setDidFinishSelector:@selector(requestEditTokenFinished:)];
	[newRequest setDidFailSelector:@selector(requestEditTokenFailed:)];
	[newRequest startAsynchronous];
	
	
	// Use when fetching binary data
	// Use this for building xml parser
	//NSData *responseData = [request responseData];
}

- (void)requestLoginFailed:(ASIHTTPRequest *)request
{
	NSError *error = [request error];
}

- (void)requestEditTokenFinished:(ASIHTTPRequest *)request
{
	// Use when fetching text data
	NSString *responseString = [request responseString];
	NSLog(responseString );
	NSScanner *aScanner = [NSScanner scannerWithString:responseString];
	
	[aScanner scanUpToString:@"edittoken=\"" intoString: nil];
	[aScanner scanString:@"edittoken=\"" intoString: nil];
	
	BOOL res;
	res = [aScanner scanUpToString:@"\"" intoString:&editToken];
	if( !res ) {
		NSLog( @"could not find edittoken");
		return;
	}
	
	//New request
	NSURL *url = [NSURL URLWithString:API_URL];
	ASIFormDataRequest *newRequest = [ASIFormDataRequest requestWithURL:url];
	[newRequest setPostFormat:ASIMultipartFormDataPostFormat];
	
	[newRequest addPostValue:@"upload" forKey:@"action"];
	[newRequest addPostValue:@"xml" forKey: @"format"];
	[newRequest addPostValue:editToken forKey:@"token"];
	[newRequest addPostValue:title forKey:@"filename"];
	[newRequest addPostValue:[self getUploadDescription] forKey:@"comment"];
	[newRequest addPostValue:[self getUploadDescription] forKey:@"text"];
	[newRequest addData:imageData forKey:@"file"];
	
	
	[newRequest setDelegate:self];
	[newRequest setDidFinishSelector:@selector(requestUploadFinished:)];
	[newRequest setDidFailSelector:@selector(requestUploadFailed:)];
	[newRequest startAsynchronous];
	
	// Use when fetching binary data
	// Use this for building xml parser
	//NSData *responseData = [request responseData];
}

- (void)requestEditTokenFailed:(ASIHTTPRequest *)request
{
	NSError *error = [request error];
}

- (void)requestUploadFinished:(ASIHTTPRequest *)request
{
	// Use when fetching text data
	NSString *responseString = [request responseString];
	NSLog(responseString );
	[delegate uploadSucceeded];
}

- (void)requestUploadFailed:(ASIHTTPRequest *)request
{
	NSError *error = [request error];
}


@end
