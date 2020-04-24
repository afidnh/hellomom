<?php
	include "koneksi.php";
	
	$id 	= $_POST['id'];
	$username 	= $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	
	class emp{}
	
	if (empty($id) || empty($username) || empty($password) || empty($email) || empty($phone)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Kolom isian tidak boleh kosong"; 
		die(json_encode($response));
	} else {
		$query = mysql_query("UPDATE users SET username='".$username."', password='".$password."', email='".$email."', phone='".$phone."' WHERE id='".$id."'");
		
		if ($query) {
			$response = new emp();
			$response->success = 1;
			$response->message = "Data berhasil di update";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error update Data";
			die(json_encode($response)); 
		}	
	}
?>