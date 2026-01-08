<?php
define("DB_HOST", "localhost");
define("DB_User", "root");
define("DB_Pass", "10092005");
define("DB_Name", "yourpigeon");

function DBconnect()
{
    $db = mysqli_connect(DB_HOST, DB_User, DB_Pass, DB_Name);
    return $db;
}
function Inserter($username, $email, $password)
{
    $pass = PassCode($password);
    $current = GetTime();
    $db = DBconnect();
    $checker = "SELECT * FROM member WHERE email='$email' ";
    $checkresult = mysqli_query($db, $checker);
    if (mysqli_num_rows($checkresult) > 0) {
        return "Email is already use";
    } else {
        $datainset = "INSERT INTO member (username,email,password,start_date,update_date) VALUES('$username','$email','$pass','$current','$current')";
        $result = mysqli_query($db, $datainset);
        if($result  == 1){
            return "Regsister Successful" ;
        }else{
            return "Regsister Fail" ;
        }
    }
}
function Recaller($email,$password){
    $db = DBconnect();
    $pass = PassCode($password);
    $userdata = "SELECT username FROM member WHERE email ='$email' AND password = '$pass' " ;
    $loginresult = mysqli_query($db,$userdata) ;
    if(mysqli_num_rows($loginresult) > 0){
        $username ="" ;
        foreach ($loginresult as $ret){
            $username = $ret ["username"] ;
        }
        Sectionset("username",$username) ;
        Sectionset("email",$email) ;
        return "Login Successful" ;
    }else{
        return "Login Fail" ;
    }
}
function GetTime()
{
    $current = date("Y-m-d G:m:s", time());
    return $current;
}

function PassCode($password)
{
    $password = md5($password);
    $password = sha1($password);
    $password = crypt($password, $password);
    return $password;
}
