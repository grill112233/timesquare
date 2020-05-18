<?php
	while($row = $resultMsg->fetch_assoc()) {
		echo "	<div class="."list-item noti".">
					<div class=\"col-inbox-left image\">
						<i class=\"fa fa-user-circle\"></i>
					</div>
					<div class="."col-inbox-right text".">
						<b class="."fontS".">". $row['firstName'] . " " .$row['lastName'] ."</b>
						<br>
						<small class="."fontS".">". $row['content'] . "</small>
						<br>
						<small class="."font-date".">". time_convert($row['date']) ."</small>
					</div>
				</div>
				<div class=\"clearfix\"></div>";
	}
?>