<?php

/**
 * Description of base_model
 *
 * @author ahmed
 */
class base_model extends DAO {

    protected $tableData = [];
    protected $tableName;
    protected $ndb;

    public function __construct() {

//call parent::__construct to call connect method from the parent class(DAO) 
//to make connection db 
//when you make object from class baseModel Or any child(extends) Class

        parent::__construct();
        $this->connecToDB();
    }

    protected function connecToDB() {
        $this->ndb = new DAO();
    }

    public function select($tableName, $where = '', $cols = '') {
        if ($cols != NULL) {
            if (is_array($cols)) {
                foreach ($cols as $col) {
                    $sql .= $col . ",";
                }
                $sql = rtrim($sql, ",");
            } else {
                $sql = $cols;
            }
        } else {
            $sql = '*';
        }
        if (!$this->ndb->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT $sql FROM $tableName  $where";
        if (!$result = mysqli_query($this->ndb->conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->ndb->conn);
        } else {
            return $result;
        }
    }

    public function specialQuery($query) {
        $sql = $query;
        if (!$result = mysqli_query($this->ndb->conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->ndb->conn);
        } else {
            return $result;
        }
    }

    public function insert($tableName, Array $data) {


        if (!$this->ndb->conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            $sql = "INSERT INTO " . $tableName . " SET ";
            foreach ($data as $key => $value) {
                $sql .= $key . "='" . $value . "', ";
            }
            $sql = rtrim($sql, ", ");

            if (!mysqli_query($this->ndb->conn, $sql)) {
                echo "Error: " . $sql . "<br>" . mysqli_error($this->ndb->conn);
            } else {
                $this->ndb->close();
            }
        }
    }

    public function update($updata, $tableName, $WhereId) {
        //$updataLine = $this->insert($updata);
        $sql = "UPDATE " . $tableName . " SET ";
        if (is_array($updata)) {
        foreach ($updata as $key => $value) {
            $sql .= $key . "='" . $value . "', ";
        }
        $sql = rtrim($sql, ", ");
            
        } else {
            
           $sql .= $updata ;
        }
        
        $sql .= $WhereId;
        if (!mysqli_query($this->ndb->conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->ndb->conn);
        } else {
            $this->ndb->close();
        }
    }

    public function delete($tableName, $id, $columnName) {

        $sql = "DELETE FROM $tableName WHERE " . "$columnName" . "='" . $id . "'";
        if (!mysqli_query($this->ndb->conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->ndb->conn);
        } else {
            $this->ndb->close();
        }
    }

}
