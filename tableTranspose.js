$(document).ready( function()
{
	$("body").onload( function() 
	{
		$("#customerTable").each( function()
		{
			var $this = $(this);
			var newRows = [];
			$this.find( "tr" ).each( function()
			{
				var i = 0;
				$(this).find( "th" , "td" ).each( function()
				{
					i++;
					if( newRows[i] == undefined )
					{
						newRows[i] = $("<tr></tr>");
					}
				});
			});
			$this.find( "tr" ).remove();
			$.each( newRows , function()
			{
				$this.append( this );
			});
		});
		return false;
	});
})