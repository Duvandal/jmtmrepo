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
    <nav class="navbar navbar-expand-lg navbar-dark mb-2" style="background-color: #001f44;">
        <a class="navbar-brand" href="#">JMTM Repository</a>
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
    <div class="card mb-5">
        <img class="card-img" src="images/logo.png" alt="Card image" style="height: 210px;">
        <div class="card-body">
            <h4 class="card-title text-center"><b>WEBSITE PEMANTAU ARSIP</b> </h4>
        </div>
    </div>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span9 mx-auto">
                    <?php
                    if(isset($_POST['submit']))
                        {$s=$_POST['Judul'];
                            $sql="select * from repo.buku where Indeks='$s' or Perihal like '%$s%' or Tahun like '%$s%' 
                            or Lokasi like '%$s%' or KodePelaksana like '%$s%' or Unit like '%$s%'";
                        }
                    else
                        $sql="select * from repo.buku";

                    $result=$conn->query($sql);
                    $rowcount=mysqli_num_rows($result);

                    if(!($rowcount))
                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                    else
                    {
                    ?>
                    <table id="dtBasicExample" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Kode Pelaksana</th>
                            <th>Indeks</th>
                            <th>Klasifikasi</th>
                            <th>Unit Kerja</th>
                            <th>Tahun</th>
                            <th>Lokasi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        //$result=$conn->query($sql);
                        while($row=$result->fetch_assoc())
                        {
                            $kode=$row['KodePelaksana'];
                            $perihal=$row['Perihal'];
                            $indeks=$row['Indeks'];
                            $klasifikasi=$row['Klasifikasi'];
                            $lokasi=$row['Lokasi'];
                            $avail=$row['Jumlah'];
                            $unit=$row['Unit'];
                            $thn=$row['Tahun'];
                            $tp=$row['TingkatPerkembangan'];
                            $media=$row['Media'];
                            $kondisi=$row['Kondisi'];
                        
                        ?>
                            <tr>
                                <td><?php echo $kode ?></td>
                                <td><?php echo $indeks ?></td>
                                <td><?php echo $klasifikasi ?></td>
                                <td><?php echo $unit ?></td>
                                <td><?php echo $thn ?></td>
                                <td><?php echo $lokasi ?></td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Kode Pelaksana</th>
                            <th>Indeks</th>
                            <th>Klasifikasi</th>
                            <th>Unit Kerja</th>
                            <th>Tahun</th>
                            <th>Lokasi</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <br>

    <!-- Footer -->
    <footer class="page-footer font-small blue">

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