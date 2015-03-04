<?php
include 'conn.php';
     $person_id = mysqli_real_escape_string($conn,$_POST['pid']);
     $password = mysqli_real_escape_string($conn,$_POST['pwd']);
     $usertype = mysqli_real_escape_string($conn,$_POST['usertype']);
     $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
     $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
     $date_of_brith = mysqli_real_escape_string($conn,$_POST['date_of_brith']);
     $major = mysqli_real_escape_string($conn,$_POST['major']);
     $grad_year = mysqli_real_escape_string($conn,$_POST['grad_year']);
     if (!isset($_POST['submit']))
     {
         if($_POST['approve'] == 'Approve'){
         if(isset($pid) && isset($password) && !isset($usertype) == '')
            {
                echo "You did not fill out the required fields.";
            }
        $query= "INSERT INTO login (email, password, person_id,usertype) VALUES ('','$password', '$person_id','$usertype'); ";
        $result = mysqli_query($conn, $query);
        echo $query;
        $query2 = "insert into person (person_id,firstname,lastname, date_of_birth,type)values ('$person_id','$firstname','$lastname', '$date_of_brith' , 'alumni')";
        $result2 = mysqli_query($conn, $query2);
        echo $query2;
		$query = "insert into alumni (person_id,alumni_type) values ('$person_id','$usertype')";
		$result = mysqli_query($conn, $query);
		if($usertype == 'student alumni'){
			$query = "insert into student_alumni (person_id) values ('$person_id')";
			$result = mysqli_query($conn, $query);
		}else if($usertype == 'faculty alumni'){
			$query = "insert into faculty_alumni (person_id) values ('$person_id')";
			$result = mysqli_query($conn, $query);
			
			echo "FACULTY ALUMNI";
		}
        echo "<h2>User Details submitted successfully!!</h2>";
        $query = "update alumni_request set status='approved' where firstname = '$firstname' and lastname = '$lastname'";
         $result2 = mysqli_query($conn, $query);
        }else if($_POST['approve']=='Reject'){
        echo $query = "update alumni_request set status='rejected' where firstname = '$firstname' and lastname = '$lastname'";
         $result2 = mysqli_query($conn, $query);
        } 
     }
    header('Location:AdminHome.php');
     ?>