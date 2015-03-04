<?php
include 'conn.php';
$message = "";
$person_id=$_SESSION['person_id'];
if (!file_exists('uploads/'.$person_id.'/')) {
    mkdir('uploads/'.$person_id.'/', 0777, true);
	$target_dir = "uploads/".$person_id.'/';
}else{
$target_dir = "uploads/".$person_id.'/';
}
$fileToBeUpdated = false;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $message= "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
	$tempTarget = $target_file;
	$query = "select max(photo_id)+1 from gallery";
	$queryMax = mysqli_query($conn,$query);
	$fetchedMax = mysqli_fetch_array($queryMax);
	$fetched = $fetchedMax[0];
	$target_file = $target_dir . $fetched.basename($_FILES["fileToUpload"]["name"]);
     $uploadOk = 1;
	 $fileToBeUpdated = true;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    $message = "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
     $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $status = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $status= "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		$imgDesc=$_POST["Image_Desc"];
		$query = "INSERT INTO `gallery` ( photo_posted_on, photo_posted_by, photo_description, photo_url, person_id)
		VALUES (NOW(),'$person_id','$imgDesc','$target_file','$person_id')";
		$result = mysqli_query($conn,$query);
		if(!$result){
			$message =  $query."Sorry, there was an error uploading your file.";
		}
     } else {
        $message =  "Sorry, there was an error uploading your file.";
    }
}
$_SESSION["redirection"]=true;
$_SESSION['message'] = $message;
$_SESSION['status'] = $status;
header("Location:gallery.php?person_id=".$person_id);
?>