//
//  TimeLineController.m
//  SocailHealthCare
//
//  Created by Waqar Zahour on 1/25/14.
//  Copyright (c) 2014 Waqar Zahour. All rights reserved.
//

#import "TimeLineController.h"
#import "TimeLineCell.h"

#import "ODRefreshControl.h"
#import "CommentsController.h"

#import "AppDelegate.h"

@interface TimeLineController ()

@end

@implementation TimeLineController

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
    [_timeLineTable release];
    [super dealloc];
}
- (void)viewDidLoad
{
    [super viewDidLoad];
    // Do any additional setup after loading the view from its nib.
    ODRefreshControl *refreshControl = [[[ODRefreshControl alloc] initInScrollView:self.timeLineTable] autorelease];
    [refreshControl addTarget:self action:@selector(dropViewDidBeginRefreshing:) forControlEvents:UIControlEventValueChanged];
}

- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

#pragma mark -
#pragma mark TableView Delegate & Data Source

- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section
{
    return 2;
}
- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath
{
    
    
    static NSString *moreCellIdentifier = @"TimeLineCellIdentifier";
    
    TimeLineCell *cell = (TimeLineCell *)[tableView dequeueReusableCellWithIdentifier:moreCellIdentifier];
    if (cell == nil)
    {
        NSArray *nib = [[NSBundle mainBundle] loadNibNamed:@"TimeLineCell" owner:self options:nil];
        cell = [nib objectAtIndex:0];
    }
    
    
    if (indexPath.row == 0)
    {
        cell.lblName.text = @"Amna";
        cell.lblDate.text = @"12:10 PM";
        cell.lblDescription.text = @"I have a flu last two days please prescribe the medicine.";
        cell.imgIcon.image = [UIImage imageNamed:@"displaytest.png"];
        
    }
    else
    {
        cell.lblName.text = @"Nauman Rauf";
        cell.lblDate.text = @"03:36 PM";
        cell.lblDescription.text = @"I have a bad throat already taken antibiotic last three day should i continue.";
        cell.imgIcon.image = [UIImage imageNamed:@"avatar.png"];
    }
    
    
    return  cell;

}

- (CGFloat)tableView:(UITableView *)tableView heightForRowAtIndexPath:(NSIndexPath *)indexPath
{
    return 220;
}

- (void) tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath
{
    [tableView deselectRowAtIndexPath:indexPath animated:YES];
}

- (void)dropViewDidBeginRefreshing:(ODRefreshControl *)refreshControl
{
    double delayInSeconds = 3.0;
    dispatch_time_t popTime = dispatch_time(DISPATCH_TIME_NOW, delayInSeconds * NSEC_PER_SEC);
    dispatch_after(popTime, dispatch_get_main_queue(), ^(void){
        [refreshControl endRefreshing];
    });

}

#pragma mark -
#pragma mark - IBActions
#pragma mark -
- (IBAction) showComments:(id)sender
{
    CommentsController *commentsController = [[CommentsController alloc] initWithNibName:@"CommentsController" bundle:nil];
    [[AppDelegate appDelegate].navigationController pushViewController:commentsController animated:YES];
    [commentsController release];
}


@end
