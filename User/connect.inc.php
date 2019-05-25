<?php
//$con = mysqli_connect("mysql.hostinger.in","u413936529_divya","divi1234","u413936529_web");
$con = mysqli_connect("localhost","root","","easeYourLifeAssignment");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// else{
//   echo "Successfully connected to local database.";
// }

?>
