<?php

/* 
 * ChiyoFramework
 * _confirmDeleteUser.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

Authentification::enforceRole(RoleConfig::ROLEID_ADMIN);
$deleteUser = Authentification::getUser($_GET['id']);
$pageTitle = Text::SCR_DELETE_USER;
?>
<h1><?= $pageTitle ?></h1>
<form action="Delete.Action" method="POST" class="confirm">
    <table>
        <tr>
            <td rowspan="2" class="confirmIcon"><?= HtmlUtils::getImage("32/question.png") ?></td>
            <td><?= Utils::getFormattedTranslationText(Text::CONFIRM_DELETEUSER, $deleteUser[ViewFieldConfig::USERS_NAME], $deleteUser[ViewFieldConfig::USERS_ROLE]) ?></td>
        </tr>
        <tr>
            <td class="buttonRow">
                <input type="hidden" name="userId" value="<?= $deleteUser[ViewFieldConfig::USERS_ID] ?>" />
                <input type="submit" value="<?= Text::BUTTON_YES ?>" />
                <?= HtmlUtils::getLinkButton("..", Text::BUTTON_NO) ?>
            </td>
        </tr>
    </table>
</form>
