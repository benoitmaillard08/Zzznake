
	<?php 
		session_start();

		include('doctype.html');
	    include('connect.php');
	?>

	<div class="ui raised padded container segment">
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
		<div class="ui inverted clearing segment">
			<?php 
				echo('<p><h1 class="ui white left floated header">Hello, '.$_SESSION["username"].' ! <i class="hand peace icon"></i></h1></p>');
			 ?>

			<form action="unlog.php" method="GET" class="ui form">
				<button class="ui red right floated button" type="submit">Logout</button>
			</form>
		</div>
	</div>
	
	<div class="ui container ">
		<div class="ui clearing segment">

				<h1 class="ui blue left aligned header">Game rooms</h1>
		
				<a href="session-init.php" class="ui teal button">Join an empty room</a>

				<div class="ui clearing divider"></div>

			<div class="ui container" id="container_id">

			</div>
		</div>
	</div>

	<script src="script.js"></script>
	<?php 
		include('footer.php');
	 ?>
</body>
</html>