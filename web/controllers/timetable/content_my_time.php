<?php
	while($row = $resultSearchMyTime->fetch_assoc()) {
		echo "<div class=\"content-container-data\">
					<div class=\"col-left-data\">
						<div class=\"text\">" . $row['เวลาเริ่ม'] . " - ". $row['เวลาจบ'] . "</div>
					</div>
					<div class=\"col-right-data\">
						<div class=\"text\">
							สถานะ " . $row['status'] . ",
							วิชา " . $row['subject'] . ",
							จำนวนเงิน " . $row['amount'] . ",
							รูปแบบการสอน " . $row['learn'] . "
						</div>
					</div>
				</div>";
	}
?>