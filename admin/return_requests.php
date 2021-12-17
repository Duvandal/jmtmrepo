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
                    <div class="span9">
                        <center>
                        <a href="issue_requests.php" class="btn btn-info">Issue Requests</a>
                        <a href="return_requests.php" class="btn btn-info">Return Requests</a>
                        </center>
                        <h1><i>Return Requests</i></h1>
                        <table class="table" id = "tables">
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
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>