
<!DOCTYPE html>
<?php include 'conn.php'; 
if($_SESSION['person_id'] == $_SESSION['userLogin'])
{
$personInfo = $_SESSION['personInfo'];
$alumniInfo = $_SESSION['alumniInfo'];
if ($_GET == null)
{
	$photo_id=$_SESSION["photo_id"];
}
else
{
$_SESSION["photo_id"]=$_GET['photo_id'];
$photo_id=$_GET['photo_id'];
}
$_SESSION["photoid"]=$photo_id;
$person_id=$_SESSION['person_id'];
 ?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit your Details here</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<script>
	function confirmDelete(){
    if (confirm("Do you want to Delete this image?") == true) {
       return true;
    } else {
        return false;
    }
    
	}
	</script>
</head>
<body>
	<div class="header">
		<div>
			<span id="logo"><img src="images/header-logo.png" /></span>
			<div>
				<ul>
					<li>
					<?php if($alumniInfo['alumni_type'] == 'faculty alumni') 
					{
					?>
						<a href="FacultyHomepage.php">Home</a>
					<?php } else { ?>
						<a href="StudentHomepage.php">Home</a>
						<?php } ?>
					</li>
					<li>
						<!--<a href="gallery.php">Gallery</a> -->
						<a href="gallery.php?person_id=<?php echo $person_id;?>" > Gallery </a>
					</li>
					<li>
						<a href="AlumniDonation.php">Alumni Donation</a>
					</li>
					<li>
						<a href="searchAlumni.php">Search Alumni</a>
					</li>
					<li>
						<a href="logOut.php">logout</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="body">
		<div class="donate">
			<div>
				<h2>Profile</h2>
				<div>
					<p><h3><center><a href="viewProfile.php?person_id=<?php echo $personInfo['person_id'];?>"><?php 
					echo $personInfo['firstname'];
					echo " ";
					echo $personInfo['lastname'];
					?>
					</a></h3><br /></center>
					<center><img src='<?php echo $personInfo['photo'];?>' width=120px height=120px vspace=3px hspace=5px id='displayimage'> </center></a>
					</p>
					<ul>
					<p> Alumni functionalities links here</p>
					<a href="showConnectionInvites.php?pid=<?php echo $_SESSION['person_id']; ?>">Show Connections</a>
					</ul>
				</div>
			</div>			
				<h2>Gallery</h2>
				<ul>
				
<?php
//session_start();
//echo "<br />";
$_SESSION['photo_id']=$photo_id;
$fetch_image="select * from gallery where photo_id=$photo_id";
$query_result = mysqli_query($conn,$fetch_image);
$result = mysqli_fetch_assoc($query_result);
$images=$result;
$pid= $images['person_id'];

?>

<form action ="deletephoto.php" method="post" onsubmit = "return confirmDelete();">

<?php

//echo $images[person_id];

$fetch_firstname="select firstname from person where person_id=$pid";
$query_firstname = mysqli_query($conn,$fetch_firstname);
						while($result_firstname = mysqli_fetch_row($query_firstname))
						{
						$firstname=$result_firstname[0];
						//echo $firstname;
						}
//$_SESSION['firstname'];
//echo "<br><text-align:right> <input type='button' align ='right' name='Back' onclick=location.href='gallery.php'; value='Back To Gallery' > </text-align></br>";
?> <br><b><strong><a href="gallery.php?person_id=<?php echo $pid;?>"> <?php echo $firstname;?>'s Gallery</a></b></strong></br>
<?php echo "<br><b><strong><font size='5px'>  $images[photo_description] </font size></b></strong> ";
echo "<input type='hidden' value=$photo_id name='photoId'/>";
echo "<i>$images[photo_posted_on] </i> </br> "; 
if($pid == $person_id){
?>
<input type="submit" style="background-image: url('images/del.jpg');width:30px;height:30px;margin-left:350px;" value=""/>

</form>
<?php
}
echo "<img src=$images[photo_url] width=500px height=500px vspace=20px hspace=20px id='displayimage'> </a>";

 ?>




<?php
				$fetch_comment="select * from comments where photo_id=$photo_id";
				$query_result = mysqli_query($conn,$fetch_comment);
				
					echo '<br><br/>';
					while($result = mysqli_fetch_row($query_result))
					{
						$commentedby = $result[1];
						$commentedon = $result[2];
						$comment = $result[3];
						$_SESSION['commentid']=$result[4];
						$fetch_firstname="select firstname from person where person_id=$commentedby";
						$query_firstname = mysqli_query($conn,$fetch_firstname);
						while($result_firstname = mysqli_fetch_row($query_firstname))
						{
						$firstname=$result_firstname[0];
						//echo $firstname;
						}
								
							echo "<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo " <b><font-size='10'>$firstname :</font-size></b> &nbsp&nbsp&nbsp <i> $comment </i>  ";
							echo "</br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo "<font-size='0.5'>$commentedon </font-size>";
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo "";
							
							if($pid==$person_id || $commentedby==$person_id){			
							echo "<a value=Delete Comment href='deleteComment.php'>Delete </a></br>";
							}
							echo "<br>";
					}
?>

</form>
					<form action="updatecomment.php" method="post" enctype="multipart/form-data">
					<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<label style="font-family:quattrocento_sansregular;font-size:14px">Add comment </label>	
					<input type="text" name="Image_Comm" id="Image_Comm"><br><br>
					<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<input type="submit" value="Add Comment" name="Add Comment" id="uploadImage"><br />
					<label style="color:red; font-family:quattrocento_sansregular;font-size:14px">
					</label>
</form>

				</ul>			
 			</div>
			</div></div></div>
	<div class="footer">
		<div>
			<div>
				<p>Recents posts here</p>
			</div>
			<div>
				<p>RSS feed here</p>
			</div>
			<div class="connect">
				<h4>Get in touch with us</h4>
				<a href="http://freewebsitetemplates.com/go/facebook/" id="facebook">Facebook</a> <a href="http://freewebsitetemplates.com/go/twitter/" id="twitter">Twitter</a> <a href="http://freewebsitetemplates.com/go/googleplus/" id="googleplus">Google+</a>
				<form action="index.html">
					<h4>Newsletter Signup</h4>
					<input type="text" value="Enter email address" onblur="this.value=!this.value?'Enter email address':this.value;" onfocus="this.select()" onclick="this.value='';">
					<input type="submit" id="submit" value="">
				</form>
			</div>
		</div>
		<div>
			<ul>
				<li>
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">About</a>
				</li>
				<li>
					<a href="#">Our Programs</a>
				</li>
				<li>
					<a href="gallery.php">Gallery</a>
				</li>
				<li>
					<a href="#">Contact</a>
				</li>
				<li>
					<a href="#">Blog</a>
				</li>
			</ul>
			<p>
				Copy Right &copy; <i>Team Connect</i> : UNC at Charlotte. 
			</p>
		</div>
	</div>
</body>
</html>
<?php 
	}else{
		header('Location:index.php');
	}
?>

