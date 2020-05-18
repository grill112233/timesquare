<?php
	if($countRequestMyTime > 0 || $countMsg > 0){
		echo "<title>(" . ($countRequestMyTime + $countMsg) . ") หน้าหลัก</title>";
	}else{
		echo "<title>หน้าหลัก</title>";
	}
?>