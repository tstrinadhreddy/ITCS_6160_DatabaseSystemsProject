<?php 
	session_start();
	
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
						<a href="viewProfile.php">Home</a>
					</li>
					<li>
						<a href="updateProfile.php">Update Profile</a>
					</li>
					<li>
						<a href="gallery.php">Gallery</a>
					</li>
					<li>
						<a href="AlumniDonation.php">Donations</a>
					</li>
					<li>
						<a href="contact.php">Contact</a>
					</li>
					<li>
						<a href="logOut.php">Logout</a>
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
					<p>Alumni Profile picture Here</p>
					<ul>
						<p>Alumni functionalities links here</p>
					</ul>
				</div>
			</div>
			<div>
				
			<p>
			<b>
			<style="font-family:quattrocento_sansregular;font-size:14px;font-color: dark blue">
			Contact US:
			Team Connect
			E-Mail : admin@uncc.edu
			</style>
			</b>
			
			</p>
				
			</form>
			</p>
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