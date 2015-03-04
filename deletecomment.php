<?php
session_start();
include 'conn.php';
$comment_id = $_SESSION['commentid'];
$query="DELETE FROM `comments` WHERE `comment_id`='$comment_id'";
$result = mysqli_query($conn,$query);
echo "$result";
if($result){
header('Location:viewphoto.php');
}else{
header('Location:gallery.php');
}
?>