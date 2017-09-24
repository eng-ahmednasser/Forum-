<?php

    function logOut() {
        echo 'You have cleaned session  ';
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
        }

        
        header('Location:/lamp/');
        //header('Refresh: 0; URL = /lamp/');
    }
    logOut();
?>