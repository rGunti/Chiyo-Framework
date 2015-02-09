<?php

/*
 * ChiyoFramework
 * Text.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

/**
 * Texts to display
 *
 * @author Raphael
 */
class Text {
    // Navigation Elements
    const NAV_HOME = "Home";
    const NAV_USER = "User";
    const NAV_ADMINCONSOLE = "Admin Console";
    const NAV_LOGIN = "Login";
    const NAV_LOGOUT = "Logout";
    const NAV_LOG = "Log";
    const NAV_UPLOAD = "File Upload";
    const NAV_HELP = "Help";
    const NAV_ABOUT = "About this application";
    
    // Screen Titles
    const SCR_USERLIST = "Manage Users";
    const SCR_USER = "About Me (%s)";
    const SCR_CHPASSWD = "Change Password";
    const SCR_ADD_USER = "Add User";
    const SCR_EDIT_USER = "Edit User";
    const SCR_DELETE_USER = "Delete User";
    const SCR_RESET_USER = "Reset User Password";
    
    // Screen Texts
    const SCT_USER_USERNAME = "Username";
    
    // Table Headers
    const TH_GENERAL_FUNCTIONS = "Functions";    
    const TH_USERLIST_ID = "ID";
    const TH_USERLIST_NAME = "Username";
    const TH_USERLIST_GROUP = "Group";
    
    // Table Footer
    const TF_GENERAL_ENTRIES = "Entries: ";
    
    // Form Text
    const FORM_LOGIN_USERNAME = "Username";
    const FORM_LOGIN_PASSWORD = "Password";
    const FORM_ADDUSER_USERNAME = "Username";
    const FORM_ADDUSER_ROLE = "Role";
    const FORM_UPLOAD_FILE = "Select File To Upload";
    
    // Confirm Questions
    const CONFIRM_DELETEUSER = "Would you like to delete <b>%s</b> (<i>%s</i>)?";
    const CONFIRM_RESETUSER = "Would you like to reset <b>%s</b>'s (<i>%s</i>) password?";
    
    // Texts
    const TEXT_FILEUPLOAD = "Upload a file here:";
    
    // Button Text
    const BUTTON_YES = "Yes";
    const BUTTON_NO = "No";
    const BUTTON_CANCEL = "Cancel";
    const BUTTON_CLEARLOG = "Clear Log";
    const BUTTON_SAVE = "Save";
    const BUTTON_CREATE = "Create";
    const BUTTON_UPLOAD = "Upload";
    
