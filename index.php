<?php
require_once __DIR__ . '/vendor/autoload.php';

class DatabaseEraser
{
    use \App\MysqlConnector;

    public function __construct()
    {
        self::connectMysql();

        $query = "DELETE FROM `" . self::$mysqlTable . "` WHERE 1";
        $stmt = self::$mysql->prepare($query);
        $stmt->execute();

        $query = "INSERT INTO `" . self::$mysqlTable . "` (`sum`, `count_fib`, `count_prime`) VALUES (0, 0, 0)";
        $stmt = self::$mysql->prepare($query);
        $stmt->execute();

        self::disconnectMysql();
    }
}

/** flush db table */
$a = new DatabaseEraser();
unset($a);