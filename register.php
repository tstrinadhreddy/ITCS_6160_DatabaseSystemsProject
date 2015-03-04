<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit your Details here</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
<script language="JavaScript">
function valid()
{
var a = document.f.fname.value;
var b = document.f.lname.value;
var c = document.f.dob.value;
var d = document.f.major.value;
var e = document.f.gradyear.value;

if(a=="")
{
alert("Enter your Firstname");
document.f.fname.focus();
return false;
}
if(b=="")
{
alert("Enter your Lastname");
document.f.lname.focus();
return false;
}
if(c=="")
{
alert("Enter your Date of Birth");
document.f.dob.focus();
return false;
}
if(d=="")
{
alert("Enter your major");
document.f.major.focus();
return false;
}
if(e=="")
{
alert("Enter your Grad Year");
document.f.gradyear.focus();
return false;
}
if(f=="")
{
alert("Enter your email");
document.f.email.focus();
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
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="#">About</a>
					</li>
										
				</ul>
			</div>
		</div>
	</div>
	<div class="body">
		<div class="donate">
			<div>
				
			</div>
			<div>
                        <!-- // Content Page starts-->
                        
                        
		
                            <h2><center> Create Account</center> </h2>
            <table align="center" width="400" style="border:1px solid green;">
        <form name="f" action="admin.php" method="post" onsubmit="return valid();">
            <tr>
                <td>
                First Name :
                </td>
                <td><input type="text" name="fname" required></td>
            </tr>
            <tr>
                <td>Last Name  :</td>
                <td><input type="text" name="lname" required> </td>
            </tr>
            <tr>
                <td>Date Of Birth (YYYY-MM-DD):</td>
                <td><input type="text" name="dob" required> </td>
            </tr>
        
        <tr>
                <td> Major : </td>
                <td><input type="text" name="major" required></td>
            </tr>
       
        <tr>
                <td> Year Of Graduation :</td>
                <td><input type="text" name="gradyear" required> </td>
            </tr>
            <tr>
                <td> email :</td>
                <td><input type="text" name="email" required> </td>
            </tr>
        <tr>
            <td></td>
                <td height="52" ><input type="submit" value="submit"></td>
            </tr>
        
        </form>
                         </table>

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