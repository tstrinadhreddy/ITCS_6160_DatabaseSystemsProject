<?php include 'conn.php'; 
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
	<div class="header">
	<div class="body">
		<div class="donate">
			<div>
				<h2>Profile</h2>
				<div>
			</div>
			<div>
				<h2>Donate for a cause</h2>
			</div>
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
				</select>
			<input type="submit">
			</div>
			<form>
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