<?php

namespace Src\Lib\Database\Drivers;

use PDO;
use Src\Lib\Database\ConnectionFactory;

class MySQLConnection extends ConnectionFactory
{

    public static $instance;

    private $connection;

    public function __constructor()
    {
//      read from env;
        $url = $_ENV['DATABASE_URL'];
        $name = $_ENV['DATABASE_NAME'];
        $user = $_ENV['DATABASE_USER'];
        $pass = $_ENV['DATABASE_PASSWORD'];

        $this->connection = new PDO('mysql:host=' . $url . ';dbname=' . $name, $user, $pass);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }


//   prevented copy
    private function __clone()
    {
    }

//    prevented unserialize
    private function __wakeup()
    {
    }

}