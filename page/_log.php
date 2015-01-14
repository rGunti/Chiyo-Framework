<?php

/* 
 * ChiyoFramework
 * _log.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

$pageTitle = "Log";
?>
<h1><?= $pageTitle ?></h1>
<div class="controls">
    <a href="Log/Clear" class="button">Clear Log</a>
</div>
<pre><?php Logger::printLog(); ?></pre>