  <html>
   <?php
    include 'conn.php';
     $person_id = mysqli_real_escape_string($conn,$_POST['pid']);
     $password = mysqli_real_escape_string($conn,$_POST['pwd']);
	 $_SESSION['userLogin'] = $person_id;
     if (!isset($_POST['submit']))
     {
		$query="select * from login where person_id = '$person_id' and password = '$password'";
		$result = mysqli_query($conn,$query);
		$loginFetch = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		if($loginFetch['person_id']==$person_id){
			$query = "select * from person where person_id = '$person_id'";
			$result = mysqli_query($conn,$query);
			$loginFetch = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$_SESSION['person_id'] = $loginFetch['person_id'];
			$_SESSION['personInfo'] = $loginFetch;
			$_SESSION['firstname'] = $loginFetch['firstname'];
			if($loginFetch['type'] == 'alumni'){
				$query = "select * from alumni where person_id = '$person_id'";
				$result = mysqli_query($conn,$query);
				$loginFetch = mysqli_fetch_array($result,MYSQLI_ASSOC);
				$_SESSION['alumniInfo'] = $loginFetch;
				if($loginFetch['alumni_type'] == 'faculty alumni'){
					$query = "select * from faculty_alumni where person_id = '$person_id'";	
					$result = mysqli_query($conn,$query);
					$loginFetch = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$_SESSION['otherInfo'] = $loginFetch;
					
					header('Location:FacultyHomepage.php');
				}else if($loginFetch['alumni_type'] == 'student alumni'){
					$query = "select * from student_alumni where person_id = '$person_id'";	
					$result = mysqli_query($conn,$query);
					$loginFetch = mysqli_fetch_array($result,MYSQLI_ASSOC);	
					$_SESSION['otherInfo'] = $loginFetch;
					
					header('Location:StudentHomepage.php');					
				}
				
				
			}else if($loginFetch['type'] == 'faculty'){
				header('Location:FacultyHomepage.php');
				
			}else if($loginFetch['type'] == 'administrator'){
				$_SESSION['alumniInfo'] = $_SESSION['personInfo'];
				
				header('Location:AdminHome.php');
			}
        }else{
			header('Location:index.php');
		}
     }else{
		header('Location:index.php');
	 }
     
        ?>
		</html>