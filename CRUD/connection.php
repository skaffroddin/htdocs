<?php 
$servername= 'localhost';
$username= 'root';
$password= '';
$db= 'sat_sun12to3_may';
$conn= mysqli_connect($servername,$username,$password,$db);
if($conn)
{
	//echo "Connection Successfull";
}
else
{
	echo "Not Connected";
}
?>