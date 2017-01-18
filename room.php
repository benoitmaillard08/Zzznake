
	<?php 
		session_start();

		include('doctype.html');
	    include('connect.php');
	?>

	<div class="ui container">
		<div class="ui three statistics">
		  <div class="statistic">
		    <div class="value">
		      <?php 
		      	$n_victory = $bdd->query('SELECT user.n_victory FROM user WHERE user.username ='.$_SESSION["username"]);
		      	$n_lost = $bdd->query('SELECT user.n_lost FROM user WHERE user.username ='.$_SESSION["username"]);
		      	
		      	$total = $n_victory + $n_lost;

		      	if ($n_lost == '0' && $n_victory == '0'){
		      		echo('Go play !');
		      	}else if ($n_lost == '0' && $n_victory > '0'){
		      		echo('∞');
		      	}else{
		      		echo($total / $n_lost);
		      	}
		      ?>
		    </div>
		    <div class="label">
		      Ratio
		    </div>
		  </div>
		  <div class="statistic">
		    <div class="value">
		      <?php 
		      	echo($total);
		       ?>
		    </div>
		    <div class="label">
		      Total games played
		    </div>
		  </div>
		  <div class="statistic">
		    <div class="value">
		      <?php 
				$n_user = $bdd->query('SELECT COUNT(*) FROM user')->fetchColumn();
				echo($n_user);
		       ?>
		    </div>
		    <div class="label">
		      Number of users
		    </div>
		  </div>

		</div>
	</div>

	<div class="ui container">
		<?php 
			echo('<p><h1 class="ui teal header">Hello, '.$_SESSION["username"].' ! </h1></p>');
		 ?>
		<form action="unlog.php" method="GET" class="ui form">
			<button class="ui red button" type="submit">Logout</button>
		</form>
	</div>

		<div class="ui container">
			<h1 class="ui blue header">Game rooms</h1>

			<a href="session-init.php" class="ui teal button">Join an empty room</a>

		</div>


		<div class="ui container" id="container_id">

		</div>

	<script src="script.js"></script>
</body>
</html>