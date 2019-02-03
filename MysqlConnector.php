<?php
namespace App;


trait MysqlConnector
{
    public static $mysql      = null;
    public static $mysqlTable = '';

    public static function connectMysql() : bool {
        try {
            $dsn      = 'mysql:dbname=' . Settings::MYSQL_NAME . ';host=' . Settings::MYSQL_HOST . ';port=' . Settings::MYSQL_PORT;
            $user     = Settings::MYSQL_USER;
            $password = Settings::MYSQL_PASS;

            self::$mysql = new \PDO($dsn, $user, $password);
        }
        catch (\PDOException $e) {
            echo 'Error while mysql connection! ' . $e->getMessage();
            return false;
        }

        self::$mysqlTable = Settings::DB_TABLE;

        return true;
    }

    public static function disconnectMysql() {
        self::$mysql = null;
    }

    public function updateQuery($number, $type)
    {
        if (!in_array($type, ['count_fib', 'count_prime'])) {
            echo 'Invalid type of count operation';
            return false;
        }

        $query = "UPDATE `" . self::$mysqlTable . "` SET `sum` = `sum` + :num, `" . $type . "` = `" . $type . "` + 1";

        $stmt = self::$mysql->prepare($query);
        $stmt->bindParam(':num', $number);
        $stmt->execute();

        return true;
    }
}