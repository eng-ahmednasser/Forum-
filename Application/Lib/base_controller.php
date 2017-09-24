<?php

/**
 * Description of base_controller
 *
 * @author ahmed
 */
class base_controller {
    use helper;

    protected $_controller;
    protected $_action;
    protected $_params;
    public $_data = [];
     public function defaultAction() {
         echo 'Action Default form Base';
         $this->_view();

     }

    public function setdata($dataName, $key) {
        return $this->_data[$key] = $dataName;
    }
    public function notFoundAction() {
        $this->_view();
    }

    public function setController($controllerName) {
        $this->_controller = $controllerName;
    }

    public function setAction($actionName) {
        $this->_action = $actionName;
    }

    public function setParams($paramsName) {
        $this->_params = $paramsName;
    }

    protected function _view() {
        //extract($this->_data);
        if ($this->_action == FrontController::NOT_FOUND_ACTION) {
            require_once VIEW_PATH . DS . 'notFound' . DS . 'notFound_view.php';
        } else {

            $view = VIEW_PATH . DS . $this->_controller . DS . $this->_action . '_view.php';
            if (file_exists($view) ) {
                extract($this->_data);
                include $view;

            }
            else {
                require_once VIEW_PATH . DS . 'notFound' . DS . 'notExists_view.php';
            }
            
        }
    }

    

}
