<?php
session_start() ;
include_once "View/top.php";
require_once "System/membership.php";
require_once "System/Mysession.php" ;
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ret = RegisterData($username, $email, $password);
    $message = "";
    switch ($ret) {
        case "Regsister Successful":
            $message = "Regsister Successful";
            Sectionset("username",$username) ;
            Sectionset("email",$email) ;
            if ($username === "Tanxx" && $email === "19tanxx@gmail.com"){
                header("Location:admin.php") ;
            }else{
                header("Location:index.php") ;
            }
            break;
        case "Information Fail":
            $message = "Information Fail";
            break;
        case "Email is already use":
            $message = "Email is already use";
            break;
        case "Regsister Fail":
            $message = "Regsister Fail";
            break;
        default:
            $message = "Something Wrong";
    }
    echo " <div class='container'>
        <div class='alert alert-success alert-dismissible'>
    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
    " . $message . "
</div>
</div>
        ";
}
?>


<div class="container my-3">
    <div class="col-md-8 offset-2 tabb my-4">
        <form action="register.php" method="post" class="form p-4 bg-info">
            <div class="form-group">
                <h2 class="family text-danger">Register and again Special!</h2>
                <div class="form-group">
                    <label for="username" class="customtext text-dark">Username</label>
                    <input type="text" class="family form-control tabb2  rounded-0 " name="username" id="username">
                </div>
                <label for="email" class="customtext text-dark">Email</label>
                <input type="email" class="family form-control tabb2  rounded-0 " name="email" id="email ">
            </div>
            <div class="form-group">
                <label for="password" class="customtext text-dark">Password</label>
                <input type="password" class="family form-control tabb2 rounded-0 "
                    name="password" id="password">
            </div>
            <p></p>
            <button class="btn btn-outline-info loginmr bg-white text-dark" type="submit" name="submit">Sing Up</button>

        </form>
    </div>
</div>
<?php include_once "View/bottom.php" ?>