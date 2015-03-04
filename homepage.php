<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit your Details here</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
<script language="JavaScript">
function valid()
{
var a = document.f.pid.value;
var b = document.f.pwd.value;
if(a=="")
{
alert("Enter your ID");
document.f.pid.focus();
return false;
}
if(b=="")
{
alert("Enter your Password");
document.f.pwd.focus();
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
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#">About</a>
					</li>
					<li>
						<a href="gallery.php">Gallery</a>
					</li>
					<li>
						<a href="AlumniDonation.php">Alumni Donation</a>
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
					<p> Alumni functionalities links here</p>
					</ul>
				</div>
			</div>
			<div>
					<h3>Welcome <?php echo $_SESSION["person_id"]; ?></h4>
			
			
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