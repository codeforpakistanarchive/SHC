//
//  CommentsController.m
//  SocailHealthCare
//
//  Created by Waqar Zahour on 1/26/14.
//  Copyright (c) 2014 Waqar Zahour. All rights reserved.
//

#import "CommentsController.h"
#import "AppDelegate.h"
#import "TimeLineCell.h"

#define kStatusBarHeight 20
#define kDefaultToolbarHeight 68
#define kKeyboardHeightPortrait 216
#define kKeyboardHeightLandscape 140

@interface CommentsController ()

@end

@implementation CommentsController

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
    
    
    /* Calculate screen size */
    CGRect screenFrame = [[UIScreen mainScreen] applicationFrame];
    
    /* Create toolbar */
    self.inputToolbar = [[[UIInputToolbar alloc] initWithFrame:CGRectMake(0, screenFrame.size.height-kDefaultToolbarHeight, screenFrame.size.width, kDefaultToolbarHeight)] autorelease];
    [self.view addSubview:_inputToolbar];
    _inputToolbar.delegate = self;
    [_inputToolbar.textView setMaximumNumberOfLines:4];
    _inputToolbar.textView.placeholder = @"Enter a message";
}

- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (void)dealloc
{
    [_commentsTable release];
    [_inputToolbar release];
    [super dealloc];
}

#pragma mark -
#pragma mark - IBActions
#pragma mark -
- (IBAction) backButtonPressed:(id)sender
{
    [[AppDelegate appDelegate].navigationController popViewControllerAnimated:YES];
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
        [cell.btnComments setHidden:YES];
    }
    else
    {
        cell.lblName.text = @"Doctor";
        cell.lblDate.text = @"1:36 PM";
        cell.lblDescription.text = @"Take a Panadol CF.";
        cell.imgIcon.image = [UIImage imageNamed:@"avatar.png"];
        [cell.btnComments setHidden:YES];
    }
    
    
    return  cell;
    
}

- (CGFloat)tableView:(UITableView *)tableView heightForRowAtIndexPath:(NSIndexPath *)indexPath
{
    return 180;
}

- (void) tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath
{
    [tableView deselectRowAtIndexPath:indexPath animated:YES];
}


#pragma mark -
#pragma mark KeyBoard Notifications
- (void)keyboardWillShow:(NSNotification *)notification
{
    /* Move the toolbar to above the keyboard */
	[UIView beginAnimations:nil context:NULL];
	[UIView setAnimationDuration:0.3];
	CGRect frame = self.inputToolbar.frame;
    NSString *language = [[NSLocale preferredLanguages] objectAtIndex:0];
    if (UIInterfaceOrientationIsPortrait(self.interfaceOrientation)) {
        
        frame.origin.y = self.view.frame.size.height - frame.size.height - kKeyboardHeightPortrait;
        frame.origin.y = ([language isEqualToString:@"ja"] ? frame.origin.y - 35 : frame.origin.y);
    }
    else
    {
        frame.origin.y = self.view.frame.size.width - frame.size.height - kKeyboardHeightLandscape - kStatusBarHeight;
    }
	self.inputToolbar.frame = frame;
	[UIView commitAnimations];
}

- (void)keyboardWillHide:(NSNotification *)notification
{
    /* Move the toolbar back to bottom of the screen */
	[UIView beginAnimations:nil context:NULL];
	[UIView setAnimationDuration:0.3];
	CGRect frame = self.inputToolbar.frame;
    if (UIInterfaceOrientationIsPortrait(self.interfaceOrientation)) {
        frame.origin.y = self.view.frame.size.height - frame.size.height;
    }
    else {
        frame.origin.y = self.view.frame.size.width - frame.size.height;
    }
	self.inputToolbar.frame = frame;
	[UIView commitAnimations];
}

- (void)viewWillAppear:(BOOL)animated
{
	[super viewWillAppear:animated];
    [self.inputToolbar setNeedsDisplay];
	/* Listen for keyboard */
	[[NSNotificationCenter defaultCenter] addObserver:self selector:@selector(keyboardWillShow:) name:UIKeyboardWillShowNotification object:nil];
	[[NSNotificationCenter defaultCenter] addObserver:self selector:@selector(keyboardWillHide:) name:UIKeyboardWillHideNotification object:nil];
    
    
}

- (void)viewWillDisappear:(BOOL)animated
{
	[super viewWillDisappear:animated];
	/* No longer listen for keyboard */
	[[NSNotificationCenter defaultCenter] removeObserver:self name:UIKeyboardWillShowNotification object:nil];
	[[NSNotificationCenter defaultCenter] removeObserver:self name:UIKeyboardWillHideNotification object:nil];
    
    
}

@end
