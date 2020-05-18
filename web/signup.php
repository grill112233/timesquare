<?php require_once 'controllers/authController.php';?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>สมัครสมาชิก</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href ="css/images/logo.png"> 
		<link rel="stylesheet" href="css/signupstyle.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://unpkg.com/bootstrap@4.1.0/dist/css/bootstrap.min.css" >
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
 <body>
	
<div class="w3-main">
		<div class="w3-container">
			<div class="w3-row">
				<div class="w3-col w3-container w3-mobile" style="width:50%;">
					<img src="css/images/logo.png" style="display: block; width: 100%; height: 100%; margin-left: auto; margin-right:auto; margin-top:25%;" alt="pic1">
				</div>
				<div class="w3-col w3-container w3-mobile" style="width:50%;">
					<form class="form" id="form" action="signup" method="post" novalidate>
					<div class="form-back" ><a class="back" href="login">กลับสู่หน้าหลัก ></a></div>
					<div class="clearfix"></div>
						<div style="text-align: center;font-size: 30px;">ลงทะเบียน</div>
						<div class="form-c">
							<input class="form-control" type="text" id="username" style="border-radius:25px;" placeholder="ชื่อผู้ใช้" name="username" required>
							<div class="invalid-feedback">กรุณากรอกชื่อผู้ใช้*</div>    
						</div>

						<div class="form-c">
							<input class="form-control" type="text" id="firstname" style="border-radius:25px;" placeholder="ชื่อ" name="firstname" required>
							<div class="invalid-feedback">กรุณากรอกชื่อ*</div>  
						</div>
						
						<div class="form-c">
							<input class="form-control" type="text" id="lastname" style="border-radius:25px;" placeholder="นามสกุล" name="lastname" required>
							<div class="invalid-feedback">กรุณากรอกนามสกุล*</div>  
						</div>
						
						<div class="form-c">
							<input class="form-control" type="email" id="email" style="border-radius:25px;" placeholder="อีเมล" name="email" required>
							<div class="invalid-feedback">กรุณากรอกอีเมล*</div>  
						</div>
						
						<div class="form-c">
							<input class="form-control" type="password" id="password" style="border-radius:25px;" placeholder="รหัสผ่าน" name="password" required>
							<div class="invalid-feedback">กรุณากรอกรหัสผ่าน*</div>  
						</div>
						
						<div class="form-c">
							<input class="form-control" type="password" id="conpassword" style="border-radius:25px;" placeholder="ยืนยันรหัสผ่าน" name="passwordConfirm" required>
							<div class="invalid-feedback">กรุณากรอกยืนยันรหัสผ่าน*</div>  
						</div>
						
						<div class="form-radio">
							<div>สถานะ</div>
									<div class="col-select form-check">
									  <input class="form-check-input" type="radio"
									  name="status" value="general" required>
									  <label class="form-check-label">บุคคลทั่วไป</label>  
									</div>
									<div class="col-select form-check">
									  <input class="form-check-input" type="radio"
									  name="status" value="teacher" required>
									  <label class="form-check-label">อาจารย์</label>            
									</div>
									<div class="col-select form-check">
									  <input class="form-check-input" type="radio"
									  name="status" value="student" required>
									  <label class="form-check-label">นักเรียน/นักศึกษา</label>         
									</div>									
						</div>
						<div class="clearfix"></div>
						<div>วันเกิด</div>
						<div class="col-select">
							<select class="custom-select" id="select_day" name="birthday" required>
								<option value="">วัน</option>
								<?php
									$day = 1;
									while($day < 32){
										echo "<option value=" . $day . ">" . $day . "</option>";
										$day = $day + 1;
									}
								?>
								</select>
							
							<div class="invalid-feedback">กรุณาเลือกวัน*</div>  
							</div>
							<div class="col-select">
							<select class="col-select custom-select" id="select_month" name="birthmonth" required>
								<option value="">เดือน</option>
								<option value="1">มกราคม</option>
								<option value="2">กุมภาพันธ์</option>
								<option value="3">มีนาคม</option>
								<option value="4">เมษายน</option>
								<option value="5">พฤษภาคม</option>
								<option value="6">มิถุนายน</option>
								<option value="7">กรกฎาคม</option>
								<option value="8">สิงหาคม</option>
								<option value="9">กันยายน</option>
								<option value="10">ตุลาคม</option>
								<option value="11">พฤศจิกายน</option>
								<option value="12">ธันวาคม</option>
							</select>
							
							<div class="invalid-feedback">กรุณาเลือกเดือน*</div> 
							</div>
							<div class="col-select">
							<select class="col-select custom-select" id="select_year" name="birthyear" required>
								<option value="">ปี</option>
								<?php
									$year = 2020;
									while($year > 1899){
										echo "<option value=" . $year . ">" . $year . "</option>";
										$year = $year - 1;
									}
								?>
							</select>
							<div class="invalid-feedback">กรุณาเลือกปี*</div>
							</div>
						<div class="clearfix"></div>
							<button class="btn-signup" type="submit" name="signup-button" style="outline:none; cursor: pointer;">ยืนยัน</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
	<script src="js/signup.js"></script>
 </body>
</html>
