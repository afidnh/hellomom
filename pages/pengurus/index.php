<?php
session_start();
if(!isset($_SESSION['username'])) {
header('location:../../login.php');  
} else { 
   $username = $_SESSION['username'];
   $type = $_SESSION['type'];
}
?>
    <?php
include "../../koneksi.php";
?>
        <!DOCTYPE html>
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
            <!-- DataTables -->
            <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
            <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
            <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

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
                    Admin 
                    <small>Rumah Sakit</small>
                  </h1>
                                <ol class="breadcrumb">
                                    <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                                    <li class="active">Admin</li>
                                </ol>
                            </section>
                            <div class="row">

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="info-box-content" style="text-align: end;">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin: 23px;">
                                            <li class="ion ion-plus-round"></li> Tambah data</button>
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </div>

                            <!-- Main content -->
                            <section class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">Daftar Pengurus</h3>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title" id="exampleModalLabel">Tambah Admin</h1>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="proses.php">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">NIP</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="number" name="nip" class="form-control" placeholder="NIP Karyawan">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Nama</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Username</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" name="username" class="form-control" placeholder="Username">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Alamat</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" name="alamat" class="form-control" placeholder="Alamat anda">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Password</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Jabatan</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Nama Rumah Sakit</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" name="rumah_sakit" class="form-control" placeholder="Nama Rumah Sakit">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Type</label>
                                                                        <div class="col-sm-10">
                                                                            <select name="type">
                                                                                <option value="superadmin">Super admin</option>
                                                                                <option value="admin">Admin</option>
                                                                                <option value="dokter">Dokter</option>
                                                                                <option value="bidan">Bidan</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <table id="example1" class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>NIP</th>
                                                                <th>Nama</th>
                                                                <th>Username</th>
                                                                <th>Rumah Sakit</th>
                                                                <th>Jabatan</th>
                                                                <th>Type</th>
                                                                <th>Reset Password</th>
                                                                <th>Hapus</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                  include "../../koneksi.php";
                                                  $no=0;
                                                  $perintah="select * from app_pengurus where status = 'active'"; // $ perintah Berguna sebagai variabel penampung //
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
                                                                            <?php echo $row['nip']; ?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <?php echo $row['nama'];?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <?php echo $row['username'];?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <?php echo $row['rumah_sakit'];?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <?php echo $row['jabatan'];?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <?php echo $row['type'];?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <a class="hapus" href="edit.php?id=<?php echo $row['id']; ?>">
                                                                                <button type="button" class="btn btn-default">Reset</button>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <a class="hapus" href="delete.php?id=<?php echo $row['id']; ?>">
                                                                                <button type="button" class="btn btn-danger">Hapus</button>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                            </section>
                            <!-- /.content -->
                            </div>
                            <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
                            <?php include '../../global/footer.php' ?>
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
                        <!-- page script -->
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
                  </script>
        </body>

        </html>