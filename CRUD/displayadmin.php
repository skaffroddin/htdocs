<?php 
include("connection.php");
$sql= "SELECT * FROM `multi_user` WHERE `user_type`='CLIENT'";
$data= mysqli_query($conn,$sql);
// $result= mysqli_fetch_assoc($data);
// print_r($result['name']);
?>
<h3>Welcome Admin...</h3>
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
			<a href="block.php?blk=<?php echo $result['user_id']?>">Block</a> ||
			<a href="unblock.php?ublk=<?php echo $result['user_id']?>">Unblock</a> ||
			
		</td>
	</tr>
	<?php
}
?>
</table>
<center><button><a href="logout.php">Logout</a></button></center>