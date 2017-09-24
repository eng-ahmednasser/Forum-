<?php

/**
 * Description of posts
 *
 * @author ahmed
 */
class PostsController extends base_controller {

    public function showAction() {

        $postsModel = new PostsModel();
        $forumsModel = new ForumsModel();
        $commentsModel = new CommentsModel();
        $this->_data['showPost'] = $postsModel->showPost($this->_params[0], $this->_params[1]);
        $this->_data['forumTitle'] = $forumsModel->forumtitle($this->_params[0]);
        $this->_data['comments'] = $commentsModel->getComments($this->_params[1]);
        // add comment
        if (isset($_REQUEST['content'])) {
            validationController::_empty($_REQUEST['content']);
            if (count(validationController::$errors) == 0) {

                if ($commentsModel->addComment($_POST) === null) {
                    //header('Location:'.$_SERVER['REQUEST_URI']);
                    $this->redirect($_SERVER['REQUEST_URI']);
                }
            }
        }
        if (isset($_POST['delete'])) {
            $commentsModel->deleteComment($_POST['delete']);
            $this->redirect($_SERVER['REQUEST_URI']);
        }
        $this->_view();
    }

    public function addAction() {
        $forumModel = new ForumsModel();
        $this->_data['FT'] = $forumModel->forumtitle($this->_params[0]);
        if ($_POST) {
            validationController::_empty($_POST);

            if (count(validationController::$errors) == 0) {
                $postModel = new PostsModel();
                $postModel->addPost($_POST);
                $this->redirect(DS . 'lamp' . DS . 'forums' . DS . 'show' . DS . $this->_params[0]);
            } else {
                $this->_data['v'] = $_POST;
                $this->_data['errors'] = validationController::$errors;
            }
        }

        $this->_view();
    }

    public function editAction() {

        $forumModel = new ForumsModel();
        $this->_data['FT'] = $forumModel->forumtitle($this->_params[0]);
        $postModel = new PostsModel();
        $this->_data['v'] = $postModel->getpost($this->_params[0]);
        if ($_POST) {
            validationController::_empty($_POST);

            if (count(validationController::$errors) == 0) {

                $postModel->editPost($_POST, $this->_params[0]);
                $this->redirect(DS . 'lamp' . DS . 'posts' . DS . 'show' . DS . $this->_data['v']['forum_id'] . DS . $this->_data['v']['id'] . DS);
            } else {
                $this->_data['v'] = $_POST;
                $this->_data['errors'] = validationController::$errors;
            }
        }
        $this->_view();
    }

    public function deleteAction() {
        $postModel = new PostsModel();
        $postModel->deletePost($this->_params[0]);
        $this->redirect('/lamp/forums/show/' . $this->_params[1]);
    }

}
