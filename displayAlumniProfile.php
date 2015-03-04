<?php include 'conn.php'; 
if($_SESSION['person_id'] == $_SESSION['userLogin'])
{
$personInfo = $_SESSION['personInfo'];
$personalInfo = $_SESSION['basicInfo'];
$alumniInfo = $_SESSION['alumniInfo'];
$information = $_SESSION['personalInfo'];
$person_id=$_SESSION['person_id'];

?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit your Details here</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<style>
	table{
		width:700px;
	}
	tr{
		border:1px solid;
		text-align:center;
	}
	th{
		border:2px solid;
		background:silver;
	}
	</style>
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
				<h2>Full Profile</h2>
					<p>
				</p>
			<p>
			<hr></hr>
					<p>
					
                        <h3><?php echo $personalInfo['firstname'];echo "  "; ;echo $personalInfo['lastname']; ?></h3>
                        <hr></hr>
					<center><img src='<?php echo $personalInfo['photo'];?>' width=120px height=120px vspace=3px hspace=5px id='displayimage'> </center></a>
					</p>
                        <h3>Personal Information</h3>
                        <hr></hr>
						
						<label class="contentLabel">First Name:</label><?php echo $personalInfo['firstname']; ?><br />
						<label class="contentLabel">Middle Name:</label><?php echo $personalInfo['middlename']; ?><br />
						<label class="contentLabel">Last Name:</label><?php echo $personalInfo['lastname']; ?><br />
						<label class="contentLabel">Email:</label><?php echo $personalInfo['email']; ?><br />
						<label class="contentLabel">Gender:</label><?php echo $personalInfo['gender']; ?><br />
						<label class="contentLabel">Phone:</label><?php echo $personalInfo['phone']; ?><br />
						<label class="contentLabel">Address:</label><?php echo $personalInfo['street name']; ?><br />
						<label class="contentLabel"></label><?php echo $personalInfo['city'].' ,  '.$personalInfo['state']; ?><br />
                        
                        <hr></hr>
                        <h3>Other Information</h3>
                        <hr></hr>
						<?php
						 
						if($_SESSION['type'] == 'student alumni') { ?>
						<label class="contentLabel">Graduation Year:</label><?php echo $information['grad_year']; ?><br />
						<label class="contentLabel">Major Advisor:</label><?php echo $information['major_advisor']; ?><br />
						<label class="contentLabel">Major Department:</label><?php echo $information['major_dept']; ?><br />
						<label class="contentLabel">Awards:</label><?php echo $information['awards']; ?><br />
						<label class="contentLabel">Alumni Type</label>Student Alumni<br />						
						<?php }else{?>
						<label class="contentLabel">Specialization:</label><?php echo $information['specialization']; ?><br />
						<label class="contentLabel">Achievements</label><?php echo $information['achievements']; ?><br />
						<label class="contentLabel">Department:</label><?php echo $information['department']; ?><br />
						<label class="contentLabel">Research Area:</label><?php echo $information['research_area']; ?><br />
						<label class="contentLabel">Alumni Type</label>Faculty Alumni<br />						
                        <?php } ?>
						<br>
						<?php 
						$prsn=$_SESSION['person_id'];
						$p = $personalInfo['person_id'];
						//echo $prsn;
						//echo $p;
						$fetch_connection="select connection_status from connections where (connected_to=$prsn AND connected_by=$p) OR (connected_to=$p AND connected_by=$prsn)";
						$query_connection = mysqli_query($conn,$fetch_connection);
						$connection='test';
						while($result_connection = mysqli_fetch_row($query_connection))
						{
						if($result_connection[0]== 'inactive' || 'active' || 'rejected' )
						{
							$connection=$result_connection[0];
							//echo $connection;
						}
						else
						{
							$connection='connect';
						}
						}
						
							//echo $result_connection[0];
							//echo $connection;
						if($_SESSION['person_id']!=$p && ($connection == 'connect' || $connection == 'test')){?>
                    <a href="searchingalumni.php?userId=<?php echo $personalInfo['person_id']; ?>">Connect</a>
					<?php } ?>
					<b>
					<?php
					if($connection == 'inactive')
					{
						echo "Connection request Sent/received but was left unattended !!";
					}
					elseif($connection == 'active')
					{ 
					//echo $personalInfo['person_id'];
					?>
					
						<hr></hr>
                        <h3><a href="gallery.php?person_id=<?php echo $personalInfo['person_id'];?>">View Gallery</a></h3>
                        <hr></hr>
					
						<?php
					}
					elseif($connection == 'rejected')
					{
					echo "Sorry connection request was rejected !!";
					}
					
					?>
					</b>
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
					<a href="#">Gallery</a>
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
	<?php 
	}else{
		header('Location:index.php');
	}
?>