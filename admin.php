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
        $subject = $_POST["subject"] ;
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
            <article class="col-md-6 ms-4 ps-4 mt-4">
                <form action="admin.php" method="post" enctype="multipart/form-data" class="mb-5 p-4 borderad bg-success bg-opacity-25">
                    <h3 class="text-center text-danger family">Post Insert Form</h3>

                    <div class="group-form">
                        <input type="text" class="form-control family2 mb-3" placeholder="Post Title" id="postitle" name="postitle" >
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
                        <input type="text" class="form-control mb-3 family2" placeholder="Post Writer" id="postwriter" name="postwriter" required>
                    </div>

                    <div class="group-form mb-3 family2 mb-2">
                        <input type="file" class="form-control family2 mt-2" name="file" id="file" >
                    </div>
                    
                    <div class="group-form">
                        <label for="content" class="family2 mb-2">Content</label>
                        <textarea class="form-control family2 mb-4" id="content" rows="5" name="content" required></textarea>
                    </div>
                    <div class="row justify-content-end">
                        <button class="btn btn-outline-primary col-2 mx-3">Cancel</button>
                        <button class="btn btn-primary col-2" type="submit" name="submit">Post</button>
                    </div>
                </form>
            </article>
        </div>
    </div>
</body>

</html>