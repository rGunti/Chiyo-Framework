<?php

/*
 * ChiyoFramework
 * FileUpload.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

/**
 * Provides functions for File Uploads
 *
 * @author Raphael
 */
class FileUpload {
    
    /**
     * Checks, if file uploads are enabled by AppConfig.
     * If not, an error message will be created and a redirect to /403 will be initiated.
     */
    public static function enforceEnabledFileUpload() {
        if (!AppConfig::APP_UPLOAD_ENABLED) {
            Errors::addError(new Notification(Text::ERROR_UPLOAD_DISABLED_TITLE, Text::ERROR_UPLOAD_DISABLED_MESSAGE));
            NavigationPath::redirect("/403");
        }
    }
    
    /**
     * Checks, if the uploaded file has an extenstion, that is allowed (given through an array of file extenstion as parameter)
     * If the parameter for allowed files is an empty array, the function will always return TRUE.
     * @param Object $file Form POST Object
     * @param Array $allowed Array of allowed file extensions (all extensions MUST be lowercase)
     * @return boolean
     */
    public static function isAllowedFileExtension($file, $allowed = Array()) {
        if (count($allowed) > 0) {
            if (AppConfig::APP_UPLOAD_CHECKMIME) {
                return in_array(strtolower(FileUpload::getFileMimeType($file)), $allowed);
            } else {
                return in_array(strtolower(FileUpload::getFileExtension($file)), $allowed);
            }
        } else {
            return true;
        }
    }
    
    /** Returns the size of the uploaded file (provided by given object) */
    public static function getFileSize($file) {
        return $file["size"];
    }
    
    /** Returns the name of the uploaded file (provided by given object) */
    public static function getFileName($file) {
        return $file["name"];
    }
    
    /** Returns the extenstion of the uploaded file (provided by given object) */
    public static function getFileExtension($file) {
        return pathinfo($file["name"], PATHINFO_EXTENSION);
    }
    
    /** Returns the MIME type of the uploaded file (provided by given object) */
    public static function getFileMimeType($file) {
        return $file["type"];
    }
    
    /** Returns the temporary name of the uploaded file (provided by given object) */
    public static function getFileTempFile($file) {
        return $file["tmp_name"];
    }
    
    public static function getAllowedFileTypesAsString() {
        $string = "";
        foreach (AppConfig::APP_UPLOAD_ALLOWEDTYPES as $type) {
            $string .= "$type ";
        }
        return $string;
    }
    
    /** 
     * Moves the uploaded file to the configured directory and returns its new generated name.
     * If the process failed, FALSE will be returned.
     */
    public static function storeUploadedFile($file) {
        $source = FileUpload::getFileTempFile($file);
        $newFileName = DateTimeUtils::getFileNameTimestamp() . (AppConfig::APP_UPLOAD_KEEPORIGINALNAME ? "_" . FileUpload::getFileName($file) : "." . FileUpload::getFileExtension($file));
        $destination = AppConfig::APP_UPLOAD_STORAGE . "/" . $newFileName;
        if (move_uploaded_file($source, $destination)) {
            return $newFileName;
        } else {
            return false;
        }
    }
    
    /**
     * Checks, if the uploaded file is larger than allowed by AppConfig and php.ini (upload_max_filesize).
     * If no quota has been set, the function will compare the file size with the one configured in php.ini.
     * If the given quota is larger than the one configured in php.ini, an error message will be generated.
     * @param Object $file Form POST Object
     * @param Integer $quota Max. File Size in Bytes
     * @return boolean
     */
    public static function isLargerThanAllowed($file, $quota = -1) {
        $phpIniMaxSize = FileUpload::returnBytes(ini_get("upload_max_filesize"));
        $uploadedSize = FileUpload::getFileSize($file);
        if ($quota > $phpIniMaxSize) {
            Errors::addError(new Notification(Text::ERROR_UPLOAD_PHPINIMAX_TITLE, Text::ERROR_UPLOAD_PHPINIMAX_MESSAGE));
        }
        if ($quota < 0) { $quota = $phpIniMaxSize; }
        return ($uploadedSize > $quota || $uploadedSize > $phpIniMaxSize);
    }
    
    /**
     * Source: http://php.net/manual/en/function.ini-get.php
     */
    private static function returnBytes($val) {
        $val = trim($val);
        $last = strtolower($val[strlen($val)-1]);
        switch($last) {
            // The 'G' modifier is available since PHP 5.1.0
            case 'g':
                $val *= 1024;
            case 'm':
                $val *= 1024;
            case 'k':
                $val *= 1024;
        }

        return $val;
    }
    
    /**
     * Takes a file size in bytes and makes it human readable by converting it to kB, MB or GB, if large enough.
     * If the value passed is not numeric, the function will return "N/A"
     * @param Numeric $input
     * @return string
     */
    public static function convertFileSizeToReadable($input) {
        if (!is_numeric($input)) { return "N/A"; }
        if ($input < 1024) {
            return "$input B";
        } else if ($input < 1048576) {
            return round($input / 1024) . " kB";
        } else if ($input < 1073741824) {
            return round($input / 1048576) . " MB";
        } else {
            return round($input / 1073741824) . " GB";
        }
    }
}
