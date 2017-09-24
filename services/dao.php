<?php

/**
 * this class for manage database (select/show , insert, delete , update)
 */
class DAO  {

    private $host;
    private $user;
    private $password;
    private $dbname; 
    protected $conn;
    public function __construct() {
         $this->host = HOST_DB;
        $this->user = USER_DB;
        $this->password = PASS_DB;
        $this->dbname = DB_NAME;
    //call connect method in constructor to make connection db 
    //when you make object from class DAO Or any child(extends) Class
        $this->connect();
        
    }
    public function connect(){
        return $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
    
    }
    public function close(){
        mysqli_close($this->conn);
    }
    
    
}
