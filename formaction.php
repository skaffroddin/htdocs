<?php 
include('connection.php');
$name= $_REQUEST['nme'];
$email= $_REQUEST['eml'];
$password= $_REQUEST['psw'];
$phone= $_REQUEST['phn'];
$gender= $_REQUEST['gen'];
$degree= $_REQUEST['deg'];
$language= $_REQUEST['lang'];
echo $name, $email,$password,$phone,$gender,$degree,$language;
?>