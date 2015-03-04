<?php
session_start();
include 'conn.php';
$imageComment=$_POST["Image_Comm"];
$photo_id=$_SESSION['photo_id'];
$person_id=$_SESSION['person_id'];
$query = "INSERT INTO `comments` (photo_id, commented_by, commented_on, comment_description) 
		VALUES ('$photo_id','$person_id',NOW(),'$imageComment')";
$result = mysqli_query($conn,$query);
header("Location:viewphoto.php?photo_id=$photo_id");		
?>