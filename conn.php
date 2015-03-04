<?php
$conn = mysqli_connect("localhost","root","","university_alumni");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 session_start();
?>