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
                                            <h1>Tambah
                      <small><strong>Berita</strong></small>
                    </h1>
                                            <ol class="breadcrumb">
                                                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                                                <li class="active">Berita</li>
                                            </ol>
                                        </section>

                                        <!-- Main content -->
                                        <section class="content">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                <?php
                                                          include "../../koneksi.php";
                                                          $ambildata="select * from app_pengurus where id = '".$id."'"; // $ perintah Berguna sebagai variabel penampung //
                                                          $print=mysql_query($ambildata);
                                                          while ($row=mysql_fetch_array($print))
                                                          {
                                                          ?>

                                                  <!-- Profile Image -->
                                                  <div class="box box-primary">
                                                    <div class="box-body box-profile">
                                                        <div class="modal-body">
                                                            <form method="post" action="proses.php" enctype="multipart/form-data">
                                                          <div class="box-body">
                                                            <div class="form-group">
                                                              <label>Judul Berita</label>
                                                              <input type="hidden" name="id_pengurus" value="<?php echo $row['id']; ?>" class="form-control">
                                                              <input type="text" name="judul" class="form-control" required>
                                                            </div>
                                                            <div class="form-group">
                                                              <label>File input</label>
                                                              <input type="file" name="file">
                                                              <p class="help-block">Format gambar menggunakan JPG dan PNG</p>
                                                            </div>
                                                            <div class="form-group">
                                                             <div class="box-body pad">
                                                              <form>
                                                                    <textarea id="editor1" name="input" rows="10" cols="80" required="required"></textarea>
                                                              </form>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary" name="upload" value="upload">Tambah Berita</button>
                                                            <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true"><a href="../berita/index.php">
                                                                Kembali
                                                                </a>
                                                            </button>
                                                            </form>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <!-- /.box-body -->
                                                  </div>
                                                  <!-- /.box -->
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

                <!-- AdminLTE for demo purposes -->
                <script src="../../dist/js/demo.js"></script>
                <!-- CK Editor -->
                <script src="../../bower_components/ckeditor/ckeditor.js"></script>
                <!-- Bootstrap WYSIHTML5 -->
                <script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
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
    </body>

    </html>