<?php

/* 
 * ChiyoFramework
 * footer.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

?>
<p>
    <?php if (AppConfig::APP_DEBUG_SHOW_NAVPATH) { ?>
        <small>Current Path: <b><?= NavigationPath::getCurrentPath() ?></b> (<?= count(NavigationPath::getPathElements()) ?> element(s), <?= DateTimeUtils::getLogTimestamp() ?>)</small><br>
    <?php } ?>
    <small>
        <?= AppConfig::APP_TITLE ?><?= AppVersion::getFooterVersion() ?><br>
        <?= AppConfig::APP_COPYRIGHT ?>
    </small>
</p>
    