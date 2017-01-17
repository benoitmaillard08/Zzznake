
	<?php 
		session_start();

		include('doctype.html');
	    include('connect.php');
	?>
	<div class="ui container">
		<?php 
			echo('<p><h1 class="ui teal header">Hello, '.$_SESSION["firstname"].' '.$_SESSION["lastname"].'</h1></p>');
		 ?>
		<form action="unlog.php" method="GET" class="ui form">
			<button class="ui red button" type="submit">Logout</button>
		</form>
	</div>

		<div class="ui container">
			<h1 class="ui blue header">Game rooms</h1>

			<form action="index.php" method="POST" class="ui form">
				<button class="ui teal button" type="submit">Join an empty room</button>
			</form>

		</div>

		<div class="ui container" id="container_id">
			<?php 
				//include("load_room.php");
			 ?>
		</div>

	<script src="script.js"></script>
</body>
</html>