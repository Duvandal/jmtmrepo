<?php
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
                                <li><a href="addbook.php"style="background-color: #001f44;"><i class="menu-icon icon-edit"></i>Add Books </a></li>
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
                    <!--/.span9-->
                    <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Add Book</h3>
                            </div>
                            <div class="module-body">

                                    
                                    <br >

                                    <form class="form-horizontal row-fluid" action="addbook.php" method="post" enctype="multipart/form-data">
                                        <div class="control-group">
                                            <label class="control-label" for="Kode"><b>Kode Pelaksana</b></label>
                                            <div class="controls">
                                                <input type="text" id="Kode" name="Kode" placeholder="Kode Pelaksana" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            
                                            <label class="control-label" for="Indeks"><b>Indeks</b></label>
                                            <div class="controls">
                                                <input type="text" id="Indeks" name="Indeks" placeholder="Indeks" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            
                                            <label class="control-label" for="Klasifikasi"><b>Klasifikasi</b></label>
                                            <div class="controls">
                                                <input type="text" id="Klasifikasi" name="Klasifikasi" placeholder="Klasifikasi" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Unit"><b>Unit Kerja</b></label>
                                            <div class="controls">
                                                <input type="text" id="Unit" name="Unit" placeholder="Unit Kerja" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Uraian"><b>Uraian</b></label>
                                            <div class="controls">
                                                <input type="text" id="Uraian" name="Uraian" placeholder="Uraian" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Tahun"><b>Tahun</b></label>
                                            <div class="controls">
                                                <input type="text" id="Tahun" name="Tahun" placeholder="Tahun" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Tp"><b>Tingkat Perkembangan</b></label>
                                            <div class="controls">
                                                <input type="text" id="Tp" name="Tp" placeholder="Tingkat Perkembangan" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Media"><b>Media</b></label>
                                            <div class="controls">
                                                <input type="text" id="Media" name="Media" placeholder="Media" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Kondisi"><b>Kondisi</b></label>
                                            <div class="controls">
                                                <input type="text" id="Kondisi" name="Kondisi" placeholder="Kondisi" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Jumlah"><b>Jumlah</b></label>
                                            <div class="controls">
                                                <input type="text" id="Jumlah" name="Jumlah" placeholder="Jumlah" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Lokasi"><b>Lokasi</b></label>
                                            <div class="controls">
                                                <input type="text" id="Lokasi" name="Lokasi" placeholder="Lokasi" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="myfile"><b>File Buku</b></label>
                                            <div class="controls">
                                                <input type="file" name="myfile" id="myfile" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Retensi"><b>Retensi</b></label>
                                            <div class="controls">
                                                <input type="text" id="Retensi" name="Retensi" placeholder="Retensi" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="ARetensi"><b>Akhir Retensi</b></label>
                                            <div class="controls">
                                                <input type="text" id="ARetensi" name="ARetensi" placeholder="Akhir Retensi" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Tgl"><b>Tanggal Deskripsi</b></label>
                                            <div class="controls">
                                                <input type="text" id="Tgl" name="Tgl" placeholder="Tanggal Deskripsi" class="span8" required>
                                            </div>
                                        </div>
                                        

                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit" class="btn">Add Book</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>

                        
                        
                    </div><!--/.content-->
                </div>

                </div>
            </div>
            <!--/.container-->

        </div>


<div class="footer">
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
                values ('$kode','$indeks','$klasifikasi','$unit','$perihal','$thn','$tp','$media','$kondisi','$jumlah','$lokasi','". basename( $_FILES["myfile"]["name"]) ."','$r','$ar','$tgl')";
                if($conn->query($sql1) === TRUE && $uploadOk == 1){
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