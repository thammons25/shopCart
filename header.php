<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src = "./showForm.js"></script>
<?php
	session_start();

	// echo "<br /><br /><br />";
?>

<?php
	// session_start();

	include './connect.php';


?>
<html>
	<head>
		<link rel = "stylesheet" href = "./style.css" />
		<title> Shopping Cart </title>
		<script language = "JavaScript">
		<!--
			function goHome()
			{
				window.location = './';
			}
		//-->
		</script>
	</head>

<?php
	if( $_SERVER["REQUEST_METHOD"] == "POST" )
	{
		echo "<body onload = 'goHome()'>";
	}
	else
	{
		echo "<body>";
	}
		echo "<div id = 'main'></div>";
		echo "<div id = 'sidebar'></div>";
		// echo $configSitename . "<br />";
		echo "<div id = 'header'></div>
			  <div id = 'menu'>
			  	<a href = './index.php'>Home</a> 
			  	--
			  	<a href = './showCart.php'>View Basket/Checkout</a>";
			  	if( ( $_SESSION["logStatus"] == 1 ) && (isset( $_SESSION["logName"] ) ) )
			  	{
			  		echo "--";
			  		echo "<a href = './viewAccount.php'>Account Overview</a>";
			  	}
			  	
			  	
		echo "</div>

			  <div id = 'container'>
			  	<div id = 'bar'>";
			  	include './bar.php';
			  	echo "<hr />";
			  	if( isset( $_SESSION["logStatus"] ) )
			  	{
			  		echo "Logged in as - <strong>" . $_SESSION["logName"] . "</strong>";
			  		// echo "- <a href = '" . filter_var( $configBasedir , FILTER_SANITIZE_STRING ) . "logout.php'>Logout</a>";
			  		echo "-";
			  		echo "<a href = './logout.php'>Logout</a>";

			  	}
			  	else
			  	{
			  		// echo "<a href = '" . filter_var( $configBasedir , FILTER_SANITIZE_STRING ) . "login.php'>Login</a>";
			  		echo "<a href = './login.php'>Login</a>";
			  		echo "<br />";
			  		// echo "<br />";
			  		echo "<a href = './signup.php'>Sign Up</a>";
			  	}
		echo "</div>" //ends div container
		// echo "hello";
?>
<style type = "text/css">
	#goCheckout {
		border: 1px solid black;
		margin-right: 1%;
		float: right;
		padding: 5px;
	}
	#goCheckout:hover {
		background-color: pink;
		cursor: pointer;

	}
</style>
<div id = "goCheckout">
	<a href = "./checkout.php">
		<p>All Set? - PROCEED TO CHECKOUT</p>
	</a>
</div>





