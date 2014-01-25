#import <UIKit/UIKit.h>

@interface VPLoginViewController : UIViewController <UIGestureRecognizerDelegate>
{    
   	UITextField * currentlyActiveField;
    BOOL keyboardVisible;
}

@property (retain , nonatomic) IBOutlet UIScrollView *scrollview;

@property (retain , nonatomic) IBOutlet UILabel *lblHeading;


@property (retain , nonatomic) IBOutlet UILabel *lblMobileNumber;
@property (retain , nonatomic) IBOutlet UILabel *lblPinActivation;


@property (retain , nonatomic) IBOutlet UITextField *txtMobileNumber;

@property (retain , nonatomic) IBOutlet UITextField *txtFirstDigit;
@property (retain , nonatomic) IBOutlet UITextField *txtSecondDigit;
@property (retain , nonatomic) IBOutlet UITextField *txtThirdDigit;
@property (retain , nonatomic) IBOutlet UITextField *txtFourthDigit;
@property (retain , nonatomic) IBOutlet UITextField *txtInvisibleField;

@property (retain , nonatomic) IBOutlet UIButton *btnInvisible;

- (IBAction) invisibleFieldEditingChanged:(UITextField *)sender;
- (IBAction) registerButtonClick:(id)sender;

@end
