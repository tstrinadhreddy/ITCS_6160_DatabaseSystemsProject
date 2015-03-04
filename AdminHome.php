<?php include 'conn.php';
$personInfo = $_SESSION['personInfo']; 
if(($_SESSION['person_id'] == $_SESSION['userLogin'])&&($personInfo['type']== 'administrator'))
{
$personInfo = $_SESSION['personInfo'];
$alumniInfo = $_SESSION['alumniInfo'];
?>
<head>
	<meta charset="UTF-8">
	<title>Edit your Details here</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
        <style>
            td{
                text-align: center;
            }
            th{
                background: graytext;
                border:1px solid;
            }
            table{
                border:1px solid;
            }
            td{
                border:1px solid;
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
						<a href="AdminHome.php">Home</a>
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
			
                            <!--Content Starts -->



 <?php
    require_once 'conn.php';
    $conn = new PDO("mysql:host=localhost;dbname=university_alumni", 'root', '');
    echo "Welcome ADMIN !";
    $sql = "SELECT firstname,lastname,date_of_brith,major,grad_year from alumni_request where status='pending'";
    $q = $conn->query($sql);   
    $q->setFetchMode(PDO::FETCH_ASSOC);
    
    
?>           
<table>
 <thead>
 <tr>
  <th>Person ID</th>
  <th>Password</th>   
 <th>User Type</th>
 <th>First Name</th>
 <th>Last Name</th>
 <th>D.O.B</th>
 <th>Major</th>
 <th>Grad Year</th>
 <th></th>
 </tr>
 </thead>
 <tbody>
 <?php while ($r = $q->fetch()): ?>
 <form action ="create.php" method="post" >
     <tr>
        <td><input type="text" name="pid" size="6"></td>
        <td><input type="text" name="pwd" size="6"></td>
<!--        <td><input type="text" name="usertype" size="6"></td>-->
        <td>
            <select name="usertype">
              <option value="">select</option>
              <option value="student alumni">student alumni</option>
              <option value="faculty alumni">faculty alumni</option>
              
            </select>
        </td>
        <td>
            <input type="hidden" name="firstname" value="<?php echo $r['firstname']; ?>" />
            <?php echo htmlspecialchars($r['firstname']); ?>
        </td>
        <td>
            <input type="hidden" name="lastname" value="<?php echo $r['lastname']; ?>" />
            <?php echo htmlspecialchars($r['lastname']); ?>
        </td>
        <td>
            <input type="hidden" name="date_of_brith" value="<?php echo $r['date_of_brith']; ?>" />
            <?php echo htmlspecialchars($r['date_of_brith']); ?>
        </td>
        <td>
            <input type="hidden" name="major" value="<?php echo $r['major']; ?>" />
            <?php echo htmlspecialchars($r['major']); ?>
        </td>
        <td>
            <input type="hidden" name="grad_year" value="<?php echo $r['grad_year']; ?>" />
            <?php echo htmlspecialchars($r['grad_year']); ?>
        </td>
        <td><input type="submit" name="approve" value="Approve" />&nbsp; &nbsp;<input type="submit" name="approve" value="Reject" /></td>
 </tr>
 </form>

 <br/>
 <?php endwhile; ?>
 </tbody>
</table>
 <!-- // Content Page ends-->
				
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