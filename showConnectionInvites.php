<!DOCTYPE html>
<?php include 'conn.php'; 
if($_SESSION['person_id'] == $_SESSION['userLogin'])
{
$personInfo = $_SESSION['personInfo'];
$alumniInfo = $_SESSION['alumniInfo'];
$pid = $_SESSION['person_id'];

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit your Details here</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
		<style>
		table{
			border: 1px solid;
		}
		tr{
			border : 1px solid;
		}
		td{
			border : 1px solid;
		}
		th{
			border : 1px solid;
			background : silver;
		}
		</style>
    </head>
    <body>
        <div class="header">
            <div>
                <div id="logo"><img src="images/header-logo.png" width="280px"/></div>
                <div id="menu">
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
						<li>
						<!--<a href="gallery.php">Gallery</a> -->
						<a href="gallery.php?person_id=<?php echo $pid;?>" > Gallery </a>
					</li>
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
					<p><h3><center><a href="gallery.php?person_id=<?php echo $personInfo['person_id'];?>"><?php 
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
                    <h2>Connection Invite</h2>
                    <p>Alumni can connect to other alumni by sending a connection invite.</p>
                        <?php
                        $query = "select connected_by,connection_date,connection_status,connected_to from connections where (connected_to='$pid' OR connected_by='$pid') and (connection_status = 'inactive' or connection_status = 'active') ";
                        //echo $query;
                        $result = mysqli_query($conn, $query);
                        //echo $query;
                        $array = array();
                        $i=0;
						if($result != null)
                        while ($fetchData = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                            //echo 'Name'." ".$fetchData[$fname];
                            $array[$i] = $fetchData;
                            $i++;
                            //echo $array;
                        }
                        ?>
                        <table>
                            <thead>
                            <th>
                                Connected By
                            </th>
							<th>
                                Connected To
                            </th>
                            <th>
                                Connection Requested On
                            </th>
                            <th>
                                Status
                            </th>
                            </thead>
                            <tbody>
                                
                                    <?php
                                    //print_r($array);
                                    for ($i = 0; $i < sizeof($array); $i++) {
                                        ?>
                                <tr>
                                    <td>
									
                                        <?php
												
												$connected_by = $array[$i]['connected_by'];
												$connected_to = $array[$i]['connected_to'];
												$connectedQuery = "select firstname from person where person_id = '$connected_by'";
												$resultData = mysqli_query($conn,$connectedQuery);
												$firstname = mysqli_fetch_assoc($resultData); ?>
												<a href='viewProfile.php?person_id=<?php echo "$connected_by";?>'>
												<?php echo $firstname['firstname'];
												echo "</a>";
												//echo $connected_by;
												//echo "   ";
												//echo $pid;
												echo "</td> <td>";
												$connectedQuery = "select firstname from person where person_id = '$connected_to'";
												$resultData = mysqli_query($conn,$connectedQuery);
												$firstname = mysqli_fetch_assoc($resultData); ?>
												<a href='viewProfile.php?person_id=<?php echo "$connected_to";?>'>
												<?php echo $firstname['firstname'];
												echo "</a>";
										?>
                                        <?php $name = $array[$i]['connected_by'];?>
                                    </td>
                                    <td>
                                        <?php echo $array[$i]['connection_date'];?>
                                    </td>
									
								   <td>
								   <?php 
								   if($connected_by==$pid)
								   {
								  // echo " Request Sent";
								   echo $array[$i]['connection_status'];
								   }
								   
								   else if($array[$i]['connection_status'] == 'inactive'){ ?>
                                        <a href="updateconnection.php?connected_to=<?php echo $pid; ?>&connected_by=<?php echo $name ?>&status=accept">Accept</a>
										<a href="updateconnection.php?connected_to=<?php echo $pid; ?>&connected_by=<?php echo $name ?>&status=reject">Reject</a>
                                    <?php }else if($array[$i]['connection_status'] == 'active'){
												echo $array[$i]['connection_status'];
											}
											
											?>
									</td>
									
                                </tr>
                                    <?php } ?>
                            </tbody>


                        </table>

                   
                    
                
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
                        <input type="text" value="Enter email address" onblur="this.value = !this.value ? 'Enter email address' : this.value;" onfocus="this.select()" onclick="this.value = '';">
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
                        <a href="gallery.php">Gallery</a>
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
<?php 
	}else{
		header('Location:index.php');
	}
?>