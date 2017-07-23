<?php
	
	
	 $user_id				= $_POST['user_id'];
	 $password				= $_POST['password'];
	
	$pesan_error = "";
	if (strlen(trim($user_id)) == 0) {
	$pesan_error .="User ID Harus Diisi \\n";
	}
	if (strlen(trim($password)) == 0) {
	$pesan_error .="Password Harus Diisi \\n";
	}
	if (!empty($pesan_error)){
	echo "<script>
	        alert('$pesan_error');
		    self.history.back();
		  </script>	";
	exit;	  
	}
	
	include "koneksidb.php"; 
	
		//hubungkan dengan config.php untuk berhubungan dengan database	//tangkap data yg di input dari form login input passwo	 //melakukan pengampilan data dari database untuk di cocokkan
	$akses = mysqli_query($koneksi, "select * from login") or die ("error sql");

	$validate = mysql_fetch_array($akses);

	
	if($password == $validate['password'])
	{// melakukan pemeriksaan kecocokan dengan percabangan.
		$_SESSION['user_id']=$user_id;  //jika cocok, buat session dengan nama sesuai dengan username
		 ("location:index.php");
    	
		// dan alihkan ke index.php
	}else{   				//jika tidak tampilkan pesan gagal login
		("location:login.php");
	}
	
	?>
		

 