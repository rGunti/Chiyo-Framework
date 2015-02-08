<?php

/*
 * ChiyoFramework
 * Authentification.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

/**
 * Description of Authentification
 *
 * @author Raphael
 */
class Authentification {
    const ADMIN_USERID = 1;
    
    /**
     * Checks, if the entered login data is correct
     * @param String $user Username
     * @param String $hash Hash of Password
     * @return array User data or FALSE
     */
    public static function checkLoginCredentials($user, $hash) {
        $db = MySQLUtils::getNewConnector();
        $db->where(FieldConfig::USERS_NAME, $user);
        $db->where(FieldConfig::USERS_HASH, strtolower($hash));
        $userData = $db->get(TableConfig::TABLE_USERS);
        if ($db->count == 1) {
            return $userData;
        } else {
            return false;
        }
    }
    
    /**
     * Does the login procedure
     * @param type $user
     * @param type $pass
     */
    public static function login($user, $pass) {
        $userData = Authentification::checkLoginCredentials($user, Hasher::hashString($pass));
        if ($userData == NULL) {
            Errors::addError(new Notification(Text::ERROR_LOGIN_TITLE, Text::ERROR_LOGIN_MESSAGE));
            return false;
        } else {
            $_SESSION['userinfo']['id'] = $userData[0][FieldConfig::USERS_ID];
            $_SESSION['userinfo']['name'] = $userData[0][FieldConfig::USERS_NAME];
            $_SESSION['userinfo']['role'] = $userData[0][FieldConfig::USERS_ROLE];
            Messages::addMessage(new Notification(sprintf(Text::SUCCESS_LOGIN_TITLE, $_SESSION['userinfo']['name']), Text::SUCCESS_LOGIN_MESSAGE));
            return true;
        }
    }
    
    /**
     * Does the logout procedure
     */
    public static function logout() {
        unset($_SESSION['userinfo']);
    }
    
    /**
     * Checks, if user is logged in
     */
    public static function isLoggedIn() {
        return isset($_SESSION['userinfo']);
    }
    
    /**
     * Gets a property from session storage
     */
    public static function getStoredProperty($key) {
        if (isset($_SESSION['userinfo'])) {
            return $_SESSION['userinfo'][$key];
        } else {
            return "";
        }
    }
    
    public static function enforceLoggedIn() {
        if (!Authentification::isLoggedIn()) {
            NavigationPath::redirect("/403");
        }
    }
    
    public static function enforceRole($roleId) {
        Authentification::enforceLoggedIn();
        if (Authentification::getStoredProperty('role') != $roleId) {
            Logger::log("WARN ", "User " . Authentification::getStoredProperty('name') . " tried to access path with group '" . 
                    Authentification::getStoredProperty('role') . "' (required: '" . $roleId . "')");
            NavigationPath::redirect("/403");
        }
    }

    public static function changePassword($old, $new) {
        Authentification::enforceLoggedIn();
        $db = MySQLUtils::getNewConnector();
        $db->where(FieldConfig::USERS_NAME, Authentification::getStoredProperty("name"));
        $db->where(FieldConfig::USERS_HASH, strtolower($old));
        $db->get(TableConfig::TABLE_USERS);
        if ($db->count == 1) {
            $db->where(FieldConfig::USERS_NAME, Authentification::getStoredProperty("name"));
            if ($db->update(TableConfig::TABLE_USERS, array(FieldConfig::USERS_HASH => $new))) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public static function resetUserPassword($userId) {
        Authentification::enforceRole(RoleConfig::ROLEID_ADMIN);
        $newPass = Hasher::generateNewRandomPassword(8);
        
        $db = MySQLUtils::getNewConnector();
        $db->where(FieldConfig::USERS_ID, $userId);
        $db->get(TableConfig::TABLE_USERS);
        if ($db->count == 1) {
            $db->where(FieldConfig::USERS_ID, $userId);
            if ($db->update(TableConfig::TABLE_USERS, array(FieldConfig::USERS_HASH => Hasher::hashString($newPass)))) {
                return $newPass;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public static function getUserList() {
        Authentification::enforceLoggedIn();
        $db = MySQLUtils::getNewConnector();
        return $db->get(ViewConfig::VIEW_USERS);
    }
    
    public static function getUser($id) {
        Authentification::enforceLoggedIn();
        $db = MySQLUtils::getNewConnector();
        $db->where(ViewFieldConfig::USERS_ID, $id);
        return $db->getOne(ViewConfig::VIEW_USERS);
    }
    
    public static function deleteUser($id) {
        Authentification::enforceRole(RoleConfig::ROLEID_ADMIN);
        $delUser = Authentification::getUser($id);
        $db = MySQLUtils::getNewConnector();
        $db->where(FieldConfig::USERS_ID, $delUser[ViewFieldConfig::USERS_ID]);
        $delUser['deleted'] = $db->delete(TableConfig::TABLE_USERS);
        return $delUser;
    }
    
    public static function getRoles() {
        Authentification::enforceLoggedIn();
        $db = MySQLUtils::getNewConnector();
        return $db->get(TableConfig::TABLE_ROLES);
    }
    
    public static function userExists($name) {
        Authentification::enforceRole(RoleConfig::ROLEID_ADMIN);
        $db = MySQLUtils::getNewConnector();
        $db->where(FieldConfig::USERS_NAME, $name);
        $db->get(TableConfig::TABLE_USERS);
        return ($db->count > 0);
    }
    
    public static function createUser($name, $hash, $role) {
        Authentification::enforceRole(RoleConfig::ROLEID_ADMIN);
        $user = array(
            FieldConfig::USERS_NAME => $name,
            FieldConfig::USERS_HASH => $hash,
            FieldConfig::USERS_ROLE => $role
        );
        $db = MySQLUtils::getNewConnector();
        return $db->insert(TableConfig::TABLE_USERS, $user);
    }

    /**
     * DEBUG FUNCTION: Prints out all user info, if user is logged in
     */
    public static function debugUserInfo() {
        echo "<pre>";
        if (isset($_SESSION['userinfo'])) { print_r($_SESSION['userinfo']); }
        else { echo "No User Info Available"; }
        echo "</pre>";
    }
}
