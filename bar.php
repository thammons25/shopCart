<?php
	include './connect.php';

	$sqlSelect = "SELECT id , name FROM categories";
	$result = mysqli_query( $myConn , $sqlSelect );
	if( !$result )
	{
		echo "error( bar ) -> " . mysqli_error( $myConn );
	}
	if( mysqli_num_rows( $result ) > 0 )
	{
		echo "<strong>CATEGORIES</strong><br />";
		while( $row = mysqli_fetch_assoc( $result ) )
		{
			$catID = filter_var( $row["id"] , FILTER_VALIDATE_INT);
			$catName = filter_var( $row["name"] , FILTER_SANITIZE_STRING );
			echo "<a href = './products.php?catID=" . $catID . "'>" . $catName . "</a>";
			echo "<br />";
		}
	}
?>
