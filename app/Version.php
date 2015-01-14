<?php

/* 
 * ChiyoFramework
 * Version.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

/**
 * Description of Version
 *
 * @author Raphael
 */
class AppVersion {
    const VERSION = "0.1";
    
    /** Returns a version string for a footer line based on the configuration */
    public static function getFooterVersion() {
        $output = "";
        if (!(AppConfig::APP_DEBUG_SHOW_VERSION || AppConfig::APP_DEBUG_SHOW_FW_VERSION)) { return $output; }
        $output .= " (";
        if (AppConfig::APP_DEBUG_SHOW_VERSION) { $output .= "Ver. " . AppVersion::VERSION . ((AppConfig::APP_DEBUG_SHOW_FW_VERSION) ? ", " : ""); }
        if (AppConfig::APP_DEBUG_SHOW_FW_VERSION) { $output .= "Fw. " . FrameworkVersion::VERSION; }
        $output .= ")";
        return $output;
    }
}
