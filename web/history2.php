<?php
	require 'controllers/history2/header.php';
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ประวัติการถูกจอง</title>
  <link rel="stylesheet" href="css/history2style.css">

</head>
<body>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>ประวัติการถูกจอง</title>
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
					ประวัติการถูกจอง
				</div>
			</div>
		</div>
	</header>
	
	<div class="content">
		<div class="container">
			<div class="background">
				<?php
					require 'controllers/history2/content.php';
				?>
			</div>
		</div>
	</div>



</body>
</html>

</body>
</html>
