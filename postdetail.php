<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog PHP Test</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="CSS/customtext.css">
</head>
<body>
    <?php
    session_start() ;       
    include_once "System/Mysession.php" ;
    include_once "View/nav.php";
    include_once "View/header.php";
    include_once "System/postgenerator.php";
    if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
        
    }
    ?>
    <div class="container">
        <div class="row">
            <article class="col-md-10 ">
                <div class="card my-4 offset-2">
                <?php
                $result = SinglePost($pid) ;
                foreach ($result as $post){
                    
                    echo ' <div class="card-header  customtext2">'.$post['postitle'].'
                    <span class="float-end">'.$post['create_at'].'</span></div> ';
                    echo '<img src="Asset/images/'.$post['imglink'].'" alt="" class=" card-img-top img">';
                    echo '<div class="card-block customtext2 p-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$post['content'].'</div> ';
                    echo '<div class="card-footer customtext2">Writer:&nbsp;'.$post['postwriter'].'</div> ';
                }
                ?>
                </div>  
            </article>

        </div>
    </div>
<?php include_once "View/footer.php" ; ?>
</body>
</html>