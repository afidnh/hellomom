<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:login.php'); 
} else { 
   $username = $_SESSION['username'];
   $id = $_SESSION['id'];
   $type = $_SESSION['type'];
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
                                            <h1>Update 
                                              <small><strong>Data Pengurus</strong></small>
                                            </h1>
                                            <ol class="breadcrumb">
                                                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                                                <li class="active">Pengurus</li>
                                            </ol>
                                        </section>

                                        <!-- Main content -->
                                        <section class="content">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-4 col-xs-12"></div>
                                                <div class="col-md-6 col-sm-4 col-xs-12">
                                                <?php
                                                    $id=$_GET['id'];
                                                    $modal=mysql_query("SELECT * FROM app_pengurus WHERE id ='".$id."'");
                                                    while($r=mysql_fetch_array($modal)){
                                                ?>

                                                  <!-- Profile Image -->
                                                  <div class="box box-primary">
                                                    <div class="box-body box-profile">
                                                    <h3 class="profile-username text-center"><?php echo $r['nama']; ?></h3>
                                                      <p class="text-muted text-center"><?php echo $r['jabatan']; ?></p>
                                                      <p class="text-muted text-center"><?php echo $r['rumah_sakit']; ?></p>

                                                      <form action="edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                                                        <div class="form-group">
                                                            <label for="Description">NIP</label>
                                                            <input type="hidden"  name="nip" class="form-control" value="<?php echo $r['nip'] ?>" disabled />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Description">Username</label>
                                                            <input type="hidden" name="id"  class="form-control" value="<?php echo $r['id']; ?>" />
                                                            <input type="username" name="username"  class="form-control" value="<?php echo $r['username']; ?>" disabled/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Description">Nama</label>
                                                            <input type="text"  name="nama" class="form-control" value="<?php echo $r['nama'] ?>" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Description">Alamat</label>
                                                            <input type="text" name="alamat" class="form-control" value="<?php echo $r['alamat'] ?>" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Description">Jabatan</label>
                                                            <input type="text" name="jabatan"  class="form-control" value="<?php echo $r['jabatan']; ?>"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Description">Rumah Sakit</label>
                                                            <input type="text" name="rumah_sakit"  class="form-control" value="<?php echo $r['rumah_sakit']; ?>"/>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-success" type="submit" name="upload" value="upload">
                                                                Simpan
                                                            </button>

                                                            <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true"><a href="../pengurus/index.php">
                                                                Kembali
                                                                </a>
                                                            </button>
                                                        </div>

                                                        </form>
                                                    </div>
                                                    <!-- /.box-body -->
                                                  </div>
                                                  <!-- /.box -->
                                                  <?php } ?>
                                                <div class="col-md-3 col-sm-4 col-xs-12"></div>
                                        </div>
                                    </div>
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
                <!-- FastClick -->
                <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
                <!-- AdminLTE App -->
                <script src="../../dist/js/adminlte.min.js"></script>
                <!-- Sparkline -->
                <script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
                <!-- jvectormap  -->
                <script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
                <script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
                <!-- SlimScroll -->
                <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
                <!-- ChartJS -->
                <script src="../../bower_components/Chart.js/Chart.js"></script>
                <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                <script src="../../dist/js/pages/dashboard2.js"></script>
                <!-- AdminLTE for demo purposes -->
                <script src="../../dist/js/demo.js"></script>
                <script src="../../dist/datepicker.js"></script>
                <script src="../../dist/js/jquery.dataTables.js"></script>
                <script src="../../dist/js/dataTables.bootstrap.js"></script>
                <script>
                    $(function() {
                        $('[data-toggle="datepicker"]').datepicker({
                            autoHide: true,
                            zIndex: 2048,
                            format: 'yyyy-mm-dd'
                        });
                    });
                    $(document).ready(function() {
                        $('#dataTables-example').dataTable();
                    });
                </script>
                <!-- Javascript untuk popup modal Edit-->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $(".open_modal").click(function(e) {
                            var m = $(this).attr("id");
                            $.ajax({
                                url: "edit.php",
                                type: "GET",
                                data: {
                                    id: m,
                                },
                                success: function(ajaxData) {
                                    $("#ModalEdit").html(ajaxData);
                                    $("#ModalEdit").modal('show', {
                                        backdrop: 'true'
                                    });
                                }
                            });
                        });
                    });
                </script>
                <script type="text/javascript">
                      function play_sound() {
                          var audioElement = document.createElement('audio');
                          audioElement.setAttribute('src', '../../global/assets/success-notification-alert_A_major.wav');
                          audioElement.setAttribute('autoplay', 'autoplay');
                          audioElement.load();
                          audioElement.play();
                      }
                  </script>
    </body>

    </html>