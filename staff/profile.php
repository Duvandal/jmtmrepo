<?php
ob_start();
require('dbconn.php');
?>

<?php 
if ($_SESSION['Username']) {
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Asset -->
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	<title>JMTM Repository</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #001f44;">
        <a class="navbar-brand" href="index.php">JMTM Repository</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="message.php">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="book.php">All Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="history.php">Previously Borrowed</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="current.php">Current Issue</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                <img src="images/user.png" height="30"/>
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
            </li>
                <button class="btn btn-outline-warning my-2 my-sm-0">
                    <a href="logout.php" style="text-decoration: none; color:white;">Logout</a>
                </button>
            </form>
        </div>
    </nav>
        <!-- /navbar -->
    <br>
    <div class="container rounded bg-white mt-5 mb-5 border">
    <div class="row">
        
    <?php
                                $username = $_SESSION['Username'];
                                $sql="select * from repo.user where Username='$username'";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();
                                ?>    
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="100px" src="images/user.png">
                <span class="font-weight-bold"><?php echo htmlspecialchars($name=$row['Name'])?></span>
                <span class="text-black-50"><?php echo htmlspecialchars($divisi=$row['Divisi'])?></span>
                <span class="text-black-50"><?php echo htmlspecialchars($kategori=$row['Category'])?></span>
            </div>
        </div>
        <div class="col-md-7">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="module">
                            <div class="module-body">
                                <form class="form-horizontal row-fluid" action="profile.php?id=<?php echo htmlspecialchars($_SESSION['Username']) ?>" method="post">

                                    <div class="form-group">
                                        <label for="Name"><b>Name:</b></label>
                                            <input type="text" id="Name" name="Name" value= "<?php echo htmlspecialchars($name=$row['Name'])?>" class="form-control" required>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="Password"><b>New Password:</b></label>
                                            <input type="password" id="Password" name="Password"  value= "<?php echo htmlspecialchars($pswd=$row['Password'])?>" class="form-control" required>
                                        
                                    </div>   

                                    <div class="form-group">
                                        <label for="Divisi"><b>Divisi:</b></label>
                                            <select name="Divisi" id="Divisi" class="form-control">
                                                <option selected disabled>--Pilih Divisi--</option>
                                                <option value="FTA">Finance</option>
                                                <option value="LOG">Logistik</option>
                                                <option value="HCGA">Human Capital</option>
                                            </select>
                                    </div>   

                                    <div class="form-group">
                                                <button type="submit" name="submit"class="btn-primary"><center>Update Details</center></button>
                                        </div>                                                                     

                                </form>
                                       
                        </div>
                        </div>  
            </div>
        </div>
    </div>
</div>
    <!-- Footer -->
<footer class="page-footer font-small blue fixed-bottom">

<!-- Copyright -->
<div class="footer-copyright text-center py-3" style="background-color: #001f44; color:white;">
    <b class="copyright">&copy; 2021 PT Jasamarga Tollroad Maintenance </b>All rights reserved.
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
<!--/.wrapper-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="scripts/common.js"></script>

<?php
if(isset($_POST['submit']))
{
    $user = $_GET['id'];
    $name=$_POST['Name'];
    $pswd=$_POST['Password'];
    $divisi=$_POST['Divisi'];

$sql1="update repo.user set Name='$name', Password='$pswd', Divisi='$divisi' where Username='$user'";



if($conn->query($sql1) === TRUE){
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=profile.php", true, 303);
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
}
?>
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>