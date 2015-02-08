<?php

/* 
 * ChiyoFramework
 * _confirmResetUser.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

Authentification::enforceRole(RoleConfig::ROLEID_ADMIN);
$resetUser = Authentification::getUser($_GET['id']);
$pageTitle = Text::SCR_RESET_USER;
?>
<h1><?= $pageTitle ?></h1>
<form action="Reset.Action" method="POST" class="confirm">
    <table>
        <tr>
            <td rowspan="2" class="confirmIcon"><?= HtmlUtils::getImage("32/question.png") ?></td>
            <td><?= Utils::getFormattedTranslationText(Text::CONFIRM_RESETUSER, $resetUser[ViewFieldConfig::USERS_NAME], $resetUser[ViewFieldConfig::USERS_ROLE]) ?></td>
        </tr>
        <tr>
            <td class="buttonRow">
                <input type="hidden" name="userId" value="<?= $resetUser[ViewFieldConfig::USERS_ID] ?>" />
                <input type="submit" value="<?= Text::BUTTON_YES ?>" />
                <?= HtmlUtils::getLinkButton("..", Text::BUTTON_NO) ?>
            </td>
        </tr>
    </table>
</form>
