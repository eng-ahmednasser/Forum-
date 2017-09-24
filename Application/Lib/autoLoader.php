<?php
/**
 * Description of autoLoader
 *
 * @author ahmed
 */
class AutoLoader {
    public static function autoload($className){
        
        $className = strtolower($className).'.php';
        $pathsArr= explode(PS,get_include_path());
        foreach ($pathsArr as $path){
            if(file_exists($path.DS.$className)){
                //$requireDone=TRUE;
                require $className;
                //break;
            }
        }
//        if (!isset($requireDone)) {
//            die(' Not Found !!!');
//        }
    }
}
spl_autoload_register('AutoLoader::autoload');