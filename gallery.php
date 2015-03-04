<?php include 'conn.php'; 

if($_SESSION['person_id'] == $_SESSION['userLogin'])
{
$personInfo = $_SESSION['personInfo'];
$alumniInfo = $_SESSION['alumniInfo'];
$person_id = $_SESSION['person_id'];
$p_id=$_GET['person_id'];
//echo $p_id;
$fetch_firstname="select firstname from person where person_id=$p_id";
						$query_firstname = mysqli_query($conn,$fetch_firstname);
						while($result_firstname = mysqli_fetch_row($query_firstname))
						{
						$firstname=$result_firstname[0];
						//echo $firstname;
						}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit your Details here</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
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
			
				<h2><br><b><strong><a href="gallery.php?person_id=<?php echo $p_id;?>" > <?php echo $firstname?>'s Gallery </a></b></strong></br></h2>
			    

		
				<p></p>
				<p>
				</p>				
				<ul>
				<?php if($person_id == $p_id) { ?>
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<label style="font-family:quattrocento_sansregular;font-size:14px">Upload your image here :</label>	
					<input type="file" name="fileToUpload" id="fileToUpload" ><br><br>
					Image Description : <input type="text" name="Image_Desc" id="imgDesc"><br><br>
					
					<input type="submit" value="Upload" name="submit" id="uploadImage" >
					<br />
					<label style="color:light green; font-family:quattrocento_sansregular;font-size:14px">
					<?php 	if(isset($_POST['submit'])&&$_SESSION["redirection"]==true){
							echo $_SESSION['message'];
							echo $_SESSION['status'];
							$_SESSION['redirection']=false;
							}
							?>
					</label>
				</form>
				<?php }?>
				</ul>
				
				<div>
				<?php
				//$p_id=$_SESSION["person_id"];
			
				
				$fetch_image="select * from gallery where person_id='$p_id'";
				$query_result = mysqli_query($conn,$fetch_image);
				//echo $query_result;
				$cnt=0;
				//while ($images=mysqli_fetch_assoc($query_result))
				//if (is_array($query_result))
				//{
					//echo '<br /><br />';
					while($result = mysqli_fetch_row($query_result))
					{
						$photo = $result[0];
						$image = $result[4];
						$desc = $result[3];
						if($cnt<5)
						{
							
							echo "<a href='viewphoto.php?photo_id=$photo'> ";
							echo "<img src=$image width='100px' height='100px' id='displayimage' /> ";
							echo "</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							$cnt=$cnt+1;
						}
						else
						{
							echo '<br/><br /><br />';					
							echo "<a href='viewphoto.php?photo_id=$photo'>";
							echo "<img src=$image width='100px' height='100px' id='displayimage'> </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";	
							$cnt=1;					
						}
					
					}
			?>
			</div>	
			
			
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