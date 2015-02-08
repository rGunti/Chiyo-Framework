<?php

/*
 * ChiyoFramework
 * Logger.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

/**
 * Logger
 *
 * @author Raphael
 */
class Logger {

    const LOG_PREFIX_DEBUG = "DEBUG";
    const LOG_PREFIX_INFO = "INFO ";
    const LOG_PREFIX_WARN = "WARN ";
    const LOG_PREFIX_ERROR = "ERROR";
    const LOG_PREFIX_FATAL = "FATAL";

    /** Checks, if the log exists */
    public static function logExists() {
        return file_exists(AppConfig::APP_LOG_LOCATION);
    }

    /** Initializes Log */
    public static function initLog() {
        if (!Logger::logExists()) {
            fopen(AppConfig::APP_LOG_LOCATION, "w");
            Logger::info("New log created at " . AppConfig::APP_LOG_LOCATION);
        }
    }

    /** Add line to log */
    private static function log($status, $string) {
        Logger::initLog();
        $string = DateTimeUtils::getLogTimestamp() . " [" . $status . "] " . $string . "\n";
        file_put_contents(AppConfig::APP_LOG_LOCATION, $string, FILE_APPEND);
    }

    /** Add debug line */
    public static function debug($string) {
        if (AppConfig::APP_LOG_DEBUG) {
            Logger::log(Logger::LOG_PREFIX_DEBUG, $string);
        }
    }

    public static function info($string) {
        if (AppConfig::APP_LOG_INFO) {
            Logger::log(Logger::LOG_PREFIX_INFO, $string);
        }
    }

    public static function warn($string) {
        if (AppConfig::APP_LOG_WARN) {
            Logger::log(Logger::LOG_PREFIX_WARN, $string);
        }
    }

    public static function error($string) {
        if (AppConfig::APP_LOG_ERROR) {
            Logger::log(Logger::LOG_PREFIX_ERROR, $string);
        }
    }

    public static function fatal($string) {
        if (AppConfig::APP_LOG_FATAL) {
            Logger::log(Logger::LOG_PREFIX_FATAL, $string);
        }
    }

    public static function printLog() {
        $log = file(AppConfig::APP_LOG_LOCATION);
        $log = array_reverse($log);
        foreach ($log as $line) {
            echo $line;
        }
    }

    public static function clear() {
        unlink(AppConfig::APP_LOG_LOCATION);
        Logger::initLog();
    }

}
