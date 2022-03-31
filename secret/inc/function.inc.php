<?php
session_start();

function debug($param){
    echo '<pre style="background-color: lightgray">';
    var_dump($param);
    echo '</pre>';
}

function isUser(){
    if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
        return true;
    }else{
        return false;
    }
}

function isAdmin(){
    if (isset($_SESSION['status']) && $_SESSION['status'] == 2){
        return true;
    }else{
        return false;
    }
}

function destroySession(){
    if (isset($_GET['action']) && $_GET['action'] == 'disconnect'){
        session_destroy();
        header('Location:login.php');
    }
}

