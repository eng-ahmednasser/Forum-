<?php
define('APP_PATH',realpath(dirname(__FILE__)));
define('INDEX_PATH', dirname(APP_PATH). DS);
define('PS',PATH_SEPARATOR);
define('PUBLIC_PATH', INDEX_PATH .'public');
define('IMAGES_PATH', DS.'lamp'.DS.'public'.DS.'images'.DS);

define('SERVICES_PATH', dirname(APP_PATH). DS .'services');
define('CONTROLLER_PATH',APP_PATH.DS.'controllers');
define('MODEL_PATH',APP_PATH.DS.'models');
define('VIEW_PATH',APP_PATH.DS.'views');
define('LIB_PATH',APP_PATH.DS.'Lib');
define('HOST_DB', 'localhost');
define('USER_DB', 'root');
define('PASS_DB', 'root');
define('DB_NAME', 'skillup');


$paths= get_include_path().PS.APP_PATH.PS.PUBLIC_PATH.PS.CONTROLLER_PATH;
$paths .= PS.MODEL_PATH.PS.VIEW_PATH.PS.LIB_PATH . PS. SERVICES_PATH;
set_include_path($paths);

