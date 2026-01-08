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

    if(isset($_GET["pid"])){
        $pid = $_GET["pid"] ;
        $result = SinglePost($pid) ;
        $posts = [] ;
        foreach ($result as $post){
            $posts["postitle"] = $post ["postitle"] ;
            $posts["postwriter"] = $post ["postwriter"] ;
            $posts["imglink"] = $post ["imglink"] ;
            $posts["content"] = $post ["content"] ;
        }
        if (isset($_POST['submit'])){
            $file = $_FILES["file"] ;
            $imgname = "" ;
            $title = $_POST["postitle"];
            $type = $_POST["postype"];
            $subject = $_POST["subject"] ;
            $writer =$_POST ["postwriter"] ;
            $content = $_POST ["content"] ;

            if($_FILES["file"]["name"] != null ){
                $imglink = time() . "_" . basename($_FILES['file']['name']);
                $targetPath = 'Asset/images/' . $imglink;
                move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
                $imgname = $imglink ;
            }else{
                $imgname = $posts["imglink"] ;
            }
            $imglink = $imgname ;
            $pid= $_GET["pid"] ;
            PostUpdate ($title,$type,$writer,$content,$imglink,$pid,$subject);
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
                    <li class="list-group-item custombg2 customtext">Third item</li>
                    <li class="list-group-item custombg2 customtext">Fourth item</li>
                </ul>
            </aside>
            <article class="col-md-6 ms-4 ps-4 mt-4">
                <form action="postedit.php?pid=<?php echo $_GET["pid"]; ?>" method="post" enctype="multipart/form-data" class="mb-5 p-4 borderad bg-success bg-opacity-25">
                    <h3 class="text-center text-danger family">Post Edit</h3>
                    <div class="group-form">
                        <input type="text" class="form-control family2 mb-3" placeholder="Post Title" id="postitle" name="postitle" 
                        value="<?php echo $posts["postitle"]  ?>">
                    </div>

                    <div class="group-form">
                        <select name="postype" id="postype" class="form-control form-select mb-3 family2">
                            <option seleted>Post Type</option>
                            <option value="1">Free Post</option>
                            <option value="2">Paid Post</option>
                        </select>
                    </div>
                    <div class="group-form">
                        <select name="subject" id="postype" class="form-control form-select mb-3 family2">
                            <option seleted>Subject</option>
                            <option value="1">Polity</option>
                            <option value="2">IT News</option>
                            <option value="3">Healthy</option>
                            <option value="4">Social</option>
                        </select>
                    </div>
                    <div class="group-form">
                        <input type="text" class="form-control mb-3 family2" placeholder="Post Writer" id="postwriter" name="postwriter" required value="<?php echo $posts["postwriter"]  ?>">
                    </div>

                    <div class="group-form mb-3 family2 mb-2">
                        <input type="file" class="form-control family2 mt-2" name="file" id="file"  >
                    </div>
                    
                    <div class="group-form">
                        <label for="content" class="family2 mb-2">Content</label>
                        <textarea class="form-control family2 mb-4" id="content" rows="7" name="content" required > <?php echo $posts["content"]  ?></textarea>
                    </div>
                    <img src="Asset\images\<?php echo $posts["imglink"] ?>" class="img-fluid mb-2" alt="">
                    <div class="row justify-content-end p-3">
                        <button class="btn btn-outline-primary col-2 mx-3">Cancel</button>
                        <button class="btn btn-primary col-2" type="submit" name="submit">Update</button>
                    </div>

                </form>
            </article>
        </div>
    </div>
</body>

</html>