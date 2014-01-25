//
//  VPAboutViewController.h
//  Telmore
//
//  Created by Talha Rehman on 21/08/2013.
//  Copyright (c) 2013 Vopium A/S. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface VPAboutViewController : UIViewController


@property (retain , nonatomic) IBOutlet UILabel *lblTitle;

@property (retain , nonatomic) IBOutlet UILabel *lblVersion;
@property (retain , nonatomic) IBOutlet UILabel *lblBuild;
@property (retain , nonatomic) IBOutlet UILabel *lblCopyRight;

- (IBAction)backButtonClicked:(id)sender;
@end
