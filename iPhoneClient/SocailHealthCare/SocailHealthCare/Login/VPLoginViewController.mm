

#define SCROLLVIEW_CONTENT_HEIGHT 404
#define SCROLLVIEW_CONTENT_WIDTH  320

#import "VPLoginViewController.h"
#import "AppDelegate.h"

#import "AlertView.h"

#import "AFHTTPClient.h"
#import "MBProgressHUD.h"
#import "AFJSONRequestOperation.h"


@implementation VPLoginViewController

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

- (void)dealloc
{
    [_scrollview release];
    
    [_lblMobileNumber release];
    
    [_lblPinActivation release];
    
    [_txtMobileNumber release];
    
    
    [_txtFirstDigit release];
    [_txtSecondDigit release];
    [_txtThirdDigit release];
    [_txtFourthDigit release];
    
    [_txtInvisibleField release];
    [_btnInvisible release];
    
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
#pragma mark - View Life Cycle
#pragma mark -
- (void)viewDidLoad
{
    [super viewDidLoad];
    
    //[self setupUIConfigurations];
    
    UITapGestureRecognizer *tapGestureRecognizer = [[UITapGestureRecognizer alloc] initWithTarget:self action:nil];
    tapGestureRecognizer.delegate = self;
    tapGestureRecognizer.numberOfTapsRequired = 1;
    [self.view addGestureRecognizer:tapGestureRecognizer];
    [tapGestureRecognizer release];
    
    tapGestureRecognizer = [[UITapGestureRecognizer alloc] initWithTarget:self action:nil];
    tapGestureRecognizer.delegate = self;
    tapGestureRecognizer.numberOfTapsRequired = 1;
    [self.btnInvisible addGestureRecognizer:tapGestureRecognizer];
    [tapGestureRecognizer release];
    
    // Do any additional setup after loading the view from its nib.
}

- (void) viewWillAppear:(BOOL)animated
{	
    [self registerNotification];
    [super viewWillAppear:animated];
}

- (void) viewWillDisappear:(BOOL)animated
{
    [self unRegisterNotification];
}

- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (void)viewDidUnload {
       [super viewDidUnload];
}


#pragma mark -
#pragma mark setup user interface
#pragma mark -
/*
- (void) setupUIConfigurations
{
    self.lblHeading.text = LOC(@"Activation");
    self.lblHeading.textColor = UIColorFromHex(WHITE_COLOR);
    [self.lblHeading setFont:[UIFont omnesMediumFontWithSize:21]];
    
    self.lblMobileNumber.text = LOC(@"Mobile number");
    self.lblMobileNumber.textColor = UIColorFromHex(WHITE_COLOR);
    [self.lblMobileNumber setFont:[UIFont omnesRegularFontWithSize:17]];

    self.lblPinActivation.text = LOC(@"4 digit activation PIN");
    self.lblPinActivation.textColor = UIColorFromHex(WHITE_COLOR);
    [self.lblPinActivation setFont:[UIFont omnesRegularFontWithSize:17]];

    self.lblHomeNumber.text = LOC(@"Home phone number");
    self.lblHomeNumber.textColor = UIColorFromHex(WHITE_COLOR);
    [self.lblHomeNumber setFont:[UIFont omnesRegularFontWithSize:17]];

    [self.txtFirstDigit setTextColor:UIColorFromHex(LIGHT_GRAY_COLOR)];
    [self.txtSecondDigit setTextColor:UIColorFromHex(LIGHT_GRAY_COLOR)];
    [self.txtThirdDigit setTextColor:UIColorFromHex(LIGHT_GRAY_COLOR)];
    [self.txtFourthDigit setTextColor:UIColorFromHex(LIGHT_GRAY_COLOR)];
    
    [self.txtFirstDigit setFont:[UIFont omnesRegularFontWithSize:22]];
    [self.txtSecondDigit setFont:[UIFont omnesRegularFontWithSize:22]];
    [self.txtThirdDigit setFont:[UIFont omnesRegularFontWithSize:22]];
    [self.txtFourthDigit setFont:[UIFont omnesRegularFontWithSize:22]];
    
    self.txtMobileNumber.textColor = UIColorFromHex(LIGHT_GRAY_COLOR);
    [self.txtMobileNumber setFont:[UIFont omnesRegularFontWithSize:15]];
    [self.txtMobileNumber setPlaceholder: LOC(@"07xxxxxxxxx")];
    
    self.txtHomeNumber.textColor = UIColorFromHex(LIGHT_GRAY_COLOR);
    [self.txtHomeNumber setFont:[UIFont omnesRegularFontWithSize:15]];
    [self.txtHomeNumber setPlaceholder: LOC(@"E.g. 0208123456")];
}
*/

#pragma mark -
#pragma mark - IBActions
#pragma mark -
- (IBAction) backButtonPressed:(id)sender
{
    [[AppDelegate appDelegate].navigationController popViewControllerAnimated:YES];
}

- (IBAction) registerButtonClick:(id)sender
{
    if ([self validateFormData])
    {
        [self showProgressHud];
        [self loadTermsAndConditionForm];
    }
}

- (void) loadTermsAndConditionForm
{

    AFHTTPClient * Client = [[AFHTTPClient alloc] initWithBaseURL:[NSURL URLWithString:@"http://shc.webfurps.com/API/index.php"]];
    
    NSDictionary *parameters = [NSDictionary dictionaryWithObjectsAndKeys:
                                @"api", @"m",
                                @"signin", @"a",
                                @"r", @"crud",
                                self.txtMobileNumber.text, @"mobile",
                                self.txtInvisibleField.text, @"pwd",
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
         if ([[responseDictioniary objectForKey:@"ResponseCode"] integerValue] == 200)
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
         if ([[responseDictioniary objectForKey:@"ResponseCode"] integerValue] == 200)
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

- (IBAction) invisibleFieldEditingChanged:(UITextField *)sender {
    
    NSString *str = sender.text;
    NSLog(@"str %@",str);
    switch (str.length) {
        case 0:
        {
            self.txtFirstDigit.text = @"";
            self.txtSecondDigit.text = @"";
            self.txtThirdDigit.text = @"";
            self.txtFourthDigit.text = @"";
            
            break;
        }
        case 1:
        {
            self.txtFirstDigit.text = str;
            self.txtSecondDigit.text = @"";
            self.txtThirdDigit.text = @"";
            self.txtFourthDigit.text = @"";
            
            break;
        }
        case 2:
        {
            self.txtFirstDigit.text = [NSString stringWithFormat:@"%c", [str characterAtIndex:0]];
            self.txtSecondDigit.text = [NSString stringWithFormat:@"%c", [str characterAtIndex:1]];
            self.txtThirdDigit.text = @"";
            self.txtFourthDigit.text = @"";
            
            break;
        }
        case 3:
        {
            self.txtFirstDigit.text = [NSString stringWithFormat:@"%c", [str characterAtIndex:0]];
            self.txtSecondDigit.text = [NSString stringWithFormat:@"%c", [str characterAtIndex:1]];
            self.txtThirdDigit.text = [NSString stringWithFormat:@"%c", [str characterAtIndex:2]];
            self.txtFourthDigit.text = @"";
            
            break;
        }
        case 4:
        {
            self.txtFirstDigit.text = [NSString stringWithFormat:@"%c", [str characterAtIndex:0]];
            self.txtSecondDigit.text = [NSString stringWithFormat:@"%c", [str characterAtIndex:1]];
            self.txtThirdDigit.text = [NSString stringWithFormat:@"%c", [str characterAtIndex:2]];
            self.txtFourthDigit.text = [NSString stringWithFormat:@"%c", [str characterAtIndex:3]];
            
            [(UITextField*)sender resignFirstResponder];
            
            break;
            
        }
        default:
        {
            break;
        }
    }
    
}

#pragma mark -
#pragma mark - Gestures Handling
#pragma mark -
- (BOOL) gestureRecognizer:(UIGestureRecognizer *)gestureRecognizer shouldReceiveTouch:(UITouch *)touch
{
    if([touch.view isKindOfClass:[UIButton class]] && (UIButton *)touch.view == self.btnInvisible)
    {
        [self.txtInvisibleField becomeFirstResponder];;
        return NO;
    }
    else if ([touch.view isKindOfClass:[UIView class]])
    {
        [self resignKeyBoard];
        return NO;
    }
    
    return YES;
    
}

- (void) resignKeyBoard
{
    
    [self.txtMobileNumber resignFirstResponder];
    
    [self.txtFirstDigit resignFirstResponder];
    [self.txtSecondDigit resignFirstResponder];
    [self.txtThirdDigit resignFirstResponder];
    [self.txtFourthDigit resignFirstResponder];
    [self.txtInvisibleField resignFirstResponder];
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
    
	
    if (!keyboardVisible || IS_IPHONE_5) {
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
#pragma mark - Text Field Delegate
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

- (BOOL) textFieldShouldReturn:(UITextField *)textField
{
    return [textField resignFirstResponder];
}


- (BOOL) textField:(UITextField *)textField shouldChangeCharactersInRange:(NSRange)range replacementString:(NSString *)string
{
    BOOL flag = YES;
    NSUInteger newLength = [textField.text length] + [string length] - range.length;
    
    if (textField == self.txtMobileNumber && newLength > 12)
    {
        flag = NO;
    }
    
    else if (textField == self.txtInvisibleField && newLength > 4)
    {
        flag = NO;
    }
        
    return flag;
}

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
    
   
    if (self.txtMobileNumber.text.length <= 0)
    {
        [AlertView alertWithOk:@"Social Health Media" andMessage:@"Please enter your mobile number"];
    }
    
    else if (self.txtInvisibleField.text.length < 4)
    {
        [AlertView alertWithOk:@"Social Health Media" andMessage:@"Please enter your 4 digit pin"];
    }
    else
    {
        isFormValidate = YES;
    }
    return isFormValidate;
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

