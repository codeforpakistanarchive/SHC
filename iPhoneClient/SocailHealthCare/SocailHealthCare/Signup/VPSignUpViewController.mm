

#define SCROLLVIEW_CONTENT_HEIGHT 404
#define SCROLLVIEW_CONTENT_WIDTH  320

#import "VPSignUpViewController.h"

#import "AppDelegate.h"

#import "AlertView.h"

#import "AFHTTPClient.h"
#import "AFHTTPRequestOperation.h"
#import "AFJSONRequestOperation.h"

#import "JSONKit.h"
#import "MBProgressHUD.h"

//#import "XMLDictionary.h"



@interface VPSignUpViewController ()

@end

@implementation VPSignUpViewController

#pragma mark -
#pragma mark initialization and deallocation
#pragma mark -
- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        // Custom initialization
    }
    return self;
}

- (void) dealloc {
    
    [_lblUserName release];
    [_lblPassword release];
    [_lblMobileNumber release];
    
    [_txtUserName release];
    [_txtPassword release];
    [_txtMobileNumber release];
    
    [_lblHeading release];
    [_lblMobileNumberSubHeading release];
    
    [_scrollview release];
    
    [super dealloc];
}


#pragma mark -
#pragma mark notification Registration
#pragma mark -
- (void) registerNotification
{
    [[NSNotificationCenter defaultCenter]   addObserver:self
                                               selector:@selector (keyboardDidShow:)
                                                   name: UIKeyboardDidShowNotification
                                                 object:nil];
    
	[[NSNotificationCenter defaultCenter]   addObserver:self
                                               selector:@selector (keyboardDidHide:)
                                                   name: UIKeyboardDidHideNotification
                                                 object:nil];
    
    self.scrollview.contentSize = CGSizeMake(SCROLLVIEW_CONTENT_WIDTH, SCROLLVIEW_CONTENT_HEIGHT);
	keyboardVisible = NO;
    
}

- (void) unRegisterNotification
{
    [[NSNotificationCenter defaultCenter] removeObserver:self name:UIKeyboardDidShowNotification object:nil];
    [[NSNotificationCenter defaultCenter] removeObserver:self name:UIKeyboardDidHideNotification object:nil];
}

#pragma mark -
#pragma mark View Life Cycle
#pragma mark -
- (void)viewDidLoad
{
    //DLog(@"viewDidLoad ====");
    [super viewDidLoad];
    
    //[self setupUIConfigurations];
    
    UITapGestureRecognizer * tapGestureRecognizer= [[UITapGestureRecognizer alloc] initWithTarget:self action:nil];    tapGestureRecognizer.delegate = self;
    tapGestureRecognizer.numberOfTapsRequired = 1;
    [self.view addGestureRecognizer:tapGestureRecognizer];
    [tapGestureRecognizer release];

}

- (void) viewWillAppear:(BOOL)animated {
	
    [self registerNotification];
    [super viewWillAppear:animated];
}

- (void) viewWillDisappear:(BOOL)animated {
    
    [self unRegisterNotification];
}

- (void) didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (void) viewDidUnload {
    
    [super viewDidUnload];
}

