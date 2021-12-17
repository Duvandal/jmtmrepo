<?php
require('dbconn.php');

$id=$_GET['id'];

$user=$_SESSION['Username'];

$sql="insert into repo.record (Username,KodePelaksana,Time) values ('$user','$id', curtime())";

if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'>alert('Request Sent to Admin.')</script>";
header( "Refresh:0.01; url=book.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Request Already Sent.')</script>";
    header( "Refresh:0.01; url=book.php", true, 303);

}




?>