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
                                            <h1>Home
                      <small><strong><?php echo $type; ?></strong></small>
                    </h1>
                                            <ol class="breadcrumb">
                                                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                                            </ol>
                                        </section>

                                        <!-- Main content -->
                                        <section class="content">
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="info-box">
                                                    <span class="info-box-icon bg-red"><i class="fa fa-home" style="margin-top: 17px;"></i></span>
                                                    <!-- <?php
                                   $sql = "SELECT * FROM app_pasien";
                                  $query = mysql_query($sql);
                                  $count = mysql_num_rows($query);
                                ?> -->

                                                        <div class="info-box-content">
                                                            <span class="info-box-text">WELCOME</span>
                                                            <span class="info-box-number"><strong><?php echo $nama; ?></strong></span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                </div>
                                                <!-- /.info-box -->
                                            </div>
                                            <!-- /.col -->
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
                  </script>
    </body>

    </html>