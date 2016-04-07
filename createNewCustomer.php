<?php
	include './connect.php';
	include './header.php';
	session_start();

	if( $_SERVER["REQUEST_METHOD"] != "POST" )
	{
		header( 'Location: ./' );
	}
	else
	{

		$sqlPrep = $myConn->prepare( "INSERT INTO customers( forname , surname , addOne , addTwo , addThree , postcode , phone , email , registered )
									  				 VALUES( ? 		 , 	? 	   , ? 		, ? 	 , ? 		, ? 	   , ? 	   , ? 	   ,    ? )");
		$sqlPrep->bind_param( "ssssssssi" , $newFor , $newSur , $newOne , $newTwo , $newThree , $newPost , $newPhone , $newEmail , $newReg);

		$newFor = filter_var( $_POST["forname"] , FILTER_SANITIZE_STRING );
		$newSur = filter_var( $_POST["surname"] , FILTER_SANITIZE_STRING );
		$newOne = filter_var( $_POST["address"] , FILTER_SANITIZE_STRING );
		$newTwo = filter_var( $_POST["city"] , FILTER_SANITIZE_STRING );
		$newThree = filter_var( $_POST["state"] , FILTER_SANITIZE_STRING );
		$newPost = filter_var( $_POST["zipcode"] , FILTER_SANITIZE_STRING );
		$newPhone = filter_var( $_POST["phone"] , FILTER_SANITIZE_STRING );
		$newEmail = filter_var( $_POST["email"] , FILTER_VALIDATE_EMAIL );
		$newEmail = filter_var( $newEmail , FILTER_SANITIZE_EMAIL );
		$newReg = 1;
		$result = $sqlPrep->execute();
		if( $result )
		{
			$_SESSION["logCustomer"] = 1;
			
		}

		
	}

	











	include './footer.php';
?>
