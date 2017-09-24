<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginModel
 *
 * @author ahmed
 */
class IndexModel extends base_model {

//protected $data = [];
    protected $tableName = 'users';

    public function __construct() {
//call parent::__construct to call connect method from 
//the parent class(Base_Model) to make connection db 
//when you make object from class IndexModel Or any child(extends) Class
        parent::__construct();
    
        
    }

    public function login(array $data) {
//$this->data['email'] = $data['email'];
//$this->data['password'] = $data['password'];
        $where = "WHERE email ='" . $data['email'] . "' And password='" . $data['password'] . "'";
        $result = parent::select($this->tableName, $where);
        if (!$result->num_rows == 0) {

            if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                unset($row['password']);
                $_SESSION['timeout'] = time();
                $_SESSION['valid'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['image'] = $row['image'];
                $_SESSION['if_admin'] = $row['if_admin'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['logout'] = '<a href = "/lamp/logout" title= "Logout">logout ' . $_SESSION["name"] . '</a>';
                return $_SESSION['valid'];
            }
        }
    }

    //get info about User's make Post (how make Post =>Name & image)
    public function name_Image_User() {
        $query = 'SELECT DISTINCT u.name , u.image,u.id FROM users u , posts p WHERE u.id = p.user_id';
        $resultUser = $this->specialQuery($query);
        if (!$resultUser->num_rows == 0) {
            foreach ($resultUser as $key=> $row) {
                $userInfo[$key] = $row;
            }
            return $userInfo;
        }
    }

}
