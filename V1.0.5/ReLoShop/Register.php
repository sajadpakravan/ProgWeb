<?php include('Includes/Header.php');

$Name = $Tel = $Email = $Password = $rePassword = "";

$Style_Nerror = $Style_Terror = $Style_Eerror = $Style_Perror = $Style_RePerror = "";

$text_nameErr = $text_telErr = $text_emailErr = $text_passErr = $text_repassErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
  	if (empty($_POST["Name"])) {
		$text_nameErr = "نام و نام خانودگی خود را وارد کنید";
		$Style_Nerror = 'error';
	  
  	} else {
    	$Name = test_input($_POST["Name"]);
		
		if (!preg_match("/^[a-zA-Z-' ض ص ث ق ف غ ع ه خ ح ج چ پ ش س ی ب ل ا ت ن م ک گ ظ ط ز ر ذ د ئ و]*$/",$Name)) {
      		$text_nameErr = "فقط از حروف استفاده کنید";
			$Style_Nerror = 'error';
    }
  }
	
	if (empty($_POST["Tel"])) {
    	$text_telErr = "شماره تلفن همراه خود را وارد کنید";
		$Style_Terror = 'error';
	  
  } else {
		$Tel = test_input($_POST["Tel"]);
		
		if (!preg_match("/^09[0-9]*$/",$Tel)) {
	  		$text_telErr = "شماره وارد شده نادرست است";
			$Style_Terror = 'error';
			
		}elseif(strlen($Tel) < 11){
			$text_telErr = "شماره وارد شده نادرست است";
			$Style_Terror = 'error';
		}
	}
	
	if (empty($_POST["Email"])) {
    	$text_emailErr = "ایمیل خود را وارد کنید";
		$Style_Eerror = 'error';
	  
  } else {
		$Email = test_input($_POST["Email"]);
		
		if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
	  		$text_emailErr = "ایمیل وارد شده نادرست است";
			$Style_Eerror = 'error';
    }
  }
	
	if (empty($_POST["Password"])) {
    	$text_passErr = "کلمه عبور مورد نظر را وارد کنید";
		$Style_Perror = 'error';
	  
  } else {	
		$Password = $_POST["Password"];
		
		if (strlen($Password) < 8) {
			$text_passErr = "کلمه عبور باید حداقل 8 کاراکتر باشد";
			$Style_Perror = 'error';
    	}
  	}
	
	if (empty($_POST["rePassword"])) {
    	$text_repassErr = "تکرار کلمه عبور را وارد کنید";
		$Style_RePerror = 'error';
	  
  } else {	
		$rePassword = $_POST["rePassword"];
		
		if (strlen($rePassword) < 8) {
			$text_repassErr = "تکرار کلمه عبور باید حداقل 8 کاراکتر باشد";
			$Style_RePerror = 'error';
    	}
  	}
}

	if($Password != $rePassword){
		$text_repassErr = "تکرار کلمه عبور با کلمه عبور یکسان نیست";
		$Style_RePerror = 'error';
	}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

		<p>ثبت نام</p>
		
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<div>
				<input type="text" id="Name" name="Name" class="<?php echo $Style_Nerror;?>" placeholder="نام و نام خانوادگی" value="<?php echo $Name;?>"/>
				<span class="text_Error"><?php echo $text_nameErr;?></span>
			</div>

			<div>
				<input type="tel" id="Tel" name="Tel" class="<?php echo $Style_Terror;?>" placeholder="شماره تلفن همراه" maxlength="11" value="<?php echo $Tel;?>"/>
				<span class="text_Error"><?php echo $text_telErr;?></span>
			</div> 

			<div>
				<input type="email" id="Email" name="Email" class="<?php echo $Style_Eerror;?>" placeholder="ایمیل" value="<?php echo $Email;?>"/>
				<span class="text_Error"><?php echo $text_emailErr;?></span>
			</div>
			
			<div>
				<input type="password" id="Password" name="Password" class="<?php echo $Style_Perror;?>" placeholder="کلمه عبور" value="<?php echo $Password;?>"/>
				<span class="text_Error"><?php echo $text_passErr;?></span>
			</div>
			
			<div>
				<input type="password" id="rePassword" name="rePassword" class="<?php echo $Style_RePerror;?>" placeholder="تکرار کلمه عبور" value="<?php echo $rePassword;?>"/>
				<span class="text_Error"><?php echo $text_repassErr;?></span>
			</div>
			
			<div>
				<label for="ShowPass" class="ShowPass">نمایش کلمه عبور</label>
				<input type="checkbox" id="ShowPass" onClick="onShowPass_Check()"/>
			</div>
			
			<div>
				<button type="submit">ثبت نام</button>
			</div>
			
			<div>
				<a href="http://localhost/WebP/ReLoShop/Login.php">قبلا ثبت نام کرده‌ام</a>
			</div>
			
		</form>

<script>
	function onShowPass_Check() {
		
  		var ShowPass = document.getElementById("ShowPass");
		
		var Password = document.getElementById("Password");
		var rePassword = document.getElementById("rePassword");
		
  		if (ShowPass.checked == true){
			Password.type = "text";
			rePassword.type = "text";
			
  		} else {
			Password.type = "password";
			rePassword.type = "password";
		}
	}
</script>
		
<?php include('Includes/Footer.php') ?>