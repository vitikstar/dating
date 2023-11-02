<?php
namespace app\db; 

use app\config\Web;

class DatabaseClass implements DatabaseInterface{
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $connection;

    public function __construct() {
        $config =  new Web();
        $this->host = $config->getHost();
        $this->dbname = $config->getDb();
        $this->username = $config->getUsername();
        $this->password = $config->getPassword();
    }


    public function connect() {
        $this->connection = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection() {
        return $this->connection;
    }
}

?>