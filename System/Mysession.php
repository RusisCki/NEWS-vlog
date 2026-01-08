<?php

    function Sectionset($key,$val){
        $_SESSION[$key] = $val ;
    }
    function Checkset($key){
        return isset($_SESSION[$key]);
    }
    function Getset($key){
        return $_SESSION [$key] ;
    }
?>