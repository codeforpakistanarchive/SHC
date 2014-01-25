

#import <UIKit/UIKit.h>
#import "AppDelegate.h"


@interface VPMoreViewController : UIViewController<UIActionSheetDelegate, UITableViewDataSource,UITableViewDelegate>
{

    

}

@property (retain, nonatomic) NSString *supportServiceTextString;
@property (retain, nonatomic) IBOutlet UITableView *moreTableView;
@property (nonatomic, retain) NSArray *moreArray;
@property (nonatomic, retain) NSArray *moreIconsArray;

@property (retain, nonatomic) IBOutlet UIImageView *iconImage;


- (IBAction)inviteButtonPressed:(id)sender;




@end
