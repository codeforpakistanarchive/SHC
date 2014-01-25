//
//  VPMoreCell.m
//  Telmore
//
//  Created by Talha Rehman on 10/07/2013.
//  Copyright (c) 2013 Vopium A/S. All rights reserved.
//

#import "VPMoreCell.h"



@implementation VPMoreCell

- (id)initWithStyle:(UITableViewCellStyle)style reuseIdentifier:(NSString *)reuseIdentifier
{
    self = [super initWithStyle:style reuseIdentifier:reuseIdentifier];
    if (self) {
        // Initialization code
    }
    return self;
}

- (void) configureCustomUILayout
{
    
}


- (void)setSelected:(BOOL)selected animated:(BOOL)animated
{
    [super setSelected:selected animated:animated];

    // Configure the view for the selected state
}

- (void) createBadgeWithCount
{
    if (!self.messageBadgeView)
    {
        /*
        self.messageBadgeView = [[LKBadgeView alloc] initWithFrame:CGRectMake(20,1,26,26)];
        self.messageBadgeView.widthMode = LKBadgeViewWidthModeSmall;
        self.messageBadgeView.outlineWidth = 2.0f;
        self.messageBadgeView.shadow = YES;
        self.messageBadgeView.shadowColor = [UIColor blackColor];
        self.messageBadgeView.outlineColor = [UIColor whiteColor];
        self.messageBadgeView.outline = YES;
        self.messageBadgeView.textColor = [UIColor whiteColor];
        self.messageBadgeView.badgeColor = UIColorFromHex(ORANGE_COLOR);
        [self addSubview:self.messageBadgeView];
        */
    }
}


- (void)dealloc
{
    [_lblTitle release];
    [_imgIcon release];
    [_messageBadgeView release];
    [super dealloc];
}
@end
