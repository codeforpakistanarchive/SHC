//
//  VPLoginSignUpViewController.m
//  MVOIP
//
//  Created by Fatima Arzoo on 30/04/2013.
//  Copyright (c) 2013 MVOIP. All rights reserved.
//

#import "VPLoginSignUpViewController.h"
#import "VPLoginViewController.h"
#import "VPSignUpViewController.h"
#import "AppDelegate.h"


@interface VPLoginSignUpViewController ()

@end

#pragma mark -
#pragma mark initialization and deallocation
#pragma mark -
@implementation VPLoginSignUpViewController

- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        // Custom initialization
    }
    return self;
}

- (void)dealloc
{
    [_loginViewController release];
    [_signUpViewController release];
    [super dealloc];
}

#pragma mark -
#pragma mark - Life Cycle
#pragma mark -
- (void)viewDidLoad
{
    [super viewDidLoad];
//    self.loginViewController = [[VPLoginViewController alloc] initWithNibName:@"VPLoginViewController" bundle:nil];
//    self.signUpViewController = [[VPSignUpViewController alloc] initWithNibName:@"VPSignUpViewController" bundle:nil];
//    
//    [self.view addSubview:self.signUpViewController.view];
}

- (void) viewWillAppear:(BOOL)animated
{
    [super viewWillAppear:animated];
    //[self configureNavigationBar];
}

- (void) viewWillDisappear:(BOOL)animated
{
    [super viewWillDisappear:animated];
}

- (void) viewDidLayoutSubviews
{
    [super viewDidLayoutSubviews];
    //self.signUpViewController.view.frame = CGRectMake(0, 0, 320, 480);
    //self.loginViewController.view.frame = CGRectMake(0, 0, 320, 400);
}

- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (void)viewDidUnload
{
    [super viewDidUnload];
}

#pragma mark -
#pragma mark - IBActions
#pragma mark -

- (IBAction) showRegistrationPage:(id)sender
{
     VPSignUpViewController *registrationController = [[VPSignUpViewController alloc] initWithNibName:@"VPSignUpViewController" bundle:nil];
    [[AppDelegate appDelegate].navigationController pushViewController:registrationController animated:YES];
    [registrationController release];
}

- (IBAction) showLoginPage:(id)sender
{
    VPLoginViewController *loginController = [[VPLoginViewController alloc] initWithNibName:@"VPLoginViewController" bundle:nil];
    [[AppDelegate appDelegate].navigationController pushViewController:loginController animated:YES];
    [loginController release];
}

@end
