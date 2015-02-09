<?php

/* 
 * ChiyoFramework
 * _adminEditUser.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

Authentification::enforceRole(RoleConfig::ROLEID_ADMIN);
Utils::enforceGetParameter("id", "/Admin/Users");
$roles = Authentification::getRoles();
$user = Authentification::getUser($_GET['id']);
$pageTitle = Text::SCR_EDIT_USER;
?>

<h1><?= $pageTitle ?></h1>
<form action="Edit.Action" method="POST">
    <input type="hidden" value="<?= $user[ViewFieldConfig::USERS_ID] ?>" name="userId" />
    <table class="formTable">
        <tr>
            <td style="width: 150px;"><?= Text::FORM_ADDUSER_USERNAME ?></td>
            <td><input type="text" name="username" value="<?= $user[ViewFieldConfig::USERS_NAME] ?>" placeholder="<?= Text::FORM_ADDUSER_USERNAME ?>" required="required" readonly="readonly" /></td>
        </tr><tr>
            <td><?= Text::FORM_ADDUSER_ROLE ?></td>
            <td>
                <select name="role">
                    <?php foreach ($roles as $role) { ?>
                    <option value="<?= $role[FieldConfig::ROLES_ID] ?>" <?= ($role[FieldConfig::ROLES_ID] == $user[ViewFieldConfig::USERS_ROLE_ID] ? "selected" : "") ?>><?= $role[FieldConfig::ROLES_NAME] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr><tr>
            <td class="buttonRow" colspan="2">
                <?= HtmlUtils::getLinkButton("..", Text::BUTTON_CANCEL) ?>
                <input type="submit" value="<?= Text::BUTTON_SAVE ?>" />
            </td>
        </tr>
    </table>
</form>