#pragma mark -
#pragma mark setup user interface
#pragma mark -
/*
- (void) setupUIConfigurations
{
    //[self setNeedsStatusBarAppearanceUpdate];
    
    self.lblMobileNumber.text = LOC(@"UK Mobile Number");
    self.lblMobileNumber.textColor = UIColorFromHex(WHITE_COLOR);
    [self.lblMobileNumber setFont:[UIFont omnesRegularFontWithSize:17]];
    
    self.lblMobileNumberSubHeading.text = LOC(@"We need this to send you activation code");
    self.lblMobileNumberSubHeading.textColor = UIColorFromHex(WHITE_COLOR);
    [self.lblMobileNumberSubHeading setFont:[UIFont omnesRegularItalicFontWithSize:15]];
    
    self.lblUserName.text = LOC(@"My Account username");
    self.lblUserName.textColor = UIColorFromHex(WHITE_COLOR);
    [self.lblUserName setFont:[UIFont omnesRegularFontWithSize:17]];
    
    self.lblPassword.text = LOC(@"My Account Password");
    self.lblPassword.textColor = UIColorFromHex(WHITE_COLOR);
    [self.lblPassword setFont:[UIFont omnesRegularFontWithSize:17]];
    
    self.lblHeading.text = LOC(@"Registration");
    self.lblHeading.textColor = UIColorFromHex(WHITE_COLOR);
    [self.lblHeading setFont:[UIFont omnesMediumFontWithSize:21]];
        
    self.txtUserName.textColor = UIColorFromHex(LIGHT_GRAY_COLOR);
    [self.txtUserName setFont:[UIFont omnesRegularFontWithSize:15]];
    [self.txtUserName setPlaceholder: LOC(@"Enter Address")];
    self.txtUserName.contentVerticalAlignment = UIControlContentVerticalAlignmentCenter;
    
    self.txtPassword.textColor = UIColorFromHex(LIGHT_GRAY_COLOR);
    [self.txtPassword setFont:[UIFont omnesRegularFontWithSize:15]];
    [self.txtPassword setPlaceholder: LOC(@"Enter Password")];
    self.txtPassword.contentVerticalAlignment = UIControlContentVerticalAlignmentCenter;
    
    self.txtMobileNumber.textColor = UIColorFromHex(LIGHT_GRAY_COLOR);
    [self.txtMobileNumber setFont:[UIFont omnesRegularFontWithSize:15]];
    [self.txtMobileNumber setPlaceholder: LOC(@"07xxxxxx")];
    self.txtMobileNumber.contentVerticalAlignment = UIControlContentVerticalAlignmentCenter;
}
*/


#pragma mark -
#pragma mark - UITextField Validations
#pragma mark -

- (BOOL) validateEmail: (NSString *) string
{
    NSString *emailRegex = @"[A-Z0-9a-z._%+-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,4}";
    NSPredicate *emailTest = [NSPredicate predicateWithFormat:@"SELF MATCHES %@", emailRegex];
    return [emailTest evaluateWithObject:string];
}

- (BOOL) validateFormData
{
    BOOL isFormValidate = NO;
    
    if (self.txtUserName.text.length <= 0)
    {
        [AlertView alertWithOk:@"Social Health Media" andMessage:@"Please enter your Full Name"];
    }
    else if (self.txtPassword.text.length <= 0)
    {
        [AlertView alertWithOk:@"Social Health Media" andMessage:@"Please enter your PMDC"];
    }
    
    else if (self.txtMobileNumber.text.length <= 0)
    {
        [AlertView alertWithOk:@"Social Health Media" andMessage:@"Please enter your mobile number"];
    }
    else
    {
        isFormValidate = YES;
    }
    return isFormValidate;
}

#pragma mark -
#pragma mark - UITextField Delegates
#pragma mark -

- (BOOL) textFieldShouldBeginEditing:(UITextField*)textField
{
	currentlyActiveField = textField;
   	return YES;
}

- (BOOL) textFieldShouldEndEditing:(UITextField *)textField
{
   	return YES;
}

- (BOOL) textField:(UITextField *)textField shouldChangeCharactersInRange:(NSRange)range replacementString:(NSString *)string
{
    BOOL flag = YES;
    NSUInteger newLength = [textField.text length] + [string length] - range.length;
    
    if ((textField == self.txtUserName || textField == self.txtPassword) && newLength > 15)
    {
        flag = NO;
    }
    
    else if (textField == self.txtMobileNumber && newLength > 12)
    {
        flag = NO;
    }
    
    return flag;
}

- (BOOL)textFieldShouldReturn:(UITextField *)textField
{
    
    return [textField resignFirstResponder];
}


#pragma mark -
#pragma mark - Gestures Handling
#pragma mark -
- (BOOL)gestureRecognizer:(UIGestureRecognizer *)gestureiRecognizer shouldReceiveTouch:(UITouch *)touch
{
    if ([touch.view isKindOfClass:[UITextField class]] ||
        [touch.view isKindOfClass:[UIButton class]] || [touch.view isKindOfClass:[UIView class]])
    {

        [self.txtMobileNumber resignFirstResponder];
        [self.txtPassword resignFirstResponder];
        [self.txtUserName resignFirstResponder];
        
        return NO;
    }
    return YES;
    
}

