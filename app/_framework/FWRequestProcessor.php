<?php

/*
 * ChiyoFramework
 * FWRequestProcessor.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

session_start();

switch (NavigationPath::getCurrentPath()) {
    case '/Log/Clear.Action':
        Logger::clear();
        Messages::addMessage(new Notification(Text::SUCCESS_LOGCLEARED_TITLE, Text::SUCCESS_LOGCLEARED_MESSAGE));
        NavigationPath::redirect("/Log");
        break;
    case '/Login.Action':
        if (Authentification::login($_POST['username'], $_POST['password'])) {
            Logger::info("Login: " . Authentification::getStoredProperty("name"));
            NavigationPath::redirect("/");
        } else {
            NavigationPath::redirect("/Login");
        }
        break;
    case '/Logout':
        Logger::info("Logout: " . Authentification::getStoredProperty("name"));
        Authentification::logout();
        Messages::addMessage(new Notification(Text::SUCCESS_LOGOUT_TITLE, Text::SUCCESS_LOGOUT_MESSAGE));
        NavigationPath::redirect("/");
        break;
    case '/AboutMe/ChPasswd.Action':
        if ($_POST['nPassword'] == $_POST['cPassword'] 
                && Authentification::changePassword(
                        Hasher::hashString($_POST['oPassword']), 
                        Hasher::hashString($_POST['nPassword']), 
                        Hasher::hashString($_POST['cPassword']))) {
            Logger::info("User changed password: " . Authentification::getStoredProperty("name"));
            Messages::addMessage(new Notification(Text::SUCCESS_CHPASSWD_TITLE, Text::SUCCESS_CHPASSWD_MESSAGE));
            NavigationPath::redirect("/AboutMe");
        } else {
            Errors::addError(new Notification(Text::ERROR_CHPASSWD_TITLE, Text::ERROR_CHPASSWD_MESSAGE));
            NavigationPath::redirect("/AboutMe/ChPasswd");
        }
    case '/Admin/Users/Add.Action':
        $newName = strtolower($_POST['username']);
        $newRole = $_POST['role'];
        $newId = 0;
        if (Authentification::userExists($newName)) {
            Errors::addError(new Notification(Text::ERROR_ADDUSER_EXISTS_TITLE, Utils::getFormattedTranslationText(Text::ERROR_ADDUSER_EXISTS_MESSAGE, $newName)));
        } else {
            $newPass = Hasher::generateNewRandomPassword(8);
            $newId = Authentification::createUser($newName, Hasher::hashString($newPass), $newRole);
            if ($newId) {
                $newUser = Authentification::getUser($newId);
                Messages::addMessage(new Notification(Text::SUCCESS_ADDUSER_TITLE, 
                        Utils::getFormattedTranslationText(Text::SUCCESS_ADDUSER_MESSAGE, 
                                $newUser[ViewFieldConfig::USERS_NAME], 
                                $newUser[ViewFieldConfig::USERS_ROLE],
                                $newUser[ViewFieldConfig::USERS_NAME], 
                                $newPass)));
                Logger::info("New user has been created: " . $newName . ", Role: " . $newRole . ", Initial Password: " . $newPass);
            } else {
                Errors::addError(new Notification(Text::ERROR_ADDUSER_FAILED_TITLE, Text::ERROR_ADDUSER_FAILED_MESSAGE));
            }
        }
        NavigationPath::redirect("/Admin/Users");
        break;
    case '/Admin/Users/Delete.Action':
        if (!isset($_POST['userId'])) {
            Errors::addError(new Notification(Text::ERROR_DELUSER_FAILED_TITLE, Text::ERROR_DELUSER_FAILED_MESSAGE));
        } else if ($_POST['userId'] == Authentification::ADMIN_USERID) {
            Errors::addError(new Notification(Text::ERROR_DELUSER_ADMIN_TITLE, Text::ERROR_DELUSER_ADMIN_MESSAGE));
        } else if ($_POST['userId'] == Authentification::getStoredProperty('id')) {
            Errors::addError(new Notification(Text::ERROR_DELUSER_SELF_TITLE, Text::ERROR_DELUSER_SELF_MESSAGE));
        } else {
            $delUser = Authentification::deleteUser($_POST['userId']);
            if ($delUser['deleted']) {
                Messages::addMessage(new Notification(Text::SUCCESS_DELUSER_TITLE, 
                                Utils::getFormattedTranslationText(Text::SUCCESS_DELUSER_MESSAGE, 
                                        $delUser[ViewFieldConfig::USERS_NAME], 
                                        $delUser[ViewFieldConfig::USERS_ROLE])));
                Logger::info("User deleted: " . $delUser[ViewFieldConfig::USERS_NAME] . ", Role: " . $delUser[ViewFieldConfig::USERS_ROLE]);
            } else {
                Errors::addError(new Notification(Text::ERROR_DELUSER_FAILED_TITLE, 
                                Utils::getFormattedTranslationText(Text::ERROR_DELUSER_FAILED_MESSAGE, 
                                        $delUser[ViewFieldConfig::USERS_NAME],
                                        $delUser[ViewFieldConfig::USERS_ROLE])));
            }
        }
        NavigationPath::redirect("/Admin/Users");
        break;
    case '/Admin/Users/Reset.Action':
        if (!isset($_POST['userId'])) {
            Errors::addError(new Notification(Text::ERROR_RESETUSER_FAILED_TITLE, Text::ERROR_RESETUSER_FAILED_MESSAGE));
        } else if ($_POST['userId'] == Authentification::getStoredProperty('id')) {
            Errors::addError(new Notification(Text::ERROR_RESETUSER_SELF_TITLE, Text::ERROR_RESETUSER_SELF_MESSAGE));
        } else {
            $resetUser = Authentification::getUser($_POST['userId']);
            $newPass = Authentification::resetUserPassword($resetUser[ViewFieldConfig::USERS_ID]);
            if (!$newPass) {
                Errors::addError(new Notification(Text::ERROR_RESETUSER_FAILED_TITLE, 
                                Utils::getFormattedTranslationText(Text::ERROR_RESETUSER_FAILED_MESSAGE, 
                                        $resetUser[ViewFieldConfig::USERS_NAME],
                                        $resetUser[ViewFieldConfig::USERS_ROLE])));
            } else {
                Messages::addMessage(new Notification(Text::SUCCESS_RESETUSER_TITLE, 
                        Utils::getFormattedTranslationText(Text::SUCCESS_RESETUSER_MESSAGE, 
                                $resetUser[ViewFieldConfig::USERS_NAME], 
                                $resetUser[ViewFieldConfig::USERS_ROLE],
                                $resetUser[ViewFieldConfig::USERS_NAME], 
                                $newPass)));
                Logger::info("User password reset: " . $resetUser[ViewFieldConfig::USERS_NAME] . ", Role: " . $resetUser[ViewFieldConfig::USERS_ROLE]);
            }
        }
        NavigationPath::redirect("/Admin/Users");
        break;
    default: break;
}
