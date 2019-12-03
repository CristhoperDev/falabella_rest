<?php

class DBConnection extends mysqli {
    /* Variables*/
    private $host = 'localhost';
    private $user = 'root';
    private $password = 'Gi@mpieer24-pe';
    private $database = 'db_hackathon_falabella';

    /* Construction to connect with the database*/
  public function __construct() {
    parent:: __construct($this->host, $this->user, $this->password, $this->database);
    $this->set_charset('utf8');
    //$this->connect_errno ? die('Error: ' . $this->connect_errno) : $mens = 'Se conecto';
    //echo $mens;
  }
}

$obj = new DBConnection();
