<?php

/* 
 * ChiyoFramework
 * _admin.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

Authentification::enforceRole(RoleConfig::ROLEID_ADMIN);
$pageTitle = Text::NAV_ADMINCONSOLE;
?>

<h1><?= $pageTitle ?></h1>
<table>
    <tr>
        <td>
            <a href="Admin/Users" class="blockLink">
                <img src="<?= Utils::getApplicationBasePath() ?>/img/32/user.png"><br>
                <?= Text::SCR_USERLIST ?>
            </a>
        </td>
    </tr>
</table>
