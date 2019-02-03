<?php
namespace App;


abstract class QueueListener
{
    use RedisConnector;
    use MysqlConnector;

    protected $channelName = '';
    protected $counterName = '';

    public function __construct()
    {
        self::connectRedis();
        self::connectMysql();
    }

    public function __destruct()
    {
        self::disconnectRedis();
        self::disconnectMysql();
    }

    public function run()
    {
        ini_set('default_socket_timeout', -1);

        self::$redis->subscribe([$this->channelName], [$this, 'processChannelMessage']);
    }

    protected abstract function processChannelMessage($redisIns, $channel, $msg);
}