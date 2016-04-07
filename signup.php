<?php
	include './connect.php';
	include './header.php';
	session_start();
?>

<div id = 'signupForm'>
	<h3>Create An Account Today!</h3>
	<form method = 'post' action = './createNewUser.php'>
		<p>Username: <input type = 'text' name = 'newUsername' required/></p>
		<p>Password: <input type = 'password' name = 'newPassword' required /></p>
		<br />
		<input type = 'submit' value = 'Create Account!' />
	</form>
</div>


<?php
	include './footer.php';




?>
