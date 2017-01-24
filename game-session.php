<?php 
	session_start();
  include('connect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/semantic-ui/2.2.6/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="static/css/custom.css">

	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">	
    </script>
    <script src="static/js/game.js"></script>

    <title>Session #<?php echo($_GET['id']) ?></title>
</head>
<body>
    
    <div class="ui game" id="game_id">

    </div>

    <?php  

    if (true){
    ?>
   	<div class="ui container">
   		<div class="ui clearing segment">
   			<style type="text/css">
			canvas {
				background-color: gold;
		    	padding-left: 0;
			    padding-right: 0;
			    margin-left: auto;
			    margin-right: auto;
			    display: block;
    			width: 520px;

			}
			</style>
   			<canvas id="canvas" width="520" height="520" tabindex="1"></canvas>
   			<button class="ui inverted green big button" id="ready">Ready</button>
   		</div>
    	
    </div>
    <?php
    }else{
    	?>
    
		
		<?php
    }

    	include('footer.php');
    ?>
</body>
</html>
