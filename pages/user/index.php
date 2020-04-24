<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:login.php'); 
} else { 
   $username = $_SESSION['username'];
   $type = $_SESSION['type'];
   $id_pasien = $_SESSION['id'];
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
            <script>
                var refreshId = setInterval(function() {
                    $('#responsecontainer').load('reload.php');
                }, 1000);
            </script>
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
                                    Daftar 
                                    <small>Pasien</small>
                                  </h1>
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                                    <li class="active">Pasien</li>
                                </ol>
                            </section>
                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box" style="margin: 23px;">
                                        <span class="info-box-icon bg-red"><i class="ion ion-man" style="margin-top: 17px;"></i><i class="ion ion-woman" style="margin-top: 17px;"></i></i></span>
                                        <?php
                                              $sql = "SELECT * FROM app_pasien where id_pengurus = '".$_SESSION['id']."'";
                                              $sql_admin = "SELECT * FROM app_pasien";
                                              if($type == 'superadmin' || $type == 'admin'){
                                                            $query=mysql_query($sql_admin);
                                                          } else {
                                                            $query=mysql_query($sql);
                                                          }
                                              $count = mysql_num_rows($query);
                                            ?>

                                            <div class="info-box-content">
                                                <span class="info-box-text">TOTAL PASIEN</span>
                                                <span class="info-box-number"><?php  echo "$count";?></span>
                                            </div>
                                            <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->

                                <!-- fix for small devices only -->
                                <div class="clearfix visible-sm-block"></div>
                                <?php  
                                if($type == 'dokter' || $type == 'superadmin'){
                                }else{
                                    echo'
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <div class="info-box-content" style="text-align: end;">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin: 23px;">
                                            <li class="ion ion-plus-round"></li> Tambah data</button>
                                    </div>
                                    <!-- /.info-box -->
                                </div>';
                            }

                                ?>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box">
                                        <div class="box-header with-border">
                                            <h3 class="box-title"><li class="ion ion-university"></li> Daftar Pasien</h3>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title" id="exampleModalLabel">Masukan Pasien Baru</h1>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="proses.php">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">NIK</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="number" name="nik" class="form-control" placeholder="NIK Ibu" required>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Password</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Nama</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="date" name="ttl" class="form-control" placeholder="Tanggal Lahir" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Kepala Keluarga</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="kepala_keluarga" class="form-control" placeholder="Kepala Keluarga" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Nomor Telefon</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="number" name="telp" class="form-control" placeholder="Nomor Telefon Aktif" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="alamat" class="form-control" placeholder="alamat">
                                                                    </div required>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="box-body pad">
                                                                        <label class="col-sm-2 col-form-label">Nama Dokter</label>
                                                                        <div class="col-sm-10">
                                                                            <select name="id_pengurus" class="form-control select2" style="width: 100%" required>
                                                                                <?php
                                                                        include '../../koneksi.php';
                                                                        $sql = mysql_query("SELECT id, nama FROM app_pengurus WHERE type = 'dokter' AND status = 'active' ORDER BY nama ASC");
                                                                        if(mysql_num_rows($sql) != 0){
                                                                            while($row = mysql_fetch_assoc($sql)){
                                                                                echo '<option value="'.$row['id'].'">'.$row['nama'].'</option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Prediksi Tanggal Lahir</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="date" name="prediksi_kelahiran" class="form-control" placeholder="Prediksi Tanggal Lahir">
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
                                                <div class="table-responsive">
                                                    <table id="example1" class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">
                                                                    <div align="center">No</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">NIK</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Nama</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Tanggal Lahir</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Nomor Telefon</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Kepala Keluarga</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Alamat</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Prediksi Tanggal Kelahiran</div>
                                                                </th>
                                                                <?php
                                                                if ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'superadmin') {
                                                                echo '
                                                                <th scope="col">
                                                                <div align="center">Status</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Edit</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Hapus</div>
                                                                </th>';
                                                                }
                                                                ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                include "../../koneksi.php";
                                                                $no=0;
                                                                $data_dokter="select * from app_pasien where id_pengurus = '".$_SESSION['id']."'";
                                                                $data_admin="select * from app_pasien";
                                                                // $ perintah Berguna sebagai variabel penampung //
                                                                if($type == 'superadmin' or $type == 'admin'){
                                                                $hasil=mysql_query($data_admin);
                                                                } else {
                                                                $hasil=mysql_query($data_dokter);
                                                                }
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
                                                                            <?php echo $row['nik'];?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <?php echo $row['nama'];?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <?php
                                                                        $date = new DateTime($row['ttl']);
                                                                                    echo $date->format('d F Y');
                                                                                    ?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <?php echo $row['telp'];?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <?php echo $row['kepala_keluarga'];?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <?php echo $row['alamat'];?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <?php
                                                                        $date = new DateTime($row['prediksi_kelahiran']);
                                                                                    echo $date->format('d F Y');
                                                                                    ?>
                                                                        </div>
                                                                    </td>
                                                                    <?php
                                                                                                    if ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'superadmin') {
                                                                                                        echo '
                                                                                                        <td>
                                                                                                            <div align="center">';
                                                                                                                if ($row['status'] == '0'){
                                                                                                                    echo '<a class="verify" href="verify.php?id='.$row['id'].'"><button type="button" class="btn btn-default">Verify</button></a>';
                                                                                                                } else {
                                                                                                                    echo '<label style="color: #00a65a;">Aktif</label>';
                                                                                                                }
                                                                                                                ?>
                                                                        <?php echo '</div>
                                                                                    </td>
                                                                                    <td>
                                                                                    <div align="center">
                                                                                        <a href="edit-user.php?id='.$row['id'].'">
                                                                                            <button type="button" class="btn btn-primary">Edit</button>
                                                                                        </a>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <a class="hapus" href="delete.php?id='.$row['id'].'">
                                                                                        <button type="button" class="btn btn-danger">Hapus</button>
                                                                                    </a>
                                                                                    </div>
                                                                                    </td>';
                                                                                                    }
                                                                                                    ?>
                                                                </tr>
                                                                <?php } ?>
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
                    $('[data-toggle="datepicker"]').datepicker({
                        autoHide: true,
                        zIndex: 2048,
                    });
                });
                $(document).ready(function() {
                    $('#dataTables-example').dataTable();
                });
            </script>
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