//
//  UIImage+PhotoPicker.m
//
//  Copyright 2009 yourcompanyname. All rights reserved.
//

#import "UIImage+PhotoPicker.h"


@implementation UIImage (PhotoPicker)


// Based on http://discussions.apple.com/thread.jspa?messageID=7936896&tstart=0
- (UIImage *)correctOrientation:(UIImage *)image {
  CGImageRef imgRef = image.CGImage;

  CGFloat width = CGImageGetWidth(imgRef);
  CGFloat height = CGImageGetHeight(imgRef);

  CGAffineTransform transform = CGAffineTransformIdentity;
	CGRect bounds = CGRectMake(0, 0, width, height);
  
  CGFloat boundHeight;
  UIImageOrientation orient = image.imageOrientation;
  switch(orient) {
  case UIImageOrientationUp: //EXIF = 1
      transform = CGAffineTransformIdentity;
      break;
    
  case UIImageOrientationUpMirrored: //EXIF = 2
      transform = CGAffineTransformMakeTranslation(width, 0.0);
      transform = CGAffineTransformScale(transform, -1.0, 1.0);
      break;
    
  case UIImageOrientationDown: //EXIF = 3
      transform = CGAffineTransformMakeTranslation(width, height);
      transform = CGAffineTransformRotate(transform, M_PI);
      break;
    
  case UIImageOrientationDownMirrored: //EXIF = 4
      transform = CGAffineTransformMakeTranslation(0.0, height);
      transform = CGAffineTransformScale(transform, 1.0, -1.0);
      break;
    
  case UIImageOrientationLeftMirrored: //EXIF = 5
      boundHeight = bounds.size.height;
      bounds.size.height = bounds.size.width;
      bounds.size.width = boundHeight;
      transform = CGAffineTransformMakeTranslation(height, width);
      transform = CGAffineTransformScale(transform, -1.0, 1.0);
      transform = CGAffineTransformRotate(transform, 3.0 * M_PI / 2.0);
      break;
    
  case UIImageOrientationLeft: //EXIF = 6
      boundHeight = bounds.size.height;
      bounds.size.height = bounds.size.width;
      bounds.size.width = boundHeight;
      transform = CGAffineTransformMakeTranslation(0.0, width);
      transform = CGAffineTransformRotate(transform, 3.0 * M_PI / 2.0);
      break;
    
  case UIImageOrientationRightMirrored: //EXIF = 7
      boundHeight = bounds.size.height;
      bounds.size.height = bounds.size.width;
      bounds.size.width = boundHeight;
      transform = CGAffineTransformMakeScale(-1.0, 1.0);
      transform = CGAffineTransformRotate(transform, M_PI / 2.0);
      break;
    
  case UIImageOrientationRight: //EXIF = 8
      boundHeight = bounds.size.height;
      bounds.size.height = bounds.size.width;
      bounds.size.width = boundHeight;
      transform = CGAffineTransformMakeTranslation(height, 0.0);
      transform = CGAffineTransformRotate(transform, M_PI / 2.0);
      break;
    
  default:
      [NSException raise:NSInternalInconsistencyException
                         format:@"Invalid image orientation"];
  }

  UIGraphicsBeginImageContext(bounds.size);

  CGContextRef context = UIGraphicsGetCurrentContext();

  if (orient == UIImageOrientationRight || orient == UIImageOrientationLeft) {
      CGContextScaleCTM(context, -1.0f, 1.0f);
      CGContextTranslateCTM(context, -height, 0);
  } else {
      CGContextScaleCTM(context, 1.0f, -1.0f);
      CGContextTranslateCTM(context, 0, -height);
  }

  CGContextConcatCTM(context, transform);

  CGContextDrawImage(UIGraphicsGetCurrentContext(), CGRectMake(0, 0, width, height), imgRef);
  UIImage *imageCopy = UIGraphicsGetImageFromCurrentImageContext();
  UIGraphicsEndImageContext();

  return imageCopy;
}


@end
