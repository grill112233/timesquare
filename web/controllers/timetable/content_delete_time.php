<?php
	if(isset($resultDeleteMyTime)){
		while($row = $resultDeleteMyTime->fetch_assoc()) {
		  echo "<tr>";
			  echo "<td>
						<p>วันที่ " . $row['day1'] . " ". $row['month1'] . " พ.ศ. " . $row['year1'] ."</p> 
						<p>เวลา " . $row['start'] . " - " . $row['end'] ."</p>
						<p>วิชา " . $row['subject']."</p>
						<p>สถานะ ". $row['status'] ."</p>
					</td>";
			  echo "<td>
					  <form action="."timetable"." method="."post".">
						<button name="."delete-btn-confirm"." type=". "submit" ." class=". "cancle-btn" ." value=".$row['timetable_id'].">ลบ</button>
					  </form>
					</td>";
		  echo "</tr>";
		}
	}
?>