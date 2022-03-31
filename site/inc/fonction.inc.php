<?php


function isConnected(){
    if (isset($_SESSION['membre'])){
        return true;
    }else{
        return false;
    }
} 
function isConnectedAsAdmin(){
    if(isConnected() && $_SESSION['membre']['status'] == 1){
        return true;
    }else{
        return false;
    }
}

function debug($var, $mode = 1){
    if ($mode = 1) {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }else{
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }
}

function randomRef() {
    $str = '';
    for($i = 0; $i < 16; $i++){
        $str .= rand(0, 9);
    }
    return $str;
}
?>