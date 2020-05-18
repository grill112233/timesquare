<?php 
	require 'controllers/index/header.php';
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel = "icon" href ="css/images/logo.png"> 
	<?php
		require 'controllers/index/title.php';
	?>
  <link rel="stylesheet" href="css/indexstyle.css">
</head>
<body>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Notification center</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="main.js" type="text/javascript"></script>
</head>
<body>
    <header>
        <div class="wrapper">
            <div class="logo">
                <img class="imagelogo" src="css/images/logo.png" alt="logo">
            </div>
            <div class="profile">
                <i class="fa fa-user-circle"></i>
            </div>
            <div class="notification">
                <i class="fa fa-bell-o"></i>
				<?php 
					require 'controllers/index/bubble_request.php';
				?>
            </div>
            <div class="inbox">
                <i class="fa fa-inbox"></i>
				<?php 
					require 'controllers/index/bubble_message.php';
				?>
            </div>

        </div>
    </header>
	
	<div class="content">
		<div class="content-col">
			<div class="right-content">
				<h1>จัดตารางเวลาด้วยตัวคุณเอง</h1>
				
				<form action="index" method="post">
					<div class="btn">
						<p><button type="submit" name="start-btn" style="cursor: pointer;">เริ่มต้นใช้งาน</button></p>
						<div class="clearfix"></div>
						<p><button type="submit" name="friend-btn" style="cursor: pointer;">ค้นหารายชื่อเพื่อน</button></p>
					</div>
					<div class="clearfix"></div>
					<div class="btn-rainbow">
						<button class="btn-rainbow2" type="submit" name="history1-btn" style="cursor: pointer;">ประวัติการจอง</button>
						<button class="btn-rainbow1" type="submit" name="history2-btn" style="cursor: pointer;">ประวัติการถูกจอง</button>
					</div>
				</form>
			</div>
		</div>
		<div class="content-col">
		</div>
	</div>
	
    <header>
        <div class="wrapper">
            <div class="notification-dropdown dd">
                <div class="arrow-up"></div>
                <div class="header">
                    <div class="container">
                        <div class="text fl">คำร้องขอ</div>
                        <div class="notify-count common-count count2 fl">
                            <div class="value"><?php echo $countRequestMyTime; ?></div>
                        </div>
                    </div>
                </div>
                <div class="items">
					<?php
						require 'controllers/index/content_request.php';
					?>
                </div>
            </div>
            <div class="profile-dropdown dd">
                <div class="arrow-up"></div>
                <div class="header">
                    <div class="container">
                        <div class="text">ข้อมูลส่วนตัว</div>
                    </div>
                </div>
                <div class="items">
					<div class="list-item noti">
                         <div class="text"><b class="fontS">ชื่อผู้ใช้ <?php echo $_SESSION['username']; ?></b></div>
                     </div>
					<div class="list-item noti">
						 <div class="text"><b class="fontS">ชื่อ <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></b></div>
                     </div>
					<div class="list-item noti">
                         <div class="text"><b class="fontS">อีเมล <?php echo $_SESSION['email']; ?></b></div>
                     </div>
					<div class="list-item noti">
                         <div class="text">
							<form action="index" method="post">
								<button type="submit" name="btn-profile" class="btn-manage-profile">จัดการบัญชี</button>
							</form>
							<form action="index" method="post">
								<button type="submit" name="logout-button" class="btn-logout">ออกจากระบบ</button>
							</form>
						 </div>
                     </div>
					 <div class="clearfix"></div>
                </div>
            </div>

            <div class="inbox-dropdown dd">
                <div class="arrow-up"></div>
                <div class="header">
                    <div class="container">
                        <div class="text fl">ข้อความ</div>
                        <div class="notify-count common-count count2 fl">
                            <div class="value"><?php echo $countMsg; ?></div>
                        </div>
                    </div>
                </div>
                <div class="items">
					<?php
						require 'controllers/index/content_message.php';
					?>
                </div>
            </div>
        </div>
    </header>


</body>
</html>

<script  src="js/index.js"></script>

</body>
</html>
