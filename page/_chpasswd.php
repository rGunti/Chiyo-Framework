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
$pageTitle = "Change Password";
?>
<h1><?= $pageTitle ?></h1>
<form action="ChPasswd.Action" method="POST">
    <table class="formTable">
        <tr>
            <td style="width: 180px;">Old Password</td>
            <td><input type="password" name="oPassword" placeholder="Old Password" /></td>
        </tr><tr>
            <td>New Password</td>
            <td><input type="password" name="nPassword" placeholder="New Password" /></td>
        </tr><tr>
            <td>Confirm New Password</td>
            <td><input type="password" name="cPassword" placeholder="Confirm your new Password" /></td>
        </tr><tr>
            <td class="buttonRow" colspan="2">
                <a href="../AboutMe" class="button">Cancel</a>
                <input type="submit" value="Change Password" />
            </td>
        </tr>
    </table>
</form>
