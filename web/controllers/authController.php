<?php

session_start();

require 'config/db.php';

$errors = array();
$username = "";
$firstname = "";
$lastname = "";
$email = "";

if(isset($_POST['signup-button'])){
	
	$countEmptyAndError = 0;
	
	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordConfirm = $_POST['passwordConfirm'];
	$status = $_POST['status'];
	$dob = $_POST['birthyear'] . '-' . $_POST['birthmonth'] . '-' . $_POST['birthday'];

	if(empty($username)){
		$countEmptyAndError++;
	}

	if(empty($firstname)){
		$countEmptyAndError++;
	}

	if(empty($lastname)){
		$countEmptyAndError++;
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$countEmptyAndError++;
	}

	if(empty($email)){
		$countEmptyAndError++;
	}

	if(empty($password)){
		$countEmptyAndError++;
	}

	if($password !== $passwordConfirm){
		$countEmptyAndError++;
	}


	$emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
	$stmt = $conn->prepare($emailQuery);
	$stmt->bind_param('s', $email);
	$stmt->execute();
	$result = $stmt->get_result();
	$userCount = $result->num_rows;

	if($userCount > 0){
			$countEmptyAndError++;
	}

	if($countEmptyAndError === 0){
		$password = password_hash($password, PASSWORD_DEFAULT);
		$token = bin2hex(random_bytes(50));
		$verified = false;
		
		$sql = "INSERT INTO users (username, email, verified, token, password, firstname, lastname, status, first_date, birth_date) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, now(), ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('ssbssssss', $username, $email, $verified, $token, $password, $firstname, $lastname, $status, $dob);
		
		if($stmt->execute()){
			
			$user_id = $conn->insert_id;
			$_SESSION['user_id'] = $user_id;
			$_SESSION['username'] = $username;
			$_SESSION['firstname'] = $firstname;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['email'] = $email;
			$_SESSION['verified'] = $verified;
			$_SESSION['status'] = $status;
			$_SESSION['birth_date'] = $dob;

			if(strlen($user['email']) > 20){
				$_SESSION['email'] = "";
				$i = 0;
				while($i < 20){
					$_SESSION['email'] = $_SESSION['email'] . $user['email'][$i];
					$i++;
				}
				$_SESSION['email'] = $_SESSION['email'] . "...";
			}

			header('location: index');
			exit();
			
		}else{
			$errors['db_error'] = "Database error: failed to sign up";
		}
	}

}

if(isset($_POST['login-button'])){
	$username = $_POST['username'];
	$password = $_POST['password'];


	if(empty($username)){
		$errors['username'] = "กรุณากรอกชื่อผู้ใช้หรืออีเมล";
	}

	if(empty($password)){
		$errors['password'] = "กรุณากรอกรหัสผ่าน";
	}

	if(count($errors) === 0){
		$sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('ss', $username, $username);
		$stmt->execute();
		$result = $stmt->get_result();
		$user = $result->fetch_assoc();

		if(password_verify($password, $user['password'])){
				$_SESSION['user_id'] = $user['user_id'];
				$_SESSION['username'] = $user['username'];
				$_SESSION['email'] = $user['email'];
				$_SESSION['firstname'] = $user['firstName'];
				$_SESSION['lastname'] = $user['lastName'];
				$_SESSION['verified'] = $user['verified'];
				
			if(strlen($user['email']) > 20){
				$_SESSION['email'] = "";
				$i = 0;
				while($i < 20){
					$_SESSION['email'] = $_SESSION['email'] . $user['email'][$i];
					$i++;
				}
				$_SESSION['email'] = $_SESSION['email'] . "...";
			}
				
				header('location: index');
				exit();
		}else{
			$errors['login_fail'] = "รหัสผ่านไม่ถูกต้อง";
		}
	}
}

if(isset($_POST['logout-button'])){
	session_destroy();
	unset($_SESSION['user_id']);
	unset($_SESSION['username']);
	unset($_SESSION['firstname']);
	unset($_SESSION['lastname']);
	unset($_SESSION['email']);
	unset($_SESSION['verified']);
	
	header('location: login');
	exit();
}

if(isset($_POST['start-btn'])){
	header('location: timetable');
	exit();
}

