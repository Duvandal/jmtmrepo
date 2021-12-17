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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JMTM Repository</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
    <div class="navbar navbar-fixed-top">
            <div class="navbar-inner" style="background-color: #001f44;">
                <div class="container" style="background-color: #001f44;">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php" style="color: #fff;">JMTM Repository </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php">Your Profile</a></li>
                                    <!--li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li-->
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.php" style="background-color: #001f44;"><i class="menu-icon icon-home"></i>Home
                                </a></li>
                                 <li><a href="message.php"style="background-color: #001f44;"><i class="menu-icon icon-inbox"></i>Messages</a>
                                </li>
                                <li><a href="book.php"style="background-color: #001f44;"><i class="menu-icon icon-book"></i>All Books </a></li>
                                <li><a href="excelupload.php"style="background-color: #001f44;"><i class="menu-icon icon-edit"></i>Excel Upload</a></li>
                                <li><a href="requests.php"style="background-color: #001f44;"><i class="menu-icon icon-tasks"></i>Issue/Return Requests </a></li>
                                <li><a href="current.php"style="background-color: #001f44;"><i class="menu-icon icon-list"></i>Currently Issued Books </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                            <li><a href="logout.php"style="background-color: #fdbe33;"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    
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
                                        </div>

                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="btn">Update Details</button>
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
        </div>
        <div class="footer"style="background-color: #001f44;">
            <div class="container">
                <b class="copyright">&copy; 2021 PT Jasamarga Tollroad Maintenance </b>All rights reserved.
            </div>
        </div>
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>

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