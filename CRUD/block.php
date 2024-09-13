<?php 
include('connection.php');
$block_id= $_REQUEST['blk'];
$sql= "UPDATE `multi_user` SET `auth`='1' WHERE `user_id`='$block_id'";
$data= mysqli_query($conn,$sql);
if($data)
{
	echo "<script>alert('User Blocked')</script>";
	echo "<script>window.location.href='displayadmin.php'</script>";
}
?>