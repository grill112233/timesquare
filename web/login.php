<?php require_once 'controllers/authController.php'; ?>
<!DOCTYPE html>
<html>
<title>เข้าสู่ระบบ</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = "icon" href ="css/images/logo.png"> 
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
<style>
	*{
		box-sizing: border-box;
	}
	@font-face {
	  font-family: 'PromptSemiBold';
	  src: url('css/font/PromptSemiBold.ttf');
	}
				
	body{
	   font-family: 'PromptSemiBold';
	   background-image: url('css/images/login/background.jpg');
	   background-repeat: no-repeat;
	}
</style>
<body>
	<div class="w3-main">
		<div class="w3-container" style="margin-top:80px;">
			<div class="w3-row">
				<div class="w3-col w3-container w3-mobile" style="width:50%;">
					<h2 style="border-radius: 10px; width:100%;">
									<div>
										<img src="css/images/login/pic1.png" style="display: block; width: 100%; margin-left: auto;" alt="pic1">
									</div>
					</h2>
				</div>
				<div class="w3-col w3-mobile" style="width:50%;">
					<h2 style="padding:32px; border-radius: 10px; background-color:rgba(255, 255, 255, 0.4);">
						<form action="login" method="post">
						
									<div>
										<img src="css/images/logo.png" style="display: block; width: 50%; hight: 50%; margin-left: auto; margin-right: auto;" alt="logo">
									</div>
									
									<?php if(count($errors) > 0): ?>
									<div class="w3-panel w3-pale-red" style="font-size:15px; padding:16px; margin-top: 10px; margin-bottom: 10px;">
										<?php foreach($errors as $error): ?>
											<li style="color:#696969;"><?php echo $error; ?></li>
										<?php endforeach; ?>	
									</div>
									<?php endif; ?>
						
									<div class="input-group" style="margin-bottom:1rem">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" placeholder="ชื่อผู้ใช้/อีเมล" name="username" class="form-c form-control form-control-lg" style="background-color:#F5F5F5;">
									</div>
									
									<div class="input-group" style="margin-bottom:1rem">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input type="password" placeholder="รหัสผ่าน" name="password" class="form-control form-control-lg" style="background-color:#F5F5F5;">
									</div>
									<div class="w3-hover-none w3-text-blue" style="font-size:15px;">
										<a href="#" target="_blank">ลืมรหัสผ่าน?</a>
									</div>
									<div class="w3-row" style="padding-left: 25%;padding-right: 25%;margin-top:30px;">
												<button type="submit" name="login-button" class="btn btn-lg" style="border-radius: 25px;color:white;outline: none;background-color:#821EA2; width:100%;">เข้าสู่ระบบ</button>
									</div>	
						</form>
					</h2>
									
									<div class="w3-hover-none w3-text-blue text-center" style="font-size:15px;">
										<div style="color:white;">ยังไม่มีบัญชีใช่หรือไม่?
											<a href="signup" target="_self" style="color: #B193ED;">สมัครสมาชิก</a>
										</div>
									</div>
				</div>
						

									
					
				</div>
			</div>
			
			<footer>
			</footer>
		</div>   
		

     
</body>
</html> 
