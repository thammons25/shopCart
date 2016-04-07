<?php
	session_start();
	include './connect.php';
	include './header.php';


	echo "<h3>Welcome to the <strong>Shopping Cart</strong></h3>";
	// echo "logStatus -> " . $_SESSION["logStatus"] . "<br />";
	// echo "logName -> " . $_SESSION["logName"] . "<br />";
	// echo "logID -> " . $_SESSION["logID"] . "<br />";

	// echo "custID => " . $_SESSION["customerID"] . "<br />";
	// echo "logCustomer -> " . $_SESSION["logCustomer"] . "<br />";
	// if( $_SESSION["logStatus"] == 1 && ( !isset( $_SESSION["logCustomer"] ) ) )
	// {
		// include './newCustomerForm.php';
	// }

	echo "<br />";
	include './footer.php';




?>

