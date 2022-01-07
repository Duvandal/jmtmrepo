<?php
require('dbconn.php');
?>


<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Style -->
	<!-- <link rel="stylesheet" href="style.css"> -->

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	<title>JMTM Repository</title>
</head>
<body class="text-center">
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #001f44;">
		<a class="navbar-brand" href="#">
			<!-- <img src="logo.png" width="100" height="30" class="d-inline-block align-top" alt=""> -->
			JMTM Repository
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		
	</div>
	</nav>
	
		<form class="form-signin" action="index.php" method="post">
			<img class="mb-4" src="logo.png"alt="" width="120" height="60">
			<h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
			<label for="Username" class="sr-only">Username</label>
			<input type="text" id="Username" class="form-control" name="Username" placeholder="Username" required="" autofocus=""><br>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" class="form-control" name="Password" placeholder="Password" required=""><br>
			<button class="btn btn-lg btn-primary btn-block" name="signin" type="submit">Sign in</button><br><div class="clear"></div>
			<div class="d-flex align-items-center justify-content-center pb-4">
				<p class="mb-0 me-2">Don't have an account?</p>
				<a href="register.php">Register here</a>
			</div>
			<p class="mt-5 mb-3 text-muted">&copy; 2021 PT Jasa Marga Tollroad Maintenance. All Rights Reserved</p>
		</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
   
  </body>
</html>

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
