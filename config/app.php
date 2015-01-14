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
    const APP_COPYRIGHT = "© 2014, rGunti, Alle Rechte vorbehalten";
    
    // Log Configuration
    const APP_LOG_LOCATION = "C:/xampp/htdata/chiyo/chiyo.log";
    const APP_LOG_REQUEST = 1;
    const APP_LOG_DEBUG = 1;
    
    // Debug Configuration
    const APP_DEBUG_SHOW_NAVPATH = 1;
    const APP_DEBUG_SHOW_VERSION = 1;
    const APP_DEBUG_SHOW_FW_VERSION = 1;
    
    // Navigation Configuration
    const APP_NAV_DEFAULT_PAGE_SCRIPT = "_home.php";
}
