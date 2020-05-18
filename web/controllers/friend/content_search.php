<?php
	if(isset($resultSearchUser) || isset($resultSearchSame)){
		if($countSearch === 0 AND $countSearchSuccess === 1){
			$row = $resultSearchUser->fetch_assoc();
			$username_friend = $row['username'];
				echo "<div class="."content-friend".">".
					 "<div class="."content-text".">".
						"<div>". $row['username'] . "</div>".
						"<div>". $row['firstName'] . " " . $row['lastName'] . "</div>".
						"<div>". $row['email'] . "</div>".
					"</div>".
					"<div class="."btn-four".">".
						"<div class="."coloumn".">".
							"<button id="."btnRequest"." class="."btn-request".">จองเวลา</button>".
						"</div>".
						"<div class="."coloumn".">".
							"<button id="."btnGiverScore"." class="."btn-giver-score".">ให้คะแนน</button>".
						"</div>".
						"<div class="."clearfix"."></div>".
						"<div class="."coloumn".">".
							"<button id="."btnMsg"." class="."btn-msg".">ส่งข้อความ</button>".
						"</div>".
						"<div class="."coloumn".">".
							"<button id="."btnProfile"." class="."btn-profile".">ข้อมูลส่วนตัว</button>".
						"</div>".
						"<div class="."clearfix"."></div>".
					"</div>".
				"</div>";
			
		}else{
				echo "<div class="."content-friend".">".
					 "<div class="."content-text".">".
						"<div>ค้นหาไม่สำเร็จ!</div>".
					"</div>".
					"</div>";
		}
	}
?>