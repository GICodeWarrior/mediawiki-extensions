//
//  CommonsUpload.m
//  WikiSnaps
//
//  Created by Derk-Jan Hartman on 15-01-11.
//  Copyright 2011 Derk-Jan Hartman
//
//  Dual-licensed MIT and BSD

#import "CommonsUpload.h"
#import "Configuration.h"
#import "ASIFormDataRequest.h"
#import "XMLReader.h"
#import "SFHFKeychainUtils.h"

/* Private */
@interface CommonsUpload (Internal)

- (void)checkXML: (NSDictionary *)dict forAPIError: (NSError **)error;
@end


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
    NSURL *url = [NSURL URLWithString:COMMONS_API_URL];
    ASIFormDataRequest *request = [ASIFormDataRequest requestWithURL:url];
    [request setPostFormat:ASIURLEncodedPostFormat];
    
    [request addPostValue:@"login" forKey:@"action"];
    [request addPostValue:@"xml" forKey: @"format"];
    NSString *username = [[NSUserDefaults standardUserDefaults] valueForKey:COMMONS_USERNAME_KEY];
    [request addPostValue:username forKey: @"lgname"];

    NSError *error = nil;
    NSString *password = [SFHFKeychainUtils getPasswordForUsername:username andServiceName:COMMONS_KEYCHAIN_KEY error:&error];
    [request addPostValue:password forKey: @"lgpassword"];

    if( error ) {
        /* password retrieval error */
        [delegate uploadFailed: [error localizedDescription]];
        return;
    }

    [request setDelegate:self];
    [request setDidFinishSelector:@selector(requestTokenFinished:)];
    [request setDidFailSelector:@selector(requestTokenFailed:)];
    [request startAsynchronous];
}

- (void)requestTokenFinished:(ASIHTTPRequest *)request
{
    NSError *error = nil;
    NSDictionary *dict = [XMLReader dictionaryForXMLData: [request responseData] error: &error];

    if( error ) {
        /* XML parser error */
        [delegate uploadFailed: [error localizedDescription]];
        return;
    }
    
    [self checkXML:dict forAPIError: &error];
    
    if( error ) {
        /* API error */
        [delegate uploadFailed: [error localizedDescription]];
        return;
    }

    NSDictionary *login = [[dict objectForKey:@"api"] objectForKey: @"login"];
    assert( login != nil );
 
    if( [[login objectForKey:@"result"] caseInsensitiveCompare:@"NeedToken"] != NSOrderedSame ) {
            [delegate uploadFailed: [NSString stringWithFormat:@"no needtoken response: %@", [login objectForKey:@"result"]]];
            return;
    }
    
    token = [login objectForKey:@"token"];
    assert( token != nil );
    
    //New request
    NSURL *url = [NSURL URLWithString:COMMONS_API_URL];
    ASIFormDataRequest *newRequest = [ASIFormDataRequest requestWithURL:url];
    [newRequest setPostFormat:ASIURLEncodedPostFormat];
    
    [newRequest addPostValue:@"login" forKey:@"action"];
    [newRequest addPostValue:@"xml" forKey: @"format"];
    [newRequest addPostValue:token forKey:@"lgtoken"];
    NSString *username = [[NSUserDefaults standardUserDefaults] valueForKey:COMMONS_USERNAME_KEY];
    [newRequest addPostValue:username forKey: @"lgname"];

    NSString *password = [SFHFKeychainUtils getPasswordForUsername:username andServiceName:COMMONS_KEYCHAIN_KEY error:&error];
    [newRequest addPostValue:password forKey: @"lgpassword"];
    
    if( error ) {
        /* password retrieval error */
        [delegate uploadFailed: [error localizedDescription]];
        return;
    }
    
    [newRequest setDelegate:self];
    [newRequest setDidFinishSelector:@selector(requestLoginFinished:)];
    [newRequest setDidFailSelector:@selector(requestLoginFailed:)];
    [newRequest startAsynchronous];
}

- (void)requestTokenFailed:(ASIHTTPRequest *)request
{
    NSError *error = [request error];
    [delegate uploadFailed: [error localizedDescription]];
}


