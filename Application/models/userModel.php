<?php

/**
 * Description of user_model
 *
 * @author ahmed
 */
class UserModel extends base_model {



    public function __construct($data = '') {
        
//call parent::__construct to call connect method from 
//the parent class(Base_Model) to make connection db 
//when you make object from class UsersModel Or any child(extends) Class
        parent::__construct();
        
        $this->tableName = 'users';
    }
    public function setData($data) {
        $this->tableData['email'] = $data['email'];
        $this->tableData['name'] = $data['name'];
        $this->tableData['gender'] = $data['gender']['0'];
        $this->tableData['image'] = $data['photo'];
        $this->tableData['password'] = $data['password'];
    }
    public function createUser() {
        
        return $this->insert($this->tableName, $this->tableData);
        
    }
    public function userProfile($userId) {
        $where= ' WHERE id='.$userId;
        $result=$this->select($this->tableName, $where);
        if ($result->num_rows != 0) {
            foreach ($result as $row){
                $row;
            }
            return $row;
        }
    }
    public function editUser($data,$postId) {
        $where= ' WHERE id='.$postId ;
        $this->update($data, $this->tableName, $where);
    }

}
