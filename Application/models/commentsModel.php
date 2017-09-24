<?php

/**
 * Description of comments_model
 *
 * @author ahmed
 */
class CommentsModel extends base_model {

    public function __construct() {
        parent::__construct();
        $this->tableName = 'comments';
    }

    public function getComments($Idpost) {
        $query = 'SELECT c.* , u.name , u.image FROM comments c INNER JOIN'
                . ' users u ON c.user_id = u.id WHERE c.post_id=' . $Idpost
                . ' ORDER BY datetime DESC';
        $result = $this->specialQuery($query);
        if (!$result->num_rows == 0) {
            foreach ($result as $key => $row) {
                $comments[$key] = $row;
            }
            return $comments;
        }
    }

    public function addComment($data) {

        $this->insert($this->tableName, $data);
    }

    public function countComments() {
        $query = 'SELECT COUNT(*) as count,post_id FROM comments GROUP BY post_id';
        $result = $this->specialQuery($query);
        
        if (!$result->num_rows == 0) {
            foreach ($result as $key => $row) {
                 $count[$key] = $row;
            }
            return $count;
        } else {
            return 0; 
        }
    }
        public function deleteComment($commentId) {
        $this->delete($this->tableName, $commentId, 'id');
    }
    
    public function getDataComment($commentID) {
        $where= ' WHERE id='.$commentID ;
        $result = $this->select($this->tableName, $where);
        if (!$result->num_rows == 0 ) {
            foreach ($result as $row) {
                $row;
            }
            return $row;
        }
    }

}
