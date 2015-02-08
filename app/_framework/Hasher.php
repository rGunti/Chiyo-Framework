<?php

/*
 * ChiyoFramework
 * Hasher.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

/**
 * Description of Hasher
 *
 * @author Raphael
 */
class Hasher {
    /**
     * Hashes a string using a preconfigured seed (App Config) and returns it
     * @param String $input
     * @return String Hashed String
     */
    public static function hashString($input) {
        return sha1(AppConfig::APP_SECURE_HASH_SEED . $input);
    }
    
    /** 
     * Generates a new random password
     * @param Integer $length Length of the password
     */
    public static function generateNewRandomPassword($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
