<?php

/*
 * ChiyoFramework
 * StringUtils.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

/**
 * String Utilities
 *
 * @author Raphael
 */
class StringUtils {
    /** Replaces substring in string */
    public static function replaceString($string, $search, $replace) {
        return str_replace($search, $replace, $string);
    }
    /** Checks if string contains given substring */
    public static function stringContains($string, $search) {
        return (strpos($string, $search) !== false);
    }
}