#pragma mark -
#pragma mark - Keyborad Notification Handling
#pragma mark -
- (void) keyboardDidShow: (NSNotification *)notify {
    
	if (keyboardVisible || IS_IPHONE_5)
    {
		return;
	}
    
    NSDictionary* info = [notify userInfo];
	NSValue* value = [info objectForKey:UIKeyboardFrameEndUserInfoKey];
	CGSize keyboardSize = [value CGRectValue].size;
	
	
	CGRect viewFrame = self.scrollview.frame;
	viewFrame.size.height -= keyboardSize.height;
	self.scrollview.frame = viewFrame;
	
	CGRect textFieldRect = [currentlyActiveField frame];
	textFieldRect.origin.y += 45;
    
	[self.scrollview scrollRectToVisible:textFieldRect animated:YES];
	keyboardVisible = YES;
    
}

- (void) keyboardDidHide: (NSNotification *)notify {
    
	if (!keyboardVisible || IS_IPHONE_5)
    {
		return;
	}
    
    NSDictionary* info = [notify userInfo];
	NSValue* value = [info objectForKey:UIKeyboardFrameEndUserInfoKey];
	CGSize keyboardSize = [value CGRectValue].size;
		
	CGRect viewFrame = self.scrollview.frame;
	viewFrame.size.height += keyboardSize.height;
	self.scrollview.frame = viewFrame;

	keyboardVisible = NO;	
}


#pragma mark -
#pragma mark - IBActions
#pragma mark -
- (IBAction) backButtonPressed:(id)sender
{
    [[AppDelegate appDelegate].navigationController popViewControllerAnimated:YES];
}

- (IBAction) continueButtonClick:(id)sender
{
    if ([self validateFormData])
    {
        [self showProgressHud];
        [self loadWaitingScreen];
    }
}



- (void) loadWaitingScreen
{
    AFHTTPClient * Client = [[AFHTTPClient alloc] initWithBaseURL:[NSURL URLWithString:@"http://shc.webfurps.com/API/index.php"]];
    
    NSDictionary *parameters = [NSDictionary dictionaryWithObjectsAndKeys:
                  @"api", @"m",
                  @"users", @"a",
                  @"c", @"crud",
                  self.txtMobileNumber.text, @"mobile",
                  self.txtUserName.text, @"name",
                  self.txtPassword.text, @"pmdc_code",
                  @"json", @"format",
                  nil];
    
    
    
    NSURLRequest *request = [Client requestWithMethod:@"POST"
                                                 path:@"http://shc.webfurps.com/API/index.php"
                                           parameters:parameters];
    AFJSONRequestOperation *operation =
    [AFJSONRequestOperation
     JSONRequestOperationWithRequest:request
     success:^(NSURLRequest *request, NSHTTPURLResponse *response, id JSON)
     {
         // Do something with JSON
         NSLog(@"Success %@",JSON);
         
         NSDictionary *responseDictioniary = JSON;
         if ([[[responseDictioniary objectForKey:@"Response"] objectForKey:@"ResponseCode"] integerValue] == 200)
         {
             NSLog(@"Doctor Created");
             [[AppDelegate appDelegate] launchDashbaord]; 

         };
         [self hideProgressHud];
         
     }
     failure:^(NSURLRequest *request, NSHTTPURLResponse *response, NSError *error, id JSON)
     {
         //
         NSLog(@"Error %@",JSON);
         
         NSDictionary *responseDictioniary = JSON;
         if ([[[responseDictioniary objectForKey:@"Response"] objectForKey:@"ResponseCode"] integerValue] == 200)
         {
             NSLog(@"Doctor Created");
             [[AppDelegate appDelegate] launchDashbaord]; 
         }
         else
         {
             [AlertView alertWithOk:@"Social Health Media" andMessage:[[responseDictioniary objectForKey:@"Response"] objectForKey:@"ResponseMessage"]];
         }
         [self hideProgressHud];
     }];
    
    // you can either start your operation like this
    [operation start];

    
}


#pragma mark -
#pragma mark - ProgressHud
#pragma mark -
- (void) showProgressHud
{
    dispatch_async(dispatch_get_main_queue(), ^{
        MBProgressHUD *progressHUD = [MBProgressHUD showHUDAddedTo:self.view animated:NO];
        [progressHUD setLabelText:@"Please wait"];
    });
    
}

- (void) hideProgressHud
{
    dispatch_async(dispatch_get_main_queue(), ^{
        [MBProgressHUD hideAllHUDsForView:self.view animated:NO];
    });
}



@end
