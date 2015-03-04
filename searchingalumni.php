<?php include 'conn.php'; 
if($_SESSION['person_id'] == $_SESSION['userLogin'])
{
$personInfo = $_SESSION['personInfo'];
$alumniInfo = $_SESSION['alumniInfo'];
$person_id = $_SESSION['person_id'];
$Connected_to = mysqli_real_escape_string($conn, $_GET['userId']);
$Connected_by = $_SESSION['person_id'];


                        
                        if ($_SESSION['displayData'] != null) {
                            $date = date("Y-m-d");
                            echo $date;
                            $print = $_SESSION['displayData'];
                            //$fname = mysqli_real_escape_string($conn, $_GET['firstname']);
                            $query = "INSERT INTO connections (connected_to, connected_by, connection_date, 
                        connection_status, person_id)  VALUES('$Connected_to', '$Connected_by', '$date', 'inactive', '$Connected_by')";
                           //echo $query;
                            $sql = mysqli_query($conn, $query);
                           // if($sql)
							//{
							header("Location:searchAlumni.php");
							//}
                     
			 
	}else{
		header('Location:index.php');
	}
	}
	?>