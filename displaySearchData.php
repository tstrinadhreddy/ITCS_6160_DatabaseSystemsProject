<?php
include 'conn.php';
$firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
$lastname=mysqli_real_escape_string($conn,$_POST['lastname']);
$person_id=mysqli_real_escape_string($conn,$_POST['ID']);
$state=mysqli_real_escape_string($conn,$_POST['state']);
//$city=mysqli_real_escape_string($conn,$_POST['city']);
$city = "";
$department = mysqli_real_escape_string($conn,$_POST['department']);
$query='';
if($person_id != null){
	$query="select firstname, lastname, city, state,person_id from person where person_id = '$person_id';";
	
} elseif ($firstname != null and $lastname == null){
	$query="select firstname, lastname, city, state,person_id from person where firstname like '%$firstname%' and type like '%alumni%';"; 
	
} elseif ($firstname != null and $lastname  != null){
	$query="select firstname, lastname, city, state,person_id from person where firstname like '%$firstname%' and lastname like '%$lastname%' and type like '%alumni%;";
	
} elseif ($person_id  != null){
	$query="select firstname, lastname, city, state,person_id from person where person_id = '$person_id' and type like '%alumni%;";
	
} elseif($firstname  != null and $lastname  != null and $department  != null ){
	$query="select firstname, lastname, city, state,person_id from person p , faculty_alumni fa, student_alumni sa  
	where p.firstname like '%$firstname%' and p.lastname like '%$lastname%' and sa.major_dept = fa.department and fa.department like '%$department%' and type like '%alumni%;";
	
} elseif($firstname  != null ){
	$query="select firstname, lastname, city, state,,person_id from person p , faculty_alumni fa, student_alumni sa  
	where p.firstname like '%$firstname%' and sa.major_dept = fa.department and fa.department like '%$department%' and type like '%alumni%;";
	
} elseif($firstname  != null and $lastname  != null and $city  != null ){
	$query="select firstname, lastname, city, state,person_id from person p where firstname like '%$firstname%' and lastname like '%$lastname%' and city like '%$city%' and type like '%alumni%;";
	
} elseif($firstname  != null and $lastname  != null and $city  != null and $state  != null ){
	$query="select firstname, lastname, city, state,person_id from person p where firstname like '%$firsname%' and lastname like '%$lastname%' and city like '%$city%' and state like '%$state%' and type like '%alumni%;";
	
} elseif($firstname  != null and $lastname  != null and $state  != null ){
	$query="select firstname, lastname, city, state,person_id from person p where firstname like '%$firstname%' and lastname like '%$lastname%' and state like '%$state%' and type like '%alumni%;";
	
} elseif($firstname  != null and $city  != null ){
	$query="select firstname, lastname, city, state,person_id from person p where firstname like '%$firstname%' and city like '%$city%' and type like '%alumni%;";
	
} elseif($firstname  != null and $city  != null and $state  != null ){
	$query="select firstname, lastname, city, state,person_id from person p where firstname like '%$firstname%' and city like '%$city%' and state like '%$state%' and type like '%alumni%;";
	
} elseif($firstname != null and $state  != null ){
	$query="select firstname, lastname, city, state,person_id from person p where firstname like '%$firstname%' and state like '%$state%' and type like '%alumni%;";
	
} elseif($firstname  != null and $lastname  != null and $state  != null ){
	$query="select firstname, lastname, city, state,person_id from search_dept_view  
	where firstname like '%$firstname%' and lastname like '%$lastname%' and state like '%$state%' and fa.department like '%$department%' ";
	
} elseif($firstname  != null and $state  != null and $city  != null ){
	$query="select firstname, lastname, city, state,person_id from search_dept_view  
	where firstname like '%$firstname%' and state like '%$state%' and city like '%$city%' and fa.department like '%$department%' ";
}
	if ($query != '')
	{
		$array = array();
		$i = 0;
		$execute=$conn->query($query);
		while($fetchData=mysqli_fetch_assoc($execute))
		{
			$array[$i] = $fetchData;
			$i++;		
		}
		
		if($i!=0){
			$_SESSION['displayData'] = $array;
			header('Location:searchAlumni.php');
		}else{
			$_SESSION['displayData'] = null;
			header('Location:searchAlumni.php');
		}
	
	}else{
		$_SESSION['displayData'] = null;
		header('Location:searchAlumni.php');
	}
?>