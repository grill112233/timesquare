<?php

	$sqlMyProfile = "SELECT * FROM users WHERE users.user_id = ?";
	$stmt = $conn->prepare($sqlMyProfile);
	$stmt->bind_param('s', $_SESSION['user_id']);
	$stmt->execute();
	$resultMyProfile = $stmt->get_result();
	$userMyProfile = $resultMyProfile->fetch_assoc();
	
	if(isset($_POST['btn-change-password'])){
		
		echo "  <form action=\"profile\" method=\"post\">
					<input type=\"password\" name=\"valuePassOld\" placeholder=\"รหัสผ่านเก่า\">
					<input type=\"password\" name=\"valueNewPass\" placeholder=\"รหัสผ่านใหม่\">
					<input type=\"password\" name=\"valueNewPassCon\" placeholder=\"ยืนยันรหัสผ่านใหม่\">
					<button name=\"btn-change-password-confirm\">ยืนยัน</button>
				</form>";
		
	}else if(isset($_POST['btn-change-profile'])){
		if(empty($userMyProfile['gender']) && empty($userMyProfile['skill']) && empty($userMyProfile['detail'])){
			echo "  <form action=\"profile\" method=\"post\">
						<select name=\"gender\" required>
							<option value=\"\">เพศ</option>
							<option value=\"ชาย\">ชาย</option>
							<option value=\"หญิง\">หญิง</option>
							<option value=\"ไม่ระบุ\">ไม่ระบุ</option>
						</select>
						<input type=\"text\" name=\"skill\" placeholder=\"ทักษะ\">
						<input type=\"text\" name=\"detail\" placeholder=\"รายละเอียด\">
						<button name=\"btn-update-profile\">ยืนยัน</button>
					</form>";
		}else{
				echo "
					<div class=\"col-t\">
						<form action=\"profile\" method=\"post\">
							<button class=\"button1\" name=\"btn-update_myProfile\">สร้างโปรไฟล์ใหม่ทั้งหมด</button>
						</form>
					</div>
					<div class=\"col-t\">
						<form action=\"profile\" method=\"post\">
							<button type=\"submit\" class=\"button2\" name=\"btn-insert-location\">เพิ่มที่อยู่</button>
						</form>
					</div>
					<div class=\"col-t\">
						<form action=\"profile\" method=\"post\">
							<button type=\"submit\" class=\"button2\" name=\"btn-insert-phone\">เพิ่มเบอร์โทรศัพท์</button>
						</form>
					</div>
				";
		}
	}else if(isset($_POST['btn-update_myProfile'])){
		echo "  <form action=\"profile\" method=\"post\">
					<input type=\"text\" name=\"name\" placeholder=\"ชื่อ\">
					<input type=\"text\" name=\"lastname\" placeholder=\"นามสกุล\">
					<input type=\"text\" name=\"email\" placeholder=\"อีเมล\">
					<select name=\"status\" required>
						<option value=\"\">สถานะ</option>
						<option value=\"บุคคลทั่วไป\">บุคคลทั่วไป</option>
						<option value=\"อาจารย์\">อาจารย์</option>
						<option value=\"นักเรียน/นักศึกษา\">นักเรียน/นักศึกษา</option>
					</select>
					<select name=\"gender\" required>
						<option value=\"\">เพศ</option>
						<option value=\"ชาย\">ชาย</option>
						<option value=\"หญิง\">หญิง</option>
						<option value=\"ไม่ระบุ\">ไม่ระบุ</option>
					</select>
					<input type=\"text\" name=\"skill\" placeholder=\"ทักษะ\">
					<input type=\"text\" name=\"detail\" placeholder=\"รายละเอียด\">
					<button name=\"btn-new-profile\">ยืนยัน</button>
				</form>";
	}else if(isset($_POST['btn-insert-location'])){
		echo "  <form action=\"profile\" method=\"post\">
					<input type=\"text\" name=\"location\" placeholder=\"ที่อยู่\">
					<button name=\"btn-new-location\">ยืนยัน</button>
				</form>";
	}else if(isset($_POST['btn-insert-phone'])){
		echo "  <form action=\"profile\" method=\"post\">
					<input type=\"text\" name=\"phone\" placeholder=\"เบอร์โทร\">
					<button name=\"btn-new-phone\">ยืนยัน</button>
				</form>";
	}else{
		echo "<p>ชื่อ ". $userMyProfile['firstName'] . $userMyProfile['lastName'] ."</p>
			<p>อีเมล " . $userMyProfile['email'] . "</p>
			<p>สถานะ ". $userMyProfile['status'] ."</p>";
			
		if(!empty($userMyProfile['average_rating'])){
			echo "<p>ค่าเฉลี่ยคะแนน ". $userMyProfile['average_rating'] . "</p>";
		}
		
		if(!empty($userMyProfile['gender'])){
			echo "<p>เพศ ". $userMyProfile['gender']  . "</p>";
		}
		
		if(!empty($userMyProfile['skill'])){
			echo "<p>ทักษะ ". $userMyProfile['skill']  . "</p>";
		}
		
		if(!empty($userMyProfile['detail'])){
			echo "<p>รายละเอียด ". $userMyProfile['detail']  . "</p>";
		}
		
		echo "
			<div class=\"col\">
				<form action=\"profile\" method=\"post\">
					<button class=\"button1\" name=\"btn-change-password\">เปลี่ยนรหัสผ่าน</button>
				</form>
			</div>
			<div class=\"col\">
				<form action=\"profile\" method=\"post\">
					<button type=\"submit\" class=\"button2\" name=\"btn-change-profile\">แก้ไขข้อมูลส่วนตัว</button>
				</form>
			</div>
		";
		
	}


?>