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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
					<img class=" mt-2 mb-4" src="logo.png"alt="" width="120" height="60">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Register</h4>
							<form method="POST" class="my-login-validation" action="index.php">
								<div class="form-group">
								<label for="Name" class="sr-only">Name</label>
			<input type="text" id="Name" class="form-control" name="Name" placeholder="Name" required="" autofocus=""><br>
								</div>

								<div class="form-group">
								<label for="Username" class="sr-only">Username</label>
			<input type="text" id="Username" class="form-control" name="Username" placeholder="Username" required="" autofocus=""><br>
								</div>

								<div class="form-group">
								<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" class="form-control" name="Password" placeholder="Password" required=""><br>
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
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
