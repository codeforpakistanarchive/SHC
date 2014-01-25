//
//  VPMoreCell.h
//  Telmore
//
//  Created by Talha Rehman on 10/07/2013.
//  Copyright (c) 2013 Vopium A/S. All rights reserved.
//

#import <UIKit/UIKit.h>

@class LKBadgeView;
@interface VPMoreCell : UITableViewCell

@property (retain, nonatomic) IBOutlet UIImageView *imgIcon;
@property (retain, nonatomic) IBOutlet UILabel *lblTitle;
@property (retain, nonatomic) LKBadgeView *messageBadgeView;

- (void) createBadgeWithCount;
- (void) configureCustomUILayout;

@end
