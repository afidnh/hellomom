<?php
include "../../koneksi.php";
$id=$_POST['id'];
$jawaban = $_POST['jawaban'];
// string kosong inisialisasi
$query = mysql_query("UPDATE app_pertanyaan SET jawaban = '$jawaban' WHERE id = '$id'");
		if($query){
			?>
    <script language="JavaScript">
        alert('Berhasil Menambahkan Jawaban');
        document.location = 'index.php';
    </script>
    <?php 
		}else{
			?>
        <script language="JavaScript">
            alert('GAGAL MENGUPDATE DATA');
            document.location = 'index.php';
        </script>
        <?php 
		}
?>