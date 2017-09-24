<?php

/**
 * Description of indexController
 *
 * @author ahmed
 */
class IndexController extends base_controller {

    public function defaultAction() {
        
        $postModel = new PostsModel();
        $this->_data['recenPosts']=$postModel->getRecentPosts();
        if (isset($_POST['login'])) {

            validationController::_empty($_POST);
            if (count(validationController::$errors) === 0) {
                $model = new IndexModel();
                if ($model->login($_POST) === TRUE) {
                   $this->redirect('/lamp/');
                    
                } else {
                    echo '<span>Wrong username or password</span>';
                }
            } else {
                $this->_data['errors']=validationController::$errors;
            }
        }
        $this->_view();
    }
    
}

