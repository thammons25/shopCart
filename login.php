<?php
	include './connect.php';
	include './header.php';
	session_start();
?>

<div id = 'loginForm'>
	<h3>Sign In!</h3>
	<form method = 'post' action = './selectExistingUser.php'>
		<p>Username: <input type = 'text' name = 'userBox' required/></p>
		<p>Password: <input type = 'password' name = 'passBox' required /></p>
		<br />
		<input type = 'submit' value = "Sign In" />
	</form>
</div>


<?php
	include './footer.php';
?>

