<?php

/**
 * Description of posts_model
 *
 * @author ahmed
 */
class PostsModel extends base_model {

    public function __construct() {
//call parent::__construct to call connect method from the parent class(DAO) 
//to make connection db 
//when you make object from class PostsModel Or any child(extends) Class

        parent::__construct();
        $this->tableName = 'posts';
    }

    public function showPost($idForum, $IdPost) {

        $query = 'SELECT p.* , u.name , u.image FROM posts p INNER JOIN'
                . ' users u ON p.user_id = u.id WHERE '
                . 'forum_id =' . $idForum . ' and p.id=' . $IdPost;
        $result = $this->specialQuery($query);
        if (!$result->num_rows == 0) {

            foreach ($result as $key => $row) {
                $row;
            }
            return $row;
        }
    }

    public function getRecentPosts() {
        //SELECT p.* , u.name , u.image,f.forum_title FROM users u , posts p , forums f WHERE u.id = p.user_id and p.forum_id=f.id  ORDER BY datetime DESC LIMIT 6
        $query = 'SELECT p.* , u.name , u.image,f.forum_title FROM users u , posts p , forums f';
        $query .= ' WHERE u.id = p.user_id and p.forum_id=f.id  ORDER BY datetime DESC LIMIT 6';
        $result = $this->specialQuery($query);
        if (!$result->num_rows == 0) {
            foreach ($result as $key => $row) {
                $posts[$key] = $row;
            }
            return $posts;
        }
    }

    public function addPost($data) {

        $this->insert($this->tableName, $data);
    }
    public function editPost($data,$postId) {
        $where= ' WHERE id='.$postId ;
        $this->update($data, $this->tableName, $where);
    }
    public function getpost($postId) {
        $where= ' WHERE id='.$postId ;
        $result = $this->select($this->tableName, $where);
        if (!$result->num_rows == 0 ) {
            foreach ($result as $row) {
                $row;
            }
            return $row;
        }
    }
    public function deletePost($postId) {
        $this->delete($this->tableName, $postId, 'id');
    }
    
    public function countPost() {
        $query='SELECT COUNT(*) as count, forum_id FROM posts GROUP BY forum_id';
        $result=$this->specialQuery($query);
        if (!$result->num_rows == 0) {
            foreach ($result as $key => $row) {
                $count[$key] = $row;
            }
            return $count;
        }
    }

}
