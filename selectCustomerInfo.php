<style type = "text/css">
	table {

		float: left;
		/*padding: 2.5px*/
	}
	#customerTable {
		/*border-right: none;*/
		margin-left: 125px;
	}
	#actualInfo {
		border-left: none;
	}
	th , td {
		height: 50px;
		padding: 5px;
	}
	#acctInfo {
		/*text-decoration: underline;*/
		text-align: center;
	}
</style>
<?php
	include './connect.php';
	session_start();

	$sqlSelect = "SELECT forname , surname , addOne , addTwo , addThree , postcode , phone , email 
				  FROM customers WHERE id = " . filter_var( $_SESSION["customerID"] , FILTER_VALIDATE_INT );
	$result = mysqli_query( $myConn , $sqlSelect );
	if( !$result )
	{
		echo "error( custInfo ) -> " . mysqli_error( $myConn );
	}

	if( mysqli_num_rows( $result ) == 1 )
	{
		echo "<h2 id = 'acctInfo'>" . $_SESSION["logName"] . " Account Information</h2>";
		echo "<br />";
		echo "<table border = '.50' id = 'customerTable'>
				<tr>
					<th>Name </th>
				</tr>
				<tr>
					<th>Street </th>
				</tr>
				<tr>
					<th>City,State Zip </th>
				</tr>
				<tr>
					<th>Contact </th>
				</tr>
				<tr>
					<th>Email </th>
				</tr>
			 </table>";

		echo "<table border = '.5' id = 'actualInfo'>";
		while( $row = mysqli_fetch_assoc( $result ) )
		{
			$for = filter_var( $row["forname"] , FILTER_SANITIZE_STRING );
			$sur = filter_var( $row["surname"] , FILTER_SANITIZE_STRING );
			$one = filter_var( $row["addOne"] , FILTER_SANITIZE_STRING );
			$two = filter_var( $row["addTwo"] , FILTER_SANITIZE_STRING );
			$three = filter_var( $row["addThree"] , FILTER_SANITIZE_STRING );
			$zip = filter_var( $row["postcode"] , FILTER_SANITIZE_STRING );
			$phone = filter_var( $row["phone"] , FILTER_SANITIZE_STRING );
			$mail = filter_var( $row["email"] , FILTER_SANITIZE_EMAIL );

			echo "<tr>";
				echo "<td> " . $for . " " . $sur . "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td> " . $one . "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td> " . $two . " , " . $three . "  " . $zip . "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td> " . $phone . "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td> " . $mail . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}











?>
