<?php

/**
 * Description of forums
 *
 * @author ahmed
 */
class ForumsController extends base_controller {

    //this method show all Forums(list) on our website  
    public function defaultAction() {

        // new object from ForumsModel to call some methods from it. 
        $model = new ForumsModel();
        $this->_data['allForum'] = $model->getAllForums();

        // reassign action from default_view to all_forums_view  
        $this->_action = 'all_Forums';
        //call _view method to display  all_forums_view  page
        $this->_view();
    }
    //create new forum (BY Admin)
    public function addAction() {
        if ($_POST) {
            
            validationController::_empty($_POST);
            if (!count(validationController::$errors)==0) {
                $this->_data['v']=$_POST;
                $this->_data['errors']= validationController::$errors;   
            } else {
            $adminModel=new AdminModel();
            $adminModel->createForum($_POST);
            $this->redirect(DS.'lamp'.DS.'forums'.DS.'manage');
            }
        }
        $this->_view();
    }
    
     public function editAction() {
         
         $adminModel= new AdminModel();
         $this->_data['v']=$adminModel->getDataForum($this->_params[0]);
         if ($_POST) {
              validationController::_empty($_POST);
                 
            if (count(validationController::$errors) == 0){
                
                $adminModel->editForum($_POST, $this->_params[0]);
                $this->redirect(DS.'lamp'.DS.'forums'.DS.'manage');

                
            } else {
                $this->_data['v']=$_POST;    
                $this->_data['errors']=validationController::$errors;
                    
            }
         }
         $this->_view();
    }
    //this method show all Posts(list) in Every Forum 
    public function showAction() {
        $model = new ForumsModel();
        $commentModel = new CommentsModel();
        $this->_data['allPosts'] = $model->getAllPosts($this->_params[0]);
        $this->_data['forumTitle'] = $model->forumtitle($this->_params[0]);
        $this->_data['countCM'] = $commentModel->countComments();
        $this->_view();
    }

    public function manageAction() {
        $adminModel = new AdminModel();
        $postsModel = new PostsModel();
        $this->_data['forums'] = $adminModel->showAllForums();
        $this->_data['countPosts'] = $postsModel->countPost();
        

        if ($_POST) {
            if (isset($_POST['delete'])) {
                $adminModel->deleteForum($_POST['delete']);
                $this->redirect($_SERVER['REQUEST_URI']);
            }
        }
        $this->_view();
    }

}
