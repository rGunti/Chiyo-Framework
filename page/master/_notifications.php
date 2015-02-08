<?php

/* 
 * ChiyoFramework
 * _notifications.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

//Messages::addMessage(new Notification("Test", "This is a test message!"));
//Errors::addError(new Notification("Test", "This is a test error!"));

if (Messages::count() > 0) {
    $msgId = 0;
    foreach ($_SESSION['messages'] as $message) { ?>
        <div class="message ui-state-highlight ui-corner-all" style="padding: 0px 0.7em;" id="msg<?php echo $msgId; ?>">
            <div class="closeNotification" onclick="closeMessage('#msg<?php echo $msgId; ?>')">X</div>
            <p><span class="ui-icon ui-icon-info" style="margin-right: 0.3em; float: left;"></span>
                <strong><?php echo $message->Title; ?></strong><br><?php echo $message->Message; ?></p>
        </div> <?php
        $msgId++;
    }
    Messages::clear();
}

if (Errors::count() > 0) {
    $errId = 0;
    foreach ($_SESSION['errors'] as $error) { ?>
        <div class="error ui-state-error ui-corner-all" style="padding: 0px 0.7em;" id="error<?php echo $errId; ?>">
            <div class="closeNotification" onclick="closeMessage('#error<?php echo $errId; ?>')">X</div>
            <p><span class="ui-icon ui-icon-alert" style="margin-right: 0.3em; float: left;"></span>
                <strong><?php echo $error->Title; ?></strong><br><?php echo $error->Message; ?></p>
        </div> <?php
        $errId++;
    }
    Errors::clear();
}
