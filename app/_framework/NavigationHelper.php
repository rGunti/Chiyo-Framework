<?php

/*
 * ChiyoFramework
 * NavigationHelper.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

/**
 * Description of NavigationHelper
 *
 * @author Raphael
 */
class NavigationHelper {
    public static function createMenuItem($title, $path, $onlyIf = NavigationDisplayIfEnum::ALWAYS, $role = 0, $condition = FALSE) {
        if (($onlyIf == NavigationDisplayIfEnum::ONLY_IF_LOGGEDIN && Authentification::isLoggedIn()) || 
                ($onlyIf == NavigationDisplayIfEnum::ONLY_IF_LOGGEDOUT && !Authentification::isLoggedIn()) ||
                ($onlyIf == NavigationDisplayIfEnum::ONLY_IF_HASROLE && Authentification::getStoredProperty('role') == $role) ||
                ($onlyIf == NavigationDisplayIfEnum::ONLY_IF_CONDITION && $condition == TRUE) ||
                $onlyIf == NavigationDisplayIfEnum::ALWAYS) {
            echo "<li><a href='" . Utils::getApplicationBasePath() . "$path'>$title</a></li>";
        }
    }
    
    public static function addSpacer($onlyIf = NavigationDisplayIfEnum::ALWAYS, $role = 0, $condition = FALSE) {
        if (($onlyIf == NavigationDisplayIfEnum::ONLY_IF_LOGGEDIN && Authentification::isLoggedIn()) || 
                ($onlyIf == NavigationDisplayIfEnum::ONLY_IF_LOGGEDOUT && !Authentification::isLoggedIn()) ||
                ($onlyIf == NavigationDisplayIfEnum::ONLY_IF_HASROLE && Authentification::getStoredProperty('role') == $role) ||
                ($onlyIf == NavigationDisplayIfEnum::ONLY_IF_CONDITION && $condition == TRUE) ||
                $onlyIf == NavigationDisplayIfEnum::ALWAYS) {
            echo "<li class='navSpacer'></li>";
        }
    }
}

class NavigationDisplayIfEnum {
    const ALWAYS = 0;
    const ONLY_IF_LOGGEDIN = 1;
    const ONLY_IF_LOGGEDOUT = 2;
    const ONLY_IF_HASROLE = 3;
    const ONLY_IF_CONDITION = 4;
}
