//
//  AppDelegate.h
//  SocailHealthCare
//
//  Created by Waqar Zahour on 1/25/14.
//  Copyright (c) 2014 Waqar Zahour. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface AppDelegate : UIResponder <UIApplicationDelegate>

@property (nonatomic , retain) UIWindow *window;
@property (nonatomic , retain) UINavigationController *navigationController;

+ (AppDelegate *) appDelegate;
- (void) launchDashbaord;

@end
