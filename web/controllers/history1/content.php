<?php
	while($row = $resultHistory1->fetch_assoc()) {
			
		echo "	<div class=\"box\">
					<div class=\"text\">
						คุณได้จองเวลาของ ". $row['firstName'] . " " . $row['lastName'] ."<br>
						วิชา ". $row['subject'] . "<br>
						วันที่ ". $row['day1'] . " ". $row['month1'] . " พ.ศ. " . $row['year1'] ."<br>
						เวลา ". $row['start'] . " - " . $row['end'] ." <br>
						สถานะคำร้องขอ ". $row['status_request'] ." <br>
						ส่งคำร้องขอเมื่อ <small>". time_convert($row['request_date']) ."</small>
					</div>
				</div>";
	}
?>