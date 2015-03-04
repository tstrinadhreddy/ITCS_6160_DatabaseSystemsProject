<?php
    include 'conn.php';
	session_start();
            $middlename = mysqli_real_escape_string($conn,$_POST['middlename']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $gender = mysqli_real_escape_string($conn,$_POST['gender']);
            $phone = mysqli_real_escape_string($conn,$_POST['phone']);
            $aptno = mysqli_real_escape_string($conn,$_POST['aptno']);
            $sname = mysqli_real_escape_string($conn,$_POST['sname']);
            $city = mysqli_real_escape_string($conn,$_POST['city']);
            $state = mysqli_real_escape_string($conn,$_POST['state']);
            $zip = mysqli_real_escape_string($conn,$_POST['zip']);
            $person_id=  mysqli_real_escape_string($conn,$_POST['pid']);
            
            if (!isset($_POST['submit']))
     {
          //$query3 = "UPDATE person SET middlename ='$middlename',email='$email',gender='$gender',phone='$phone'
            //         apt_number='$aptno',city='$city',state='$state',zip='$zip' where person_id='$person_id'";
             
                
            $query3 = "UPDATE `university_alumni`.`person` SET `middlename` ='$middlename', `email` = '$email', 
                     `gender` = '$gender', `phone` = '$phone', `apt_number` = '$aptno', `street name` = '$sname', 
                     `city` = '$city', `state` = '$state', `zip` = '$zip' 
                     WHERE `person`.`person_id` = '$person_id'";    
                $result3 = mysqli_query($conn, $query3);
                echo $query3;
				header("Location :SearchAlumni.php" );
			
     }
     else{
     header("Location :person.php" );
     }
     
        ?>