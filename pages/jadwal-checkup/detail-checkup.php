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
                              Hasil dan Jadwal
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
                      $perintah="SELECT app_pasien.nama AS nama_user, app_pasien.kepala_keluarga, app_pasien.telp, app_pasien.alamat, app_pengurus.nama AS nama_dokter, app_pengurus.rumah_sakit, app_pengurus.id AS id_pengurus, app_pasien.id AS id_pasien, app_jadwal.id, app_checkup.tanggal_cek, app_checkup.gambar, app_checkup.keluhan, app_checkup.tekanan_darah, app_checkup.berat_badan, app_checkup.umur_kehamilan, app_checkup.hasil, app_checkup.tinggi_fundus, app_checkup.letak_janin, app_checkup.denyut_jantung, app_checkup.tindakan, app_checkup.nasehat, app_checkup.tanggal_kembali
                        FROM app_checkup
                        INNER JOIN app_jadwal ON app_checkup.id_jadwal = app_jadwal.id
                        INNER JOIN app_pengurus ON app_checkup.id_pengurus = app_pengurus.id
                        INNER JOIN app_pasien ON app_checkup.id_pasien = app_pasien.id WHERE app_checkup.id_jadwal = '$id'"; // $ perintah Berguna sebagai variabel penampung //
                      $hasil=mysql_query($perintah);
                      while ($row=mysql_fetch_array($hasil))
                      {
                      ?>
                          <section class="content">
                            <div class="row">
                              <!-- /.col -->
                              <div class="col-md-12">
                              <div class="box box-warning">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Detail Hasil Check Up</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                  <div class="col-md-9">
                                  <p>Nama Pemeriksa : <strong>Dr. <?php echo $row['nama_dokter']?></strong></p>
                                  <p>Rumah Sakit : <strong><?php echo $row['rumah_sakit']?></strong></p>
                                  <p>Tanggal Check Up : <strong><?php echo $row['tanggal_cek']?></strong></p>
                                </div>
                                <div class="col-md-3">
                                  <p>Nama Pasien : <strong>Ibu <?php echo $row['nama_user']?></strong></p>
                                  <p>Nomor Telefon : <strong><?php echo $row['telp']?></strong></p>
                                  <p>Alamat : <strong><?php echo $row['alamat']?></strong></p>
                                </div>
                                <div class="col-xs-12">
                                    <div class="box-header" style="text-align: center;">
                                      <?php 
                                      if ($row['gambar'] != ''){
                                        ?>
                                        <img src="<?php echo $row['gambar'];?>" style="width: 200px; text-align: center; align-content: center;">
                                        <?php
                                      } else {
                                      }
                                      ?>
                                      <p style="text-align: center;">HASIL CHECK UP</p>

                                    <!-- /.box-header -->
                                      <table class="table table-bordered">
                                        <tbody><tr>
                                          <th style="width: 10px">Tgl</th>
                                          <th>Keluhan Sekarang</th>
                                          <th>Tekanan Darah</th>
                                          <th style="width: 40px">Berat Badan</th>
                                          <th style="width: 40px">Umur Kehamilan</th>
                                          <th style="width: 40px">Tinggi Fundus</th>
                                          <th style="width: 40px">Letak Janin Kep/SuLi</th>
                                          <th style="width: 40px">Denyut Jantung Janin</th>
                                          <th style="width: 40px">Hasil Lab.</th>
                                          <th style="width: 40px">Tindakan</th>
                                          <th style="width: 40px">Nasehat</th>
                                          <th style="width: 40px">Kapan Harus Kembali</th>
                                        </tr>
                                        <tr>
                                          <td><?php
                                            $date = new DateTime($row['tanggal_cek']);
                                            echo $date->format('l, d F Y');
                                        ?></td>
                                          <td><?php echo $row['keluhan']?></td>
                                          <td><?php echo $row['tekanan_darah']?></td>
                                          <td><?php echo $row['berat_badan']?></td>
                                          <td><?php echo $row['umur_kehamilan']?></td>
                                          <td><?php echo $row['tinggi_fundus']?></td>
                                          <td><?php echo $row['letak_janin']?></td>
                                          <td><?php echo $row['denyut_jantung']?></td>
                                          <td><?php echo $row['hasil']?></td>
                                          <td><?php echo $row['tindakan']?></td>
                                          <td><?php echo $row['nasehat']?></td>
                                          <td><?php
                                            $date = new DateTime($row['tanggal_kembali']);
                                            echo $date->format('l, d F Y');
                                        ?></td>
                                        </tr>
                                      </tbody></table>
                                    </div>
                                      </div>
                                        <?php 
                                        if ($_SESSION['type'] == 'dokter' or $_SESSION['type'] == 'superadmin') {
                                            ?>
                                      <?php 
                                      if ($row['gambar'] == ''){

                                      ?>
                                      <div class="pull-left">
                                        <form method="post" action="proses-upload.php" enctype="multipart/form-data">
                                          <div class="form-group">
                                          <label>File input</label>
                                          <input type="hidden" name="id" value="<?php echo $id;?>">
                                          <input type="file" name="file">
                                          <p class="help-block">Format gambar menggunakan JPG dan PNG</p>
                                          </div>
                                          <button type="submit" class="btn btn-primary" name="upload" value="upload">Upload Hasil USG</button>
                                        </form>
                                    </div>
                                  <?php } ?>
                                      <div class="pull-right">
                                      <button type="button" class="btn btn-success"><a href="edit-checkup.php?id=<?php echo $id; ?>" style="color: #fff;">
                                          <i class="fa fa-pencil"></i> Edit Hasil</a>
                                    </button>
                                  <?php } ?>
                                  <div class="pull-right">
                                    <button type="button" class="btn btn-default">
                                      <a href="print.php?id=<?php echo $id; ?>" target="_blank">
                                        <i class="fa fa-file-pdf-o"></i> Print</a>
                                    </button>
                                    <button type="button" class="btn btn-danger"><a href="index.php">Kembali</a>
                                    </button>
                                    </div>
                                </div>
                              <!-- /.box -->
                              </div>
                            </div>
                            </div>
                            <!-- /.row -->
                          </section>
                          <?php } ?>
                          <!-- /.content -->
                        </div>
                        <!-- /.content-wrapper -->
                    <?php include '../../global/footer.php' ?>

        </div>

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
                });
            });
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>
          <!-- <script>
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
                     }, 1000);
                     
                    });
                    </script>
                    <script>
                    $(document).ready(function(){
                     
                     function load_unseen_notification(view = '')
                     {
                      $.ajax({
                       url:"../../fetch-laporan.php",
                       method:"POST",
                       data:{view:view},
                       dataType:"json",
                       success:function(data)
                       {
                        $('.laporan-notif').html(data.notification);
                        if(data.unseen_notification > 0)
                        {
                         $('.hitung').html(data.unseen_notification);
                        }
                       }
                      });
                     }
                     
                     load_unseen_notification();
                     
                     $(document).on('click', '.dropdown-toggle-laporan-notif', function(){
                      $('.hitung').html('');
                      load_unseen_notification('yes');
                     });
                     
                     setInterval(function(){ 
                      load_unseen_notification();; 
                     }, 1000);
                     
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
                  </script> -->
    </body>

    </html>