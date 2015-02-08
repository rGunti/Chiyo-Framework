<?php

/* 
 * ChiyoFramework
 * _login.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

$pageTitle = Text::NAV_LOGIN;
?>

<h1><?= $pageTitle ?></h1>
<form action="Login.Action" method="POST">
    <table class="formTable">
        <tr>
            <td style="width: 150px;"><?= Text::FORM_LOGIN_USERNAME ?></td>
            <td><input type="text" name="username" placeholder="<?= Text::FORM_LOGIN_USERNAME ?>" /></td>
        </tr><tr>
            <td><?= Text::FORM_LOGIN_PASSWORD ?></td>
            <td><input type="password" name="password" placeholder="<?= Text::FORM_LOGIN_PASSWORD ?>" /></td>
        </tr><tr>
            <td class="buttonRow" colspan="2">
                <input type="submit" value="<?= Text::NAV_LOGIN ?>" />
            </td>
        </tr>
    </table>
</form>
