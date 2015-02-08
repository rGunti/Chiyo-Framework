<?php

/* 
 * ChiyoFramework
 * _404.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

Logger::warn("404 Page Not Found for path: " . NavigationPath::getCurrentPath());

$pageTitle = Text::ERROR_404_TITLE;
?>
<h1><?= $pageTitle ?></h1>
<p><?= Text::ERROR_404_MESSAGE ?></p>
<pre><?php print_r(NavigationPath::getPathElements()); ?></pre>
