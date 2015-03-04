<!DOCTYPE html>
<?php include 'conn.php'; 
if($_SESSION['person_id'] == $_SESSION['userLogin'])
{
	$personInfo = $_SESSION['personInfo'];
	$alumniInfo = $_SESSION['alumniInfo'];
	$person_id = $_SESSION['person_id'];
	$connected_by = $_GET['connected_by'];
	$connected_to = $_SESSION['person_id'];
	if($_GET['status'] == 'accept'){
	$query1 = "update connections set connection_status='active' where connected_to='$connected_to' and connected_by='$connected_by'";
	}else if($_GET['status'] == 'reject'){
	$query1 = "update connections set connection_status='rejected' where connected_to='$connected_to' and connected_by='$connected_by'";
	}
	$result = mysqli_query($conn, $query1);				 
	header('Location:showConnectionInvites.php');
	}else{
		header('Location:index.php');
	}
?>