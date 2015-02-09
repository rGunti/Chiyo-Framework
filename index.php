<?php
/* 
 * ChiyoFramework
 * index.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */


// Definition of Script Constants (IMPORTANT!)
define('CONST_APP_ROOT', dirname(__FILE__));
define('PAGE_TITLE_INDICATOR', '%%%TITLE%%%');

// require & includes
require_once 'app/_include.php';

$pageTitle = "";
ob_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- JavaScript Libraries -->
        <script src="<?= Utils::getApplicationBasePath() ?>/js/libs/jquery-ui/external/jquery/jquery.js"></script>
        <script src="<?= Utils::getApplicationBasePath() ?>/js/libs/jquery.cssAnimateAuto.min.js"></script>
        <script src="<?= Utils::getApplicationBasePath() ?>/js/libs/jquery.dataTables.min.js"></script>
        
        <!-- CSS Templates -->
        <link href="<?= Utils::getApplicationBasePath() ?>/js/libs/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css">
        <link href="<?= Utils::getApplicationBasePath() ?>/css/libs/jquery.dataTables.css" rel="stylesheet" type="text/css">
        <link href="<?= Utils::getApplicationBasePath() ?>/css/style.comp.css" rel="stylesheet" type="text/css">
        
        <?php /*
        <!-- LESS Include -->
        <link href="<?= Utils::getApplicationBasePath() ?>/css/style.less" rel="stylesheet/less" type="text/css">
        <script src="<?= Utils::getApplicationBasePath() ?>/js/libs/less.min.js"></script>
         */ ?>
        
        <!-- JavaScript Include -->
        <script src="<?= Utils::getApplicationBasePath() ?>/js/_notifications.js"></script>
        <script src="<?= Utils::getApplicationBasePath() ?>/js/_script.js"></script>
        <script src="<?= Utils::getApplicationBasePath() ?>/js/script.js"></script>
        
        <!-- Favicon -->
        <link href="<?= Utils::getApplicationBasePath() ?>/img/ico/appicon.ico" rel="icon" type="image/vnd.microsoft.icon" />
        
        <title><?= PAGE_TITLE_INDICATOR ?> [<?= AppConfig::APP_TITLE ?>]</title>
    </head>
    <body>
        <header><?php require_once Utils::getServerBasePath() . '/page/master/header.php'; ?></header>
        <nav><?php require_once Utils::getServerBasePath() . '/page/master/navigation.php'; ?></nav>
        <article><?php require_once Utils::getServerBasePath() . '/app/NavigationProcessor.php'; ?></article>
        <footer><?php require_once Utils::getServerBasePath() . '/page/master/footer.php'; ?></footer>
    </body>
    <script>
        $('document').ready(function() { 
            <?php if (AppConfig::APP_NOTIFICATION_AUTO_DISMISS_MESSAGES) { ?>window.setTimeout(function() { closeMessage(".message"); }, <?= AppConfig::APP_NOTIFICATION_AUTO_DISMISS_MESSAGES_TIMEOUT ?>); <?php } ?>
            <?php if (AppConfig::APP_NOTIFICATION_AUTO_DISMISS_ERRORS)   { ?>window.setTimeout(function() { closeMessage(".error"); },   <?= AppConfig::APP_NOTIFICATION_AUTO_DISMISS_ERRORS_TIMEOUT ?>);   <?php } ?>
        });
    </script>
</html>
<?php
Utils::processPageContent($pageTitle);
?>
