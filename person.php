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
						<?php if($alumniInfo['alumni_type'] == 'faculty alumni') 
					{
					?>
						<a href="FacultyHomepage.php">Home</a>
					<?php } else { ?>
						<a href="StudentHomepage.php">Home</a>
						<?php } ?>
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
                            <!--Content Starts -->
        <?php
    include 'includes\connection.php';
     $person_id = mysqli_real_escape_string($conn,$_POST['pid']);
     $password = mysqli_real_escape_string($conn,$_POST['pwd']);
   
     
     if (!isset($_POST['submit']))
     {
        $query="select * from login where person_id='$person_id' and password = '$password'";
        $query2 = "SELECT * from person where person_id='$person_id'";
        $result2 = mysqli_query($conn, $query2);
        $personData = mysqli_fetch_array($result2);
        $result = mysqli_query($conn, $query);
        $fetchData = mysqli_fetch_array($result);
        $query3 = "select * from login where person_id='$person_id'";
        $query4 = "select * from alumni where person_id='$person_id' ";
        $result4 = mysqli_query($conn, $query4);
        $studentData = mysqli_fetch_array($result4);
        $query5 = "select * from student_alumni where person_id='$person_id' ";
        $result5 = mysqli_query($conn, $query5);
        $studentalData = mysqli_fetch_array($result5);
        $query6 = "select * from faculty_alumni where person_id='$person_id' ";
        $result6 = mysqli_query($conn, $query6);
        $facultyData = mysqli_fetch_array($result6);
        
      
         if($person_id == "800800800"){
            
            header("Location:authenticate1.php");    
        }
        if($fetchData['person_id'] == $person_id){
            echo "<h2>Welcome ".$personData[3]."!</h2>";
    
        }
   else{  
            header("Location:login.php");
        }  
     }
     
        ?>
    <?php if ($personData[14] == 'student alumni') 
        {  ?> 
                <form action="studentUpdate.php" method="post">
                 <table>
                Person ID : <input type="text" name="pid" value=<?php echo $personData[0]?> readonly /> <br />
                First Name:  <input type="text" value=<?php echo $personData[1]?> readonly /> <br />
                Middle Name : <input type="text" name="middlename" value=<?php echo $personData[2]?> > <br />
                Last Name : <input type="text" value=<?php echo $personData[3]?> readonly /> <br />
                email : <input type="text" name="email" value=<?php echo $personData[4]?> > <br />
                Gender : <input type="text" name="gender"  value=<?php echo $personData[5]?> > <br />
                Date of Birth : <input type="text" value=<?php echo $personData[6]?> readonly /> <br />
                Phone : <input type="text" name="phone" value=<?php echo $personData[7]?> > <br />
                Apt Number :  <input type="text" name="aptno" value=<?php echo $personData[8]?> > <br />
                Street Name :  <input type="text" name="sname" value=<?php echo $personData[9]?> > <br />
                City :  <input type="text" name="city" value=<?php echo $personData[10]?> > <br />
                State :  <input type="text" name="state" value=<?php echo $personData[11]?> > <br />
                Zip :  <input type="text" name="zip" value=<?php echo $personData[12]?> > <br />
                type :  <input type="text" value=<?php echo $personData[14]?> readonly /> <br />
                Facebook : <input type="text" name="fb" value=<?php echo $studentData[1]?>> <br />
                linkedin : <input type="text" name="linkedin" value=<?php echo $studentData[2]?> > <br />
                Twitter : <input type="text" name="twitter" value=<?php echo $studentData[3]?> > <br />
                Sports : <input type="text" name="sports" value=<?php echo $studentData[4]?>> <br />
                Committees :  <input type="text" name="committees" value=<?php echo $studentData[5]?>> <br />
                Grad Year:  <input type="text" name="gradyear" value=<?php echo $studentalData[1]?> > <br />
                Major Advisor :  <input type="text" name="majoradv" value=<?php echo $studentalData[2]?> > <br />
                Major Department :  <input type="text" name="majordept" value=<?php echo $studentalData[3]?> > <br />
                Awards :  <input type="text" name="awards" value=<?php echo $studentalData[4]?>> <br />
        
                </table>
                <input type="submit" value="Update">            
                 </form>                          
                            
            <?php } ?>
            <?php if ($personData[14] == 'faculty alumni') { ?>        
                      
                 <form action="facultyUpdate.php" method="post">
                 <table>
                Person ID : <input type="text" name="pid" value=<?php echo $personData[0]?> readonly /> <br />
                First Name:  <input type="text" value=<?php echo $personData[1]?> readonly /> <br />
                Middle Name : <input type="text" name="middlename" value=<?php echo $personData[2]?> > <br />
                Last Name : <input type="text" value=<?php echo $personData[3]?> readonly /> <br />
                email : <input type="text" name="email" value=<?php echo $personData[4]?> > <br />
                Gender : <input type="text" name="gender"  value=<?php echo $personData[5]?> > <br />
                Date of Birth : <input type="text" value=<?php echo $personData[6]?> readonly /> <br />
                Phone : <input type="text" name="phone" value=<?php echo $personData[7]?> > <br />
                Apt Number :  <input type="text" name="aptno" value=<?php echo $personData[8]?> > <br />
                Street Name :  <input type="text" name="sname" value=<?php echo $personData[9]?> > <br />
                City :  <input type="text" name="city" value=<?php echo $personData[10]?> > <br />
                State :  <input type="text" name="state" value=<?php echo $personData[11]?> > <br />
                Zip :  <input type="text" name="zip" value=<?php echo $personData[12]?> > <br />
                type :  <input type="text" value=<?php echo $personData[14]?> readonly /> <br />
                Facebook : <input type="text" name="fb" value=<?php echo $studentData[1]?>> <br />
                linkedin : <input type="text" name="linkedin" value=<?php echo $studentData[2]?> > <br />
                Twitter : <input type="text" name="twitter" value=<?php echo $studentData[3]?> > <br />
                Sports : <input type="text" name="sports" value=<?php echo $studentData[4]?>> <br />
                Committees :  <input type="text" name="committees" value=<?php echo $studentData[5]?>> <br />
                Specialization :  <input type="text" name="special" value=<?php echo $facultyData[1]?> > <br />
                Achievements :  <input type="text" name="achieve" value=<?php echo $facultyData[2]?> > <br />
                Department :  <input type="text" name="dept" value=<?php echo $facultyData[5]?> > <br />
                Research Area :  <input type="text" name="rarea" value=<?php echo $facultyData[6]?>> <br />
        
                </table>
                <input type="submit" value="Update">            
                 </form>                          
                            
               <?php } ?>
                                  
 <!--Content ends -->
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