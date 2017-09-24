<?php
/**
 * Description of comments
 *
 * @author ahmed
 */
class CommentsController  extends base_controller{
   
    
//    public function deleteAction() {
//        $commentModel=new CommentsModel();
//        $commentModel->deletecomment($this->_params[0]);
//        $this->redirect('/lamp/posts/show/ForumID/PostID'.);
//    }
    
         public function editAction() {
         
         $commentModel= new CommentsModel();
         $this->_data['v']=$commentModel->getDataComment($this->_params[0]);
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
    
    
}
