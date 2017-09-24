<?php

if (!isset($_SESSION['name'])) {
    require_once 'login.php';
} else {
    require_once 'home.php';    
}