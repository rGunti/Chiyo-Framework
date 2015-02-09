<?php

/* 
 * ChiyoFramework
 * _adminListUser.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

Authentification::enforceRole(RoleConfig::ROLEID_ADMIN);
$users = Authentification::getUserList();
$pageTitle = Text::SCR_USERLIST;
?>

<h1><?= $pageTitle ?></h1>
<p>
    <?= HtmlUtils::getLinkButton("Add", Text::SCR_ADD_USER) ?>
</p>
<table>
    <tr class="headerLine">
        <td style="width: 40px" class="rightAlign"><?= Text::TH_USERLIST_ID ?></td>
        <td style="width: 300px"><?= Text::TH_USERLIST_NAME ?></td>
        <td style="width: 150px"><?= Text::TH_USERLIST_GROUP ?></td>
        <td><?= Text::TH_GENERAL_FUNCTIONS ?></td>
    </tr>
    <?php
    foreach ($users as $user) { ?>
    <tr class="dataLine">
        <td class="rightAlign"><?= $user[ViewFieldConfig::USERS_ID] ?></td>
        <td><?= $user[ViewFieldConfig::USERS_NAME] ?></td>
        <td><?= $user[ViewFieldConfig::USERS_ROLE] ?></td>
        <td>
            <?php echo HtmlUtils::getLink("Edit?id=" . $user[ViewFieldConfig::USERS_ID], HtmlUtils::getImage("16/user_edit.png"), Text::SCR_EDIT_USER); ?>
            <?php echo HtmlUtils::getLink("Reset?id=" . $user[ViewFieldConfig::USERS_ID], HtmlUtils::getImage("16/update.png"), Text::SCR_RESET_USER); ?>
            <?php echo HtmlUtils::getLink("Delete?id=" . $user[ViewFieldConfig::USERS_ID], HtmlUtils::getImage("16/user_delete.png"), Text::SCR_DELETE_USER); ?>
        </td>
    </tr>
    <?php } ?>
    <tr class="footerLine">
        <td colspan="4">
            <?= Text::TF_GENERAL_ENTRIES ?> <?= count($users) ?>
        </td>
    </tr>
</table>
