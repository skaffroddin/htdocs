<?php 
session_start();
include("connection.php");
$id= $_SESSION['id'];
$sql= "SELECT * FROM `multi_user` WHERE `user_id`='$id'";
$data= mysqli_query($conn,$sql);
$data1= mysqli_query($conn,$sql);
$result= mysqli_fetch_assoc($data1);
//print_r($result['name']);
$client=$result['name'];
?>
<h3><?php echo "Welcome ".$client;?></h3>
<table border="1px">
	<tr>
		<th>Sl No.</th>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Phone</th>
		<th>Gender</th>
		<th>Degree</th>
		<th>Language</th>
		<th>Image</th>
		<th>Action</th>
	</tr>
<?php
$i=1;
while($result= mysqli_fetch_assoc($data)) 
{
	// print_r($result['name']);
	?>
	<tr>
		<td><?php echo $i;$i++;?></td>
		<td><?php echo $result['name']; ?></td>
		<td><?php echo $result['email']; ?></td>
		<td><?php echo $result['password']; ?></td>
		<td><?php echo $result['phone']; ?></td>
		<td><?php echo $result['gender']; ?></td>
		<td><?php echo $result['degree']; ?></td>
		<td><?php echo $result['language']; ?></td>
		<td><img src="<?php echo $result['image']; ?>" height="100px" width="100px"></td>
		<td>
			<a href="edit.php?ep=<?php echo $result['user_id']?>">Edit</a> ||
			<a href="changepass.php">Change Password</a> ||
			<a href="logout.php">Logout</a>
		</td>
	</tr>
	<?php
}
?>
</table>