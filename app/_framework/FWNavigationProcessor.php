<?php

/* 
 * ChiyoFramework
 * FWNavigationProcessor.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

Logger::debug("Requested Path: " . NavigationPath::getCurrentPath());

switch (NavigationPath::getCurrentPath()) {
    case '/' : include_once Utils::getServerBasePath() . '/page/' . AppConfig::APP_NAV_DEFAULT_PAGE_SCRIPT; break;
    case '/Home': include_once Utils::getServerBasePath() . '/page/_home.php'; break;
    case '/Log': include_once Utils::getServerBasePath() . '/page/_log.php'; break;
    case '/Info': include_once Utils::getServerBasePath() . '/page/_info.php'; break;
    default: include_once Utils::getServerBasePath() . '/page/_404.php'; break;
}
