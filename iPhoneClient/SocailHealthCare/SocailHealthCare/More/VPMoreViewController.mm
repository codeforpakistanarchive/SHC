

#import "VPMoreViewController.h"

#import "AppDelegate.h"
#import "VPMoreCell.h"

#import "VPAboutViewController.h"

@interface VPMoreViewController ()

- (void) initalizeLocalizedStrings;
- (void) displayMailComposer;
- (void) fetchSupportServiceText;

@end

@implementation VPMoreViewController


@synthesize supportServiceTextString = _supportServiceTextString;

- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        // Custom initialization
    }
    return self;
}

#pragma mark -Life cycle
- (void)viewDidLoad
{
    [super viewDidLoad];
    
    // Do any additional setup after loading the view from its nib.
    [self initalizeLocalizedStrings];
    
    
     
}

- (void) viewWillAppear:(BOOL)animated
{
    [super viewWillAppear:animated];
    
    
    [self.moreTableView reloadData];
}


- (void)viewWillDisappear:(BOOL)animated
{
    [super viewWillDisappear:YES];
}

- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (void)dealloc
{
    [_moreTableView release];
    [_moreArray release];
    [_moreIconsArray release];
    [_iconImage release];
    [super dealloc];
}

- (void)viewDidUnload
{    
    [self setMoreTableView:nil];
    [self setMoreArray:nil];
    [self setMoreIconsArray:nil];
    
    
    [super viewDidUnload];
}

#pragma mark- Functions
- (void)initalizeLocalizedStrings
{
     self.moreArray = [[NSArray alloc] initWithObjects:@"Invite a Friend",@"About",nil];
     self.moreIconsArray = [[NSArray alloc] initWithObjects:@"invite_icon.png",@"about_icon.png",nil]; 
}

#pragma mark -
#pragma mark UIAlertViewDelegate Method
#pragma mark -
- (void) alertView:(UIAlertView *)alertView didDismissWithButtonIndex:(NSInteger)buttonIndex
{
    
    
}

- (void) inviteButtonPressed
{
    [[UIApplication sharedApplication] openURL:[NSURL URLWithString:@"sms:"]];
}

#pragma mark -
#pragma mark TableView Delegate & Data Source

- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section
{
    return self.moreArray.count;
}
- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath
{

    
    static NSString *moreCellIdentifier = @"MoreCellIdentifier";
    
    VPMoreCell *cell = (VPMoreCell *)[tableView dequeueReusableCellWithIdentifier:moreCellIdentifier];
    if (cell == nil)
    {
        NSArray *nib = [[NSBundle mainBundle] loadNibNamed:@"VPMoreCell" owner:self options:nil];
        cell = [nib objectAtIndex:0];
    }
    
    
    
    [cell configureCustomUILayout];
    cell.lblTitle.text = [self.moreArray objectAtIndex:indexPath.row];
    [cell.imgIcon setImage:[UIImage imageNamed:[self.moreIconsArray objectAtIndex:indexPath.row]]];

   return  cell;

}

- (CGFloat)tableView:(UITableView *)tableView heightForRowAtIndexPath:(NSIndexPath *)indexPath
{
    return 50;
}

- (void) tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath
{
    
    [tableView deselectRowAtIndexPath:indexPath animated:YES];
    switch (indexPath.row)
    {
        case 0:
            [self inviteButtonPressed];
            break;
            
        case 1:
            [self about];
            break;
            
        default:
            break;
    }

}

- (void) about
{
    VPAboutViewController *aboutController = [[VPAboutViewController alloc] initWithNibName:@"VPAboutViewController" bundle:nil];
    [[AppDelegate appDelegate].navigationController pushViewController:aboutController animated:YES];
    [aboutController release];
}


#pragma mark- UIActionSheet Deleagate

- (void)actionSheet:(UIActionSheet *)actionSheet didDismissWithButtonIndex:(NSInteger)buttonIndex
{

    
}



@end
