<?php
namespace app\config;
class Web{
    protected $host = 'mysql';
    protected $username = 'vitik';
    protected $password = 'Aa!11111';
    protected $database = 'dating';

    public  function getHost(){
        return $this->host;
    }
    public  function getPassword(){
        return $this->password;
    }   
     public  function getUsername(){
        return $this->username;
    }   
     public  function getDb(){
        return $this->database;
    }
}
?>