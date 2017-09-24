<?php

/**
 * Description of validationController
 *
 * @author ahmed
 */

class validationController {

    public static $errors = array();
    protected static $photoInfo = array() ;
    protected static $outPut = array();

    public static function _empty($checkempaty) {
        
        if (is_array($checkempaty)) {
            foreach ($checkempaty as $key => $field) {
                if (empty($field)) {
                    self::$errors[$key] = $key . " is required";
                }
            }
        } else {
            if (empty($checkempaty)) {self::$errors[$key] = $key . " is required";}
        }
        
       
    }

// this method to check raido choose
    public static function checkRaido($array, $choose, $checked) {

        if (isset($array[$choose][0])) {
            $$checked = $array[$choose][0];
            $noerror = [$checked, TRUE];
            return $noerror;
        } else {

            self::$errors[$choose] = "pls choose  " . $choose;
        }
    }

// this method to check regex email
    public static function email($arr, $email = 'email') {
        if (isset($arr[$email])) {
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            if (!preg_match($regex, $arr[$email])) {

                self::$errors[$email] = " is an invalid email. Please try again.";
            }
        }
    }

//this method for check charcater lenrgth 
// It has default value NameField = pass and length = 8
    public static function minLength($arr, $Nfield = 'password', $leng = 8) {

        if (strlen($arr[$Nfield]) < $leng ) {
             self::$errors[$Nfield] = $Nfield . " must be at lest " . $leng . " characters ";
        }
    }

    public static function image($imageField) {

        $namePic = $_FILES[$imageField]['name'];
        $tmp_name = $_FILES[$imageField]['tmp_name'];

        if (empty($namePic)) {
            self::$errors['image'] = "please cheose your photo";
        } else {
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $detectedType = exif_imagetype($tmp_name);
            $error = !in_array($detectedType, $allowedTypes);
            if ($error == 1) {
                 self::$errors['image'] = "please cheose image type";
            } else {
                self::$photoInfo = $_FILES[$imageField];
                return $namePic;
            }
        }
    }
    public static function checkMacth($var1 , $var2){
        if ($var1 != $var2) {
            self::$errors['capcha'] ="capcha not matched";  
      }
    }

    public static function returnOutPut() {
        if (count(self::$errors) == 0) {
            move_uploaded_file(self::$photoInfo['tmp_name'], PUBLIC_PATH.DS.'images'.DS. self::$photoInfo['name']);
            self::$outPut = $_POST;
            self::$outPut['image'] = self::$photoInfo['name'];
            return self::$outPut;
        } 
    }

}


?>
