<?php

namespace Application\Components;

class DB
{
    const DS = DIRECTORY_SEPARATOR;
    const DB_CONFIG_PATH = ROOT . self::DS . 'config' . self::DS . 'db_params.php';

    private static $connection;
    public $db;

    private function __construct(){
        $config = include(self::DB_CONFIG_PATH);
        $dsn = "mysql:host={$config['host']};dbname={$config['name']}";

        try {
            $this->db = new \PDO($dsn, $config['user'], $config['pass']);
            $this->db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, true);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            throw new \Exception('Database connection error');
        }
    }

    //singleton pattern
    public static function getConnection()
    {
        if (!isset(self::$connection))
        {
            self::$connection = new self;
        }
        return self::$connection->db;
    }
}










