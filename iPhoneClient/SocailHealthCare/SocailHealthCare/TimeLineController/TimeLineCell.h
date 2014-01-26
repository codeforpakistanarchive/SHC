//
//  TimeLineCell.h
//  SocailHealthCare
//
//  Created by Waqar Zahour on 1/26/14.
//  Copyright (c) 2014 Waqar Zahour. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface TimeLineCell : UITableViewCell

@property (retain, nonatomic) IBOutlet UIImageView *imgIcon;

@property (retain, nonatomic) IBOutlet UILabel *lblName;
@property (retain, nonatomic) IBOutlet UILabel *lblDate;
@property (retain, nonatomic) IBOutlet UILabel *lblDescription;

@property (retain, nonatomic) IBOutlet UIButton *btnComments;
@end