if(isset($_POST['btn-insert-time'])){
	$countEmpty = 0;
	
	$date = $_POST['date'];
	$start_time = $_POST['start_datetime'];
	$end_time = $_POST['end_datetime'];
	$subject = $_POST['subject'];
	$price = $_POST['price'];
	$learn = $_POST['learn'];
	$locationtime = $_POST['locationtime'];
	$start_datetime = $date . " " . $start_time;
	$end_datetime = $date . " " . $end_time;
	$status = "ว่าง";
	
	if(empty($date)){
		$countEmpty++;
	}

	
	if(empty($start_datetime)){
		$countEmpty++;
	}

	if(empty($end_datetime)){
		$countEmpty++;
	}

	if(empty($subject)){
		$countEmpty++;
	}

	if(empty($price)){
		$countEmpty++;
	}

	if(empty($learn)){
		$countEmpty++;
	}

	if(empty($locationtime)){
		$countEmpty++;
	}

	if($countEmpty === 0){
		
		$sql = "INSERT INTO timetable(user_id, status, start_datetime, end_datetime, amount, learn, subject) 
				VALUES(?, ?, ?, ?, ?, ?, ?);";
	    $stmt = $conn->prepare($sql);
		$stmt->bind_param('sssssss', $_SESSION['user_id'], $status, $start_datetime, $end_datetime, $price, $learn, $subject);
	
		if($stmt->execute()){

			echo "<div></div>";
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			echo '<script type="text/javascript">swal("เพิ่มสำเร็จ!!", "เพิ่มข้อมูลเวลาเรียบร้อยแล้ว", "success");</script>';
			
		}else{
			$errors['db_error'] = "Database error: failed to sign up";
		}
	}
	
}

if(isset($_POST['btn-search-time'])){
	$date = $_POST['search-date'];
	if(!empty($date)){
		$sqlSearchMyTime = "SELECT timetable.subject, timetable.amount, timetable.learn,
							TIME_FORMAT(timetable.start_datetime, '%H:%i น.')  AS เวลาเริ่ม, 
							TIME_FORMAT(timetable.end_datetime, '%H:%i น.')  AS เวลาจบ, timetable.status 
							FROM timetable 
							WHERE timetable.user_id = ? AND DATE(timetable.start_datetime) = ? ORDER BY timetable.start_datetime ASC;";
		$stmt = $conn->prepare($sqlSearchMyTime);
		$stmt->bind_param('ss', $_SESSION['user_id'], $date);
		$stmt->execute();
		$resultSearchMyTime = $stmt->get_result();
	}
}

if(isset($_POST['delete-btn-confirm'])){
	
	
	echo "<div></div>";
	echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
	echo '<script type="text/javascript">
					swal({
					  title: "คุณต้องการลบใช่หรือไม่?",
					  text: "ไม่สามารถกู้คืนข้อมูลที่ลบได้หากคุณยืนยัน",
					  icon: "warning",
					  buttons: true,
					  dangerMode: true,
					})
					.then((willDelete) => {
					  if (willDelete) {
						swal("คุณได้ลบข้อมูลเรียบร้อย", {
						  icon: "success",
						});
					  } else {
					  }
					});
			</script>';
			
	$d = $_POST['delete-btn-confirm'];
	$sqlDeletetime1 = "DELETE
						FROM request_time
						WHERE request_time.timetable_id = ?;";
	$stmt = $conn->prepare($sqlDeletetime1);
	$stmt->bind_param('s', $d);
	$stmt->execute();
						
	$sqlDeletetime2 = "DELETE
						FROM timetable
						WHERE timetable.timetable_id = ?;";
	$stmt = $conn->prepare($sqlDeletetime2);
	$stmt->bind_param('s', $d);
	$stmt->execute();
}

if(isset($_POST['friend-btn'])){
	header('location: friend');
	exit();
}

if(isset($_POST['btn-search-now'])){
	require 'friend/profile.php'; 
}

if(isset($_POST['request-btn-confirm'])){
	$timetable_id = $_POST['request-btn-confirm'];
	$sqlCheckRequest = "SELECT request_time.request_id 
						FROM request_time 
						WHERE request_time.user_id = ? AND request_time.timetable_id = ?";
	$stmt = $conn->prepare($sqlCheckRequest);
	$stmt->bind_param('ss', $_SESSION['user_id'], $timetable_id);
	$stmt->execute();
	$resultCheckRequest = $stmt->get_result();
	$countCheckRequest = $resultCheckRequest->num_rows;
	
	if($countCheckRequest == 0){
		$sqlRequestConfirm = "INSERT INTO request_time(user_id, status, request_date, timetable_id)
								VALUES (?, 'กรุณารอการตอบกลับคำร้องขอ', now(),
								(SELECT timetable_id
								FROM timetable
								WHERE timetable.timetable_id = ? AND
								timetable.status = 'ว่าง'));";
		$stmt = $conn->prepare($sqlRequestConfirm);
		$stmt->bind_param('ss', $_SESSION['user_id'], $timetable_id);
		$stmt->execute();
	}
	
}

