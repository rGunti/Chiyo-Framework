<?php

/*
 * ChiyoFramework
 * MySQLConnector.php
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

/**
 * Description of MySQLUtils
 *
 * @author Raphael
 */
class MySQLUtils {
    /**
     * Returns a new MySQLiConnector (MysqliDb)
     * @return MysqliDb
     */
    public static function getNewConnector() {
        return new MysqliDb(DbConfig::HOST, DbConfig::USERNAME, DbConfig::PASSWORD, DbConfig::DATABASE);
    }
}
