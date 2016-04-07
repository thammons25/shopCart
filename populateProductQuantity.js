window.onload = function()
{


	var mySelect = document.getElementById( "selectQuantity");
	var myOptions = new Array();
	var i = 0;
	while( i < 10 )
	{
		var j = i+1;
		if( i == 0 )
		{
			myOptions.push("");
		}
		myOptions.push(j);
		i++;
	}
	for( var k = 0 ; k < myOptions.length ; k++ )
	{
		var makeChoice = document.createElement( "option" );
		makeChoice.innerHTML = myOptions[k];
		makeChoice.value = myOptions[k];
		mySelect.appendChild( makeChoice );
	}
}