if(isset($_POST['sendMsg-btn-confirm'])){
	$username_friend = $_POST['sendMsg-btn-confirm'];
	$msg_content = $_POST['msg-content'];
	
	$sql_friend_id = "SELECT users.user_id 
						FROM users 
						WHERE users.username = ?";
	$stmt = $conn->prepare($sql_friend_id);
	$stmt->bind_param('s', $username_friend);
	$stmt->execute();
	$resultFriend_id = $stmt->get_result();
	$friend_id = $resultFriend_id->fetch_assoc();

	$sqlSendMsg = "INSERT INTO message(user_id, to_user_id, status, content, date)
							VALUES (?, ?, 'ยังไม่ได้อ่าน', ?, now());";
	$stmt = $conn->prepare($sqlSendMsg);
	$stmt->bind_param('sss', $_SESSION['user_id'], $friend_id['user_id'], $msg_content);
	$stmt->execute();
}

if(isset($_POST['accept-time-btn'])){
	$request_id = $_POST['accept-time-btn'];
	$timetable_id = $_POST['timetable_id'];
	
	$sqlAccept = "UPDATE request_time SET status = 'ยอมรับ' 
					WHERE request_time.request_id = ?;";
	$stmt = $conn->prepare($sqlAccept);
	$stmt->bind_param('s', $request_id);
	
	if($stmt->execute()){
		$sqlAccept2 = "UPDATE timetable SET status = 'ไม่ว่าง' 
						WHERE timetable.timetable_id = ?;";
		$stmt = $conn->prepare($sqlAccept2);
		$stmt->bind_param('s', $timetable_id);
		$stmt->execute();
	}
	
}

if(isset($_POST['deny-time-btn'])){
	$request_id = $_POST['deny-time-btn'];
	$timetable_id = $_POST['timetable_id'];
	
	$sqlDeny = "UPDATE request_time SET status = 'ปฏิเสธ' 
					WHERE request_time.request_id = ?;";
	$stmt = $conn->prepare($sqlDeny);
	$stmt->bind_param('s', $request_id);
	$stmt->execute();
}

if(isset($_POST['history1-btn'])){
	header('location: history1');
	exit();
}

if(isset($_POST['history2-btn'])){
	header('location: history2');
	exit();
}

if(isset($_POST['giverScore-btn-confirm'])){
	$username_friend = $_POST['giverScore-btn-confirm'];
	$scoreA = $_POST['score'];
	$score = (int)$scoreA;
	
	$sql1 = "SELECT users.user_id
				FROM users
				WHERE users.username = ?;";
	$stmt = $conn->prepare($sql1);
	$stmt->bind_param('s', $username_friend);
	$stmt->execute();
	
		$resultFriend_id = $stmt->get_result();
		$friend_id = $resultFriend_id->fetch_assoc();
		
		
		$sql2 = "INSERT INTO rating (giver_user_id, receiver_user_id, rate)
				VALUES (?,?,?);";
		$stmt = $conn->prepare($sql2);
		$stmt->bind_param('sss', $_SESSION['user_id'], $friend_id['user_id'], $score);
		$stmt->execute();
			
			$sql3 = "UPDATE users SET average_rating = 
					(SELECT AVG(rating.rate)
					FROM rating
					WHERE  rating.receiver_user_id = ?)
					WHERE users.user_id = ?;";
			$stmt = $conn->prepare($sql3);
			$stmt->bind_param('ss', $friend_id['user_id'], $friend_id['user_id']);
			$stmt->execute();
}

if(isset($_POST['btn-profile'])){
	header('location: profile');
	exit();
}

if(isset($_POST['btn-new-phone'])){
	$phone = $_POST['phone'];
	if(empty($phone)){
			echo "<div></div>";
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			echo '<script type="text/javascript">swal("กรุณากรอกข้อมูล!!", "ตรวจพบช่องว่างกรุณากรอกข้อมูลให้ครบถ้วน", "error");</script>';
	}else{
		$sqlPhone = "INSERT INTO phone_user (user_id, phone_number)
					VALUES (?, ?);";
		$stmt = $conn->prepare($sqlPhone);
		$stmt->bind_param('ss', $_SESSION['user_id'], $phone);
		$stmt->execute();
			echo "<div></div>";
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			echo '<script type="text/javascript">swal("เพิ่มเบอร์โทรศัพท์สำเร็จ!!", "", "success");</script>';		
	}
}

if(isset($_POST['btn-new-location'])){
	$location = $_POST['location'];
	if(empty($location)){
			echo "<div></div>";
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			echo '<script type="text/javascript">swal("กรุณากรอกข้อมูล!!", "ตรวจพบช่องว่างกรุณากรอกข้อมูลให้ครบถ้วน", "error");</script>';
	}else{
		$sqlLocation = "INSERT INTO location_user (user_id, location)
						VALUES (?, ?);";
		$stmt = $conn->prepare($sqlLocation);
		$stmt->bind_param('ss', $_SESSION['user_id'], $location);
		$stmt->execute();
			echo "<div></div>";
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			echo '<script type="text/javascript">swal("เพิ่มที่อยู่สำเร็จ!!", "", "success");</script>';
	}
}

