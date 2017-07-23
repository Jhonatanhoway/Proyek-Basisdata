
<?php
  include "koneksidb.php";
?>

<html>
    <head>
		
        <link rel="stylesheet" type="text/css" href="style.css">      
    </head>
    <body>
	<body style="background-image:url(gambar/perpus.jpg")
	
        <div id="kotak">
		
            <div id="atas">
			
                LOGIN ADMIN
				
            </div>
			
            <div id="bawah">
			
                <form method="post" action="aksi-login.php">
				
                    <input class="masuk" type="text" autocomplete="off" placeholder="Username" name="user_id"><br/>
                    <input class="masuk" type="password" autocomplete="off" placeholder="Password" name="password"><br/>
					
                    <input id="tombol" type="submit" value="Login">
                </form>
            </div>
        </div>
    </body>
</html>