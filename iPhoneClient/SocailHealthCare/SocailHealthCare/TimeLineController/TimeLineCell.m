//
//  TimeLineCell.m
//  SocailHealthCare
//
//  Created by Waqar Zahour on 1/26/14.
//  Copyright (c) 2014 Waqar Zahour. All rights reserved.
//

#import "TimeLineCell.h"

@implementation TimeLineCell

- (id)initWithStyle:(UITableViewCellStyle)style reuseIdentifier:(NSString *)reuseIdentifier
{
    self = [super initWithStyle:style reuseIdentifier:reuseIdentifier];
    if (self) {
        // Initialization code
    }
    return self;
}

- (void)setSelected:(BOOL)selected animated:(BOOL)animated
{
    [super setSelected:selected animated:animated];

    // Configure the view for the selected state
}

- (void)dealloc
{
    [_lblName release];
    [_lblDate release];
    [_lblDescription release];
    [_imgIcon release];
    
    [_btnComments release];
    [super dealloc];
}

@end
