

#import <UIKit/UIKit.h>


@interface VPSignUpViewController : UIViewController <UIGestureRecognizerDelegate>

{
	UITextField * currentlyActiveField;
    
    BOOL keyboardVisible;
    BOOL validationStatus;
}


@property (retain , nonatomic) IBOutlet UIScrollView *scrollview;

@property (retain , nonatomic) IBOutlet UILabel *lblUserName;
@property (retain , nonatomic) IBOutlet UILabel *lblPassword;
@property (retain , nonatomic) IBOutlet UILabel *lblMobileNumber;

@property (retain , nonatomic) IBOutlet UITextField *txtUserName;
@property (retain , nonatomic) IBOutlet UITextField *txtPassword;
@property (retain , nonatomic) IBOutlet UITextField *txtMobileNumber;

@property (retain , nonatomic) IBOutlet UILabel *lblMobileNumberSubHeading;
@property (retain , nonatomic) IBOutlet UILabel *lblHeading;

- (IBAction) continueButtonClick:(id)sender;




@end
