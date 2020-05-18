<?php 
	$search_user = $_POST['search-by-user'];
	
	if(!empty($search_user)){
		$sqlSearchSame = "SELECT username 
						FROM users 
						WHERE (users.username = ? OR users.email = ?) AND users.user_id = ? LIMIT 1;";
		$stmt = $conn->prepare($sqlSearchSame);
		$stmt->bind_param('sss', $search_user, $search_user, $_SESSION['user_id']);
		$stmt->execute();
		$resultSearchSame = $stmt->get_result();
		$countSearch = $resultSearchSame->num_rows;
		
		if($countSearch === 0){
			$sqlSearchUser = "SELECT user_id, username, average_rating, firstName, lastName, gender, detail, status, skill, email
								FROM users
								WHERE users.username = ? OR users.email = ?;";
			$stmt = $conn->prepare($sqlSearchUser);
			$stmt->bind_param('ss', $search_user, $search_user);
			$stmt->execute();
			$resultSearchUser = $stmt->get_result();
			$countSearchSuccess = $resultSearchUser->num_rows;
			
		}
	}
?>