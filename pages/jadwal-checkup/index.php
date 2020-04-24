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
                                    Check Up
                                    <small>Pasien</small>
                                  </h1>
                                <ol class="breadcrumb">
                                    <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                                    <li class="active">Check Up</li>
                                </ol>
                            </section>
                            <section>
                                <!-- Info boxes -->
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                    </div>
                                    <!-- /.col -->
                                    <?php 
                                    if ($_SESSION['type'] == 'superadmin' or $_SESSION['type'] == 'admin') {
                                        # code...
                                    } else {
                                    ?>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="info-box-content">
                                                <div class="info-box-content" style="text-align: end;">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin: 23px;">
                                                        <li class="ion ion-plus-round"></li> Tambah data</button>
                                                </div>
                                                <!-- /.info-box-content -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="box-title" id="exampleModalLabel">Check Up Pasien</h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="proses.php" enctype="multipart/form-data">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="id_pengurus" class="form-control" value="<?php echo $_SESSION['id']; ?>" />
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="box-body pad">
                                                                            <label>Nama Pasien</label>
                                                                            <select name="id_pasien" class="form-control select2" style="width: 100%" required>
                                                                                <?php
                                                                        include '../../koneksi.php';
                                                                        $sql = mysql_query("SELECT id, nama FROM app_pasien WHERE id_pengurus = '".$_SESSION['id']."' ORDER BY nama ASC");
                                                                        if(mysql_num_rows($sql) != 0){
                                                                            while($row = mysql_fetch_assoc($sql)){
                                                                                echo '<option value="'.$row['id'].'">'.$row['nama'].'</option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tanggal Periksa:</label>

                                                                        <div class="input-group date">
                                                                            <div class="input-group-addon">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </div>
                                                                            <input type="date" name="tanggal_periksa" class="form-control pull-right" id="datepicker" required>
                                                                        </div>
                                                                        <!-- /.input group -->
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Description">Tri Semester</label>
                                                                        <input type="number" name="trisemester" class="form-control" required />
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary" name="upload" value="upload">Simpan</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.info-box -->
                                        </div>
                                        <!-- /.col -->
                                        <?php
                                }
                                ?>

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
                                                <h3 class="box-title"><li class="ion ion-university"></li>Check Up Pasien</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="table-responsive">
                                                    <table id="example1" class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">
                                                                    <div align="center">No</div>
                                                                    <div align="center"></div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Nama Pasien</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Trisemester</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Tanggal Check Up</div>
                                                                </th>
                                                                <th scope="col">
                                                                    <div align="center">Lihat</div>
                                                                </th>
                                                                <?php 
                                if ($_SESSION['type'] == 'dokter' or $_SESSION['type'] == 'superadmin') {
                                    ?>
                                                                    <th scope="col">
                                                                        <div align="center">Hapus</div>
                                                                    </th>
                                                                    <?php } ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                              include "../../koneksi.php";
                                                              $no=0;
                                                              $data_dokter="SELECT app_pasien.nama, app_jadwal.id_pasien, app_pasien.prediksi_kelahiran, app_jadwal.trisemester, app_jadwal.tanggal_checkup, app_jadwal.id, app_checkup.id AS 'id_checkup'
                                                                    FROM app_jadwal
                                                                    LEFT JOIN app_pasien ON app_pasien.id=app_jadwal.id_pasien
                                                                    LEFT JOIN app_checkup ON app_jadwal.id=app_checkup.id_jadwal
                                                                    WHERE app_jadwal.id_pengurus = '".$_SESSION['id']."'";
                                                              $data_admin="SELECT app_pasien.nama, app_jadwal.id_pasien, app_pasien.prediksi_kelahiran, app_jadwal.trisemester, app_jadwal.tanggal_checkup, app_jadwal.id, app_checkup.id AS 'id_checkup'
                                                                    FROM app_jadwal
                                                                    LEFT JOIN app_pasien ON app_pasien.id=app_jadwal.id_pasien
                                                                    LEFT JOIN app_checkup ON app_jadwal.id=app_checkup.id_jadwal"; // $ perintah Berguna sebagai variabel penampung //
                                                              if ($type == 'admin' or $type == 'superadmin') {
                                                                  $query=mysql_query($data_admin);
                                                              } else {
                                                                $query=mysql_query($data_dokter);
                                                              }
                                                              while ($row=mysql_fetch_array($query))
                                                              {
                                                              $no++;
                                                              ?>
                                                                <tr style="text-align: center;">
                                                                    <td>
                                                                        <div align="center">
                                                                            <?php echo $no; ?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <?php echo $row['nama'];?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div>
                                                                            <?php echo $row['trisemester'];?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div>
                                                                            <?php
                                            $date = new DateTime($row['tanggal_checkup']);
                                            echo $date->format('l, d F Y');
                                        ?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <?php
                                            if ($row['id_checkup'] == NULL){
                                                if ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'superadmin') {
                                                    echo 
                                                        '<a href="tambah-checkup.php?id='.$row['id'].'">
                                                        <button type="button" class="btn btn-default" disabled>Tambah Hasil</button>
                                                        </a>';
                                                }else{
                                                    echo 
                                                    '<a href="tambah-checkup.php?id='.$row['id'].'">
                                                    <button type="button" class="btn btn-default">Tambah Hasil</button>
                                                    </a>';
                                                    }
                                            } else {
                                        ?>
                                                                                <a href="detail-checkup.php?id=<?php echo $row['id']; ?>" class='open_modal' id="">
                                                                                    <button type="button" class="btn btn-primary">Lihat</button>
                                                                                </a>
                                                                                <?php
                                            }
                                        ?>
                                                                        </div>
                                                                    </td>
                                                                    <?php 
                                if ($_SESSION['type'] == 'dokter' or $_SESSION['type'] == 'superadmin') {
                                    ?>
                                                                        <td>
                                                                            <a class="hapus" href="delete.php?id=<?php echo $row['id']; ?>">
                                                                                <button type="button" class="btn btn-danger">Hapus</button>
                                                                            </a>
                                                                            <?php } ?>
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
                <?php
        if ($_SESSION['type'] == 'dokter' || $_SESSION['type'] == 'bidan') {
          ?>
                    <script>
                        $(document).ready(function() {

                            function load_unseen_notification(view = '') {
                                $.ajax({
                                    url: "../../fetch.php",
                                    method: "POST",
                                    data: {
                                        view: view
                                    },
                                    dataType: "json",
                                    success: function(data) {
                                        $('.bell-notif').html(data.notification);
                                        if (data.unseen_notification > 0) {
                                            $('.count').html(data.unseen_notification);
                                        }
                                    }
                                });
                            }

                            load_unseen_notification();

                            $(document).on('click', '.dropdown-toggle-bell-notif', function() {
                                $('.count').html('');
                                load_unseen_notification('yes');
                            });

                            setInterval(function() {
                                load_unseen_notification();;
                            }, 5000);

                        });
                    </script>
                    <?php
        } else {
          ?>
                        <script>
                            $(document).ready(function() {

                                function load_unseen_notification(view = '') {
                                    $.ajax({
                                        url: "../../fetch-laporan.php",
                                        method: "POST",
                                        data: {
                                            view: view
                                        },
                                        dataType: "json",
                                        success: function(data) {
                                            $('.laporan-notif').html(data.notification);
                                            if (data.unseen_notification > 0) {
                                                $('.count').html(data.unseen_notification);
                                            }
                                        }
                                    });
                                }

                                load_unseen_notification();

                                $(document).on('click', '.dropdown-toggle-laporan-notif', function() {
                                    $('.count').html('');
                                    load_unseen_notification('yes');
                                });

                                setInterval(function() {
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
                        <?php
        }
        ?>
        </body>

        </html>