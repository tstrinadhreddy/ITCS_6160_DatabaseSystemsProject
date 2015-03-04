<?php
session_start();
include 'conn.php';
$person_id=$_SESSION['person_id'];
echo $photoid = $_SESSION['photoid'];
$query = "delete from gallery where photo_id = $photoid";
$result = mysqli_query($conn,$query);
if($result){


header("Location:gallery.php?person_id=".$person_id);

//header('Location:gallery.php');
}else{
header('Location:viewphoto.php');
}
?>