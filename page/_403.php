<?php

/* 
 * ChiyoFramework
 * _404.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

Logger::warn("403 Access denied for path: " . NavigationPath::getCurrentPath());

$pageTitle = Text::ERROR_403_TITLE;
?>
<h1><?= $pageTitle ?></h1>
<p><?= Text::ERROR_403_MESSAGE ?></p>
