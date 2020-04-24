<?php
include('koneksi.php');
session_start();
$id = $_SESSION['id'];
$type = $_SESSION['type'];

if(isset($_POST['view'])){

if($_POST["view"] != '')
{
    $update_query = "UPDATE app_laporan SET status != '0' WHERE status='0'";
    mysql_query($update_query);
}
$query = "SELECT * FROM app_laporan WHERE status = '0' ORDER BY tanggal_kejadian DESC LIMIT 5";
$result = mysql_query($query);
$output = '';
if(mysql_num_rows($result) > 0)
{
 while($row = mysql_fetch_array($result))
 {
   $output .= '
   <li>
   <a href="../laporan/index.php">
   <strong>'.$row["lokasi"].'</strong><br />
   <small><em>'.$row["tanggal_kejadian"].'</em></small>
   </a>
   </li>
   <script type="text/javascript">play_sound();</script>';

 }
}
else{
     $output .= '
     <li><a href="#" class="text-bold text-italic">Tidak Ada Notifikasi</a></li>';
}

$status_query = "SELECT * FROM app_laporan WHERE status = '0'";
$result_query = mysql_query($status_query);
$count = mysql_num_rows($result_query);
$data = array(
    'notification' => $output,
    'unseen_notification'  => $count
);

echo json_encode($data);

}

?>