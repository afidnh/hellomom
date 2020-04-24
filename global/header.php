<?php
if(!isset($_SESSION['username'])) {
   header('location:login.php'); 
} else { 
   $username = $_SESSION['username'];
   $type = $_SESSION['type'];
   $nama = $_SESSION['nama'];
}
?>
<?php
include "../../koneksi.php";
include "../../functions.php";
include "notif.php";
include "notif-laporan.php";
?>
<?php
echo '<header class="main-header">

                <!-- Logo -->
                <a href="index.php" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>DN</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Hello Moms</b></span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">';
                        if ($type == 'superadmin' || $type == 'admin') {
                          echo '
                          <!-- Notifications: style can be found in dropdown.less -->
                          <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle dropdown-toggle-laporan-notif" data-toggle="dropdown">
                              <i class="fa fa-bell-o"></i>
                              <span class="label label-danger hitung"></span>
                            </a>
                            <ul class="dropdown-menu laporan-notif">
                            </ul>
                          </li>
                          ';
                        } else {
                          echo '
                          <!-- Messages: style can be found in dropdown.less-->
                          <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle dropdown-toggle-bell-notif" data-toggle="dropdown" aria-expanded="true">
                              <i class="fa fa-comments-o"></i>
                              <span class="label label-success count"></span>
                            </a>
                            <ul class="dropdown-menu bell-notif">
                              <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                </ul>
                              </li>
                            </ul>
                          </li>
                          ';
                        }
                          echo'<!-- Tasks: style can be found in dropdown.less -->
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="../../dist/img/avatar5.png" class="user-image" alt="User Image">';
                                    echo '<span class="hidden-xs">'.$nama.'</span>';
                                    echo '
                                    
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="../../dist/img/avatar5.png" class="img-circle" alt="User Image">';
                                        echo '<p>'.$nama.' - '.$type.'</p>';
                                        echo '
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="../../logout.php" class="btn btn-default btn-flat">Keluar</a>
                                        </div>
                                        <div class="pull-left">
                                            <a href="../profil/index.php" class="btn btn-default btn-flat">Pengaturan</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </nav>
            </header>';
?>