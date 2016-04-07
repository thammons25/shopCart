<?php
	include './connect.php';
	include './header.php';
	session_start();

	if( $_SERVER["REQUEST_METHOD"] != "POST" )
	{
		header( 'Location: ./index.php' );
	}

	$sqlPrep = $myConn->prepare( "INSERT INTO orderItems( quantity , productID ) VALUES( ?,? )" );
	$sqlPrep->bind_param( "ii" , $newAmt , $newProd );

	$newAmt = filter_var( $_POST["howMuch"] , FILTER_VALIDATE_INT );
	$newProd = filter_var( $_GET["prodID"] , FILTER_VALIDATE_INT );

	$sqlPrep->execute();
	include './footer.php';
?>
