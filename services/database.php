<?php
/**
 * Description of database
 *
 * @author ahmed
 */
class database {
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
        $this->connect();
        
    }
    public function connect(){
    $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
    
    }
    public function close(){
        mysqli_close();
    }
}
