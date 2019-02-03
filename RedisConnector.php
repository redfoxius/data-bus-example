<?php

namespace App;

trait RedisConnector
{
    public static $redis = null;

    public static function connectRedis() : bool {
        try {
            self::$redis = new \Redis();
            self::$redis->connect(Settings::REDIS_HOST, Settings::REDIS_PORT);
        }
        catch (\RedisException $e) {
            echo 'Error while redis connection! ' . $e->getMessage() . PHP_EOL;
            return false;
        }

        return true;
    }

    public static function disconnectRedis() {
        return self::$redis->close();
    }
}