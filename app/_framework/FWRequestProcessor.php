<?php

/*
 * ChiyoFramework
 * FWRequestProcessor.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

switch (NavigationPath::getCurrentPath()) {
    case '/Log/Clear': 
        Logger::clear();
        NavigationPath::redirect("/Log");
        break;
    default: break;
}
