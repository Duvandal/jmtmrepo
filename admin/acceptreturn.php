<?php
require('dbconn.php');

$bookid=$_GET['id1'];
$username=$_GET['id2'];
$dues=$_GET['id3'];

$sql="select Divisi from repo.user where Username='$username'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

$divisi=$row['Divisi'];




$sql1="update repo.record set Date_of_Return=curdate(),Dues='$dues' where KodePelaksana='$bookid' and Username='$username'";
 
if($conn->query($sql1) === TRUE)
{$sql3="update repo.buku set Jumlah=Jumlah+1 where KodePelaksana='$bookid'";
 $result=$conn->query($sql3);
 $sql4="delete from repo.return where KodePelaksana='$bookid' and Username='$username'";
 $result=$conn->query($sql4);
 $sql5="insert into repo.message (Username,Msg,Date,Time) values ('$username','Pengembalian berhasil',curdate(),curtime())";
 $result=$conn->query($sql5);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=return_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:1; url=return_requests.php", true, 303);

}





?>