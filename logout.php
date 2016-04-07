<script language = "JavaScript">
<!--
	function getBack()
	{
		window.location = "./";
	}
//-->
</script>
<?php
	include './connect.php';
	
	session_start();
	$_SESSION = array();

	if( ini_get( "session.use_cookies" ) )
	{
		$params = session_get_cookie_params();
		setcookie( session_name() , '' , time()-4200 ,
			$params["path"] , $params["domain"] ,
			$params["secure"] , $params["httponly"]);
	}
	session_destroy();
	// echo "<h3>See you soon!</h3>";
	echo "<body onload = 'getBack()'></body>";

	// include './header.php';
?>
