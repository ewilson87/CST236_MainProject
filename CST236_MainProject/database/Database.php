<?php

//fixes autoloader issue when accessing Database from here instead of from ServerService. Do not yet know what's causing this issue.
if (isset($_SESSION['pds']) && $_SESSION['pds'] == true){
    unset($_SESSION['pds']);
    require_once '../Autoloader.php';
}
else if (isset($_SESSION['uds']) && $_SESSION['uds'] == true){
    unset($_SESSION['uds']);
    require_once '../../Autoloader.php';
}
else require_once '../../../Autoloader.php';

class Database
{
    
    //Database login details obtained from GCU Hosting Solution (Heroku)
    private $host = 'us-cdbr-iron-east-03.cleardb.net';
    private $user = 'b5cd00b29271f8';
    private $dbpassword = 'd793dcc9';
    private $database = 'heroku_37a87dc739d8a45';
    
    public function __construct()
    {}
    
    public function getConnection(){
        $conn = new mysqli($this->host, $this->user, $this->dbpassword, $this->database);
        //$mysqli = mysqli_connect($this->host, $this->user, $this->dbpassword, $this->Database);
        
        if ($conn->connect_errno){
            printf("Connect failed: %s\n", $conn->connect_errno);
            exit();
        }
        else {
            //echo "returning conn";
            return $conn;
        }
    }
}
