<?php

/*
 * ChiyoFramework
 * HtmlUtils.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

/**
 * @author Raphael
 */
class HtmlUtils {
    public static function getLink($path, $body, $altText = NULL, $block = FALSE) {
        $content = "<a href='" . Utils::getApplicationBasePath() . (substr($path, 0, 1) == "/" ? "" : NavigationPath::getCurrentPath() . "/") . $path . "'";
        if ($block == TRUE) { $content .= " class='blockLink'"; }
        if (isset($altText)) {
            $content .= " title='$altText'";
        }
        $content .= ">";
        $content .= $body;
        $content .= "</a>";
        return $content;
    }
    
    public static function getImage($path) {
        return "<img src='" . Utils::getApplicationBasePath() . "/img/" . $path . "'>";
    }
    
    public static function getLinkButton($path, $title) {
        $content = "<input type=\"button\"";
        $content .= " value=\"$title\"";
        $content .= " onclick=\"";
        $content .= "redirectToUrl('" . Utils::getApplicationBasePath() . NavigationPath::getCurrentPath() . "/" . $path . "');";
        $content .= " \">";
        return $content;
    }
}
