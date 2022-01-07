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
                <li class="nav-item active">
                    <a class="nav-link" href="book.php">All Book <span class="sr-only">(current)</span></a>
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
                    
                    <div class="span9">
                        <div class="module">
                            <div class="module-head">
                                <h3>Update Book Details</h3>
                            </div>
                            <div class="module-body">

                                <?php
                                    $bookid = $_GET['id'];
                                    $sql = "select * from repo.buku where KodePelaksana='$bookid'";
                                    $result=$conn->query($sql);
                                    $row=$result->fetch_assoc();
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
                                    $fd=$row['file_name'];
                                    $r=$row['Retensi'];
                                    $ar=$row['ARetensi'];
                                    $tgl=$row['TglDesk'];
                                    $files=$row['file_name'];

                                ?>
                                <form class="form-horizontal row-fluid" action="edit_book_details.php?id=<?php echo $bookid ?>" method="post" enctype="multipart/form-data">
                                    <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Kode">Kode Pelaksana:</label></b>
                                            <div class="controls">
                                                <input type="text" id="Kode" name="Kode" value= "<?php echo $kode?>" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Indeks">Indeks:</label></b>
                                            <div class="controls">
                                                <input type="text" id="Indeks" name="Indeks" value= "<?php echo $indeks?>" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Klasifikasi">Klasifikasi:</label></b>
                                            <div class="controls">
                                                <input type="text" id="Klasifikasi" name="Klasifikasi" value= "<?php echo $klasifikasi?>" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Unit">Unit Kerja:</label></b>
                                            <div class="controls">
                                                <input type="text" id="Unit" name="Unit" value= "<?php echo $unit?>" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Perihal">Perihal:</label></b>
                                            <div class="controls">
                                                <input type="text" id="Perihal" name="Perihal" value= "<?php echo $perihal?>" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Tahun">Tahun:</label></b>
                                            <div class="controls">
                                                <input type="text" id="Tahun" name="Tahun" value= "<?php echo $thn?>" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="TP">Tingkat Perkembangan:</label></b>
                                            <div class="controls">
                                                <input type="text" id="TP" name="TP" value= "<?php echo $tp?>" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Media">Media:</label></b>
                                            <div class="controls">
                                                <input type="text" id="Media" name="Media" value= "<?php echo $media?>" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Kondisi">Kondisi:</label></b>
                                            <div class="controls">
                                                <input type="text" id="Kondisi" name="Kondisi" value= "<?php echo $kondisi?>" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Lokasi">Lokasi:</label></b>
                                            <div class="controls">
                                                <input type="text" id="Lokasi" name="Lokasi" value= "<?php echo $lokasi?>" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Jumlah">Jumlah:</label></b>
                                            <div class="controls">
                                                <input type="text" id="Jumlah" name="Jumlah" value= "<?php echo $avail?>" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Retensi">Retensi:</label></b>
                                            <div class="controls">
                                                <input type="text" id="Retensi" name="Retensi" value= "<?php echo $r?>" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="ARetensi">Akhir Retensi:</label></b>
                                            <div class="controls">
                                                <input type="text" id="ARetensi" name="ARetensi" value= "<?php echo $ar?>" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="tgl">Tanggal Deskripsi:</label></b>
                                            <div class="controls">
                                                <input type="text" id="tgl" name="tgl" value= "<?php echo $tgl?>" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="myfile">File PDF:</label></b>
                                            <div class="controls">
                                                <input class="form-control" type="file" name="myfile" id="formFile">
                                            </div>
                                        </div><br>

                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="btn btn-primary">Update Details</button>
                                            </div>
                                        </div>

                                    </form>
                                    <a href="book.php" class="btn btn-danger">Go Back</a>    
                                            
                                                            
                                    </div>   
                                    </div>          
                    </div>
                    
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div> <br>
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
if(isset($_POST['submit']))
{
    $bookid = $_GET['id'];
    $kode=$_POST['Kode'];
    $perihal=$_POST['Perihal'];
    $indeks=$_POST['Indeks'];
    $klasifikasi=$_POST['Klasifikasi'];
    $lokasi=$_POST['Lokasi'];
    $avail=$_POST['Jumlah'];
    $unit=$_POST['Unit'];
    $thn=$_POST['Tahun'];
    $tp=$_POST['TP'];
    $media=$_POST['Media'];
    $kondisi=$_POST['Kondisi'];
    $fd=$_POST['file_name'];
    $r=$_POST['Retensi'];
    $ar=$_POST['ARetensi'];
    $tgl=$_POST['tgl'];
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
    $sql1="update repo.buku set KodePelaksana='$kode',Indeks='$indeks',Klasifikasi='$klasifikasi', Unit='$unit', Perihal='$perihal', Tahun='$thn', 
    TingkatPerkembangan='$tp', Media='$media', Kondisi='$kondisi', Jumlah='$avail', Lokasi='$lokasi', Retensi='$r', ARetensi='$ar', TglDesk='$tgl', file_name='$target_file' where KodePelaksana='$bookid'";
if($conn->query($sql1) === TRUE){
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=book.php", true, 303);
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