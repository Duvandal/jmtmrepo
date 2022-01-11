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
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="message.php">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="book.php">All Book</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="addbook.php">Add Book <span class="sr-only">(current)</span></a>
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
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <br>
    <div class="col-5 mx-auto">
        <h5 class="card-header text-center">Add Book</h5>
        <form action="addbook.php" method="post" enctype="multipart/form-data"><br>
            <div class="form-group">
                <label for="Kode"><b>Kode Pelaksana</b></label>
                <input class="form-control" type="text" id="Kode" name="Kode" placeholder="Kode Pelaksana" required>
            </div>
            <div class="form-group">
                <label for="Indeks"><b>Indeks</b></label>
                <input class="form-control" type="text" id="Indeks" name="Indeks" placeholder="Indeks" required>
            </div>
            <div class="form-group">
                <label for="Klasifikasi"><b>Klasifikasi</b></label>
                    <input class="form-control" type="text" id="Klasifikasi" name="Klasifikasi" placeholder="Klasifikasi" required>
            </div>
            <div class="form-group">
                <label for="Unit"><b>Unit Kerja</b></label>
                    <input class="form-control" type="text" id="Unit" name="Unit" placeholder="Unit Kerja" required>
            </div>
            <div class="form-group">
                <label for="Uraian"><b>Uraian</b></label>
                    <input class="form-control" type="text" id="Uraian" name="Uraian" placeholder="Uraian" required>
            </div>
            <div class="form-group">
                <label for="Tahun"><b>Tahun</b></label>
                    <input class="form-control" type="text" id="Tahun" name="Tahun" placeholder="Tahun" required>
            </div>
            <div class="form-group">
                <label for="Tp"><b>Tingkat Perkembangan</b></label>
                    <input class="form-control" type="text" id="Tp" name="Tp" placeholder="Tingkat Perkembangan" required>
            </div>
            <div class="form-group">
                <label for="Media"><b>Media</b></label>
                    <input class="form-control" type="text" id="Media" name="Media" placeholder="Media" required>
            </div>
            <div class="form-group">
                <label for="Kondisi"><b>Kondisi</b></label>
                    <input class="form-control" type="text" id="Kondisi" name="Kondisi" placeholder="Kondisi" required>
            </div>
            <div class="form-group">
                <label for="Jumlah"><b>Jumlah</b></label>
                    <input class="form-control" type="text" id="Jumlah" name="Jumlah" placeholder="Jumlah" required>
            </div>
            <div class="form-group">
                <label for="Lokasi"><b>Lokasi</b></label>
                    <input class="form-control" type="text" id="Lokasi" name="Lokasi" placeholder="Lokasi"  required>
            </div>
            <div class="form-group">
                <label for="myfile"><b>File Buku</b></label>
                <div class="form-control">
                    <input type="file" name="myfile" id="myfile" required>
                </div>
            </div>
            <div class="form-group">
                <label for="Retensi"><b>Retensi</b></label>
                    <input class="form-control" type="text" id="Retensi" name="Retensi" placeholder="Retensi" required>
            </div>
            <div class="form-group">
                <label for="ARetensi"><b>Akhir Retensi</b></label>
                    <input class="form-control" type="text" id="ARetensi" name="ARetensi" placeholder="Akhir Retensi" required>
            </div>
            <div class="form-group">
                <label for="Tgl"><b>Tanggal Deskripsi</b></label>
                    <input class="form-control" type="text" id="Tgl" name="Tgl" placeholder="Tanggal Deskripsi"  required>
            </div>
            

            <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Add Book</button>
            </div>
        </form>
        </div>
    <br>
                    
                </div>

                </div>
            </div>
            <!--/.container-->

        </div>
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

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_SESSION['Username']) {
            
            
            if(isset($_POST['submit']))
            {
                $bookid = $_GET['id'];
                $kode=$_POST['Kode'];
                $perihal=$_POST['Uraian'];
                $indeks=$_POST['Indeks'];
                $klasifikasi=$_POST['Klasifikasi'];
                $lokasi=$_POST['Lokasi'];
                $avail=$_POST['Jumlah'];
                $unit=$_POST['Unit'];
                $thn=$_POST['Tahun'];
                $tp=$_POST['Tp'];
                $media=$_POST['Media'];
                $kondisi=$_POST['Kondisi'];
                $fd=$_POST['file_name'];
                $r=$_POST['Retensi'];
                $ar=$_POST['ARetensi'];
                $tgl=$_POST['Tgl'];

                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["myfile"]["name"]);
                $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $uploadOk = 1;

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } 
                // Check if $uploadOk is set to 0 by an error
                else {
                    if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["myfile"]["name"])) . " has been uploaded.";
                    } 
                    else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                $sql1="insert into repo.buku (KodePelaksana,Indeks,Klasifikasi,Unit,Perihal,Tahun,TingkatPerkembangan,Media,Kondisi,Jumlah,Lokasi,file_name,Retensi,ARetensi,TglDesk) 
                values ('$kode','$indeks','$klasifikasi','$unit','$perihal','$thn','$tp','$media','$kondisi','$avail','$lokasi','". basename( $_FILES["myfile"]["name"]) ."','$r','$ar','$tgl')";
                if($conn->query($sql1) === TRUE){
                    echo "<script type='text/javascript'>alert('Success')</script>";
                    // header("Location: ./addbook.php");
                }
                else{//echo $conn->error;
                    echo "<script type='text/javascript'>alert('Error')</script>";
                    // header("Location: ./addbook.php");
                }
            }
        }
    }
    ?>
        </body>

    </html>

    <?php }
    else {
        echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
    } 
?>