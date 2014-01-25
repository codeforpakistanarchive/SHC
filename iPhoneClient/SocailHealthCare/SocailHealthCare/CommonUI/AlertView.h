//
//  AlertView.h
//
//
//  Created by Waqar Zahour on 12/13/12.
//  Copyright (c) 2012 Waqar Zahour. All rights reserved.
//

#import <Foundation/Foundation.h>

@interface AlertView : NSObject

typedef enum {
    REGISTER_PHONE_NOT_ALLOWED                  = 20068,
    REGISTER_MAX_LENGTH                         = 20069,
    REGISTER_MIN_LENGTH                         = 20070,
    REGISTER_INVALID_PHONE                      = 20071,
    REGISTER_PHONE_REQUIRED                     = 20061,
    
} ErrorCode_Register;


typedef enum {
    LOGIN_FAILED                                = 20113,
    
} ErrorCode_LOGIN;

typedef enum {
    RESEND_REGCODE_SECURE_CONNECTION           = 20087,
    RESEND_REGCODE_LIMIT_EXCEED                = 20123,
    RESEND_REGCODE_ALREADY_VERIFIED            = 20088,
    RESEND_REGCODE_LOGIN_FAILED                = 20113,
    
} ErrorCode_RESEND_REGCODE;

typedef enum {
    FORGOT_PWD_UNEXPECTED_ERROR                = 20022,
    FORGOT_PWD_JD_NO_RECORD_EXISTS             = 20088,
    FORGOT_PWD_LIMIT_EXCEED                    = 20124,
    
} ErrorCode_FORGOT_PWD;


+ (void) alertRegister:(NSInteger) errorType;
+ (void) alertLogin:(NSInteger) errorType;
+ (void) alertResendRegCode:(NSInteger) errorType;
+ (void) alertForgotPassword:(NSInteger) errorType;

+ (void) alertWithOk:(NSString *)title andMessage:(NSString*) message;

@end
