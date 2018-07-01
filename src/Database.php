<?php
namespace Src;

use Src\Contracts\DatabaseContract;

class Database implements DatabaseContract
{

    private static $instance;
    private $driver;
    private $host;
    private $db;
    private $username;
    private $password;
    private $conf;
    private $connection;


    private function __construct()
    {
        $this->conf     = require_once 'database_conf.php';
        $this->driver   = $this->conf['driver'];
        $this->host     = $this->conf[$this->driver]['host'];
        $this->db       = $this->conf[$this->driver]['name'];
        $this->username = $this->conf[$this->driver]['user'];
        $this->password = $this->conf[$this->driver]['pass'];
        try{
            $this->connection = new \PDO("$this->driver:host=$this->host;dbname=$this->db", $this->username, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        } catch (\PDOException $e){
            echo "Failed to connect to DB: ".$e->getMessage();
            exit();
        }

    }

    public static function getInstance()
    {
        if (!isset(self::$instance))
            self::$instance = new self();

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}