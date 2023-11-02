<?php
namespace app\db; 

interface DatabaseInterface {
    public function connect();
    public function getConnection();
 }
?>