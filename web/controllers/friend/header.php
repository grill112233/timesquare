<?php 
require_once 'controllers/authController.php'; 
require 'controllers/isLogin.php'; 

		if(isset($search_user)){
			$sqlTarget = "SELECT users.user_id 
						FROM users WHERE users.username = ? OR users.email = ?;";
			$stmt = $conn->prepare($sqlTarget);
			$stmt->bind_param('ss', $search_user, $search_user);
			$stmt->execute();
			$resultRequest = $stmt->get_result();
			$target_id_string = $resultRequest->fetch_assoc();
			$target_id = (int)($target_id_string['user_id']);
			
			$sqlRequest = "SELECT timetable.timetable_id, timetable.status, timetable.subject,
							EXTRACT(DAY FROM timetable.start_datetime) AS day1,
							CASE
								WHEN EXTRACT(MONTH FROM timetable.start_datetime) = 1 THEN 'มกราคม'
								WHEN EXTRACT(MONTH FROM timetable.start_datetime) = 2 THEN 'กุมภาพันธ์'
								WHEN EXTRACT(MONTH FROM timetable.start_datetime) = 3 THEN 'มีนาคม'
								WHEN EXTRACT(MONTH FROM timetable.start_datetime) = 4 THEN 'เมษายน'
								WHEN EXTRACT(MONTH FROM timetable.start_datetime) = 5 THEN 'พฤษภาคม'
								WHEN EXTRACT(MONTH FROM timetable.start_datetime) = 6 THEN 'มิถุนายน'
								WHEN EXTRACT(MONTH FROM timetable.start_datetime) = 7 THEN 'กรกฎาคม'
								WHEN EXTRACT(MONTH FROM timetable.start_datetime) = 8 THEN 'สิงหาคม'
								WHEN EXTRACT(MONTH FROM timetable.start_datetime) = 9 THEN 'กันยายน'
								WHEN EXTRACT(MONTH FROM timetable.start_datetime) = 10 THEN 'ตุลาคม'
								WHEN EXTRACT(MONTH FROM timetable.start_datetime) = 11 THEN 'พฤศจิกายน'
								WHEN EXTRACT(MONTH FROM timetable.start_datetime) = 12 THEN 'ธันวาคม'
							END AS month1,
							CASE
								WHEN EXTRACT(YEAR FROM timetable.start_datetime) THEN EXTRACT(YEAR FROM timetable.start_datetime) + 543
							END AS year1,TIME_FORMAT(timetable.start_datetime, '%H:%i น.')  AS start, TIME_FORMAT(timetable.end_datetime, '%H:%i น.')  AS end
								FROM timetable WHERE timetable.user_id = ? AND timetable.status = 'ว่าง' AND DATE(timetable.start_datetime) >= DATE(now()) 
								ORDER BY timetable.start_datetime DESC;";
			$stmt = $conn->prepare($sqlRequest);
			$stmt->bind_param('s', $target_id);
			$stmt->execute();
			$resultRequest = $stmt->get_result();
			$countRequestAll = $resultRequest->num_rows;
		}

?>