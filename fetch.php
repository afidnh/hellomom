<?php
include('koneksi.php');
session_start();
$id = $_SESSION['id'];
$type = $_SESSION['type'];

    if(isset($_POST['view'])){

      if($_POST["view"] != '')
      {
          $update_query = "UPDATE app_pertanyaan SET jawaban != '' WHERE jawaban='' AND id_pengurus = '$id'";
          mysql_query($update_query);
      }
      $query = "SELECT * FROM app_pertanyaan WHERE jawaban = '' AND id_pengurus = '$id' ORDER BY tanggal DESC LIMIT 5";
      $result = mysql_query($query);
      $output = '';
      if(mysql_num_rows($result) > 0)
      {
       while($row = mysql_fetch_array($result))
       {
         $output .= '
         <li>
         <a href="../tanya/jawab.php?id='.$row["id"].'">
         <strong>'.$row["pertanyaan"].'</strong><br />
         <small><em>'.$row["tanggal"].'</em></small>
         </a>
         </li>
         ';

       }
      }
      else{
           $output .= '
           <li><a href="#" class="text-bold text-italic">Tidak Ada Notifikasi</a></li>';
      }

      $status_query = "SELECT * FROM app_pertanyaan WHERE jawaban = '' AND id_pengurus = '$id'";
      $result_query = mysql_query($status_query);
      $count = mysql_num_rows($result_query);
      $data = array(
          'notification' => $output,
          'unseen_notification'  => $count
      );

      echo json_encode($data);

      }

?>