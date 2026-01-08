<?php
    require_once "System/Database.php" ;
    function RegisterData($username,$email,$password)
    {
        if(usernameCheck($username) && emailCheck($email) && passwordCheck($password)){
            return Inserter($username, $email, $password) ;
        }else{
            return "Information Fail";
        }
    }
    function UserData($email,$password)
    {
        if(emailCheck($email) && passwordCheck($password)){
            return Recaller($email, $password) ;
        }else{
            return "Information Fail";
        }
    }

    function usernameCheck ($username)
    {
        #Must 6 Capatial letter,small letter , digit
        if(strlen($username)>=5)
        {
            $bol = preg_match('/^[\w]+$/',$username) ;
            return $bol ;
        }else{
            return false ;
        }
    }
    function emailCheck($email){
        #Must 15 Capatial letter,small letter , digit and emal form
        if(strlen($email)>=15)
        {
            $bol = preg_match('/^[a-zA-Z0-9]+@[a-z]+\.[a-z]{2,4}+$/',$email) ;
            return $bol ;
        }else{
            return false ;
        }
    }
    function passwordCheck($password)
    {
        #Must Stron password Capatal Small Digit Special include _
        if(strlen($password) >= 6)
        {
            $bol = preg_match(' /^(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*(_|[^\w])).+$/',$password);
            return $bol ;
        }
    }
    
?>