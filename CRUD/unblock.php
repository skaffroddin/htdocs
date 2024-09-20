<?php 
include('connection.php');
$unblock_id= $_REQUEST['ublk'];
$sql= "UPDATE `multi_user` SET `auth`='0' WHERE `user_id`='$unblock_id'";
$data= mysqli_query($conn,$sql);
if($data)
{
	echo "<script>alert('User Unblocked')</script>";
	echo "<script>window.location.href='displayadmin.php'</script>";
}
?>