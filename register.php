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
	<link rel="stylesheet" href="style.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	<title>JMTM Repository</title>
</head>
<body>
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

			<form action="index.php" class="form-signin text-center" method="post">
            <img class="mb-4" src="logo.png"alt="" width="120" height="60">
			<h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
			<div class="form-group">
			<label for="Name" class="sr-only">Name</label>
			<input type="text" id="Name" class="form-control" name="Name" placeholder="Name" required="" autofocus="">
            </div>
			<div class="form-group">
			<label for="Username" class="sr-only">Username</label>
			<input type="text" id="Username" class="form-control" name="Username" placeholder="Username" required="" autofocus="">
            </div>
			<div class="form-group">
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" class="form-control" name="Password" placeholder="Password" required="">
            </div>
			<div class="form-group">
				<select name="Divisi" id="Divisi">
					<option value="FTA">Finance</option>
					<option value="LOG">Logistik</option>
					<option value="HCGA">Human Capital</option>
				</select>
            </div>
			<div class="form-group">
				<select name="Category" id="Category">
					<option value="ADM">Admin</option>
					<option value="ST">Staff</option>
				</select>
            </div>
        
			<button class="btn btn-lg btn-primary btn-block" name="signup" type="submit">Sign Up</button><br><div class="clear"></div>
			<div class="d-flex align-items-center justify-content-center pb-4">
				<p class="mb-0 me-2">Already have an account?</p>
				<a href="index.php">Login here</a>
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
