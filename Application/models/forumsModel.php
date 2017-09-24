<?php

/**
 * Description of forums_model
 *
 * @author ahmed
 */
class ForumsModel extends base_model {

    public function __construct() {

//call parent::__construct to call connect method from 
//the parent class(Base_Model) to make connection db 
//when you make object from class ForumsModel Or any child(extends) Class
        parent::__construct();
        $this->tableName = 'forums';
    }

    public function getAllForums() {
        $result = $this->select($this->tableName);
        if (!$result->num_rows == 0) {
            foreach ($result as $key => $row) {
                $forums[$key] = $row;
            }
            return $forums;
        }
    }

//this method show all Posts(list) in Every Forum 
    public function getAllPosts($forumID) {
        
        $query ='SELECT p.* , u.name FROM posts p INNER JOIN users u ON '
                . ' p.user_id=u.id WHERE p.forum_id='.$forumID;

        $result = $this->specialQuery($query);
        if (!$result->num_rows == 0) {
            foreach ($result as $key => $row) {
                $posts[$key] = $row;
            }
            return $posts;
        }
    }

    public function forumtitle($Idforum) {
        $where = 'WHERE id=' . $Idforum;
        $result =$this->select($this->tableName, $where, 'forum_title');
        
        if (!$result->num_rows == 0) {
            
            return $result->fetch_assoc();
        }
    }
    
}
