//
//  CommonsUpload.m
//  WikiSnaps
//
//  Created by Derk-Jan Hartman on 15-01-11.
//  Copyright 2011 Derk-Jan Hartman
//
//  Dual-licensed MIT and BSD

#import "CommonsUpload.h"
#import <AssetsLibrary/AssetsLibrary.h>

#import "Configuration.h"
#import "ASIFormDataRequest.h"
#import "XMLReader.h"
#import "SFHFKeychainUtils.h"
#import "PhotoPickerAppDelegate.h"

/* Private */
@interface CommonsUpload (Internal)

- (BOOL)checkXML: (NSDictionary *)dict forAPIError: (NSError **)error;
@end


@implementation CommonsUpload

@synthesize originalImage;
@synthesize imageURL;
@synthesize imageTitle;
@synthesize description;
@synthesize delegate;

- (void)dealloc {
    self.originalImage = nil;
    self.imageURL = nil;
    self.imageTitle = nil;
    self.description = nil;
    self.delegate = nil;

    [super dealloc];
}

- (NSString *)getUploadText {
    return @"";
}

- (NSString *)getLicenseString {
    PhotoPickerAppDelegate *appDelegate =
            (PhotoPickerAppDelegate *) [UIApplication sharedApplication].delegate;
            
    NSString *licenseDefault = [[NSUserDefaults standardUserDefaults] stringForKey: COMMONS_LICENSE_KEY];
    NSEnumerator *enumerator = [appDelegate.licenses objectEnumerator];
    NSDictionary *aLicense = nil;
    while( licenseDefault != nil && (aLicense = [enumerator nextObject]) ) {
        if( [licenseDefault compare: [aLicense objectForKey:@"short"]] == NSOrderedSame ) {
            break;
        }
    }
    if( aLicense != nil ) {
        NSString *licenseString = [aLicense objectForKey:@"template"];
        licenseString = [licenseString stringByReplacingOccurrencesOfString:@"$author" withString: [[NSUserDefaults standardUserDefaults] valueForKey: COMMONS_USERNAME_KEY]];
        // TODO add attribution at some point
        licenseString = [licenseString stringByReplacingOccurrencesOfString:@"$attribution" withString: @""];
        return licenseString;
    }
    return DEFAULT_LICENSE;
}

- (NSString *)getUploadDescription {
    NSDate *today = [NSDate date];
    NSDateFormatter *formatter = [[NSDateFormatter alloc] init];
    [formatter setDateFormat:@"yyyy-MM-dd"];
    NSString *dateString = [formatter stringFromDate:today];
    [formatter release];

    NSLog(@"%@", dateString);
    
    NSString *result = [NSString stringWithFormat: @"{{Information\n|Description={{en|1=%@}}\n|Author=[[User:%@]]\n|Source={{own}}\n|Date=%@\n|Permission=\n|other_versions=\n}}\n\n== {{int:license}} ==\n%@\n\n[[Category:%@]]",
         self.description,
         [[NSUserDefaults standardUserDefaults] stringForKey: COMMONS_USERNAME_KEY],
         dateString,
         [self getLicenseString],
         APPLICATION_CATEGORY
     ];
     NSLog( @"%@", result );
     return result;
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
    [newRequest addPostValue:self.imageTitle forKey:@"titles"];
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
 
    editToken  = [query objectForKey:@"edittoken"];
    if( !editToken ) {
        [delegate uploadFailed: [NSString stringWithFormat:@"could not find edittoken"]];
        return;
    }

    //New request
    NSURL *url = [NSURL URLWithString:COMMONS_API_URL];
    NSString *uploadDescription = [self getUploadDescription];
    ASIFormDataRequest *newRequest = [ASIFormDataRequest requestWithURL:url];
    [newRequest setPostFormat:ASIMultipartFormDataPostFormat];
    
    [newRequest addPostValue:@"upload" forKey:@"action"];
    [newRequest addPostValue:@"xml" forKey: @"format"];
    [newRequest addPostValue:editToken forKey:@"token"];
    [newRequest addPostValue:self.imageTitle forKey:@"filename"];
    [newRequest addPostValue:uploadDescription forKey:@"comment"];
    [newRequest addPostValue:uploadDescription forKey:@"text"];
    if( self.imageURL == nil && self.originalImage != nil ) {
        [newRequest addData:UIImageJPEGRepresentation(self.originalImage, 0.85f) forKey:@"file"];
    } else if ( self.imageURL ) {
        ALAssetsLibrary *assetLib = [[[ALAssetsLibrary alloc] init] autorelease];
        ALAssetsLibraryAssetForURLResultBlock resultBlock = 
            ^(ALAsset *asset) {
                ALAssetRepresentation *representation = [asset defaultRepresentation];
                Byte *buf = malloc([representation size]);
                NSError *err = nil;
                NSUInteger bytes = [representation getBytes:buf fromOffset:0LL length:[representation size] error:&err];
                if (err || bytes == 0) {
                    NSLog( @"Could not read asset: %@", err );
                } else {
                    NSData *cumbersomeWayToGetNSData  = [NSData dataWithBytesNoCopy:buf length:[representation size] freeWhenDone:YES];
                    [newRequest addData:cumbersomeWayToGetNSData forKey:@"file"];
                }
            };
            
        [assetLib assetForURL:self.imageURL resultBlock:resultBlock failureBlock:^(NSError *error) {
            NSLog( @"Error finding asset: %@", error);
        }];
        /*
        NSData *tempData = [NSData dataWithContentsOfURL:self.imageURL];
        [newRequest addData:tempData forKey:@"file"];
        */
    }
    
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

/**
 * @return true if the XML was good, false if an error occured
 */
- (BOOL)checkXML: (NSDictionary *)dict forAPIError: (NSError **)error {
    NSDictionary *errorDict = [[dict objectForKey:@"api"] objectForKey: @"error"];
    if( errorDict ) {
        NSMutableDictionary *nsErrorDict = [NSMutableDictionary dictionaryWithCapacity:5];
        [nsErrorDict setObject: @"Communication failure with server" forKey: NSLocalizedDescriptionKey ];
        [nsErrorDict setObject: [errorDict objectForKey:@"info"] forKey: NSLocalizedFailureReasonErrorKey ];
NSLog( @"%@", [errorDict objectForKey:@"info"] );

        if (error != NULL) {
            *error = [NSError errorWithDomain: @"COMMONS_API_DOMAIN" code: 1 userInfo: nsErrorDict];
        }
        return FALSE;
    }
    return TRUE;
}

@end
