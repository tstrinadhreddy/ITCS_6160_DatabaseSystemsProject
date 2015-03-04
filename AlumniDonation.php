<?php include 'conn.php'; $person_id=$_SESSION['person_id'];if($_SESSION['person_id']){$personInfo = $_SESSION['personInfo'];$alumniInfo = $_SESSION['alumniInfo'];?><!DOCTYPE html><html>
<head>
	<meta charset="UTF-8">
	<title>Edit your Details here</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<!-- 
<?php
include "config.inc.php"
?>
 -->
	<div class="header">		<div>			<span id="logo"><img src="images/header-logo.png" /></span>			<div>				<ul>					<li>					<?php if($alumniInfo['alumni_type'] == 'faculty alumni') 					{					?>						<a href="FacultyHomepage.php">Home</a>					<?php } else { ?>						<a href="StudentHomepage.php">Home</a>						<?php } ?>					</li>					<li>						<!--<a href="gallery.php">Gallery</a> -->						<a href="gallery.php?person_id=<?php echo $person_id;?>" > Gallery </a>					</li>					<li>						<a href="AlumniDonation.php">Alumni Donation</a>					</li>					<li>						<a href="searchAlumni.php">Search Alumni</a>					</li>					<li>						<a href="logOut.php">logout</a>					</li>				</ul>			</div>		</div>	</div>
	<div class="body">
		<div class="donate">
			<div>
				<h2>Profile</h2>
				<div>					<p><h3><center><a href="viewProfile.php?person_id=<?php echo $personInfo['person_id'];?>"><?php 					echo $personInfo['firstname'];					echo " ";					echo $personInfo['lastname'];					?>					</a></h3><br /></center>					<center><img src='<?php echo $personInfo['photo'];?>' width=120px height=120px vspace=3px hspace=5px id='displayimage'> </center></a>					</p>					<ul>					<p> Alumni functionalities links here</p>					<a href="showConnectionInvites.php?pid=<?php echo $_SESSION['person_id']; ?>">Show Connections</a>					</ul>				</div>
			</div>
			<div>
				<h2>Donate for a cause</h2>
			</div>			<?php			if (isset($_POST['submit']) && $_SESSION['donation']!=null && $_SESSION["donation"] == "Donation")			{			//echo "<style ="color: Green; font-family:quattrocento_sansregular;font-size:14px ">			 echo "<b> Donated Successfully!! </b>";			 			}			//print_r($_SESSION["donation"]);			?>
			<form action="insert.php" method="POST">
			<div>
				<p> Select Event Type to Donate For : </p>
			<?php
			$sql = "SELECT event_id,event_type FROM event where event_date > NOW()"; 
			$q = mysqli_query ($conn, $sql); 
			echo "<select name=event_type value=''>Event Type</option>";
			while($row = mysqli_fetch_array($q))
			{
				echo "<option value=$row[event_type]>$row[event_type]</option>"; 			
			}
			echo "</select>";
			?>
				<p> Donation Towards : </p>
				<select name=donationtowards value=''>
  					<option value="infrastructure">Infrastructure</option>
  					<option value="transport">Transport</option>
				  	<option value="sports">Sports</option>
					<option value="internships">Internships</option>
				</select>
				<p> Amount to Donate($) : </p>
				<input type="text" name="amount">
				<p> Donation Method : </p>
				<select name=donationmethod value=''>
  					<option value="dd">Demand Draft</option>
  					<option value="cheque">Cheque</option>
				  	<option value="card">Credit/Debit Card</option>
					<option value="wire">Wire</option>
				</select>			<br /><br />
			<input type="submit">
			</div>
			<form>									<div>			<br></br><br></br><b> Donation History </b> <br></br>		<?php		$person_id=$_SESSION['person_id'];		$fetch_comment="SELECT * FROM `alumni_donations` where person_id=$person_id order by donation_made_on desc";		$query_result = mysqli_query($conn,$fetch_comment);		?>		<table style="border:1px solid">		<tr>                    <th>Donation Made on</th><th>Donation Towards</th><th>Donation Amount</th><th>Payment Type</th>		<tr>		<?php			while($result = mysqli_fetch_row($query_result))		{ ?>							<tr >		<td><?php echo $result[5];;?></td>						<td><?php echo $result[3]?></td>			<td><?php echo $result[4]?></td>			<td><?php echo $result[2];?></td>				<tr>			<?php }		?></table>		<?php	}	?>					</div>
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
</body>
</html>