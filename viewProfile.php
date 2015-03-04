

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include('conn.php');
$person_id = $_GET['person_id'];
//echo "$person_id";
echo $query = "select * from person where person_id = '$person_id'";
$result = mysqli_query($conn , $query);
while($fetchData = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $_SESSION['basicInfo'] = $fetchData;
    if($fetchData['type'] == 'student alumni' || 'faculty alumni'){
	echo $query="select * from alumni where person_id = '$person_id'";
	 $result = mysqli_query($conn , $query);
     while($dataFetched = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			if($dataFetched['alumni_type'] == 'faculty alumni'){
				echo $query = "select * from faculty_alumni where person_id = '$person_id'";
				$_SESSION['type'] = "faculty alumni";
			}else{
				echo $query = "select * from student_alumni where person_id = '$person_id'";
				$_SESSION['type'] = "student alumni";
			}
			$result = mysqli_query($conn , $query);
			while($dataFetched = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$_SESSION['personalInfo'] = $dataFetched;
			}
		}    
	}
}
header('Location:displayAlumniProfile.php');
?>
