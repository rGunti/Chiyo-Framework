<?php

/*
 * ChiyoFramework
 * DateTimeUtils.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

/**
 * DateTime Utilities
 *
 * @author Raphael
 */
class DateTimeUtils {
    /** Returns a timestamp suitable for Logs */
    public static function getLogTimestamp() {
        list($usec, $sec) = explode(' ', microtime());
        $usec = str_replace("0.", ".", $usec);
        
        return date('Y-m-d H:i:s', $sec).$usec;
    }
    
    /** Returns a timestamp suitable for File Names */
    public static function getFileNameTimestamp() {
        list($usec, $sec) = explode(' ', microtime());
        $usec = str_replace("0.", "", $usec);
        
        return date('Ymd_His', $sec).$usec;
    }
}
