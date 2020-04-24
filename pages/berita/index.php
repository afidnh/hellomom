<?php
session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php');  
} else { 
   $username = $_SESSION['username'];
   $type = $_SESSION['type'];
   $id_pengurus = $_SESSION['id'];
}
?>
    <?php
include "../../koneksi.php";
?>
        <html>

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Admin | Hello Moms</title>
            <!-- Tell the browser to be responsive to screen width -->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <!-- Bootstrap 3.3.7 -->
            <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
            <!-- Ionicons -->
            <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
            <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-datetimepicker.min.css">
            <!-- jvectormap -->
            <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
            <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
            <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
            <link rel="stylesheet" href="../../dist/datepicker.css">
            <link href="../../dist/css/dataTables.bootstrap.css" rel="stylesheet" />

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

            <!-- Google Font -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
            <script src="../../build/js/jquery-latest.js"></script>
        </head>

        <body class="hold-transition skin-blue sidebar-mini">
            <div class="wrapper">

                <?php include '../../global/header.php' ?>

                    <!-- Left side column. contains the logo and sidebar -->
                    <?php include '../../global/sidebar.php' ?>

                        <!-- Content Wrapper. Contains page content -->
                        <div class="content-wrapper">
                            <!-- Content Header (Page header) -->
                            <section class="content-header">
                                <h1>
                                    Berita
                                    <small></small>
                                  </h1>
                                <ol class="breadcrumb">
                                    <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                                    <li class="active">Berita</li>
                                </ol>
                            </section>
                            <section>
                                <!-- Info boxes -->
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="info-box-content">
                                            <div class="info-box-content" style="text-align: end;">
                                                <a href="tambah-berita.php">
                                                    <button type="button" class="btn btn-success" style="margin: 23px;">
                                                        <li class="ion ion-plus-round"></li> Tambah data</button>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->

                                    <!-- fix for small devices only -->
                                    <div class="clearfix visible-sm-block"></div>

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <!-- /.info-box -->
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-md-12" style="padding: 25px;">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title"><li class="ion ion-university"></li> Daftar Berita Terbaru</h3>
                                            </div>
                                            <!-- /.box-header -->

                                            <div class="box-body">
                                                <div class="table-responsive">
                                                    <table id="example1" class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">
                                                                    <div align="center">No</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Judul</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Gambar</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Isi</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Edit</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Hapus</div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                              include "../../koneksi.php";
                                                              $no=0;
                                                              $perintah="select * from app_berita"; // $ perintah Berguna sebagai variabel penampung //
                                                              $hasil=mysql_query($perintah);
                                                              while ($row=mysql_fetch_array($hasil))
                                                              {
                                                              $no++;
                                                              ?>
                                                                <tr>
                                                                    <td>
                                                                        <div align="center">
                                                                            <?php echo $no; ?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <?php echo substr($row['judul'], 0,100);?>
                                                                        </div>
                                                                    </td>
                                                                    <td><img src="<?php echo $row['gambar'];?>" style=" height: 30%;"></td>
                                                                    <td>
                                                                        <div>
                                                                            <?php echo substr($row['isi'],0,50); ?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <a href="edit-berita.php?id=<?php echo $row['id']; ?>" class='open_modal'>
                                                                                <?php 
                                                                                    if ($_SESSION['id'] == $row['id_pengurus']) {
                                                                                    echo  '
                                                                                <button type="button" class="btn btn-primary">Edit</button>';
                                                                                    } else {
                                                                                    echo  '
                                                                                <button type="button" class="btn btn-primary" disabled>Edit</button>';
                                                                                }
                                                                                    ?>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <a class="hapus" href="delete.php?id=<?php echo $row['id']; ?>">
                                                                                <?php 
                                                                                    if ($_SESSION['id'] == $row['id_pengurus']) {
                                                                                    echo  '<button type="button" class="btn btn-danger">Hapus</button>';
                                                                                    } else {
                                                                                    echo  '<button type="button" class="btn btn-danger" disabled>Hapus</button>';
                                                                                }
                                                                                    ?>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                                    <!-- Modal Popup untuk Edit-->
                                                                    <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                                    </div>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- ./box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </section>
                        </div>
                        <?php include '../../global/footer.php' ?>

                            <!-- /.control-sidebar -->
                            <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
                            <div class="control-sidebar-bg"></div>

            </div>
            <!-- ./wrapper -->

            <!-- jQuery 3 -->
            <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap 3.3.7 -->
            <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- DataTables -->
            <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
            <!-- SlimScroll -->
            <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
            <!-- FastClick -->
            <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
            <!-- AdminLTE App -->
            <script src="../../dist/js/adminlte.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="../../dist/js/demo.js"></script>
            <script>
                $(function() {
                    $('#example1').DataTable({
                        'paging': true,
                        'lengthChange': false,
                        'searching': true,
                        'ordering': false,
                        'info': true,
                        'autoWidth': false
                    })
                })
            </script>
            <script>
                $(function() {
                    $('[data-toggle="datepicker"]').datepicker({
                        autoHide: true,
                        zIndex: 2048,
                    });
                });
                $(document).ready(function() {
                    $('#dataTables-example').dataTable();
                });
            </script>
        </body>

        </html>