var checkpass = true;
$(function(){
     $("#form").on("submit",function(){
         var form = $(this)[0];
		 checkpass = true;
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
		form.classList.add('was-validated');  
		checkPasswordConfirm();
		
		 if(checkpass === false){
			event.preventDefault();
			event.stopPropagation();
		 }
		 
        form.classList.add('was-validated');         
     });     
});

function checkPasswordConfirm(){
	const password = document.getElementById('password');
	const conpassword = document.getElementById('conpassword');
	const passwordValue = password.value.trim();
	const conpasswordValue = conpassword.value.trim();
	if(conpasswordValue !== passwordValue){
		swal("รหัสผ่านไม่ตรงกัน", "กรุณากรอกรหัสผ่านใหม่อีกครั้ง", "error");
		checkpass = false;
	}
}
