<?php
	include './connect.php';
	session_start();
?>
<script language = "JavaScript">
<!--
	window.onload = function()
	{
		var stateList = document.getElementById( "state" );
		var allStates = ['', 'Alabama','Alaska','American Samoa','Arizona',
						'Arkansas','California','Colorado','Connecticut','Delaware',
						'District of Columbia','Federated States of Micronesia','Florida',
						'Georgia','Guam','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas',
						'Kentucky','Louisiana','Maine','Marshall Islands','Maryland','Massachusetts',
						'Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada',
						'New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota',
						'Northern Mariana Islands','Ohio','Oklahoma','Oregon','Palau','Pennsylvania',
						'Puerto Rico','Rhode Island','South Carolina','South Dakota','Tennessee','Texas',
						'Utah','Vermont','Virgin Island','Virginia','Washington','West Virginia',
						'Wisconsin','Wyoming'];
		var r = 0;
		while( r < allStates.length )
		{
			var myState = document.createElement( "option" );
			myState.innerHTML = allStates[r];
			myState.value = allStates[r];
			stateList.appendChild( myState );
			r++;
		}



	}
//-->
</script>



<h2>Finalize Your Information!</h2>
<div id = "newCustomerForm" style = "display: none">
	<form method = "post" action = "./createNewCustomer.php">
		<p>First Name: <input type = 'text' name = 'forname' required /></p>
		<p>Last Name: <input type = 'text' name = 'surname' required /></p>
		<p>Address: <input type = 'text' name = 'address' required /></p>
		<p>City: <input type = 'text' name = 'city' required /></p>
		<p>State: <select id = "state" name = "state" style = "width:10%;"></select></p>
		<p>Zip: <input type = 'text' name = 'zipcode' required /></p>
		<p>Phone: <input type = 'tel' name = 'phone' required /></p>
		<p>Email: <input type = 'email' name = 'email' required /></p>
		<br />
		<input type = 'submit' value = 'Complete Login' />
	</form>
</div>


