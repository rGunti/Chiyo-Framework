<?php

/* 
 * ChiyoFramework
 * _log.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

Authentification::enforceRole(RoleConfig::ROLEID_ADMIN);
if (!AppConfig::APP_LOG_VISIBLE) { NavigationPath::redirect("/403"); }
$pageTitle = Text::NAV_LOG;
?>
<h1><?= $pageTitle ?></h1>
<div class="controls"><?= HtmlUtils::getLinkButton("Clear.Action", Text::BUTTON_CLEARLOG) ?></div>
<pre><?php Logger::printLog(); ?></pre>
