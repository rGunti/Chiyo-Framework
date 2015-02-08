<?php

/* 
 * ChiyoFramework
 * _adminAddUser.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

Authentification::enforceRole(RoleConfig::ROLEID_ADMIN);
$roles = Authentification::getRoles();
$pageTitle = Text::SCR_ADD_USER;
?>

<h1><?= $pageTitle ?></h1>
<form action="Add.Action" method="POST">
    <table class="formTable">
        <tr>
            <td style="width: 150px;"><?= Text::FORM_ADDUSER_USERNAME ?></td>
            <td><input type="text" name="username" placeholder="<?= Text::FORM_ADDUSER_USERNAME ?>" required="required" /></td>
        </tr><tr>
            <td><?= Text::FORM_ADDUSER_ROLE ?></td>
            <td>
                <select name="role">
                    <?php foreach ($roles as $role) { ?>
                    <option value="<?= $role[FieldConfig::ROLES_ID] ?>"><?= $role[FieldConfig::ROLES_NAME] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr><tr>
            <td class="buttonRow" colspan="2">
                <?= HtmlUtils::getLinkButton("..", Text::BUTTON_CANCEL) ?>
                <input type="submit" value="<?= Text::BUTTON_CREATE ?>" />
            </td>
        </tr>
    </table>
</form>
