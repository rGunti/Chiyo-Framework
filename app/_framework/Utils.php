<?php

/*
 * ChiyoFramework
 * Utils.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

/**
 * Misc. Utilities
 *
 * @author Raphael
 */
class Utils {
    /** Returns the applications base path. This path can be used for HTTP-Links or simular */
    public static function getApplicationBasePath() { return str_replace(Utils::getServerDocumentRoot(), "", Utils::getServerBasePath()); }
    /** Returns the applications server base path */
    public static function getServerBasePath() { return str_replace("\\", "/", CONST_APP_ROOT); }
    /** Returns the servers document root */
    public static function getServerDocumentRoot() { return @$_SERVER['CONTEXT_DOCUMENT_ROOT']; }
    /** Processes the page content */
    public static function processPageContent($pageTitle) {
        $pageContent = ob_get_clean();
        $pageContent = StringUtils::replaceString($pageContent, PAGE_TITLE_INDICATOR, $pageTitle);
        echo $pageContent;
    }
    /** Clears the page buffer */
    public static function clearPageContent() {
        ob_get_clean();
    }
    /** Returns a formatted translation text */
    public static function getFormattedTranslationText($translation, $param1, $param2 = NULL, $param3 = NULL, $param4 = NULL) {
        return sprintf($translation, $param1, $param2, $param3, $param4);
    }
}
