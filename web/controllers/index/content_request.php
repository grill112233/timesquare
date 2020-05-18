<?php
	if($countRequestMyTime != 0){
		while($row = $resultRequestMyTime->fetch_assoc()) {
			echo "<div class="."list-item noti".">
					<div class=\"col-left\">
						<div class="."text"."><b class="."fontS".">". $row['firstName'] . " " .$row['lastName'] ."</b></div>
						<div class="."text"."><b class="."fontS".">วิชา ". $row['subject'] . "</b></div>
						<div class="."text"."><b class="."fontS".">วันที่ ". $row['day1'] . " " . $row['month1'] . " " . $row['year1'] . "</b></div>
						<div class="."text"."><b class="."fontS".">เวลา ". $row['start'] . " - " . $row['end'] . "</b></div>
						<div class="."text"."><b class="."font-date".">". time_convert($row['request_date']) ."</b></div>
					</div>
					<div class=\"col-right\">
						<form action=\"index\" method=\"post\">
							<input type="."hidden"." name="."timetable_id"." value=". $row['timetable_id'] .">
							<button name="."accept-time-btn"." type=". "submit" ." class=". "accept-time-btn" ." value=".$row['request_id'].">ยอมรับ</button>
							<button name="."deny-time-btn"." type=". "submit" ." class=". "deny-time-btn" ." value=".$row['request_id'].">ปฏิเสธ</button>
						</form>
					</div>
				  </div>";
		}
	}else{
			echo "<div class="."textZero"."><b class="."fontS".">ไม่มีคำร้องขอ</b></div>";
		
	}
?>