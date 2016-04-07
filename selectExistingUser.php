<?php
	include './connect.php';
	include './header.php';
	session_start();
	if(  (isset( $_SESSION["logStatus"] ) ) || ( $_SERVER["REQUEST_METHOD"] != "POST" ) )
	{
		header( 'Location: ./index.php' );
	}
	else
	{
		$safeUser = filter_var( $_POST["userBox"] , FILTER_SANITIZE_STRING );
		$safePass = md5( $_POST["passBox"] );



		$sqlSelect = "SELECT id , customerID , username , password FROM logins
					  WHERE username = '" . $safeUser . "' 
					  AND password = '" . $safePass . "'";
		$result = mysqli_query( $myConn , $sqlSelect );
		if( !$result )
		{
			echo "error( login ) -> " . mysqli_error( $myConn );
		}
		echo "num rows = " . mysqli_num_rows( $result ) . "<br />";
		if( mysqli_num_rows( $result ) != 0 )
		{
			while( $row = mysqli_fetch_assoc( $result) )
			{
				$_SESSION["logStatus"] = 1;

				$_SESSION["logID"] = filter_var( $row["id"] , FILTER_VALIDATE_INT);
				$_SESSION["customerID"] = filter_var( $row["customerID"] , FILTER_VALIDATE_INT );
				$_SESSION["logName"] = filter_var( $row["username"] , FILTER_SANITIZE_STRING );


			}
			$sqlSelectAgain = "SELECT id FROM customers WHERE id = " . filter_var( $_SESSION["customerID"] , FILTER_VALIDATE_INT );
			$resultAgain = mysqli_query( $myConn , $sqlSelectAgain );
			if( !$result )
			{
				$_SESSION["logCustomer"] = 0;
			}
			else
			{
				$_SESSION["logCustomer"] = 1;

			}
			echo "<p>Success! - <a href = './index.php'>Start Shopping!</a></p>";
			// echo "logStatus -> " . $_SESSION["logStatus"] . "<br />";
			// echo "logID -> " . $_SESSION["logID"] . "<br />";
			// echo "logName -> " . $_SESSION["logName"] . "<br />";
		}
		else
		{
			echo "<p>Login username/password incorrect, please try again!</p>";
			// echo "logStatus -> " . $_SESSION["logStatus"] . "<br />";
			// echo "logID -> " . $_SESSION["logID"] . "<br />";
			// echo "logName -> " . $_SESSION["logName"] . "<br />";

		}

	}
	include './footer.php';
?>