    // Error Messages
    const ERROR_NOTIMPLEMENTED_TITLE = "This function has not yet been implemented!";
    const ERROR_MISSINGPAGE_TITLE = "Missing Page File";
    const ERROR_MISSINGPAGE_MESSAGE = "The following file could not be found: %s";
    const ERROR_403_TITLE = "403 Access denied";
    const ERROR_403_MESSAGE = "Sorry, but the requested page is not available for you!";
    const ERROR_404_TITLE = "404 Page Not Found";
    const ERROR_404_MESSAGE = "Sorry, but the requested page could not be found!";
    const ERROR_LOGIN_TITLE = "Login has failed";
    const ERROR_LOGIN_MESSAGE = "You may have entered a wrong username or password. Please check your entry and try again.";
    const ERROR_CHPASSWD_TITLE = "Password could not be changed";
    const ERROR_CHPASSWD_MESSAGE = "Please verify your entry and try again.";
    const ERROR_ADDUSER_EXISTS_TITLE = "User cannot be created";
    const ERROR_ADDUSER_EXISTS_MESSAGE = "A user with the name %s already exists.";
    const ERROR_ADDUSER_FAILED_TITLE = "User could not be created";
    const ERROR_ADDUSER_FAILED_MESSAGE = "Something went wrong while trying to create your new user.";
    const ERROR_EDITUSER_ADMIN_TITLE = "User cannot be edited";
    const ERROR_EDITUSER_ADMIN_MESSAGE = "This user cannot be edited because it is the default Admin user.";
    const ERROR_EDITUSER_FAILED_TITLE = "User could not be edited";
    const ERROR_EDITUSER_FAILED_MESSAGE = "Something went wrong while trying to edit the user.";
    const ERROR_DELUSER_ADMIN_TITLE = "User cannot be deleted";
    const ERROR_DELUSER_ADMIN_MESSAGE = "This user cannot be deleted because it is the default Admin user.";
    const ERROR_DELUSER_SELF_TITLE = "User cannot be deleted";
    const ERROR_DELUSER_SELF_MESSAGE = "You cannot delete yourself while logged in.";
    const ERROR_DELUSER_FAILED_TITLE = "User could not be deleted";
    const ERROR_DELUSER_FAILED_MESSAGE = "Something went wrong while trying to delete the user %s (%s).";
    const ERROR_RESETUSER_SELF_TITLE = "Password cannot be reset";
    const ERROR_RESETUSER_SELF_MESSAGE = "You cannot reset your own password. Please change your password in the User Menu or ask an Administrator to reset your password.";
    const ERROR_RESETUSER_FAILED_TITLE = "Password could not be reset";
    const ERROR_RESETUSER_FAILED_MESSAGE = "Something went wrong while trying to reset the password of %s (%s).";
    const ERROR_UPLOAD_DISABLED_TITLE = "File Upload disabled";
    const ERROR_UPLOAD_DISABLED_MESSAGE = "You cannot upload a file, because file uploads have been disabled. Please contact your application administrator for help.";
    const ERROR_UPLOAD_PHPINIMAX_TITLE = "Upload Quota larger than allowed by server";
    const ERROR_UPLOAD_PHPINIMAX_MESSAGE = "Your configured maxium file upload size is larger than the server allowes. Please check php.ini for more details.";
    const ERROR_UPLOAD_TOOLARGE_TITLE = "Uploaded File is too large";
    const ERROR_UPLOAD_TOOLARGE_MESSAGE = "Your file is larger than %s (your file is %s) and cannot be accepted.";
    const ERROR_UPLOAD_TYPENOTALLOWED_TITLE = "Uploaded File type is not allowed";
    const ERROR_UPLOAD_TYPENOTALLOWED_MESSAGE = "Your file is <b>%s</b>, allowed file types are: %s";
    const ERROR_UPLOAD_UNKNOWNERROR_TITLE = "File Upload triggered an unknown error";
    const ERROR_UPLOAD_UNKNOWNERROR_MESSAGE = "%s<br>Please report this to the application administrator or the developer.";
    
    // Success Messages
    const SUCCESS_LOGIN_TITLE = "Welcome, %s";
    const SUCCESS_LOGIN_MESSAGE = "Login has been successful.";
    const SUCCESS_LOGOUT_TITLE = "Logged out";
    const SUCCESS_LOGOUT_MESSAGE = "You have been logout.";
    const SUCCESS_CHPASSWD_TITLE = "Password changed";
    const SUCCESS_CHPASSWD_MESSAGE = "Your password has been changed successfully.";
    const SUCCESS_LOGCLEARED_TITLE = "Log cleared";
    const SUCCESS_LOGCLEARED_MESSAGE = "Your log has been cleared successfully.";
    const SUCCESS_ADDUSER_TITLE = "User added";
    const SUCCESS_ADDUSER_MESSAGE = "User <b>%s</b> (%s) has been added successfully.<br>%s's new password is: <pre>%s</pre>";
    const SUCCESS_EDITUSER_TITLE = "User edited";
    const SUCCESS_EDITUSER_MESSAGE = "User <b>%s</b> (New Role: %s) has been edited successfully.";
    const SUCCESS_DELUSER_TITLE = "User deleted";
    const SUCCESS_DELUSER_MESSAGE = "User <b>%s</b> (%s) was deleted successfully.";
    const SUCCESS_RESETUSER_TITLE = "Password reset";
    const SUCCESS_RESETUSER_MESSAGE = "User <b>%s</b>'s (%s) password has been reset.<br>%s's new password is: <pre>%s</pre>";
    const SUCCESS_UPLOAD_TITLE = "File uploaded";
    const SUCCESS_UPLOAD_MESSAGE = "Your file (%s, %s) has been uploaded successfully. You can download it here: %s";
}
