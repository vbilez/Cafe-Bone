<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Slider - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#slider" ).slider(
    		{
          range:true,
          min: 10,
    			max: 590,
          values:[10,590],
    			change: function( event, ui ) {
    				
    					{
                jQuery('#min').val((ui.values[0]));
                jQuery('#max').val((ui.values[1]));
              }
    					
    			}
    		}
    	);
  });
  </script>
</head>
<body>
 
<div id="slider">
 

</div>
<div>
<input id="min" value=""> 

 <input id="max" value="">
</div>
</body>
</html>