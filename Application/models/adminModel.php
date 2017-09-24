<?php

/**
 * Description of admin_model
 *
 * @author ahmed
 */
class AdminModel extends base_model {

    public function __construct() {
        parent::__construct();
    }

    public function showAllUsers() {
        $result = $this->select('users');
        if (!$result->num_rows == 0) {
            foreach ($result as $row) {
                unset($row['password']);
                $users[] = $row;
            }
            return $users;
        }
    }

    public function showAllForums() {
        $result = $this->select('Forums');
        if (!$result->num_rows == 0) {
            foreach ($result as $row) {
                $forums[] = $row;
            }
            return $forums;
        }
    }

    public function deleteUser($userId) {
        $this->delete('users', $userId, 'id');
    }

    public function deleteForum($userId) {
        $this->delete('forums', $userId, 'id');
    }

    public function beAdmin($data, $postId) {
        $where = ' WHERE id=' . $postId;
        $this->update($data, 'users', $where);
    }

    public function createForum($data) {
        $this->insert('forums', $data);
    }

    public function editForum($data, $forumId) {
        $where = ' WHERE id=' . $forumId;
        $this->update($data, 'forums', $where);
    }
    public function getDataForum($forumID) {
        $where= ' WHERE id='.$forumID ;
        $result = $this->select('forums', $where);
        if (!$result->num_rows == 0 ) {
            foreach ($result as $row) {
                $row;
            }
            return $row;
        }
    
    }

}