- (void)requestLoginFinished:(ASIHTTPRequest *)request
{
    NSError *error = nil;
    NSDictionary *dict = [XMLReader dictionaryForXMLData: [request responseData] error: &error];

    if( error ) {
        /* XML parser error */
        [delegate uploadFailed: [error localizedDescription]];
        return;
    }
    
    [self checkXML:dict forAPIError: &error];
    
    if( error ) {
        /* API error */
        [delegate uploadFailed: [error localizedDescription]];
        return;
    }

    NSDictionary *login = [[dict objectForKey:@"api"] objectForKey: @"login"];
    assert( login != nil );
 
    if( [[login objectForKey:@"result"] caseInsensitiveCompare:@"Success"] != NSOrderedSame ) {
            [delegate uploadFailed: [NSString stringWithFormat:@"no success response: %@", [login objectForKey:@"result"]]];
            return;
    }
    
    token = [login objectForKey:@"token"];

    //New request
    NSURL *url = [NSURL URLWithString:COMMONS_API_URL];
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
}

- (void)requestLoginFailed:(ASIHTTPRequest *)request
{
    NSError *error = [request error];
    [delegate uploadFailed:[error localizedDescription]];
}

- (void)requestEditTokenFinished:(ASIHTTPRequest *)request
{
    NSError *error = nil;
    NSDictionary *dict = [XMLReader dictionaryForXMLData: [request responseData] error: &error];

    if( error ) {
        /* XML parser error */
        [delegate uploadFailed: [error localizedDescription]];
        return;
    }
    
    [self checkXML:dict forAPIError: &error];
    
    if( error ) {
        /* API error */
        [delegate uploadFailed: [error localizedDescription]];
        return;
    }

    NSDictionary *query = [[dict objectForKey:@"api"] objectForKey: @"query"];
    assert( query != nil );
 NSLog( @"%@", query );
 
    query = [[query objectForKey:@"pages"] objectForKey:@"page"];
    
    /* Page can also be an array of page elements */
    if( !query || ![query isKindOfClass: [NSDictionary class]] ) {
        assert( 0 );
        return;
    }
 
    editToken = [query objectForKey:@"edittoken"];
    if( !editToken ) {
        [delegate uploadFailed: [NSString stringWithFormat:@"could not find edittoken"]];
        return;
    }

    //New request
    NSURL *url = [NSURL URLWithString:COMMONS_API_URL];
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
}

- (void)requestEditTokenFailed:(ASIHTTPRequest *)request
{
    NSError *error = [request error];
    [delegate uploadFailed:[error localizedDescription]];
}

- (void)requestUploadFinished:(ASIHTTPRequest *)request
{
    NSError *error = nil;
    NSDictionary *dict = [XMLReader dictionaryForXMLData: [request responseData] error: &error];

    if( error ) {
        /* XML parser error */
        [delegate uploadFailed: [error localizedDescription]];
        return;
    }
    
    [self checkXML:dict forAPIError: &error];
    
    if( error ) {
        /* API error */
        [delegate uploadFailed: [error localizedDescription]];
        return;
    }
NSLog( @"%@", dict );
    
    NSDictionary *upload = [[dict objectForKey:@"api"] objectForKey: @"upload"];
    assert( upload != nil );
 
    if( [[upload objectForKey:@"result"] caseInsensitiveCompare:@"Success"] != NSOrderedSame ) {
            [delegate uploadFailed: [NSString stringWithFormat:@"no success response: %@", [upload objectForKey:@"result"]]];
            return;
    }
    
    /* The image will now be here: */
    [[upload objectForKey:@"imageinfo"] objectForKey:@"descriptionurl"];

    [delegate uploadSucceeded];
}

- (void)requestUploadFailed:(ASIHTTPRequest *)request
{
    NSError *error = [request error];
    [delegate uploadFailed:[error localizedDescription]];
}

/* Will verify if a proposed title is available for upload (missing) */
/* When we do this, also get edittoken, so we don't have to later on ? */
- (BOOL)verifyTitle: (NSString *)possibleTitle {
    if( possibleTitle != nil && ![possibleTitle isEqualToString:@""] ) {
        return YES;
    }
    return NO;
}

- (void)checkXML: (NSDictionary *)dict forAPIError: (NSError **)error {
    NSDictionary *errorDict = [[dict objectForKey:@"api"] objectForKey: @"error"];
    if( errorDict ) {
        NSMutableDictionary *nsErrorDict = [NSMutableDictionary dictionaryWithCapacity:5];
        [nsErrorDict setObject: @"Communication failure with server" forKey: NSLocalizedDescriptionKey ];
        [nsErrorDict setObject: [errorDict objectForKey:@"info"] forKey: NSLocalizedFailureReasonErrorKey ];
NSLog( [errorDict objectForKey:@"info"] );

        NSError *APIError = [NSError errorWithDomain: @"COMMONS_API_DOMAIN" code: 1 userInfo: nsErrorDict];
        *error = APIError;
    }
}

@end
