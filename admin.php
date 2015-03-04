<?php
    include 'conn.php';
     $firstname = mysqli_real_escape_string($conn,$_POST['fname']);
     $lastname = mysqli_real_escape_string($conn,$_POST['lname']);
     $date_of_birth = mysqli_real_escape_string($conn,$_POST['dob']);
     $major = mysqli_real_escape_string($conn,$_POST['major']);
     $grad_year = mysqli_real_escape_string($conn,$_POST['gradyear']);
     
     if (!isset($_POST['submit']))
     {
        $query= "INSERT INTO alumni_request (date_of_brith, lastname, firstname, sid_eid, grad_year,
                  person_id, major,status) VALUES ('$date_of_birth', '$lastname', '$firstname',NULL, '$grad_year',NULL, '$major','pending'); ";
       
        $result = mysqli_query($conn, $query);
        
        echo $query;
			header('Location:index.php');
           // echo "<h2>User Details submitted successfully!!</h2>";
        }
        else{
            header("Location:register.php");
        }
        
    
     ?>