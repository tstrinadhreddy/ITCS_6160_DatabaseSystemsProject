<?php
    include 'conn.php';
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
            $facebook = mysqli_real_escape_string($conn,$_POST['fb']);
            $linkedin = mysqli_real_escape_string($conn,$_POST['linkedin']);
            $twitter = mysqli_real_escape_string($conn,$_POST['twitter']);
            $sports = mysqli_real_escape_string($conn,$_POST['sports']);
            $committees = mysqli_real_escape_string($conn,$_POST['committees']);
            $gradyear = mysqli_real_escape_string($conn,$_POST['gradyear']);
            $majoradv = mysqli_real_escape_string($conn,$_POST['majoradv']);
            $majordept = mysqli_real_escape_string($conn,$_POST['majordept']);
            $awards = mysqli_real_escape_string($conn,$_POST['awards']);
            if (!isset($_POST['submit']))
     {
            $query3 = "UPDATE `university_alumni`.`person` SET `middlename` ='$middlename', `email` = '$email', 
                     `gender` = '$gender', `phone` = '$phone', `apt_number` = '$aptno', `street name` = '$sname', 
                     `city` = '$city', `state` = '$state', `zip` = '$zip' 
                     WHERE `person`.`person_id` = '$person_id'";    
                $result3 = mysqli_query($conn, $query3);
                //echo $query3;
            $query4= "UPDATE `university_alumni`.`alumni` SET `facebook_id` ='$facebook',`linkedin_id`='$linkedin',
                           `twitter_id`='$twitter',`sports_played`= '$sports',`college_committees`='$committees'
                      WHERE `alumni`.`person_id` = '$person_id' ";
             $result4 = mysqli_query($conn, $query4);
             $query5 = "UPDATE `university_alumni`.`student_alumni` SET `grad_year` ='$gradyear',`major_advisor`='$majoradv',
                           `major_dept`='$majordept',`awards`='$awards'
                      WHERE `student_alumni`.`person_id` = '$person_id' ";
              $result5 = mysqli_query($conn, $query5);
			  
			   $query = "select * from alumni where person_id = '$person_id'";
			$result = mysqli_query($conn,$query);
			$loginFetch = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$_SESSION['alumniInfo'] = $loginFetch;
			
			$query = "select * from student_alumni where person_id = '$person_id'";
			$result = mysqli_query($conn,$query);
			$loginFetch = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$_SESSION['otherInfo'] = $loginFetch;
			  
              $query = "select * from person where person_id = '$person_id'";
			$result = mysqli_query($conn,$query);
			$loginFetch = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$_SESSION['personInfo'] = $loginFetch;
			  header("Location:StudentHomepage.php" );
     }
     else{
     header("Location :StudentHomepage.php" );
     }
     
        ?>