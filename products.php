<style type = "text/css">
	img {
		display: block;
		float: left;
		margin-right: 3%;

	}
	#nestedList{
		display: block;
		list-style-type: none;
		line-height: 200%;
	}
	#allProducts {
		position: absolute;
		margin-left: 20%;
		width: 70%;

	}
</style>
<!-- <script src = "./populateProductQuantity.js"></script> -->
<script language = "JavaScript">
	function addToCart( product )
	{
		this.product = product;
		// var a = document.getElementById( "item
		// alert( a );

	}
</script>










<?php
	include './connect.php';
	include './header.php';



	$sqlSelectCat = "SELECT name FROM categories WHERE id = " . filter_var( $_GET["catID"] , FILTER_VALIDATE_INT );
	$resultCat = mysqli_query( $myConn , $sqlSelectCat );
	while( $row = mysqli_fetch_assoc( $resultCat ) )
	{
		$catName = $row["name"] ;
	}
	

	$sqlSelect = "SELECT id , name , description , price , image FROM products 
				  WHERE categoryID = " . filter_var( $_GET["catID"] , FILTER_VALIDATE_INT );
	$result = mysqli_query( $myConn , $sqlSelect );
	if( !$result )
	{
		echo "error( prod ) -> " . mysqli_error( $myConn );
	}

	if( mysqli_num_rows( $result ) > 0 )
	{
		echo "<h2>Products Available For " . filter_var( $catName , FILTER_SANITIZE_STRING ) . "</h2>";
		echo "<br />";
		echo "<div id = 'allProducts'>";

			echo "<ol>";
			while( $row = mysqli_fetch_assoc( $result ) )
			{
				$prodID = filter_var( $row["id"] , FILTER_VALIDATE_INT );
				$prodName = filter_var( $row["name"] , FILTER_SANITIZE_STRING );
				$prodDesc = filter_var( $row["description"] , FILTER_SANITIZE_STRING );
				$prodPrice = filter_var( $row["price"] , FILTER_VALIDATE_FLOAT );
				$prodImg = filter_var( $row["image"] , FILTER_SANITIZE_STRING );
				echo "<div id = 'item" . $prodID . "'>";
					echo "<li>";
						echo "<h3>";
							echo "<a href = './productDetails.php?prodID=" . $prodID . "'>" . $prodName . "</a>";
							echo "<img src = '" . $prodImg . "' alt = '" . $prodName . "' />";

						echo "</h3>";

						echo "<ul id = 'nestedList'>";
							echo "<li class = 'nested'>" . $prodDesc . "</li>";
							echo "<li class = 'nested'>Price: $" . $prodPrice . "</li>";
						echo "</ul>";
					echo "</li>";
					echo "<br />";
					echo "<form method = 'post' action = './addToCart.php?prodID=" . $prodID . "'>";
						echo "Quantity: <select id = 'selectQuantity' name = 'howMuch'>";
						$i = 0;
						while( $i < 10 )
						{
							$j = $i+1;
							if( $i == 0 )
							{
								echo "<option></option>";
							}
							echo "<option value = '" . $j . "'>" . $j . "</option>";
							$i++;	
						}
						echo "</select>";
						echo "<br />";
						echo "<br />";

						echo "<input type = 'submit' value = 'Add To Cart!' id = 'submitProduct" . $prodID . "'/>";
					echo "</form>";
					// echo "Quantity: <select id = 'selectQuantity'></select>";
					// echo "<br />";
					// echo "<br />";

					// echo "<button onclick = 'addToCart(" . $prodID . ")'>Add To Cart!</button>";
					echo "<br />";
					echo "<br />";
					echo "<br />";
					echo "<br />";
					echo "<br />";
					echo "<br />";
				echo "</div>";
			}
			echo "</ol>";
		echo "</div>";
	}

	else
	{
		echo "<h2>No products exist for " . $catName . " yet!</h2>";
	}









	include './footer.php';
?>
