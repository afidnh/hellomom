<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:login.php'); 
} else { 
   $username = $_SESSION['username'];
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
                            <h1>
                              Edit Hasil
                              <small>Check Up</small>
                            </h1>
                            <ol class="breadcrumb">
                              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                              <li class="active">Hasil Check Up</li>
                            </ol>
                          </section>

                          <?php
                      include "../../koneksi.php";
                      $no=0;
                      $id = $_GET['id'];
                      $perintah="SELECT app_checkup.tanggal_cek, app_checkup.keluhan, app_checkup.tekanan_darah, app_checkup.berat_badan, app_checkup.umur_kehamilan, app_checkup.hasil, app_checkup.tinggi_fundus, app_checkup.letak_janin, app_checkup.denyut_jantung, app_checkup.tindakan, app_checkup.tindakan, app_checkup.nasehat, app_pengurus.id, app_pengurus.nama, app_pengurus.rumah_sakit, app_checkup.id_pasien, app_checkup.id_pengurus, app_checkup.tanggal_kembali
                        FROM app_checkup 
                        LEFT JOIN app_pengurus ON app_checkup.id_pengurus = app_pengurus.id
                        LEFT JOIN app_jadwal ON app_checkup.id_jadwal = app_jadwal.id WHERE app_checkup.id_jadwal = '$id'"; // $ perintah Berguna sebagai variabel penampung //
                      $hasil=mysql_query($perintah);
                      while ($row=mysql_fetch_array($hasil))
                      {
                      $no++;
                      ?>
                          <section class="content">
                            <div class="row">
                              <!-- /.col -->
                              <div class="col-md-12">
                              <div class="box box-warning">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Edit Hasil Check Up</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                  <form role="form" method="post" action="proses_edit.php">
                                    <!-- text input -->
                                    <!-- textarea -->
                                    <div class="form-group">
                                      <label>Tanggal Check Up</label>
                                      <input name="id" type="hidden" class="form-control" value="<?php echo $id ?>">
                                      <input name="id_user" type="hidden" class="form-control" value="<?php echo $row['id_user']?>">
                                      <input name="id_pengurus" type="hidden" class="form-control" value="<?php echo $row['id_pengurus']?>>">
                                      <input name="tanggal_cek" type="text" class="form-control" value="<?php echo $row['tanggal_cek']?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Nama Pemeriksa</label>
                                      <input name="nama_pelayanan" type="text" class="form-control" value="<?php echo $row['nama']?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Tempat Pelayanan</label>
                                      <input name="tempat_pelayanan" type="text" class="form-control" value="<?php echo $row['rumah_sakit']?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Keluhan</label>
                                      <textarea name="keluhan" class="form-control" id="editor1" rows="10" cols="80" required><?php echo $row['keluhan']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label>Tekanan Darah</label>
                                      <input name="tekanan_darah" type="text" class="form-control" value="<?php echo $row['tekanan_darah']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Berat Badan</label>
                                      <input name="berat_badan" type="number" class="form-control" value="<?php echo $row['berat_badan']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Umur Kehamilan</label>
                                      <input name="umur_kehamilan" type="number" class="form-control" value="<?php echo $row['umur_kehamilan']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Tinggi Fundus</label>
                                      <input name="tinggi_fundus" type="text" class="form-control" value="<?php echo $row['tinggi_fundus']; ?>"required>
                                    </div>

                                    <div class="form-group">
                                      <label>Letak Janin</label>
                                      <input name="letak_janin" type="text" class="form-control" value="<?php echo $row['letak_janin']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Denyut Jantung Janin</label>
                                      <input name="denyut_jantung" type="text" class="form-control" value="<?php echo $row['denyut_jantung']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Hasil Pemeriksaan Laboratorium</label>
                                      <textarea name ="hasil" class="form-control" id="editor2" rows="10" cols="80" required><?php echo $row['hasil']; ?></textarea>
                                    </div>

                                    <!-- select -->
                                    <div class="form-group">
                                      <label>Tindakan</label>
                                      <textarea name ="tindakan" class="form-control" id="editor3" rows="10" cols="80" required><?php echo $row['tindakan']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label>nasehat Yang Disampaikan</label>
                                      <textarea name ="nasehat" class="form-control" id="editor4" rows="10" cols="80" required><?php echo $row['nasehat']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                      <div class="input-group date">
                                                                      <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                      </div>
                                                                      <input type="date" name="tanggal_kembali" class="form-control pull-right" id="datepicker" value="<?php echo $row['tanggal_kembali']; ?>" required>
                                                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                                            <button class="btn btn-success" type="submit" name="upload" value="upload">
                                                                Simpan
                                                            </button>

                                                            <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true"><a href="../jadwal-checkup/detail-checkup.php?id=<?php echo $id ?>">
                                                                Kembali
                                                                </a>
                                                            </button>
                                                        </div>

                                  </form>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                              </div>
                            </div>
                            <!-- /.row -->
                          </section>
                          <?php } ?>
                          <!-- /.content -->
                        </div>
                        <!-- /.content-wrapper -->
                    <?php include '../../global/footer.php' ?>

                        <!-- /.control-sidebar -->
                        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
                        <!-- <div class="control-sidebar-bg">
                            
                        </div> -->

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
        <script src="../../bower_components/ckeditor/ckeditor.js"></script>
            <!-- Bootstrap WYSIHTML5 -->
            <script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
            <script>
              $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1')
                //bootstrap WYSIHTML5 - text editor
                $('.textarea').wysihtml5()
              })
            </script>
            <script>
              $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor2')
                //bootstrap WYSIHTML5 - text editor
                $('.textarea').wysihtml5()
              })
            </script>
            <script>
              $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor3')
                //bootstrap WYSIHTML5 - text editor
                $('.textarea').wysihtml5()
              })
            </script>
            <script>
              $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor4')
                //bootstrap WYSIHTML5 - text editor
                $('.textarea').wysihtml5()
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
        </script>              <script>
                    $(document).ready(function(){
                     
                     function load_unseen_notification(view = '')
                     {
                      $.ajax({
                       url:"../../fetch.php",
                       method:"POST",
                       data:{view:view},
                       dataType:"json",
                       success:function(data)
                       {
                        $('.bell-notif').html(data.notification);
                        if(data.unseen_notification > 0)
                        {
                         $('.count').html(data.unseen_notification);
                        }
                       }
                      });
                     }
                     
                     load_unseen_notification();
                     
                     $(document).on('click', '.dropdown-toggle-bell-notif', function(){
                      $('.count').html('');
                      load_unseen_notification('yes');
                     });
                     
                     setInterval(function(){ 
                      load_unseen_notification();; 
                     }, 5000);
                     
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