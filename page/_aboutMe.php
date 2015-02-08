<?php

/* 
 * ChiyoFramework
 * _aboutMe.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

Authentification::enforceLoggedIn();
$pageTitle = Utils::getFormattedTranslationText(Text::SCR_USER, Authentification::getStoredProperty("name"));
?>
<h1><?= $pageTitle ?></h1>
<table class="formTable">
    <tr>
        <td style="width: 200px;"><?= Text::SCT_USER_USERNAME ?></td>
        <td><input type="text" value="<?= Authentification::getStoredProperty("name") ?>" readonly="readonly" /></td>
    </tr><tr>
        <td style="width: 200px;"><?= Text::SCR_CHPASSWD ?></td>
        <td>
            <input type="button" value="<?= Text::SCR_CHPASSWD ?>" onclick="redirectToUrl('AboutMe/ChPasswd');" />
        </td>
    </tr>
</table>
