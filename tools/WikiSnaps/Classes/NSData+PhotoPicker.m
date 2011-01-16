//
//  NSData+PhotoPicker.m
//
//  Copyright 2009 yourcompanyname. All rights reserved.
//

#import "NSData+PhotoPicker.h"


@implementation NSData (PhotoPicker)


+ (NSData *)utf8DataWithFormat:(NSString *)format, ... {
    va_list arguments;
    va_start(arguments, format);
    NSString *output = [[[NSString alloc] initWithFormat:format
                                          arguments:arguments] autorelease];
    va_end(arguments);

    return [output dataUsingEncoding:NSUTF8StringEncoding];
}


@end
