


<?php
	include './connect.php';
	include './header.php';
	session_start();

	if( $_SESSION["logStatus"] == 0 || !isset( $_SESSION["logName"] ) )
	{
		header( 'Location: ./' );
	}

	if( $_SESSION["logCustomer"] == 0 )
	{
		include './newCustomerForm.php';
		echo "<div id = 'updateInfo'>
				<h3>Update Account Info? - <button id = 'showForm'>Yes, Update!</button></h3>
			  </div>";
	}
	else
	{
		// echo "<br />";
		include './selectCustomerInfo.php';
	}










	include './footer.php';








?>
