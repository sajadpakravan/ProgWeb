<?php 
	include('Includes/Header.php');

	include('../Includes/Settings.php');
	include ('../Includes/functions.php');

	$dbc = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME); 

	$sql = "INSERT INTO users(Name, PhoneNum, Email, Password)
		VALUES('{$_POST['Name']}', '{$_POST['Tel']}', '{$_POST['Email']}', '{$_POST['Password']}')";

	$dbc -> query($sql);
	$dbc -> close();
?>

	<p>ثبت نام شما انجام شد</p>

	<p>برای وارد شدن به سایت روی دکمه زیر کلیک کنید</p>

	<form action="#" method="post">
		<div>
			<button type="submit">ورود</button>
		</div>
	</form>


<?php include('Includes/Footer.php') ?>