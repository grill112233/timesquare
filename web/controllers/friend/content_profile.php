<?php
	if(isset($username_friend)){
		require 'profile.php'; 
		$profile = $resultSearchUser->fetch_assoc();
		
		
		echo "<p>ข้อมูลของ ". $username_friend  . "</p>
			<p>ชื่อ ". $profile['firstName'] . " " . $profile['lastName'] . "</p>
			<p>อีเมล ". $profile['email'] .  "</p>
			<p>สถานะ ". $profile['status']  . "</p>
		";
		
		if(!empty($profile['average_rating'])){
			echo "<p>ค่าเฉลี่ยคะแนน ". $profile['average_rating']  . "</p>";
		}
		
		if(!empty($profile['gender'])){
			echo "<p>เพศ ". $profile['gender']  . "</p>";
		}
		
		if(!empty($profile['skill'])){
			echo "<p>ทักษะ ". $profile['skill']  . "</p>";
		}
		
		if(!empty($profile['detail'])){
			echo "<p>รายละเอียดอื่นๆ ". $profile['detail']  . "</p>";
		}

			$sql = "SELECT phone_number
							FROM phone_user
							WHERE phone_user.user_id = ?;";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('s', $profile['user_id']);
			$stmt->execute();
			$result= $stmt->get_result();
			$countp2 = $result->num_rows;
			
			while($profile2 = $result->fetch_assoc()){
				echo "<p>เบอร์ติดต่อ " . $profile2['phone_number'] . "</p>";
			}
		
	}
?>