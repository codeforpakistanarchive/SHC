/*
 *  UIInputToolbar.m
 *  
 *  Created by Brandon Hamilton on 2011/05/03.
 *  Copyright 2011 Brandon Hamilton.
 *  
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 *  
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 *  
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 */

#import "UIInputToolbar.h"

@implementation UIInputToolbar

@synthesize textView;
@synthesize inputButton;
@synthesize delegate;

-(void)inputButtonPressed
{
    if ([delegate respondsToSelector:@selector(inputButtonPressed:)]) 
    {
        [delegate inputButtonPressed:self.textView.text];
    }
    
    /* Remove the keyboard and clear the text */
    [self.textView resignFirstResponder];
    [self.textView clearText];
}

- (void) showOption
{
    if ([delegate respondsToSelector:@selector(showOption)])
    {
        
        [self.textView resignFirstResponder];
        [self.textView clearText];
        [delegate showOption];
    }
    
    /* Remove the keyboard and clear the text */
    
}

-(void)setupToolbar:(NSString *)buttonLabel
{
    self.autoresizingMask = UIViewAutoresizingFlexibleWidth | UIViewAutoresizingFlexibleRightMargin;
    self.tintColor = [UIColor lightGrayColor];
    
    /* Create custom send button*/
    UIImage *buttonImage = [UIImage imageNamed:@"buttonbg.png"];
    //buttonImage          = [buttonImage stretchableImageWithLeftCapWidth:floorf(buttonImage.size.width/2) topCapHeight:floorf(buttonImage.size.height/2)];
    
    UIButton *button               = [UIButton buttonWithType:UIButtonTypeCustom];
    button.titleLabel.font         = [UIFont boldSystemFontOfSize:15.0f];
    button.titleLabel.shadowOffset = CGSizeMake(0, -1);
    //button.titleEdgeInsets         = UIEdgeInsetsMake(0, 2, 0, 2);
    //button.contentStretch          = CGRectMake(0.5, 0.5, 0, 0);
    //button.contentMode             = UIViewContentModeScaleToFill;
    
    [button setFrame:CGRectMake(0,0, buttonImage.size.width/2, buttonImage.size.height/2)];
    [button setBackgroundImage:buttonImage forState:UIControlStateNormal];
    [button addTarget:self action:@selector(showOption) forControlEvents:UIControlEventTouchUpInside];
    [button sizeToFit];
    
    CGRect frame = button.frame;
    frame.origin.y += 7;
    frame.origin.x += 10;
    button.frame = frame;
    
    UIView *view = [[[UIView alloc] initWithFrame:CGRectMake(0,0,40,38)] autorelease];
    [view setBackgroundColor:[UIColor clearColor]];
    [view addSubview:button];
    
    self.inputButton = [[[UIBarButtonItem alloc] initWithCustomView:view] autorelease];
    self.inputButton.customView.autoresizingMask = UIViewAutoresizingFlexibleTopMargin | UIViewAutoresizingFlexibleRightMargin | UIViewAutoresizingFlexibleWidth;
    /* Disable button initially */
    //self.inputButton.enabled = NO;

    /* Create UIExpandingTextView input */
    self.textView = [[[UIExpandingTextView alloc] initWithFrame:CGRectMake(50,6,240,60)] autorelease];
    self.textView.internalTextView.scrollIndicatorInsets = UIEdgeInsetsMake(4.0f, 0.0f, 10.0f, 0.0f);
    self.textView.autoresizingMask = UIViewAutoresizingFlexibleRightMargin | UIViewAutoresizingFlexibleWidth;
    self.textView.delegate = self;
    self.textView.returnKeyType = UIReturnKeySend;
    [self addSubview:self.textView];
    


    /* Right align the toolbar button */
    //UIBarButtonItem *flexItem = [[[UIBarButtonItem alloc] initWithBarButtonSystemItem:UIBarButtonSystemItemFlexibleSpace target:nil action:nil] autorelease];
    
    NSArray *items = [NSArray arrayWithObjects:self.inputButton, nil];
    [self setItems:items animated:NO];
}

- (id)initWithFrame:(CGRect)frame
{
    if ((self = [super initWithFrame:frame])) {
        [self setupToolbar:@"+"];
    }
    return self;
}

-(id)init
{
    if ((self = [super init])) {
        [self setupToolbar:@"+"];
    }
    return self;
}


- (void)drawRect:(CGRect)rect 
{
    /* Draw custon toolbar background */
    UIImage *backgroundImage = [UIImage imageNamed:@"toolbarbg.png"];
    backgroundImage = [backgroundImage stretchableImageWithLeftCapWidth:floorf(backgroundImage.size.width/2) topCapHeight:floorf(backgroundImage.size.height/2)];
    [backgroundImage drawInRect:CGRectMake(0, 0, self.frame.size.width, self.frame.size.height)];
    
    CGRect i = self.inputButton.customView.frame;
    i.origin.y = self.frame.size.height - i.size.height;
    i.origin.x = 0;
    self.inputButton.customView.frame = i;
}

- (void)dealloc
{
    [textView release];
    [inputButton release];
    [super dealloc];
}


#pragma mark -
#pragma mark UIExpandingTextView delegate
- (void)expandingTextViewDidBeginEditing:(UIExpandingTextView *)expandingTextView
{
    if ([delegate respondsToSelector:@selector(hideOption)])
    {
       [delegate hideOption];
    }
}

-(void)expandingTextView:(UIExpandingTextView *)expandingTextView willChangeHeight:(float)height
{
    /* Adjust the height of the toolbar when the input component expands */
    float diff = (textView.frame.size.height - height);
    CGRect r = self.frame;
    r.origin.y += diff;
    r.size.height -= diff;
    self.frame = r;
}

-(void)expandingTextViewDidChange:(UIExpandingTextView *)expandingTextView
{
    /* Enable/Disable the button */
//    if ([expandingTextView.text length] > 0)
//        self.inputButton.enabled = YES;
//    else
//        self.inputButton.enabled = NO;
}

- (void) sendMessage
{
    if ([delegate respondsToSelector:@selector(inputButtonPressed:)])
    {
        if ([self.textView hasText])
        {
            [delegate inputButtonPressed:self.textView.text];
        }
        
    }
    
    /* Remove the keyboard and clear the text */
    [self.textView resignFirstResponder];
    [self.textView clearText];

}

@end
