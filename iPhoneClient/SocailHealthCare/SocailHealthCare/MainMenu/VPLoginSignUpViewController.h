//
//  VPLoginSignUpViewController.h
//  MVOIP
//
//  Created by Fatima Arzoo on 30/04/2013.
//  Copyright (c) 2013 MVOIP. All rights reserved.
//

#import <UIKit/UIKit.h>

@class VPLoginViewController;
@class VPSignUpViewController;

@interface VPLoginSignUpViewController : UIViewController
{
    

}

@property (retain , nonatomic) VPLoginViewController  * loginViewController;
@property (retain , nonatomic) VPSignUpViewController * signUpViewController;

- (IBAction) showRegistrationPage:(id)sender;

@end
