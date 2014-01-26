//
//  TimeLineController.h
//  SocailHealthCare
//
//  Created by Waqar Zahour on 1/25/14.
//  Copyright (c) 2014 Waqar Zahour. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface TimeLineController : UIViewController

@property (retain , nonatomic) IBOutlet UITableView *timeLineTable;

- (IBAction) showComments:(id)sender;

@end
