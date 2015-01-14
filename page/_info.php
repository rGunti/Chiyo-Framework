<?php

/* 
 * ChiyoFramework
 * _info.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

$pageTitle = "Info";
?>
<h1><?= $pageTitle ?></h1>
<table>
    <tr>
        <td class="tbl_desc">App Title</td>
        <td class="tbl_val"><?= AppConfig::APP_TITLE ?></td>
    </tr><tr>
        <td class="tbl_desc">App Version</td>
        <td class="tbl_val"><?= AppVersion::VERSION ?></td>
    </tr><tr>
        <td class="tbl_desc">Framework Version</td>
        <td class="tbl_val"><?= FrameworkVersion::VERSION ?></td>
    </tr><tr>
        <td class="tbl_desc">PHP Version</td>
        <td class="tbl_val"><?= phpversion() ?></td>
    </tr><tr>
        <td class="tbl_desc">Copyright</td>
        <td class="tbl_val"><?= AppConfig::APP_COPYRIGHT ?></td>
    </tr>
</table>
