SHC
===

Social Health Care Lahore CIVIC hack

Before you start, we strongly recommend that you read the IVM General Concepts, and Introduction to IVR Systems in this help manual to help familiarize yourself with some of the terminology and ideas that you will need when designing your Interactive Voice Response system.

If you have already completed the Setup Wizard to set up a complex IVR system skip ahead to step 6 to customize your configuration.

Step 1: Run the Setup Wizard
===============================
If the Setup Wizard is not open, you can start it by choosing the "Run Setup Wizard..." option under the File menu.

Step 2: Select "Other (Complex IVR System)"
============================================

Step 3: Configure Telephone Line(s)
===================================
On this page you will need to add any telephone lines that you want IVM to be able to answer.

    Hardware - all of the compatible hardware that IVM detects on your machine will be listed. Select the name of the hardware device that you wish to add and press the "Add Line..." button below the list to configure the device.
    See Hardware/Device line properties for more information on configuration options.
    If your hardware does not appear on the list please see the Hardware Troubleshooting page.
    VoIP - if you already have a VoIP account that you would like to connect to select the "New SIP based VoIP Account..." option and press "Add Line..." button below the list to configure the account.
    See VoIP Line Properties for more information on configuration options. 

If you have Axon installed you may see an additional setup page asking which Axon lines you would like to ring on IVM. Select the lines that you will be using for your IVM installation so that these will connect to IVM correctly.

Step 4: Install Example IVR(s)
===============================
Some example IVRs are provided to help demonstrate how to set up IVM for various situations.

Click on the links below for more information about the example programs that are available:

    Real Estate Property Line
    Sending A Fax
    Sample Survey
    Account Payment with Credit Card 

These examples should be treated as a starting point only, providing you with a basic setup that you will still need to modify these to meet your specific requirements. Exploring the set up of these examples may also be a good way to help familiarize yourself with IVM even if in the end you plan to set up an entirely different IVR program.

Step 5: Complete Wizard
=================================

Step 6: Changing your Outgoing Messages (OGMs)
==============================================
You can create a single OGM to play an audio message, or set up a long call flow that will be started when a call is answered. An example of a longer call flow would be the Sample IVR Survey that you can load from the included example files provided with IVM. If you are creating a longer OGM Call Flow be sure to use the Call Simulator to test along the way. You may also want to see Complex IVR Systems when creating your ivr profile.

Step 7: Test your system with call simulator
============================================
Use the Call Simulator to test. Make sure that you have correctly set your Start OGM to the correct entry point for your system.

Designing a complex IVR System
==============================

Before you do anything in IVM you need to make sure you have a plan for how people will progress through your system. This will help you plan how the OGM will link together and can help save you time in the long run when you start making the individual OGMs.

To create a more advanced interactive voice response setup, you will need to use Key Response Menus and Active Commands to chain multiple OGMs together. You will work primarily from the Out-Going Messages List, found on the "IVR Profile" tab of the web interface, to create and manage all of the needed OGMs.

Key Response
============

For Each OGM that takes an input from the caller you have two options for accepting data. You can use the 'Single Key Press' mode, so that the caller simply hits the number of the option they want and are directed to the associated response. One drawback to this mode is that it limits the number of possible options. Alternatively you can instead use the 'Data Entry' mode which will let the system take a variable length input (usually followed by the # key). This opens possibilities for the number of options available but will also make it easier for an incorrect input to be entered, and you should be sure to consider how an incorrect input should be handled by your system. See Key Response Settings for more information.

Active Commands
===============

Active Commands refers to all of the possible actions that IVM can perform after at the end of an OGM. Possible commands include, going to another OGM, Leaving a message for a mailbox, playing or recording an audio file, transferring to an extension, repeating an OGM, and ending the call. See Active Commands for more information.

Plugins
=========

IVM Plugins can be used to process or obtain data. For example, if you are making a interactive voice response system to tell the caller the current temperature, a plugin can be used to read data from your hardware and return the temperature to IVM. A plugin could also be used to restart the computer, access a database, process credit card orders and more.

Visit www.nch.com.au/ivm/plugins.html for number of IVM plugins provided by NCH. More information on installing and using plugins can be found under Plugins.

For programmer information about writing and creating plugins for IVM see the IVM Software Development Kit at www.nch.com.au/ivm/sdk.html.

Be sure to regularly test your system along the way using the Call Simulator.

See also:

IVM General Concepts
Introduction to IVR Systems
OGM Properties
Key Response Settings
Active Commands
Transferring Calls
Date-Time/CallerID Validity Checking
Plugins
Advanced OGM Options 


Web Site Installation
========================
You need a Hosting Server (Share/Dedicated) which has the following sofwatres;
1. Linux
2. Apache
3. MySQL
4. PHP

Create a Database
========================
Create a Database by name of "socialHackathon"
Import the SQL file given in DB folder.
Change the Database and Emails credentials in config.php file places in "connection" folder

