<?php

/*
 * ChiyoFramework
 * NavigationPath.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

/**
 * NavigationPath
 *
 * @author Raphael
 */
class NavigationPath {
    private static function getCurrentPathAsString() { return (NavigationPath::isEmpty()) ? "/" : $_SERVER['PATH_INFO']; }
    /** Returns the current navigation path */
    public static function getCurrentPath() {
        if (NavigationPath::isEmpty()) { return "/"; }
        $path = "";
        foreach (NavigationPath::getPathElements() as $element) {
            $path .= "/" . $element;
        }
        return $path;
    }
    /** Returns an array of all path elements */
    public static function getPathElements() {
        $navEls = explode('/', NavigationPath::getCurrentPathAsString());
        array_shift($navEls);
        return array_filter($navEls);
    }
    /** Returns the last element of the path */
    public static function getLastPathElement() { 
        $els = NavigationPath::getPathElements();
        return $els[count($els) - 1];
    }
    /** Returns a boolean value if the variable for the navigation path is set */
    public static function isEmpty() { return !isset($_SERVER['PATH_INFO']); }
    /** 
     * Redirects to an other URL 
     * @param String $url Path to redirect
     */
    public static function redirect($url) {
        $url = Utils::getApplicationBasePath() . $url;
        header("Location: $url");
        exit();
    }
    /**
     * Checks if last element of navigation path is equal to give string
     * @param String $string
     * @return Boolean Last navigation path element is equal to $string
     */
    public static function lastPathElementIs($string) {
        return (NavigationPath::getLastPathElement() == $string);
    }
    /**
     * Checks if last element of navigation path contains a given string
     * @param String $substring
     * @return Boolean Last navigation path element contains $substring
     */
    public static function lastPathElementContains($substring) {
        return StringUtils::stringContains(NavigationPath::getLastPathElement(), $substring);
    }
}
