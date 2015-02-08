<?php

/* 
 * ChiyoFramework
 * _upload.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

Authentification::enforceRole(RoleConfig::ROLEID_ADMIN);
if (!AppConfig::APP_UPLOAD_ENABLED) { NavigationPath::redirect("/403"); }
$pageTitle = Text::NAV_UPLOAD;
?>
<h1><?= $pageTitle ?></h1>
<p><?= Text::TEXT_FILEUPLOAD ?></p>
<form action="Upload.Action" method="POST" enctype="multipart/form-data">
    <table class="formTable">
        <tr>
            <td style="width: 200px;"><?= Text::FORM_UPLOAD_FILE ?></td>
            <td><input type="file" name="uploadFile" /></td>
        </tr><tr>
            <td class="buttonRow" colspan="2">
                <input type="submit" value="<?= Text::BUTTON_UPLOAD ?>" />
            </td>
        </tr>
    </table>
</form>
