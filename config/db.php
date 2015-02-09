<?php

/*
 * ChiyoFramework
 * db.php
 * Author: Raphael
 * 
 * Copyright (C) 2015 rGunti
 */

/**
 * Database Configuration
 */
class DBConfig {
    const HOST = "127.0.0.1";
    const USERNAME = "root";
    const PASSWORD = "";
    const DATABASE = "chiyo";
}

/**
 * Database Table Configuration
 */
class TableConfig {
    const TABLE_USERS = "users";
    const TABLE_ROLES = "roles";
}

/**
 * Database Field Configuration
 */
class FieldConfig {
    const USERS_ID = "ID";
    const USERS_NAME = "NAME";
    const USERS_HASH = "HASH";
    const USERS_ROLE = "ROLE_ID";
    
    const ROLES_ID = "ID";
    const ROLES_NAME = "NAME";
}

/**
 * Database View Configuration
 */
class ViewConfig {
    const VIEW_USERS = "vusers";
}

/**
 * Database View Configuration
 */
class ViewFieldConfig {
    const USERS_ID = "USER_ID";
    const USERS_NAME = "USER_NAME";
    const USERS_ROLE_ID = "ROLE_ID";
    const USERS_ROLE = "ROLE_NAME";
}
