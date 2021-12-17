<?php
require('dbconn.php');

$bookid=$_GET['id1'];
$rollno=$_GET['id2'];

$sql="select Divisi from repo.user where Username='$rollno'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

$divisi=$row['Divisi'];



if($divisi == 'FTA' || $divisi == 'HCGA' )
{$sql1="update repo.record set Date_of_Issue=curdate(),Due_Date=date_add(curdate(),interval 30 day),
    Renewals_left=0 where KodePelaksana='$bookid' and Username='$rollno'";
 
if($conn->query($sql1) === TRUE)
{$sql3="update repo.buku set Jumlah=Jumlah-1 where KodePelaksana='$bookid'";
 $result=$conn->query($sql3);
 $sql5="insert into repo.message (Username,Msg,Date,Time) 
 values ('$rollno','Your request for issue of Buku: $bookid  has been accepted',curdate(),curtime())";
 $result=$conn->query($sql5);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=issue_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:1; url=issue_requests.php", true, 303);

}
}
else
{$sql2="update repo.record set Date_of_Issue=curdate(),Due_Date=date_add(curdate(),interval 30 day),Renewals_left=0 
    where KodePelaksana='$bookid' and Username='$rollno'";

if($conn->query($sql2) === TRUE)
{$sql4="update repo.buku set Jumlah=Jumlah-1 where KodePelaksana='$bookid'";
 $result=$conn->query($sql4);
 $sql6="insert into repo.message (Username,Msg,Date,Time) 
 values ('$rollno','Your request for issue of Buku: $bookid has been accepted',curdate(),curtime())";
 $result=$conn->query($sql6);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:1; url=issue_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:1; url=issue_requests.php", true, 303);

}
}



?>