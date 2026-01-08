<?php 
session_start() ;
include_once "System/Mysession.php" ;
include_once "System/membership.php" ;
include_once "View/top.php";
if(isset($_POST['submit']))
{
    $email = $_POST ['email'] ;
    $password = $_POST ['password'] ;
    $ret = UserData($email , $password) ;
    $message = "" ;
    switch ($ret){
        case "Login Successful" : 
             
            $message = "Login Successful" ;
            if ($email=== "19tanxx@gmail.com"){
                header("Location:admin.php") ;
            }else{
                header("Location:index.php") ;
            }
            ; break ;
        case "Login Fail" :
            $message ="Login Fail! Please Check your email and password"; break ;
        case "Information Fail" :
            $message ="Something Wrong! Please Check your email and password"; break ;
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
    <form action="login.php" method="post" class="form p-4 bg-info ">
        <div class="form-group">
            <h2 class="family text-danger">Just Login To See Special!</h2>
         
            <label for="email" class="customtext text-dark">Email</label>
            <input type="email" class="family form-control tabb2  rounded-0 " name="email" id="email ">
        </div>
        <div class="form-group">
            <label for="password" class="customtext text-dark">Password</label>
            <input type="password" class="family form-control tabb2 rounded-0 " 
            name ="password" id="password">
        </div>
        <p></p>
        <button class="btn btn-outline-info loginmr bg-white text-dark" type="submit" name="submit">Login</button>
        
    </form>
        </div>
    </div>
<?php include_once "View/bottom.php" ?>