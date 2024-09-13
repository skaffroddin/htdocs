<?php 
session_start();
include("connection.php");
$email= $_REQUEST['email'];
$password= md5($_REQUEST['password']);
//echo $email,$password;
$sql= "SELECT * FROM `multi_user` WHERE `email`='$email' AND `password`='$password'";
$data= mysqli_query($conn,$sql);
$total=mysqli_num_rows($data);
$result= mysqli_fetch_assoc($data);
$user= $result['user_type'];
$auth= $result['auth'];
if($total) 
{
	//echo "login success";
	if($auth==0)
	{
		if($user=='ADMIN')
		{
			header("location:displayadmin.php");
		}
		else
		{
			$_SESSION['id']=$result['user_id'];
			header("location:displayclient.php");
		}
	}
	else
	{
		echo "<script>alert('You are blocked by admin')</script>";
		echo "<script>window.location.href='login.php'</script>";
	}
}
else
{
	echo "login failure";
}
?>