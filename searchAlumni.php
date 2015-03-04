<?php include 'conn.php'; 
if($_SESSION['person_id'] == $_SESSION['userLogin'])
{
$personInfo = $_SESSION['personInfo'];
$alumniInfo = $_SESSION['alumniInfo'];
$person_id = $_SESSION['person_id'];

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
				<h2>Search Alumni </h2>
				<p>Descriptions</p>
					<p>
				</p>
			<p>
			<hr></hr>
                        <form action = "displaySearchData.php" method="post">
		<p>
		Alumni Search<span style="padding-left:30px;"><input type="submit" name="submit" value="Search" style="background:orange;color:brown;border-radius:8px;border-color:orange;font-size:12px;font-family:georgia;"/>
		</p>
			<input type="text" placeholder="First Name" name="firstname"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="text" placeholder="Last Name" name="lastname"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="text" placeholder="ID" name="ID"/><br /><br />
			<input type="text" placeholder="Department" name="department"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<select name="state">
				<option value>state</option>
				<option value="AL">Alabama</option>
				<option value="AK">Alaska</option>
				<option value="AZ">Arizona</option>
				<option value="AR">Arkansas</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DE">Delaware</option>
				<option value="DC">District Of Columbia</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="IA">Iowa</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="ME">Maine</option>
				<option value="MD">Maryland</option>
				<option value="MA">Massachusetts</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MS">Mississippi</option>
				<option value="MO">Missouri</option>
				<option value="MT">Montana</option>
				<option value="NE">Nebraska</option>
				<option value="NV">Nevada</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NY">New York</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UT">Utah</option>
				<option value="VT">Vermont</option>
				<option value="VA">Virginia</option>
				<option value="WA">Washington</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
			</select>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;
			<input type="text" placeholder="Zipcode" name="zipCode"/>
			<br /><br /><br /><br />
			<?php
		if($_SESSION['displayData']!=null ){
		$print = $_SESSION['displayData'];
		?>
		<table style="border:1px solid">
		<tr>
                    <th>First Name</th><th>Last Name</th><th>City</th><th>State</th><th>View Profile</th><th>Gallery</th>
		<tr>
		<?php
               //print_r($print);
		for($i=0;$i<sizeof($print);$i++){ ?>
		<tr >
			<td><?php echo $print[$i]['firstname'];?></td>
			<td><?php echo $print[$i]['lastname'];?></td>
			<td><?php echo $print[$i]['city'];?></td>
			<td><?php echo $print[$i]['state'];?></td>

			<td><a href="viewProfile.php?person_id=<?php echo $print[$i]['person_id'];?>">View Profile</a></td>
			
			
			<?php
			$prsn=$_SESSION['person_id'];
						$p = $print[$i]['person_id'];
						//echo $prsn;
						//echo $p;
						$fetch_connection="select connection_status from connections where (connected_to=$prsn AND connected_by=$p) OR (connected_to=$p AND connected_by=$prsn)";
						$query_connection = mysqli_query($conn,$fetch_connection);
						$connection='test';
						if($query_connection === FALSE) {
							die(mysql_error()); // TODO: better error handling
							}

						while($result_connection = mysqli_fetch_row($query_connection))
						{
						if($result_connection[0]==  'active' )
						{
							$connection=$result_connection[0];
							//echo $connection;
						}
						}
						
						if($connection == 'active')
						{
			
			
			
			
			
			
			?>
			
			
			
			
			<td><a href="gallery.php?person_id=<?php echo $print[$i]['person_id'];?>">View Gallery</a></td>
			<?php } ?>
		<tr>	
		<?php }
		?></table>
		<?php
	}
	else{
		echo 'No Search Results found';
	}
?>	
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
	<?php 
}else{
		header('Location:index.php');
	}
?>