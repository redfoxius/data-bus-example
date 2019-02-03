<?php

namespace App;

abstract class Settings {
    /** REDIS SETTINGS */
    const REDIS_HOST = 'redis';
    const REDIS_PORT = 6379;

    /** MYSQL SETTINGS */
    const MYSQL_HOST = 'mysql';
    const MYSQL_PORT = 3306;
    const MYSQL_NAME = 'test_generator';
    const MYSQL_USER = 'root';
    const MYSQL_PASS = 'admin';

    const DB_TABLE   = 'test';
}