//
//  VPAboutViewController.m
//  Telmore
//
//  Created by Talha Rehman on 21/08/2013.
//  Copyright (c) 2013 Vopium A/S. All rights reserved.
//

#import "VPAboutViewController.h"
#import "AppDelegate.h"

@interface VPAboutViewController ()

@end

@implementation VPAboutViewController

#pragma mark -
#pragma mark initialization and deallocation
#pragma mark -
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

    [_lblTitle release];

    [_lblVersion release];
    [_lblCopyRight release];
    [_lblBuild release];
    [super dealloc];
}

#pragma mark -
#pragma mark View Life Cycle
#pragma mark -
- (void)viewDidLoad
{
    [super viewDidLoad];
    // Do any additional setup after loading the view from its nib.
    
    [self configureCustomUILayout];
}

- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}


- (void)viewDidUnload
{
    [self setLblTitle:nil];

    [self setLblVersion:nil];
    [self setLblCopyRight:nil];
    [super viewDidUnload];
}

#pragma mark -
#pragma mark setup user interface
#pragma mark -
- (void) configureCustomUILayout
{
    
    self.lblTitle.text = @"About";

    // get the current version
	NSString *currentVersion = [[NSBundle mainBundle] objectForInfoDictionaryKey:@"CFBundleShortVersionString"];
    self.lblVersion.text = [NSString stringWithFormat:@"Version %@",currentVersion];
    
    
    NSString *currentBuild = [[NSBundle mainBundle] objectForInfoDictionaryKey:@"CFBundleVersion"];
    self.lblBuild.text = [NSString stringWithFormat:@"Build %@",currentBuild];
    
    
    self.lblCopyRight.text = @"Copyrights - All Rights Reserved";

}

#pragma mark -
#pragma mark - IBActions
#pragma mark -

- (IBAction)backButtonClicked:(id)sender
{
    UINavigationController *navigationController = (UINavigationController *)[AppDelegate appDelegate].navigationController;
    [navigationController popViewControllerAnimated:YES];
}
@end
