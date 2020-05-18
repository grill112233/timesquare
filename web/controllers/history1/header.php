<?php
require_once './controllers/authController.php'; 
require './controllers/isLogin.php';
require './controllers/function.php';

	$sqlHistory1 = "		SELECT result.firstName, result.lastName, result.status, result.amount, result.learn, result.subject, result.status_request, result.request_date,
							EXTRACT(DAY FROM result.start_datetime) AS day1,
							CASE
								WHEN EXTRACT(MONTH FROM result.start_datetime) = 1 THEN 'มกราคม'
								WHEN EXTRACT(MONTH FROM result.start_datetime) = 2 THEN 'กุมภาพันธ์'
								WHEN EXTRACT(MONTH FROM result.start_datetime) = 3 THEN 'มีนาคม'
								WHEN EXTRACT(MONTH FROM result.start_datetime) = 4 THEN 'เมษายน'
								WHEN EXTRACT(MONTH FROM result.start_datetime) = 5 THEN 'พฤษภาคม'
								WHEN EXTRACT(MONTH FROM result.start_datetime) = 6 THEN 'มิถุนายน'
								WHEN EXTRACT(MONTH FROM result.start_datetime) = 7 THEN 'กรกฎาคม'
								WHEN EXTRACT(MONTH FROM result.start_datetime) = 8 THEN 'สิงหาคม'
								WHEN EXTRACT(MONTH FROM result.start_datetime) = 9 THEN 'กันยายน'
								WHEN EXTRACT(MONTH FROM result.start_datetime) = 10 THEN 'ตุลาคม'
								WHEN EXTRACT(MONTH FROM result.start_datetime) = 11 THEN 'พฤศจิกายน'
								WHEN EXTRACT(MONTH FROM result.start_datetime) = 12 THEN 'ธันวาคม'
							END AS month1,
							CASE
								WHEN EXTRACT(YEAR FROM result.start_datetime) THEN EXTRACT(YEAR FROM result.start_datetime) + 543
							END AS year1,TIME_FORMAT(result.start_datetime, '%H:%i น.')  AS start, TIME_FORMAT(result.end_datetime, '%H:%i น.')  AS end
								FROM
									(SELECT users.username, users.firstName, users.lastName, foo.*
									FROM users
									INNER JOIN
									(SELECT timetable.user_id, timetable.status, timetable.start_datetime, timetable.end_datetime, timetable.amount, timetable.learn, timetable.subject,
									req.* FROM timetable
									INNER JOIN
									(SELECT request_time.status AS status_request, request_time.request_date, request_time.timetable_id
									FROM request_time
									WHERE request_time.user_id = ?) AS req
									ON timetable.timetable_id = req.timetable_id) AS foo
									ON foo.user_id = users.user_id) AS result ORDER BY result.request_date DESC;";
	$stmt = $conn->prepare($sqlHistory1);
	$stmt->bind_param('s', $_SESSION['user_id']);
	$stmt->execute();
	$resultHistory1 = $stmt->get_result();

?>