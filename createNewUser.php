<?php
	include './connect.php';
	include './header.php';
	session_start();

	$sqlSelect = "SELECT customerID FROM logins ORDER BY customerID DESC LIMIT 1";
	$result = mysqli_query( $myConn , $sqlSelect );
	if( !$result )
	{
		echo "error( new custID ) -> " . mysqli_error( $myConn );
	}

	while( $row = mysqli_fetch_assoc( $result ) )
	{
		$nextID = filter_var( $row["customerID"] , FILTER_VALIDATE_INT );

	}
	
	$nextID = $nextID + 1 ;

	$sqlPrep = $myConn->prepare( "INSERT INTO logins( customerID , username , password ) VALUES( ?,?,?)" );
	$sqlPrep->bind_param( "iss" , $newID , $newName , $newPass );

	$newID = filter_var( $nextID , FILTER_VALIDATE_INT );;
	$newName = filter_var( $_POST["newUsername"] , FILTER_SANITIZE_STRING );
	$newPass = md5( $_POST["newPassword"] );


	$checkExec = $sqlPrep->execute();
	if( $checkExec )
	{
		$_SESSION["logStatus"] = 1;
		$_SESSION["logCustomer"] = 0;
		$_SESSION["logName"] = $newName;
		$_SESSION["logID"] = $newID;
		// $_SESSION["customerID"] = 
	}
	$sqlPrep->close();

	$sqlSelect = "SELECT customerID FROM logins WHERE id = " . filter_var( $_SESSION["logID"] , FILTER_VALIDATE_INT );
	$result = mysqli_query( $myConn , $sqlSelect );
	if( !$result )
	{
		echo "error( customerID )  -> " . mysqli_error( $myConn );
	}
	while( $row = mysqli_fetch_assoc( $result ) )
	{
		$_SESSION["customerID"] = filter_var( $row["customerID"] , FILTER_VALIDATE_INT );
		 
	}



	// echo "Welcome! <a href = './'>Start Shopping!</a>";



	include './footer.php';

	














?>
