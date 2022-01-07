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
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="message.php">Messages</a>
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
                <li class="nav-item active">
                    <a class="nav-link" href="requests.php">Issue/Return Request <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="current.php">Current Request</a>
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
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span9 mx-auto">
                        <center>
                        <a href="issue_requests.php" class="btn btn-info">Issue Requests</a>
                        <a href="return_requests.php" class="btn btn-info">Return Requests</a>
                        </center>
                        <h1><i>Return Requests</i></h1>
                        <table class="table table-striped table-bordered" id = "tables">
                                  <thead>
                                    <tr>
                                        <th>Peminjam</th>
                                        <th>Kode Pelaksana</th>
                                        <th>Uraian</th>
                                        <th>Dues</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            $sql="select return.KodePelaksana,return.Username,Perihal,datediff(curdate(),Due_Date) as x from repo.return,repo.buku,repo.record 
                            where return.KodePelaksana=buku.KodePelaksana and return.KodePelaksana=record.KodePelaksana and return.Username=record.Username";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookid=$row['KodePelaksana'];
                                $rollno=$row['Username'];
                                $uraian=$row['Perihal'];
                                $dues=$row['x'];
                                
                            
                           
                            ?>
                                    <tr>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                      <td><?php echo $bookid ?></td>
                                      <td><?php echo $uraian ?></td>
                                      <td><?php 
                                      if($dues > 0)
                                          echo $dues;
                                          else
                                          echo 0; ?></td>
                                      <td><center>
                                                                                
                                        <a href="acceptreturn.php?id1=<?php echo $bookid; ?>&id2=<?php echo $rollno; ?>&id3=<?php echo $dues ?>" class="btn btn-success">Accept</a>
                                         
                                        <!--a href="rejectreturn.php?id1=<?php echo $bookid; ?>&id2=<?php echo $rollno; ?>" class="btn btn-danger">Reject</a-->
                                    </center></td>
                                    </tr>
                               <?php } ?>
                               </tbody>
                                </table>
                            </div>
                    <!--/.span3-->
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
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
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>