<?php
	include_once "koneksi.php";
	
	class emp{}
	
	$image = $_POST['image'];
	$name = $_POST['name'];
	$isi = $_POST['berita'];
	$tgl=date('d-m-Y');
	$tanggal = date("Y-m-d H:i:s");
	$penulis = $_POST['id'];
	
	if (empty($penulis)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Please dont empty Name."; 
		die(json_encode($response));
	} else {
		$random = random_word(20);
		
		$path = "images/".$random.".png";
		
		// sesuiakan ip address laptop/pc atau URL server
		$actualpath = "/android/upload_image/$path";
		
		$query = mysqli_query($con, "INSERT INTO news (title,value,images,date,id_penulis) VALUES ('$name','$isi','$actualpath','$tanggal','$penulis')");
		
		if ($query){
			file_put_contents($path,base64_decode($image));
			
			$response = new emp();
			$response->success = 1;
			$response->message = "Successfully Uploaded";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error Upload image";
			die(json_encode($response)); 
		}
	}	
	
	// fungsi random string pada gambar untuk menghindari nama file yang sama
	function random_word($id = 20){
		$pool = '1234567890abcdefghijkmnpqrstuvwxyz';
		
		$word = '';
		for ($i = 0; $i < $id; $i++){
			$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
		}
		return $word; 
	}

	mysqli_close($con);
	
?>	