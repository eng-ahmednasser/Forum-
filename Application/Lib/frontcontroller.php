<?php

/**
 * Description of FrontController
 *
 * @author ahmed
 */
class FrontController {

    const NOT_FOUND_ACTION = 'notFoundAction';
    const NOT_FOUND_CONTROLLER = 'NotFoundController';

    private $controller = 'index';
    private $action = 'default';
    private $parameters = array();

    public function __construct() {
        $this->processingUrl();
    }

//get url and 
    private function processingUrl() {

        $url = isset($_GET['url']) ? $_GET['url'] : NULL;
        //explode url to  (controller - Action - parameter)
        $url = explode('/', trim($url, '/'));
        //check if controller is exist 

        if (isset($url[0]) && $url[0] != '') {
            //Reassigne controller propierty  
            $this->controller = $url[0];
        }
        // check if Action is exist
        if (isset($url[1]) && $url[1] != '') {
            //Reassigne Action propierty
            $this->action = $url[1];
        }

        //check if paramerters exist
        if (count($url) > 2 && array_filter($url)) {

            foreach ($url as $key => $value) {
                if ($key >= 2) {
                    $this->parameters[] = $value;
                }
            }
        }
    }

//this method for create new object from controller and call Action and send parameters
    public function createObj() {
        // transfere first lettere in controller to first capital letter and add (Controller)
        $controllerClsName = ucfirst($this->controller) . 'Controller';
        //add word (Action) to action name
        $actionName = $this->action . 'Action';
        //check if this class not exist :
        if (!class_exists($controllerClsName)) {
            //Reassigne controller Class Name if controller class name  not exist 
            //self::NOT_FOUND_CONTROLLER => is constant for NotFoundController (4O4); 
            //and redirect to not found page (4O4) after make object
            $controllerClsName = self::NOT_FOUND_CONTROLLER;
        }
        //Make Obiect form controller class name
        $controllerObj = new $controllerClsName();
        //check if this method(action) not exist  in our controller class :
        if (!method_exists($controllerObj, $actionName)) {
            //reassigne action name if not exist  to this constant self::NOT_FOUND_ACTION (notFoundAction)
            $this->action = $actionName = self::NOT_FOUND_ACTION;
        }
//call method (setcontroller) from base controller class to  
//reassigne controllr name proberity is there 
//by current controller name after processing
        $controllerObj->setController($this->controller);
//call method (setAction) from base controller class to  
//reassigne Action name proberity is there 
//by current Action name after processing
        $controllerObj->setAction($this->action);
//call method (setParams) from base controller class to  
//reassigne parameters name proberity(array) is there 
//by current parameters Array after processing
        $controllerObj->setParams($this->parameters);
        //call action(method)
        $controllerObj->$actionName();
    }

}
