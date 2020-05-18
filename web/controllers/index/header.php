<?php 
require_once './controllers/authController.php'; 
require './controllers/isLogin.php';
require './controllers/function.php';

	$sqlRequestMyTime = "SELECT user_request.firstName, user_request.lastName, user_request.request_date, user_request.request_id,
						user_request.timetable_id, user_request.subject,
						EXTRACT(DAY FROM user_request.start_datetime) AS day1,
						CASE
							WHEN EXTRACT(MONTH FROM user_request.start_datetime) = 1 THEN 'มกราคม'
							WHEN EXTRACT(MONTH FROM user_request.start_datetime) = 2 THEN 'กุมภาพันธ์'
							WHEN EXTRACT(MONTH FROM user_request.start_datetime) = 3 THEN 'มีนาคม'
							WHEN EXTRACT(MONTH FROM user_request.start_datetime) = 4 THEN 'เมษายน'
							WHEN EXTRACT(MONTH FROM user_request.start_datetime) = 5 THEN 'พฤษภาคม'
							WHEN EXTRACT(MONTH FROM user_request.start_datetime) = 6 THEN 'มิถุนายน'
							WHEN EXTRACT(MONTH FROM user_request.start_datetime) = 7 THEN 'กรกฎาคม'
							WHEN EXTRACT(MONTH FROM user_request.start_datetime) = 8 THEN 'สิงหาคม'
							WHEN EXTRACT(MONTH FROM user_request.start_datetime) = 9 THEN 'กันยายน'
							WHEN EXTRACT(MONTH FROM user_request.start_datetime) = 10 THEN 'ตุลาคม'
							WHEN EXTRACT(MONTH FROM user_request.start_datetime) = 11 THEN 'พฤศจิกายน'
							WHEN EXTRACT(MONTH FROM user_request.start_datetime) = 12 THEN 'ธันวาคม'
						END AS month1,
						CASE
							WHEN EXTRACT(YEAR FROM user_request.start_datetime) THEN EXTRACT(YEAR FROM user_request.start_datetime) + 543
						END AS year1,TIME_FORMAT(user_request.start_datetime, '%H:%i น.')  AS start, TIME_FORMAT(user_request.end_datetime, '%H:%i น.')  AS end
						FROM
						(SELECT users.username, users.firstName, users.lastName, user_request.request_date, user_request.request_id,
							user_request.timetable_id, user_request.start_datetime, user_request.end_datetime, user_request.subject
						FROM users
						INNER JOIN
							(SELECT request_time.user_id , request_time.request_date, request_time.request_id, timetable.timetable_id, timetable.start_datetime, 
								timetable.end_datetime, timetable.subject
							FROM timetable, users, request_time
							WHERE users.user_id = ? AND users.user_id = timetable.user_id AND request_time.timetable_id = timetable.timetable_id AND
								request_time.status = 'กรุณารอการตอบกลับคำร้องขอ') AS user_request
							ON users.user_id = user_request.user_id) AS user_request ORDER BY user_request.request_date DESC;";
	$stmt = $conn->prepare($sqlRequestMyTime);
	$stmt->bind_param('s', $_SESSION['user_id']);
	$stmt->execute();
	$resultRequestMyTime = $stmt->get_result();
	$countRequestMyTime = (int)($resultRequestMyTime->num_rows);
	
	
	$sqlMsg = "SELECT users.firstName, users.lastName, msg.content, msg.date, msg.message_id
				FROM users
				INNER JOIN
				(SELECT message.user_id, message.content, message.date, message.message_id
				FROM message
				WHERE message.to_user_id = ? AND message.status = 'ยังไม่ได้อ่าน') AS msg
				ON users.user_id = msg.user_id ORDER BY msg.date DESC;";
	$stmt = $conn->prepare($sqlMsg);
	$stmt->bind_param('s', $_SESSION['user_id']);
	$stmt->execute();
	$resultMsg = $stmt->get_result();
	$countMsg = (int)($resultMsg->num_rows);

	if(isset($_SESSION['verified'])){
		if($_SESSION['verified'] === false){
			echo "<div></div>";
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			echo '<script type="text/javascript">swal("สมัครสมาชิกสำเร็จ!!", "", "success");</script>';
			
			$verified = true;
			
			$sql1 = "UPDATE users SET verified = ? 
							WHERE users.user_id = ?;";
			$stmt = $conn->prepare($sql1);
			$stmt->bind_param('ss', $verified, $_SESSION['user_id']);
			$stmt->execute();
			$_SESSION['verified'] = $verified;
		}
	}
?>