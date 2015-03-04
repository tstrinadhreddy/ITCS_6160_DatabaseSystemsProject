<?php
    session_start();
include 'includes\connection.php';
     
     
     $firstname = mysqli_real_escape_string($conn,$_SESSION['firstname']);
     $lastname = mysqli_real_escape_string($conn,$_SESSION['lastname']);
     echo $firstname;
     echo $lastname;

     if (!isset($_POST['submit']))
     {
         if(isset($pid) && isset($password) && !isset($usertype) == '')
            {
                echo "You did not fill out the required fields.";
            }
        
        
       //$query= "UPDATE login set email='',password='$password',person_id='$person_id',usertype='$usertype' where firstname='$firstname' and lastname='$lastname' ";
       $query= "DELETE FROM `university_alumni`.`person` WHERE firstname='sri' and lastname='ram'";
        $result = mysqli_query($conn, $query);
        echo $query;
       
            echo "<h2>User Details submitted successfully!!</h2>";
            mysqli_close($conn);
        }
        else{
            echo 'Details are Incorrect. Please Check again.';
            header("Location:create.php");
        }
        
        

    
     ?>