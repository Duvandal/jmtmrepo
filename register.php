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

	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Bootstrap CSS -->
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
<!--</form> -->
        <div class="container mt-4">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center">Register</h3>
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
								<p class="mb-0 me-2 mr-1">Already have an account? </p>
								<a href="index.php">Login here</a>
							</div>
							<p class="mt-5 mb-3 text-muted">&copy; 2021 PT Jasa Marga Tollroad Maintenance. All Rights Reserved</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
header("location: index.php"); 
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}

?>

</body>
<!-- //Body -->

</html>
