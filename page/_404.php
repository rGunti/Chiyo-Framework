<?php

/* 
 * ChiyoFramework
 * _404.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

Logger::warn("404 Page Not Found for path: " . NavigationPath::getCurrentPath());

$pageTitle = "404 Page Not Found";
?>
<h1><?= $pageTitle ?></h1>
<p>
    Sorry, but the requested page could not be found!
</p>
<pre><?php print_r(NavigationPath::getPathElements()); ?></pre>
