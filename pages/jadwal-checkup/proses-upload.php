<?php
// Load file koneksi.php
include "../../koneksi.php";

// Ambil Data yang Dikirim dari Form
$id = $_POST['id'];

if($_POST['upload']){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){
					$random = random_word(20);
					$gambar = "../jadwal-checkup/file/".$random.".png";			
					move_uploaded_file($file_tmp, 'file/'.$random.'.png');
					$query = mysql_query("UPDATE app_checkup SET gambar = '$gambar', tanggal_update = Now() WHERE id_jadwal = '$id'");
					if($query){
						echo "<script>alert('Data Berhasil Di Upload');
							document.location.href='detail-checkup.php?id=$id'</script>\n";
					}else{
						echo "<script>alert('Gagal Mengupload Gambar');
							document.location.href='detail-checkup.php?id=$id'</script>\n";
					}
				}else{
					echo "<script>alert('Ukuran File Terlalu Besar');
							document.location.href='detail-checkup.php?id=$id'</script>\n";
				}
			}else{
				echo "<script>alert('Extensi FIle Tidak Di perbolehkan');
							document.location.href='detail-checkup.php?id=$id'</script>\n";
			}
		}

function random_word($id = 20){
		$pool = '1234567890abcdefghijkmnpqrstuvwxyz';
		
		$word = '';
		for ($i = 0; $i < $id; $i++){
			$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
		}
		return $word; 
	}
?>