if(isset($_POST['btn-change-password-confirm'])){
	$valuePassOld = $_POST['valuePassOld'];
	$valueNewPass = $_POST['valueNewPass'];
	$valueNewPassCon = $_POST['valueNewPassCon'];
	
	if(empty($valuePassOld) || empty($valueNewPass) || empty($valueNewPassCon)){
			echo "<div></div>";
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			echo '<script type="text/javascript">swal("กรุณากรอกข้อมูล!!", "ตรวจพบช่องว่างกรุณากรอกข้อมูลให้ครบถ้วน", "error");</script>';
	}else if($valueNewPass === $valueNewPassCon){
		$sql = "SELECT * FROM users WHERE username=? LIMIT 1";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('s', $_SESSION['username']);
		$stmt->execute();
		$result = $stmt->get_result();
		$user = $result->fetch_assoc();

		if(password_verify($valuePassOld, $user['password'])){
			
			$valueNewPass = password_hash($valueNewPass, PASSWORD_DEFAULT);
			
			$sql = "UPDATE users SET password = ?
					WHERE users.user_id = ?;";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('ss', $valueNewPass, $_SESSION['user_id']);
			$stmt->execute();
			echo "<div></div>";
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			echo '<script type="text/javascript">swal("แก้ไขรหัสผ่านสำเร็จ!!", "คุณสามารถเข้าสู่ระบบด้วยรหัสผ่านใหม่ได้ทันที", "success");</script>';
		}else{
			echo "<div></div>";
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			echo '<script type="text/javascript">swal("รหัสผ่านเก่าผิดพลาด!!", "กรุณากรอกรหัสผ่านใหม่อีกครั้ง", "error");</script>';
		}
		
	}else{
			echo "<div></div>";
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			echo '<script type="text/javascript">swal("รหัสผ่านไม่ตรงกัน!!", "กรุณากรอกรหัสผ่านใหม่อีกครั้งเนื่องจากรหัสผ่านไม่สอดคล้องกัน", "error");</script>';
	}
}

if(isset($_POST['btn-update-profile'])){
	$gender = $_POST['gender'];
	$skill = $_POST['skill'];
	$detail = $_POST['detail'];
	if(empty($gender) || empty($skill) || empty($detail)){
			echo "<div></div>";
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			echo '<script type="text/javascript">swal("กรุณากรอกข้อมูล!!", "ตรวจพบช่องว่างกรุณากรอกข้อมูลให้ครบถ้วน", "error");</script>';
	}else{
			$sql = "UPDATE users SET gender = ?, detail = ?, skill = ?
					WHERE users.user_id = ?;";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('ssss', $gender, $detail, $skill, $_SESSION['user_id']);
			$stmt->execute();
			echo "<div></div>";
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			echo '<script type="text/javascript">swal("แก้ไขข้อมูลสำเร็จ!!", "", "success");</script>';
	}

}


if(isset($_POST['btn-new-profile'])){
	$gender = $_POST['gender'];
	$skill = $_POST['skill'];
	$detail = $_POST['detail'];
	$name  = $_POST['name'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$status = $_POST['status'];
	if(empty($gender) || empty($skill) || empty($detail) || empty($name) || empty($lastname) || empty($email) || empty($status)){
			echo "<div></div>";
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			echo '<script type="text/javascript">swal("กรุณากรอกข้อมูล!!", "ตรวจพบช่องว่างกรุณากรอกข้อมูลให้ครบถ้วน", "error");</script>';
	}else{
		
			$emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
			$stmt = $conn->prepare($emailQuery);
			$stmt->bind_param('s', $email);
			$stmt->execute();
			$result = $stmt->get_result();
			$userCount = $result->num_rows;

			if($userCount > 0){
				echo "<div></div>";
				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
				echo '<script type="text/javascript">swal("อีเมลถูกใช้งานแล้ว!!", "", "error");</script>';
			}else{
				$sql = "UPDATE users SET firstName = ?, lastName = ?, gender = ?, detail = ?, email = ?, skill = ?, status = ?, skill = ?
						WHERE users.user_id = ?;";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('sssssssss', $name, $lastname, $gender, $detail, $email, $skill, $status, $skill, $_SESSION['user_id']);
				$stmt->execute();
				echo "<div></div>";
				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
				echo '<script type="text/javascript">swal("สร้างโปรไฟล์ใหม่ทั้งหมดสำเร็จ!!", "", "success");</script>';
			}
	}

}

