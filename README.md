This is a dynamic block with information about the course faculty.
(c) 2013, Thunderbird School of Global Management
Written by Johan Reinalda,  johan dot reinalda at thunderbird dot edu

DESCRIPTION:
This is a simple HTML Block that creates dynamic data about the course faculty,
and some dynamic links to faculty bio's etc.

NOTE:
This block is tested in Moodle v2.3+ only!

INSTALLATION:
Unzip these files to the appropriate directories under your Moodle install <blocks> folder
(If you get this from github.com, the path should be <html>/blocks/faculty_tbird/

Then as Moodle admin, go to the Notifications entry of your Admin block.
The block should be found and added to the list of available block.

During installation, 4 custom user profile fields are added to Moodle.
These fields are initially only visible to admins and users with site-level permissions to the profile.
You can change visibility of these fields through the usual means (Site admin => Users => Accounts => User Profile fields).

New User Profile Fields are:
officetbird - office location
officehourstbird - office hours
facultyheadertbird - header/title/saluation as shown on Faculty Contact block
biourltbird - a link to an external faculty biography page or document.


USAGE:
* enable the block in Site Admin => Modules => Blocks => Manage Block; click on the closed eye.

* next, configure it. Click on the Settings link behind the block.go to Site Admin => Modules => Blocks
  Settings:
  -set the default title for the each block instance
  -what roles to show as faculty in this block
  -if the block title can be changed in each instance or not
  -if custom contact can be added to each block, below the auto-generated faculty contact text
  -set global footer text to be added at the bottom of each block instance

* add to a course as usual.

AUTOMATING INPUT / UPDATING OF THESE NEW PROFILE FIELDS:
The moodle 'Site Admin -> Users -> Accounts -> Upload users' functionality can be used to upload a CSV file with
the profile data in it. Upload a CSV file of the following format, with this header line, and line for each
faculty or moodle user you want to add or modify the new fields for:

username,firstname,lastname,email,profile_field_facultyheadertbird,profile_field_officetbird,profile_field_officehourstbird,profile_field_biourltbird
johanr,Johan,Reinalda,user@emailaddress.com,Asst. Prof. Reinalda,My Building Rm X,MWF 1-2PM,http://www.thunderbird.edu/bio/reinalda

Note that the fields "username,firstname,lastname,email" are required by Moodle.
The other fields map to the specific new profile fields that are added by this block.
Make sure you select the proper settings for your environment when uploading the csv
(specifically, look at 'Upload type", and "Select for bulk user actions = Yes") 
See also the sample CSV file in the "docs" directory/

OUTPUT:

This block will show the following for each 'Faculty' member of a course.
(Faculty is defined in the block system settings. Default is the 'teacher' role,
 but you can add more as needed.)

     Profile Photo (if available)
     Faculty Title  (if set in new user property 'Faculty Header')  or 'Firstname Lastname'
     Office Location (if set in new user property)
     Office Hours (if set in new user property)
     Phone  (phone1 field from profile)
     Email  (email field from profile)
     Skype  (skype field from profile, if not hidden field)
     Biography link (if set in new user property, linked to a new page showing external info about faculty.)
     
If allowed in the block system settings, this can be followed by some per-course additional information.
Edit the block in the course, and add your info as needed (Eg. Teaching Assistant info). There will be an
automatic <hr/> element between the auto faculty info, and this custom info.

Finally, the global footer as defined in the block system settings will be added to the bottom.
(Being global, this will be at the bottom of each block instance!)


WHERE TO FIND THE BLOCK:

On the Moodle plugin site, or at GitHub at
https://github.com/johanreinalda/moodle-block_faculty_tbird

VERSION CHANGES:

2013090900 - Initial version

REMOVAL:
Upon removal, this block DOES NOT REMOVE the created custom profile fields !
If desired, you will have to do this by hand from Site admin => Users => Accounts => User Profile fields.
Upon reinstall, it will find the existance of previously installed custom fields, and reuse them.
