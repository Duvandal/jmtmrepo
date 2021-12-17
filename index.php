<?php
require('dbconn.php');
?>


<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>JMTM Repository </title>

	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="Library Member Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->

	<!-- Style --> 
	<link rel="stylesheet" href="style.css" type="text/css" media="all">
    <link rel="shortcut icon" href="images/logo.png">

	<!-- Fonts -->
		<link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>JMTM Repository</h1>

	<div class="container"style="background-color: #001f44;">

		<div class="login">
			<h2>Sign In</h2>
			<form action="index.php" method="post">
				<input type="text" Name="Username" placeholder="Username" required="">
				<input type="password" Name="Password" placeholder="Password" required="">
			
			
			<div class="send-button">
				<!--<form>-->
					<input type="submit" name="signin"; value="Sign In" style="background-color: #fdbe33; color:#000;">
				</form>
			</div>
			
			<div class="clear"></div>
		</div>

		<div class="register">
			<h2>Sign Up</h2>
			<form action="index.php" method="post">
				<input type="text" Name="Name" placeholder="Name" required="">
				<input type="text" Name="Username" placeholder="Username" required="">
				<input type="password" Name="Password" placeholder="Password" required>
				<select name="Divisi" id="Divisi">
					<option value="FTA">Finance</option>
					<option value="LOG">Logistik</option>
					<option value="HCGA">Human Capital</option>
				</select>
				<select name="Category" id="Category">
					<option value="ADM">Admin</option>
					<option value="ST">Staff</option>
				</select>
				<br>
			
			
			<br>
			<div class="send-button">
			    <input type="submit" name="signup" value="Sign Up" style="background-color: #fdbe33; color:#000;">
			    </form>
			</div>
			<div class="clear"></div>
		</div>

		<div class="clear"></div>

	</div>

	<div class="footer w3layouts agileits">
		<p> &copy; 2021 PT Jasa Marga Tollroad Maintenance. All Rights Reserved </a></p>
		
	</div>

<?php
if(isset($_POST['signin']))
{$u=$_POST['Username'];
 $p=$_POST['Password'];
 $c=$_POST['Category'];

 $sql="select * from repo.user where Username='$u'";

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Category'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
  {//echo "Login Successful";
   $_SESSION['Username']=$u;
   

  if($y=='ADM')
   header('location:admin/index.php');
  else
  	header('location:staff/index.php');
        
  }
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect Username or Password')</script>";
}
   

}

if(isset($_POST['signup']))
{
	$name=$_POST['Name'];
	$password=$_POST['Password'];
	$category=$_POST['Category'];
	$divisi=$_POST['Divisi'];
	$username=$_POST['Username'];

	$sql="insert into repo.user (Name,Category,Username,Divisi,Password) values ('$name','$category','$username','$divisi','$password')";

	if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Registration Successful')</script>";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}

?>

</body>
<!-- //Body -->

</html>
