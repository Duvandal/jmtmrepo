<?php
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
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Home </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="message.php">Messages<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="book.php">All Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addbook.php">Add Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="excelupload.php">Excel Upload</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="requests.php">Issue/Return Request</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="current.php">Current Request</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="history.php">History</a>
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
    <div class="col-5 mx-auto">
        <h5 class="card-header text-center">Send a Message</h5>
        <form action="message.php" method="post"><br>
                <div class="form-group">
                    <label for="Penerima">Receiver</label>
                    <input type="text" name="user" class="form-control" id="Penerima" placeholder="Nama Penerima" required>
                </div>
                <div class="form-group">
                    <label for="Pesan">Message</label>
                    <input type="text" name="msg" class="form-control" id="Pesan" placeholder="Isi Pesan" required>
                </div>
                
                <button type="submit" name="submit" class="btn btn-success">Send Message</button>
            </form>
        </div>
    <br>
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
    $username=$_POST['user'];
    $message=$_POST['msg'];

$sql1="insert into repo.message (Username,Msg,Date,Time) values ('$username','$message',curdate(),curtime())";

if($conn->query($sql1) === TRUE){
echo "<script type='text/javascript'>alert('Success')</script>";
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