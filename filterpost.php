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
    ?>
    <div class="container">
        <div class="row">
            <article class="col-md-12 ">
                <div class="row">
                    <?php
                    $result = "" ;
                    if(Checkset("username")){
                        $result = Postfilter($_GET['sid'] , 2) ;
                    }else{
                        $result = Postfilter($_GET['sid'] , 1) ;
                    }
                    foreach($result as $post){
                        $pid= $post['id'];
                        echo '
                                            <div class="col-md-3 ms-5 m-3 p-3 ">
                        <div class="card" style="width:350px">
                            <div class="card-body">
                                <h4 class="card-title">'.$post['postitle'].'</h4>
                                <img src="Asset/images/'.$post['imglink'].'" alt="" class="card-img-top imgindex">
                                <p class="card-text">'.substr($post['content'],0,200).'...</p>
                                <a href="postdetail.php?pid='.$pid.'" class="btn btn-sm btn-outline-primary float-end ">Details</a>
                            </div>
                        </div>
                    </div>
                        ';
                    }
                    ?>
                </div>
            </article>
        </div>
    </div>
<?php include_once "View/footer.php" ; ?>
</body>
</html>