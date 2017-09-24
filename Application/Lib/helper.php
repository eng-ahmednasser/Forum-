<?php

/**
 * Description of helper
 *
 * @author ahmed
 */
trait helper {

    function redirect($path) {
        session_write_close();
        header('Location: ' . $path);
        exit;
    }



}
