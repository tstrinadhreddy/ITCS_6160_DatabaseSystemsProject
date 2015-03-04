<?php include 'conn.php';
$alumniInfo = $_SESSION['alumniInfo'];
if(($_SESSION['person_id'] == $_SESSION['userLogin'])&&($alumniInfo['alumni_type']== 'faculty alumni'))
{
$personInfo = $_SESSION['personInfo'];
$alumniInfo = $_SESSION['alumniInfo'];
$otherInfo = $_SESSION['otherInfo'];
$person_id = $_SESSION['person_id'];
$_SESSION['displayData']=null;
?>
<!DOCTYPE html>
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
			<div>
					<h3>Welcome <?php echo $personInfo["firstname"]; ?></h4>
					<hr></hr>
			<?php if ($alumniInfo['alumni_type'] == 'faculty alumni') { ?>        
                      
                 <form action="facultyUpdate.php" method="post">
                 <table>
                <label class="contentLabel">Person ID : </label><input type="text" name="pid" value="<?php echo $personInfo['person_id'];?>" readonly /> <br />
                <label class="contentLabel">First Name: </label><input type="text" value="<?php echo $personInfo['firstname'];?>" readonly /> <br />
                <label class="contentLabel">Middle Name : </label><input type="text" name="middlename" value="<?php echo $personInfo['middlename']; ?>" /> <br />
                <label class="contentLabel">Last Name : </label><input type="text" value="<?php echo $personInfo['lastname']; ?>" readonly /> <br />
                <label class="contentLabel">email : </label><input type="text" name="email" value="<?php echo $personInfo['email']; ?>" > <br />
                <label class="contentLabel">Gender : </label><input type="text" name="gender"  value="<?php echo $personInfo['gender']; ?>" > <br />
                <label class="contentLabel">Date of Birth : </label><input type="text" value="<?php echo $personInfo['date_of_birth']; ?>" readonly /> <br />
                <label class="contentLabel">Phone : </label><input type="text" name="phone" value="<?php echo $personInfo['phone']; ?>" > <br />
                <label class="contentLabel">Apt Number :  </label><input type="text" name="aptno" value="<?php echo $personInfo['apt_number']; ?>" > <br />
                <label class="contentLabel">Street Name :  </label><input type="text" name="sname" value="<?php echo $personInfo['street name']; ?>" > <br />
                <label class="contentLabel">City :  </label><input type="text" name="city" value="<?php echo $personInfo['city']; ?>" > <br />
                <label class="contentLabel">State :  </label><input type="text" name="state" value="<?php echo $personInfo['state']; ?>" > <br />
                <label class="contentLabel">Zip :  </label><input type="text" name="zip" value="<?php echo $personInfo['zip']; ?>" > <br />
                <label class="contentLabel">Type :  </label><input type="text" value="<?php echo $alumniInfo['alumni_type']; ?>" readonly /> <br />
				<hr></hr>
				<h3>Other Information</h3>
				<hr></hr>
			   <label class="contentLabel">Facebook : </label><input type="text" name="fb" value="<?php echo $alumniInfo['facebook_id']; ?>" /> <br />
                <label class="contentLabel">linkedin : </label><input type="text" name="linkedin" value="<?php echo $alumniInfo['linkedin_id']; ?>" /> <br />
                <label class="contentLabel">Twitter : </label><input type="text" name="twitter" value="<?php echo $alumniInfo['twitter_id']; ?>" /> <br />
                <label class="contentLabel">Sports : </label><input type="text" name="sports" value="<?php echo $alumniInfo['sports_played']; ?>" ><br />
                <label class="contentLabel">Committees :  </label><input type="text" name="committees" value="<?php echo $alumniInfo['college_committees']; ?>" /> <br />
                <label class="contentLabel">Specialization:  </label><input type="text" name="special" value="<?php echo $otherInfo['specialization']; ?>" /> <br />
                <label class="contentLabel">Achievements :  </label><input type="text" name="achieve" value="<?php echo $otherInfo['achievements']; ?>" /> <br />
                <label class="contentLabel">Department :  </label><input type="text" name="dept" value="<?php echo $otherInfo['department']; ?>" /> <br />
                <label class="contentLabel">Research Area :  </label><input type="text" name="rarea" value="<?php echo $otherInfo['research_area']; ?>" /> <br />
                </table>
                <input type="submit" value="Update">            
                 </form>    
					<hr></hr>
				<h3>Upload Profile Picture</h3>
				<hr></hr>				 

					<form action="uploadProfilepic.php" method="post" enctype="multipart/form-data">
					<label style="font-family:quattrocento_sansregular;font-size:14px"></label>	
					<input type="file" name="fileToUpload" id="fileToUpload" ><br><br>
								
					<input type="submit" value="Upload" name="submit" id="uploadImage" >
					<br />
					<label style="color:light green; font-family:quattrocento_sansregular;font-size:14px">
					
					</label>
				</form>		
                            
               <?php } ?>
				<!-- // Content Page ends-->
			</div>
		</div>
	</div>
                    
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
				<li><a href="#">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Our Programs</a></li>
					<li><a href="#">Gallery</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">Blog</a></li>
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