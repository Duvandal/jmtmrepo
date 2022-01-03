<?php
require('dbconn.php');
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
                                <li class="active"><a href="index.php"style="background-color: #001f44;"><i class="menu-icon icon-home"></i>Home
                                </a></li>
                                 <li><a href="message.php"style="background-color: #001f44;"><i class="menu-icon icon-inbox"></i>Messages</a>
                                </li>
                                <li><a href="book.php"style="background-color: #001f44;"><i class="menu-icon icon-book"></i>All Books </a></li>
                                <li><a href="history.php"style="background-color: #001f44;"><i class="menu-icon icon-tasks"></i>Previously Borrowed Books </a></li>
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
                        <table id="dtBasicExample" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Kode Pelaksana</th>
                                <th>Indeks</th>
                                <th>Unit Kerja</th>
                                <th>Tahun</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            
                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $kode=$row['KodePelaksana'];
                                $indeks=$row['Indeks'];
                                $unit=$row['Unit'];
                                $thn=$row['Tahun'];
                            
                            ?>
                                <tr>
                                    <td><?php echo $kode ?></td>
                                    <td><?php echo $indeks ?></td>
                                    <td><?php echo $unit ?></td>
                                    <td><?php echo $thn ?></td>
                                </tr>
                                <?php }} ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Kode Pelaksana</th>
                                <th>Indeks</th>
                                <th>Unit Kerja</th>
                                <th>Tahun</th>
                            </tr>
                            </tfoot>
                        </table>
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
        <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>

</html>