<?php 
	require 'controllers/timetable/header.php'; 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ตารางเวลา</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel = "icon" href ="css/images/logo.png"> 
		<link rel="stylesheet" href="css/timetablestyle.css">
		<link rel="stylesheet" href="css/timetableinsertstyle.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link href="css/datepicker.min.css" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
		<script src="js/datepicker.js"></script>
		<script src="js/datepicker.th.js"></script>
    </head>
 <body>
	<div class="container">
		<div class="header">
			<div class="coloumn">
				<div class="form-back" ><a class="back" href="index">< กลับสู่หน้าหลัก </a></div>
			</div>
			<div class="coloumn">
				<div class="coloumn-right">

				</div>
			</div>

		</div>
		<div class="clearfix"></div>
		<div class="container-second">
			<div class="menu">

					<div class="btn-menu">
						<div class="col">
							<button id="btnAdd" class="btn-circle-add">+</button>
						</div>
						<div class="col">
							<button id="btnDelete" class="btn-circle-delete">-</button>
						</div>
					</div>
					<div class="btn-menu">
						<div class="col font-btn-add">เพิ่ม</div>
						<div class="col font-btn-delete">ลบ</div>
					</div>
					
					<div class="clearfix"></div>
					
					<div id="displayAdd" class="modal">
						<div class="modal-content">
						<form action="timetable" name="timeinsert" method="post">
						<div class="modal-body">
							<p class="head-modal">เพิ่มเวลา</p>
							<p class="modal-body2">
								วันที่:
							</p>
							<p class="modal-body3">
								<input type="text" id="date" data-language="en" class="datepicker-here input-text customize" name="date" autocomplete="off">
							</p>
							
							<p class="modal-body2">
								เวลาเริ่ม:
							</p>
							<p class="modal-body3">
									<select class="custom-select customize" id="start_datetime" name="start_datetime">
										<option value="">กรุณาเลือกเวลาเริ่ม</option>
										<option value="06:00:00">06:00 น.</option>
										<option value="06:30:00">06:30 น.</option>
										<option value="07:00:00">07:00 น.</option>
										<option value="07:30:00">07:30 น.</option>
										<option value="08:00:00">08:00 น.</option>
										<option value="08:30:00">08:30 น.</option>
										<option value="09:00:00">09:00 น.</option>
										<option value="09:30:00">09:30 น.</option>
										<option value="10:00:00">10:00 น.</option>
										<option value="10:30:00">10:30 น.</option>
										<option value="11:00:00">11:00 น.</option>
										<option value="11:30:00">11:30 น.</option>
										<option value="12:00:00">12:00 น.</option>
										<option value="12:30:00">12:30 น.</option>
										<option value="13:00:00">13:00 น.</option>
										<option value="13:30:00">13:30 น.</option>
										<option value="14:00:00">14:00 น.</option>
										<option value="14:30:00">14:30 น.</option>
										<option value="15:00:00">15:00 น.</option>
										<option value="15:30:00">15:30 น.</option>
										<option value="16:00:00">16:00 น.</option>
										<option value="16:30:00">16:30 น.</option>
										<option value="17:00:00">17:00 น.</option>
										<option value="17:30:00">17:30 น.</option>
										<option value="18:00:00">18:00 น.</option>
										<option value="18:30:00">18:30 น.</option>
										<option value="19:00:00">19:00 น.</option>
										<option value="19:30:00">19:30 น.</option>
										<option value="20:00:00">20:00 น.</option>
										<option value="20:30:00">20:30 น.</option>
										<option value="21:00:00">21:00 น.</option>
										<option value="21:30:00">21:30 น.</option>
										<option value="22:00:00">22:00 น.</option>
										<option value="22:30:00">22:30 น.</option>
										<option value="23:00:00">23:00 น.</option>
										<option value="23:30:00">23:30 น.</option>
										<option value="00:00:00">00:00 น.</option>
										<option value="00:30:00">00:30 น.</option>
										<option value="01:00:00">01:00 น.</option>
										<option value="01:30:00">01:30 น.</option>
										<option value="02:00:00">02:00 น.</option>
										<option value="02:30:00">02:30 น.</option>
										<option value="03:00:00">03:00 น.</option>
										<option value="03:30:00">03:30 น.</option>
										<option value="04:00:00">04:00 น.</option>
										<option value="04:30:00">04:30 น.</option>
										<option value="05:00:00">05:00 น.</option>
										<option value="05:30:00">05:30 น.</option>
									</select>
							</p>
							<p class="modal-body2">
								เวลาจบ:
							</p>
							<p class="modal-body3">
									<select class="custom-select customize" id="end_datetime" name="end_datetime">
										<option value="">กรุณาเลือกเวลาจบ</option>
										<option value="06:00:00">06:00 น.</option>
										<option value="06:30:00">06:30 น.</option>
										<option value="07:00:00">07:00 น.</option>
										<option value="07:30:00">07:30 น.</option>
										<option value="08:00:00">08:00 น.</option>
										<option value="08:30:00">08:30 น.</option>
										<option value="09:00:00">09:00 น.</option>
										<option value="09:30:00">09:30 น.</option>
										<option value="10:00:00">10:00 น.</option>
										<option value="10:30:00">10:30 น.</option>
										<option value="11:00:00">11:00 น.</option>
										<option value="11:30:00">11:30 น.</option>
										<option value="12:00:00">12:00 น.</option>
										<option value="12:30:00">12:30 น.</option>
										<option value="13:00:00">13:00 น.</option>
										<option value="13:30:00">13:30 น.</option>
										<option value="14:00:00">14:00 น.</option>
										<option value="14:30:00">14:30 น.</option>
										<option value="15:00:00">15:00 น.</option>
										<option value="15:30:00">15:30 น.</option>
										<option value="16:00:00">16:00 น.</option>
										<option value="16:30:00">16:30 น.</option>
										<option value="17:00:00">17:00 น.</option>
										<option value="17:30:00">17:30 น.</option>
										<option value="18:00:00">18:00 น.</option>
										<option value="18:30:00">18:30 น.</option>
										<option value="19:00:00">19:00 น.</option>
										<option value="19:30:00">19:30 น.</option>
										<option value="20:00:00">20:00 น.</option>
										<option value="20:30:00">20:30 น.</option>
										<option value="21:00:00">21:00 น.</option>
										<option value="21:30:00">21:30 น.</option>
										<option value="22:00:00">22:00 น.</option>
										<option value="22:30:00">22:30 น.</option>
										<option value="23:00:00">23:00 น.</option>
										<option value="23:30:00">23:30 น.</option>
										<option value="00:00:00">00:00 น.</option>
										<option value="00:30:00">00:30 น.</option>
										<option value="01:00:00">01:00 น.</option>
										<option value="01:30:00">01:30 น.</option>
										<option value="02:00:00">02:00 น.</option>
										<option value="02:30:00">02:30 น.</option>
										<option value="03:00:00">03:00 น.</option>
										<option value="03:30:00">03:30 น.</option>
										<option value="04:00:00">04:00 น.</option>
										<option value="04:30:00">04:30 น.</option>
										<option value="05:00:00">05:00 น.</option>
										<option value="05:30:00">05:30 น.</option>
									</select>
							</p>
							
							<p class="modal-body2">
								วิชา:
							</p>
							<p class="modal-body3">
								<input class="input-text customize" type="text" id="subject" name="subject">
							</p>
							
							<p class="modal-body2">
								ราคา:
							</p>
							<p class="modal-body3">
								<input class="input-text customize" type="text" id="price" name="price">
							</p>
							
							<p class="modal-body2">
								รูปแบบการสอน:
							</p>
							<p class="modal-body3">
									<select class="custom-select customize" id="learn" name="learn">
										<option value="">กรุณาเลือกรูปแบบการสอน</option>
										<option value="สอนตัวต่อตัว">สอนตัวต่อตัว</option>
										<option value="สอนคู่สองคน">สอนคู่สองคน</option>
										<option value="สอนกลุ่มมากกว่า 2 คน">สอนกลุ่มมากกว่า 2 คน</option>
										<option value="ออนไลน์(วิดีโอบันทึก)">ออนไลน์(วิดีโอบันทึก)</option>
										<option value="ออนไลน์(สด)">ออนไลน์(สด)</option>
									</select>
							</p>
							
							<p class="modal-body2">
								สถานที่:
							</p>
							<p class="modal-body3">
								<textarea class="customize" name="locationtime" id="locationtime" rows="5" cols="30"></textarea>
							</p>

						</div>
							<div class="clearfix"></div>
							<button type="submit" class="okay-btn" name="btn-insert-time">ยืนยัน</button>
						</form>
						<button id="closeAdd" class="cancle-btn">ยกเลิก</button>
					  </div>
					</div>
				<div class="clearfix"></div>
				
					<div id="displayDelete" class="delete-display">
						<div class="delete-content2">
							<div class="delete-body">
								<p class="head-modal">ลบเวลา</p>
								<button id="closeDelete" class="cancle-btn">ยกเลิก</button>
							</div>
						</div>
						<div class="delete-content">
							<div class="delete-body">
								<table class="w3-table-all">
								<thead>
								</thead>
								<?php
									require 'controllers/timetable/content_delete_time.php'; 
								?>
								</table>
							</div>
						</div>
					</div>
					
			</div>
			<div class="content">
				<div class="content-container">
					<div class="col-left">
						<div class="text">
							เวลา
						</div>
					</div>
					<div class="col-right">
						<div class="text">
							
							<form action="timetable" method="post">
								<button type="submit" name="btn-search-time">ค้นหา</button>
								<input type="text" data-language="en" class="datepicker-here" name="search-date" autocomplete="off">
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				
						<?php
							require 'controllers/timetable/content_my_time.php'; 
						?>

			</div>

		</div>
	</div>
	<script src="js/timetable.js"></script>
	<script src="js/validinput.js"></script>
 </body>
</html>
