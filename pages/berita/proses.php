<?php
// Load file koneksi.php
include "../../koneksi.php";

// Ambil Data yang Dikirim dari Form
$id_pengurus = $_POST['id_pengurus'];
$judul = $_POST['judul'];
$isi = $_POST['input'];
$tanggal = date('d-m-Y');

if($_POST['upload']){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
 
			if(empty($judul) || empty($isi)){
				echo "<script>alert('Lengkapi Data Berita');
	            				document.location.href='tambah-berita.php'</script>\n";
			} else {
				if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					if($ukuran < 1044070){
						$random = random_word(20);
						$gambar = "../berita/file/".$random.".png";			
						move_uploaded_file($file_tmp, 'file/'.$random.'.png');
						$query = mysql_query("INSERT INTO app_berita VALUES(NULL,'$id_pengurus','$judul', '$gambar', '$isi', Now(), Now())");
						if($query){
								echo "<script>alert('Berhasil Menambahkan berita');
	            				document.location.href='index.php'</script>\n";
						}else{
							echo "<script>alert('Gagal Mengupload Gambar');
	            				document.location.href='index.php'</script>\n";
						}
					}else{
						echo "<script>alert('Ukuran FILE Terlalu Besar');
	            				document.location.href='index.php'</script>\n";
					}
				}else{
					$query = mysql_query("INSERT INTO app_berita (id, id_pengurus, judul, isi, tanggal, tanggal_update) VALUES (NULL,'$id_pengurus','$judul', '$isi', Now(), Now())");
						if($query){
								echo "<script>alert('Berhasil Menambahkan berita');
	            				document.location.href='index.php'</script>\n";
						}else{
							echo "<script>alert('Gagal Menambahkan Berita');
	            			document.location.href='index.php'</script>\n";
						}
				}
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