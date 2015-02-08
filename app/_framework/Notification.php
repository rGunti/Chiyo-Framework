<?php

/*
 * ChiyoFramework
 * Notification.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

/**
 * Description of Notification
 *
 * @author Raphael
 */
class Notification {
    public $Title;
    public $Message;
    
    /**
     * Constructor for Notification
     * @param String $title Title
     * @param String $message Message
     */
    public function __construct($title, $message) {
        $this->Title = $title;
        $this->Message = $message;
        return $this;
    }
}

class Messages {
    public static function addMessage($message) {
        $_SESSION['messages'][] = $message;
    }
    public static function getAllMessages() {
        return $_SESSION['messages'];
    }
    public static function count() {
        if (isset($_SESSION['messages'])) { return count($_SESSION['messages']); }
        else { return 0; }
    }
    public static function clear() {
        unset($_SESSION['messages']);
    }
}

class Errors {
    public static function addError($message) {
        $_SESSION['errors'][] = $message;
    }
    public static function getAllErrors() {
        return $_SESSION['errors'];
    }
    public static function count() {
        if (isset($_SESSION['errors'])) { return count($_SESSION['errors']); }
        else { return 0; }
    }
    public static function clear() {
        unset($_SESSION['errors']);
    }
}
