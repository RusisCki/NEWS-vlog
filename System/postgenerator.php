<?php
require_once "System/Database.php";
function PostInseter($postitle, $postype, $postwriter, $content, $imglink,$subject)
{
    $currtime = GetTime();
    $db = DBconnect();
    $qry = "INSERT INTO post (postitle,postype,subject,postwriter,content,imglink,create_at)
        VALUES ('$postitle',$postype,$subject,'$postwriter','$content','$imglink','$currtime')
        ";
    $result = mysqli_query($db, $qry);
    return $result;
}
function AllPost($type,$start)
{
    $db = DBconnect();
    $qry = " ";
    if ($type == 1) {
        $qry = " SELECT * FROM post WHERE postype = $type LIMIT $start,6
            ";
    } else {
        $qry = " SELECT * FROM post LIMIT $start,6
            ";
    }
    $result = mysqli_query($db, $qry);
    return $result;
}
function SinglePost($pid)
{
    $db = DBconnect();
    $qry = " SELECT * FROM post WHERE id = $pid ";
    $result = mysqli_query($db, $qry);
    return $result;
}
function PostUpdate($postitle, $postype, $postwriter, $content, $imglink, $id,$subject)
{
    $db = DBconnect();
    $qry = "UPDATE post 
SET postitle = '$postitle', 
    `postype` = $postype,
    `subject` = $subject,
    postwriter = '$postwriter', 
    content = '$content', 
    imglink = '$imglink' 
WHERE id = $id
        ";
    $result = mysqli_query($db, $qry);
    if ($result) {
        header("Location:allpost.php");
    } else {
        echo "<script>alert('Post Update Failed!')</script>";
    }
}
function Postfilter ($sid , $type){
    {
        $db = DBconnect();
        $qry = " ";
        if ($type == 1) {
            $qry = " SELECT * FROM post WHERE postype = $type AND subject = $sid
                ";
        } else {
            $qry = " SELECT * FROM post WHERE subject = $sid
                ";
        }
        $result = mysqli_query($db, $qry);
        return $result;
    }
}

function GetpostCount ($type)
{
    $db = DBconnect() ;
    $qry = " ";
    if ($type == 1) {
        $qry = " SELECT * FROM post WHERE postype = $type
            ";
    } else {
        $qry = " SELECT * FROM post 
            ";
    }
    $result = mysqli_query($db,$qry) ;
    return mysqli_num_rows($result) ;
}