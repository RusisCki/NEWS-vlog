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
    session_start();
    include_once "System/Mysession.php";
    include_once "View/nav.php";
    include_once "View/header.php";
    include_once "System/postgenerator.php" ;
    if (Checkset("username")) {
        if (Getset("username") != "Tanxx") {
            header("Location:index.php");
            exit();
        }
    } else {
        header("Location:index.php");
        exit();
    }
    if(isset($_POST['submit'])){
        $postitle = $_POST["postitle"] ;
        $postype = $_POST["postype"] ;
        $postwriter = $_POST["postwriter"] ;
        $content = $_POST["content"] ;

        if (isset($_FILES["file"]) && $_FILES["file"]["error"] === 0) {
            $file = $_FILES["file"];
            $imglink = time() . "_" . basename($_FILES['file']['name']);
            $targetPath = 'Asset/images/' . $imglink;

            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)) {
                $bol = PostInseter($postitle, $postype, $postwriter, $content, $imglink,$subject);
                if($bol){
                    echo " <div class='container'>
                    <div class='alert alert-success alert-dismissible'>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                Post Insert Successfully.
                </div>
                </div>
                    ";
                }else{
                    echo " <div class='container'>
                    <div class='alert alert-success alert-dismissible'>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                Post Insert Failed!
                </div>
                </div>
                    ";
                }
            } else {
                echo "<p class='text-danger family'>File upload failed.</p>";
            }
        } else {
            echo "<p class='text-danger customtext'>No file uploaded or invalid file.</p>";
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <aside class="col-md-3 mt-4 ">
                <ul class="list-group custombg2">
                    <li class="list-group-item custombg2 ">
                        <a href="admin.php" class="customtext">Post Insert</a></li>
                    <li class="list-group-item custombg2 customtext">
                        <a href="allpost.php" class="customtext">Show All Post</a></li>

                </ul>
            </aside>
            <article class="col-md-9 ">
                <?php
                $result = AllPost(2) ;
                foreach ($result as $post){
                    echo '
                    <div class="card m-3">
                    <div class="card-block m-2">
                    <h4 class="mb-3">'.$post["postitle"].'</h4>
                    <p>'.substr($post["content"],0,500).' ...</p>
                    <a href="postedit.php?pid='.$post["id"].'" class= "btn btn-info btn-sm m-2" >Edit</a>
                    </div>
                    </div>
                    ';
                }
                ?>
                
            </article>
        </div>
    </div>
</body>
</html>