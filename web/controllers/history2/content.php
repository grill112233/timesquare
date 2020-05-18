<?php
	while($row = $resultHistory2->fetch_assoc()) {
		
		if($row['status_request'] === "กรุณารอการตอบกลับคำร้องขอ"){
			$row['status_request'] = "กำลังรอคุณตอบกลับคำร้องขอ";
		}
		
		echo "	<div class=\"box\">
					<div class=\"text\">
						คุณถูกจองเวลาโดย ". $row['firstName'] . " " . $row['lastName'] ."<br>
						วิชา ". $row['subject'] . "<br>
						วันที่ ". $row['day1'] . " ". $row['month1'] . " พ.ศ. " . $row['year1'] ."<br>
						เวลา ". $row['start'] . " - " . $row['end'] ." <br>
						สถานะคำร้องขอ ". $row['status_request'] ." <br>
						ได้รับคำขอเมื่อ <small>". time_convert($row['request_date']) ."</small>
					</div>
				</div>";
	}
?>