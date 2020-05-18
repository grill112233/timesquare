<?php
	require_once './controllers/authController.php'; 
	require './controllers/isLogin.php';
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ข้อมูลส่วนตัว</title>
  <link rel="stylesheet" href="css/profilestyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>ข้อมูลส่วนตัว</title>
</head>
<body>

	<nav>
		<div class="container">
			<div class="col">
				<div class="form-back" ><a class="back" href="index">< กลับสู่หน้าหลัก </a></div>
			</div>
		</div>
	</nav>

	<header>
		<div class="container">
			<div class="box">
				<div class="text">
					ข้อมูลส่วนตัว
				</div>
			</div>
		</div>
	</header>
	
	<div class="content">
		<div class="container">
			<div class="background">
				<div class="box">
					<div class="text">
						<?php
							require './controllers/profile/myprofile.php';
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>

</body>
</html>
