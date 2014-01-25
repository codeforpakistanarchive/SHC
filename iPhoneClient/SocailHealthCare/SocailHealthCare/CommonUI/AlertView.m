//
//  AlertView.m
//  
//
//  Created by Waqar Zahour on 12/13/12.
//  Copyright (c) 2012 Waqar Zahour. All rights reserved.
//

#import "AlertView.h"

@implementation AlertView

+ (void) alertWithOk:(NSString *)title andMessage:(NSString*) message {
    
    UIAlertView *alertView = [[UIAlertView alloc]
                              initWithTitle:title
                              message:message
                              delegate:self
                              cancelButtonTitle: nil
                              otherButtonTitles:@"OK", nil];
    [alertView show];
    [alertView release];
    
}

//Registration
+ (void) alertRegister:(NSInteger) errorType {
    
    NSString *messageString = [AlertView alertRegisterInfo:errorType];
    [AlertView alertWithOk:@"Alert" andMessage:messageString];
}

+ (NSString *) alertRegisterInfo:(ErrorCode_Register) type {
    
    NSString * alertInfo;
    
    switch (type) {
        case REGISTER_PHONE_NOT_ALLOWED:
            alertInfo = @"Number not allowed to register";
            break;
        case REGISTER_MAX_LENGTH:
            alertInfo = @"Number length is more then required.";
            break;
        case REGISTER_MIN_LENGTH:
            alertInfo = @"Number length is less then required.";
            break;
        case REGISTER_INVALID_PHONE:
            alertInfo = @"You have entered invalid phone number.";
            break;
            case REGISTER_PHONE_REQUIRED:
            alertInfo = @"Phone Number is a required field.";
        default:
            alertInfo = @"Unknown Error";
            break;
    }
    
    return alertInfo;
}


//Login
+ (void) alertLogin:(NSInteger) errorType {
    
    NSString *messageString = [AlertView alertLoginInfo:errorType];
    [AlertView alertWithOk:@"Alert" andMessage:messageString];
}

+ (NSString *) alertLoginInfo:(ErrorCode_LOGIN) type {
    
    NSString * alertInfo;
    
    switch (type) {
        case LOGIN_FAILED:
            alertInfo = @"Failed to login.";
            break;
        default:
            alertInfo = @"Unknown Error";
            break;
    }
    
    return alertInfo;
}

//Resend RegCode +RegCode
+ (void) alertResendRegCode:(NSInteger) errorType {
    
    NSString *messageString = [AlertView alertRegcodeInfo:errorType];
    [AlertView alertWithOk:@"Alert" andMessage:messageString];
}

+ (NSString *) alertRegcodeInfo:(ErrorCode_RESEND_REGCODE) type {
    
    NSString * alertInfo;
    
    switch (type) {
        case RESEND_REGCODE_SECURE_CONNECTION:
            alertInfo = @"Secure connection is required for resend code.";
            break;
        case RESEND_REGCODE_LIMIT_EXCEED:
            alertInfo = @"Limit Exceed please Try later.";
            break;
        case RESEND_REGCODE_ALREADY_VERIFIED:
            alertInfo = @"RegCode already verified.";
            break;
        case RESEND_REGCODE_LOGIN_FAILED:
            alertInfo = @"Failed to login.";
            break;
        default:
            alertInfo = @"Unknown Error";
            break;
    }
    
    return alertInfo;
}


//Forgot Password
+ (void) alertForgotPassword:(NSInteger) errorType {
    
    NSString *messageString = [AlertView alertForgotPasswordInfo:errorType];
    [AlertView alertWithOk:@"Alert" andMessage:messageString];
}

+ (NSString *) alertForgotPasswordInfo:(ErrorCode_FORGOT_PWD) type {
    
    NSString * alertInfo;
    
    switch (type) {
        case FORGOT_PWD_UNEXPECTED_ERROR:
            alertInfo = @"We have encountered an unexpected error.";
            break;
        case FORGOT_PWD_JD_NO_RECORD_EXISTS:
            alertInfo = @"No record found.";
            break;
        case FORGOT_PWD_LIMIT_EXCEED:
            alertInfo = @"Limit Exceed please Try later.";
            break;
        default:
            alertInfo = @"Unknown Error";
            break;
    }
    
    return alertInfo;
}


@end
