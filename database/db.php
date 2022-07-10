<?php 
class Database{
    private $servername;
    private $user;
    private $password;
    private $dbname;

    public function __construct(){
        $this->servername = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->dbname = 'common-database';
        // $this->dbname = 'tweeteracademy';
    }

    public function connect(){
        $conn = new mysqli($this->servername,$this->user,$this->password,$this->dbname);
        return $conn;
    }
}

$BDD = new Database();
$DB = $BDD->connect();