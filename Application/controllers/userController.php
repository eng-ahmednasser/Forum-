<?php

/**
 * Description of user
 *
 * @author ahmed
 */
class UserController extends base_controller {

    function profileAction() {
        $userModel = new UserModel();
        $this->_data['userData'] = $userModel->userProfile($_SESSION['id']);
        $this->_view();
    }

    public function editAction() {
        $userModel = new UserModel();
        $this->_data['userData'] = $userModel->userProfile($_SESSION['id']);
        if ($_POST) {
            validationController::_empty($_POST);
            validationController::email($_POST);
            validationController::minLength($_POST);
            validationController::image('image');
            //update profile user without photo
            if (isset(validationController::$errors['image']) && validationController::$errors['image'] == 'please cheose your photo') {
                unset(validationController::$errors['image']);
                if (count(validationController::$errors) == 0) {
                    
                    $_POST['gender']=$_POST['gender'][0];
                    $userModel->editUser($_POST, $_SESSION['id']);
                    $this->redirect(DS . 'lamp' . DS . 'user' . DS . 'profile');
                } else {
                    $this->_data['errors'] = validationController::$errors;
                }

                // update profile user with pic 
            } elseif (validationController::returnOutPut() != NULL) {
                $updata = validationController::returnOutPut();
                $updata['gender'] = $updata['gender'][0];
                $userModel->editUser($updata, $_SESSION['id']);
                $this->redirect(DS . 'lamp' . DS . 'user' . DS . 'profile');
            } else {


                $this->_data['errors'] = validationController::$errors;
            }
            //please cheose your photo
        }
        $this->_view();
    }

    function signupAction() {
        // call  methof view to show singUp form 
        // if user submit 
        if ($_POST) {
            // to do validation  if any field empty

            validationController::_empty($_POST);
            // to  check raido 
            $reuslt = validationController::checkRaido($_POST, 'gender', 'checked');
            #if (is_array($reuslt)) {
            #   $checked = $reuslt['0'];    
            #}
            //to check email
            validationController::email($_POST);
            //to check length
            validationController::minLength($_POST);
            // to check image if exist  and type
            validationController::image('image');
            // check captcha if matched
            validationController::checkMacth($_POST['captcha'], $_POST['codeMacth']);


            if (validationController::returnOutPut() != NULL) {
                $this->_data['user'] = validationController::returnOutPut();
                $model = new UserModel();
                $model->setData($this->_data['user']);
                if ($model->createUser() === null) {

                    $this->redirect('/lamp/');
                }
            } else {
                $this->_data['errors'] = validationController::$errors;
            }
        }
        $this->_view();
    }

    public function manageAction() {
        $adminModel = new AdminModel();
        $this->_data['users'] = $adminModel->showAllUsers();

        if ($_POST) {
            if (isset($_POST['delete'])) {
                $adminModel->deleteUser($_POST['delete']);
                $this->redirect($_SERVER['REQUEST_URI']);
            }
            if (isset($_POST['admin'])) {
                $update = 'if_admin = ' . $_POST['admin'] . " ";
                $adminModel->beAdmin($update, $_POST['id']);
                $this->redirect($_SERVER['REQUEST_URI']);
            }
        }
        $this->_view();
    }

}
