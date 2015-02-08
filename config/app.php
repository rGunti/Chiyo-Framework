<?php

/*
 * ChiyoFramework
 * app.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

/**
 * App Configuration
 */
class AppConfig {
    // Basic Configuration
    const APP_TITLE = "Chiyo Framework Test";
    const APP_COPYRIGHT = "© 2015, rGunti, All Rights Reserved";
    
    // Log Configuration
    const APP_LOG_LOCATION = "C:/xampp/htdata/chiyo/chiyo.log";
    const APP_LOG_VISIBLE = 1;
    const APP_LOG_REQUEST = 1;
    const APP_LOG_DEBUG = 0;
    const APP_LOG_INFO = 1;
    const APP_LOG_WARN = 1;
    const APP_LOG_ERROR = 1;
    const APP_LOG_FATAL = 1;
    
    // Debug Configuration
    const APP_DEBUG_SHOW_NAVPATH = 0;
    const APP_DEBUG_SHOW_VERSION = 1;
    const APP_DEBUG_SHOW_FW_VERSION = 1;
    
    // Navigation Configuration
    const APP_NAV_DEFAULT_PAGE_SCRIPT = "_home.php";
    
    // Notification Configuration
    const APP_NOTIFICATION_AUTO_DISMISS_MESSAGES = 0;
    const APP_NOTIFICATION_AUTO_DISMISS_MESSAGES_TIMEOUT = 3000;
    const APP_NOTIFICATION_AUTO_DISMISS_ERRORS = 0;
    const APP_NOTIFICATION_AUTO_DISMISS_ERRORS_TIMEOUT = 0;
    
    // Security Configuration
    const APP_SECURE_HASH_SEED = "BPKeL*Eh@qtpA4t";
}

class RoleConfig {
    const ROLEID_ADMIN = 1;
    const ROLEID_DEFAULT = 2;
}
