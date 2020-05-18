<?php
	require 'controllers/history1/header.php';
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ประวัติการจอง</title>
  <link rel="stylesheet" href="css/history1style.css">

</head>
<body>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>ประวัติการจอง</title>
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
					ประวัติการจอง
				</div>
			</div>
		</div>
	</header>
	
	<div class="content">
		<div class="container">
			<div class="background">
				<?php
					require 'controllers/history1/content.php';
				?>
			</div>
		</div>
	</div>



</body>
</html>

</body>
</html>
