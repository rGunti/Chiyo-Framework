<?php

/*
 * ChiyoFramework
 * FileDownload.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

/**
 * Description of FileDownload
 *
 * @author Raphael
 */
class FileDownload {
    private static function getSecureFileName($input) {
        return pathinfo($input)['basename'];
    }
    
    private static function getCompletePath($input) {
        return AppConfig::APP_UPLOAD_STORAGE . "/" . FileDownload::getSecureFileName($input);
    }
    
    public static function provideFile($filename, $forceDownload = FALSE) {
        Utils::clearPageContent();
        $path = FileDownload::getCompletePath($filename);
        
        if ($fd = fopen($path, "r")) {
            $fsize = FileDownload::getSizeOfFile($filename);
            header("Content-Type: " . FileDownload::getMimeTypeOfFile($filename));
            header("Content-Length: " . FileDownload::getSizeOfFile($filename));
            if ($forceDownload) {
                header("Content-Disposition: attachment; filename=\"" . FileDownload::getSecureFileName($filename) . "\"");
            }
            header("Cache-control: private");
            while (!feof($fd)) {
                $buffer = fread($fd, 4096);
                echo $buffer;
            }
        }
        fclose($fd);
        exit;
    }
    
    public static function getMimeTypeOfFile($filename) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, FileDownload::getCompletePath($filename));
        finfo_close($finfo);
        return $mime;
    }
    
    public static function getSizeOfFile($filename) {
        return filesize(FileDownload::getCompletePath($filename));
    }
}
