<?php
	if(isset($resultRequest)){
		if($countRequestAll != 0){
			while($row = $resultRequest->fetch_assoc()) {
			  echo "<tr class=\"bor\">";
				  echo "<td>
							<p>วันที่ " . $row['day1'] . " ". $row['month1'] . " พ.ศ. " . $row['year1'] ."</p> 
							<p>เวลา " . $row['start'] . " - " . $row['end'] ."</p>
							<p>วิชา " . $row['subject']."</p>
							<p>สถานะ ". $row['status'] ."</p>
						</td>";
				  echo "<td>
						  <form action="."friend"." method="."post".">
							<button name="."request-btn-confirm"." type=". "submit" ." class=". "request-btn-now" ." value=".$row['timetable_id'].">จองเวลา</button>
						  </form>
						</td>";
			  echo "</tr>";
			}
		}else{
			  echo "<h4>ไม่มีเวลาให้เลือกจอง</h4>";
		}
	}
?>