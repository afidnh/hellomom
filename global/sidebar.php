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
?>
<?php
if ($_SESSION['type'] == 'superadmin') {
echo '<aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <!--<div class="user-panel">
                        <div class="pull-left image">
                            <img src="../../dist/img/avatar5.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">';
                                            echo '
                                            <p>'.$nama.'</p>';
                                            echo '
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>--!>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                        <li>
                            <a href="../dashboard/index.php">
                                <i class="fa fa-home"></i> <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="../user/index.php">
                                <i class="fa fa-users"></i>
                                <span>Pasien</span>
                                <span class="pull-right-container">
            </span>
                            </a>
                        </li>
                        <li>
                            <a href="../pengurus/index.php">
                                <i class="fa fa-universal-access"></i>
                                <span>Admin</span>
                                <span class="pull-right-container">
            </span>
                            </a>
                        </li>
                        <li>
                            <a href="../laporan/index.php">
                                <i class="fa fa-pie-chart"></i>
                                <span>Laporan</span>
                                <span class="pull-right-container">
            </span>
                            </a>
                        </li>
                        </ul>
                </section>
                <!-- /.sidebar -->
            </aside>';
        } elseif ($_SESSION['type'] == 'admin') {
echo '<aside class="main-sidebar">
                                    <!-- sidebar: style can be found in sidebar.less -->
                                    <section class="sidebar">
                                        <!-- Sidebar user panel -->
                                        <div class="user-panel">
                                            <div class="pull-left image">
                                                <img src="../../dist/img/avatar5.png" class="img-circle" alt="User Image">
                                            </div>
                                            <div class="pull-left info">';
                                            echo '
                                            <p>'.$nama.'</p>';
                                            echo '
                                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                                            </div>
                                        </div>
                                        <!-- search form -->
                                        <form action="#" method="get" class="sidebar-form">
                                            <div class="input-group">
                                                <input type="text" name="q" class="form-control" placeholder="Search...">
                                                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                                            </div>
                                        </form>
                                        <!-- /.search form -->
                                        <!-- sidebar menu: : style can be found in sidebar.less -->
                                        <ul class="sidebar-menu" data-widget="tree">
                                            <li class="header">MAIN NAVIGATION</li>
                                            <li>
                                                <a href="../dashboard/index.php">
                                                    <i class="fa fa-home"></i> <span>Home</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="../user/index.php">
                                                    <i class="fa fa-users"></i>
                                                    <span>Pasien</span>
                                                    <span class="pull-right-container">
            </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="../jadwal-checkup/index.php">
                                                    <i class="fa fa-calendar"></i>
                                                    <span>Check Up</span>
                                                    <span class="pull-right-container">
            </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="../laporan/index.php">
                                                    <i class="fa fa-pie-chart"></i>
                                                    <span>Laporan</span>
                                                    <span class="pull-right-container">
            </span>
                                                </a>
                                            </li>
                                            </ul>
                                    </section>
                                    <!-- /.sidebar -->
                                </aside>';
                            } else { 
                                echo '<aside class="main-sidebar">
                                    <!-- sidebar: style can be found in sidebar.less -->
                                    <section class="sidebar">
                                        <!-- Sidebar user panel -->
                                        <div class="user-panel">
                                            <div class="pull-left image">
                                                <img src="../../dist/img/avatar5.png" class="img-circle" alt="User Image">
                                            </div>
                                            <div class="pull-left info">';
                                            echo '
                                            <p>'.$nama.'</p>';
                                            echo '
                                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                                            </div>
                                        </div>
                                        <!-- search form -->
                                        <form action="#" method="get" class="sidebar-form">
                                            <div class="input-group">
                                                <input type="text" name="q" class="form-control" placeholder="Search...">
                                                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                                            </div>
                                        </form>
                                        <!-- /.search form -->
                                        <!-- sidebar menu: : style can be found in sidebar.less -->
                                        <ul class="sidebar-menu" data-widget="tree">
                                            <li class="header">MAIN NAVIGATION</li>
                                            <li>
                                                <a href="../dashboard/index.php">
                                                    <i class="fa fa-dashboard"></i> <span>Home</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="../user/index.php">
                                                    <i class="fa fa-users"></i>
                                                    <span>Pasien</span>
                                                    <span class="pull-right-container">
            </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="../jadwal-checkup/index.php">
                                                    <i class="fa fa-calendar"></i>
                                                    <span>Check Up</span>
                                                    <span class="pull-right-container">
            </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="../berita/index.php">
                                                    <i class="fa fa-files-o"></i>
                                                    <span>Berita</span>
                                                    <span class="pull-right-container">
            </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="../tanya/index.php">
                                                    <i class="fa fa-th"></i>
                                                    <span>Pertanyaan</span>
                                                    <span class="pull-right-container">
                                </span>
                                                </a>
                                            </li>
                                            </ul>
                                    </section>
                                    <!-- /.sidebar -->
                                </aside>'
                            ; }
?>