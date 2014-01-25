//
//  VPLoggedInViewController.m
//  BTELMVoIP
//
//  Created by Ghazanfar Ali on 30/04/2013.
//  Copyright (c) 2013 Vopium A/S. All rights reserved.
//

#import "VPLoggedInViewController.h"

#import "AppDelegate.h"

#import "MBProgressHUD.h"
#import "AlertView.h"


@interface VPLoggedInViewController ()

@end

@implementation VPLoggedInViewController

#pragma mark -
#pragma mark Intialization and Deallocation
#pragma mark -
- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        // Custom initialization
    }
    return self;
}

- (void)viewDidLoad
{
    [super viewDidLoad];
    // Do any additional setup after loading the view from its nib.

    {
        [self.tabBarViewController.view setFrame:CGRectMake(0,0,320,480)];
    }
    

    
    [self.view addSubview:self.tabBarViewController.view];

}

- (void) viewWillAppear:(BOOL)animated
{
    [super viewWillAppear:animated];
    
    self.navigationItem.hidesBackButton = YES;
    
    
   }


- (void) didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (void) dealloc
{
    [_tabBarViewController release];
    [[NSNotificationCenter defaultCenter] removeObserver:self];
    [super dealloc];
}

- (void) viewDidUnload {
    
    [self setTabBarViewController:nil];
        [super viewDidUnload];
}

- (void) selectTab
{
    
}








#pragma mark -
#pragma mark - ProgressHud
#pragma mark -
- (void) showProgressHud
{
    dispatch_async(dispatch_get_main_queue(), ^{
        MBProgressHUD *progressHUD = [MBProgressHUD showHUDAddedTo:self.view animated:NO];
        [progressHUD setLabelText:@"Connecting"];
    });
    
}

- (void) hideProgressHud
{
    dispatch_async(dispatch_get_main_queue(), ^{
        [MBProgressHUD hideAllHUDsForView:self.view animated:NO];
    });
}


@end
