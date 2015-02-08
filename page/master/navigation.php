<?php

/* 
 * ChiyoFramework
 * navigation.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

?>

<ul>
    <?php 
    NavigationHelper::createMenuItem("<b>" . Text::NAV_HOME . "</b>", "/");
    
    NavigationHelper::addSpacer();
    
    NavigationHelper::createMenuItem(Text::NAV_LOGIN, "/Login", NavigationDisplayIfEnum::ONLY_IF_LOGGEDOUT);
    NavigationHelper::createMenuItem(Text::NAV_USER . ": <b>" . Authentification::getStoredProperty('name') . "</b>", "/AboutMe", NavigationDisplayIfEnum::ONLY_IF_LOGGEDIN);
    NavigationHelper::createMenuItem(Text::NAV_ADMINCONSOLE, "/Admin", NavigationDisplayIfEnum::ONLY_IF_HASROLE, RoleConfig::ROLEID_ADMIN);
    NavigationHelper::createMenuItem(Text::NAV_LOGOUT, "/Logout", NavigationDisplayIfEnum::ONLY_IF_LOGGEDIN);
    
    NavigationHelper::addSpacer();
    
    NavigationHelper::createMenuItem(Text::NAV_LOG ,"/Log", NavigationDisplayIfEnum::ONLY_IF_CONDITION, 0, 
            (Authentification::getStoredProperty("role") == RoleConfig::ROLEID_ADMIN) && AppConfig::APP_LOG_VISIBLE);
    NavigationHelper::createMenuItem(Text::NAV_HELP, "/Help");
    NavigationHelper::createMenuItem(Text::NAV_ABOUT, "/Info");
    ?>
</ul>
