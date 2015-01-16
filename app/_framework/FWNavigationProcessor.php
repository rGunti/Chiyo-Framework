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
$showLastUpdateTime = TRUE;

switch (NavigationPath::getCurrentPath()) {
    case '/' : $pageSource = Utils::getServerBasePath() . '/page/' . AppConfig::APP_NAV_DEFAULT_PAGE_SCRIPT; break;
    case '/Home': $pageSource = Utils::getServerBasePath() . '/page/_home.php'; break;
    case '/Log': $pageSource = Utils::getServerBasePath() . '/page/_log.php'; break;
    case '/Info': $pageSource = Utils::getServerBasePath() . '/page/_info.php'; break;
    default: $pageSource = Utils::getServerBasePath() . '/page/_404.php'; break;
}
include_once $pageSource;

if ($showLastUpdateTime) { ?>
<p class="lastUpdated">
    Page Source Last Updated: <?= date("d.m.Y H:i:s", filemtime($pageSource)) ?>
</p>
<?php }
