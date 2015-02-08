<?php

/* 
 * ChiyoFramework
 * FWNavigationProcessor.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

Logger::debug("Requested Path: " . NavigationPath::getCurrentPath());

$pageSource = "";

switch (NavigationPath::getCurrentPath()) {
    case '/' : $pageSource = Utils::getServerBasePath() . '/page/' . AppConfig::APP_NAV_DEFAULT_PAGE_SCRIPT; break;
    case '/Home': $pageSource = Utils::getServerBasePath() . '/page/_home.php'; break;
    case '/Log': $pageSource = Utils::getServerBasePath() . '/page/_log.php'; break;
    case '/Info': $pageSource = Utils::getServerBasePath() . '/page/_info.php'; break;
    case '/Login': $pageSource = Utils::getServerBasePath() . '/page/_login.php'; break;
    case '/AboutMe': $pageSource = Utils::getServerBasePath() . '/page/_aboutMe.php'; break;
    case '/AboutMe/ChPasswd': $pageSource = Utils::getServerBasePath() . '/page/_chpasswd.php'; break;
    case '/Admin': $pageSource = Utils::getServerBasePath() . '/page/_admin.php'; break;
    case '/Admin/Users': $pageSource = Utils::getServerBasePath() . '/page/_adminListUser.php'; break;
    case '/Admin/Users/Add': $pageSource = Utils::getServerBasePath() . '/page/_adminAddUser.php'; break;
    case '/Admin/Users/Delete': $pageSource = Utils::getServerBasePath() . '/page/confirm/_confirmDeleteUser.php'; break;
    case '/Admin/Users/Reset': $pageSource = Utils::getServerBasePath() . '/page/confirm/_confirmResetUser.php'; break;
    
    case '/403' : $pageSource = Utils::getServerBasePath() . '/page/_403.php'; break;
    default: $pageSource = Utils::getServerBasePath() . '/page/_404.php'; break;
}

if (!file_exists($pageSource)) {
    Logger::error("FWNavigationProcessor requested page source that does not exist: " . $pageSource);
    Errors::addError(new Notification(Text::ERROR_MISSINGPAGE_TITLE, Utils::getFormattedTranslationText(Text::ERROR_MISSINGPAGE_MESSAGE, $pageSource)));
}

include_once Utils::getServerBasePath() . '/page/master/_notifications.php';

if (!file_exists($pageSource)) {
    $pageSource = Utils::getServerBasePath() . '/page/_404.php';
}

Logger::debug("FWRequestProcessor requests page source: " . $pageSource);
include_once $pageSource;
