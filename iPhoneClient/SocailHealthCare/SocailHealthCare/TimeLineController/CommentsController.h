//
//  CommentsController.h
//  SocailHealthCare
//
//  Created by Waqar Zahour on 1/26/14.
//  Copyright (c) 2014 Waqar Zahour. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "UIInputToolbar.h"

@interface CommentsController : UIViewController <UIInputToolbarDelegate>

@property (retain , nonatomic) IBOutlet UITableView *commentsTable;
@property (retain, nonatomic) UIInputToolbar *inputToolbar;

@end
