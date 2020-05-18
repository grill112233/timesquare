<?php 
	require 'controllers/friend/header.php'; 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ค้นหา</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel = "icon" href ="css/images/logo.png"> 
		<link rel="stylesheet" href="css/friendstyle.css">
		<link rel="stylesheet" href="https://unpkg.com/bootstrap@4.1.0/dist/css/bootstrap.min.css" >
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link href="css/datepicker.min.css" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="js/datepicker.js"></script>
		<script src="js/datepicker.th.js"></script>
    </head>
 <body>
	<div class="containerFriend">
		<div class="header">
			<div class="coloumn">
				<div class="form-back" ><a class="back" href="index">< กลับสู่หน้าหลัก </a></div>
			</div>
			<div class="coloumn">
				
			</div>

		</div>
		<div class="clearfix"></div>
		<div class="container-second">
			<div class="search-bar">
				<form action="friend" method="post">
					<div class="coloumn-search1">
						<input class="form-control input-search"type="text" name="search-by-user" placeholder="ค้นหา...">
					</div>
					<div class="coloumn-search2">
						<button type="submit" name="btn-search-now" class="search-now-btn"><i class="material-icons">search</i></button>
					</div>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="container-third">
			<div class="content">
				<?php
					require 'controllers/friend/content_search.php'; 
				?>
			</div>
		</div>
		<div id="displayRequest" class="request-display">
			<div class="request-content-over">
				<span id="btnRequestCancle" class="close">X</span>
				<p>จองเวลา</p>
			</div>
			<div class="request-content-lower">
				<div class="request-body">
					<table>
					<thead>
					</thead>
					<?php
						require 'controllers/friend/content_request_time.php'; 
					?>
					</table>
				</div>
			</div>
		</div>
		
		<div id="displaySendMessage" class="sendMsg-display">
			<div class="sendMsg-content-over">
				<span id="btnMsgCancle" class="close">X</span>
				<div class="sendMsg-body">
					<form action="friend" method="post">
						<p>ส่งข้อความถึง <?php echo $username_friend; ?></p>
						<input type="text" placeholder="ข้อความ..." class="form-control" name="msg-content" autocomplete="off">
						<br>
						<button name="sendMsg-btn-confirm" type="submit" class="sendMsg-btn-confirm" value="<?php echo $username_friend; ?>">ส่ง</button>
					</form>
				</div>
			</div>
		</div>
		
		<div id="displayGiverScore" class="giverScore-display">
			<div class="giverScore-content-over">
				<span id="btnGiverScoreCancle" class="close">X</span>
				<div class="giverScore-body">
					<form action="friend" method="post">
						<p>ให้คะแนน <?php echo $username_friend; ?></p>
						<select class="score_input" name="score">
							<option value="">กรุณาเลือกคะแนน</option>
							<option value="10">10 คะแนน</option>
							<option value="9">9 คะแนน</option>
							<option value="8">8 คะแนน</option>
							<option value="7">7 คะแนน</option>
							<option value="6">6 คะแนน</option>
							<option value="5">5 คะแนน</option>
							<option value="4">4 คะแนน</option>
							<option value="3">3 คะแนน</option>
							<option value="2">2 คะแนน</option>
							<option value="1">1 คะแนน</option>
							<option value="0">0 คะแนน</option>
						</select>
						<br>
						<button name="giverScore-btn-confirm" type="submit" class="giverScore-btn-confirm" value="<?php echo $username_friend; ?>">ยืนยัน</button>
					</form>
				</div>
			</div>
		</div>
		
		<div id="displayProfile" class="Profile-display">
			<div class="Profile-content-over">
				<span id="btnProfileCancle" class="close">X</span>
				<div class="Profile-body">
					<?php
						require 'controllers/friend/content_profile.php'; 
					?>
				</div>
			</div>
		</div>
		
	</div>
	<script src="js/friend.js"></script>
	<script src="js/validinput.js"></script>
 </body>
</html>
