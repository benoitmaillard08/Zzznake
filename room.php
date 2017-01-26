
	<?php 
		session_start();

		include('doctype.html');
	    include('connect.php');

	    if (isset($_SESSION['key'])) {
	?>

	<div class="ui raised padded container segment">
		<div class="ui four statistics">
		  <div class="statistic">
		    <div class="value" style="font-size: 2rem !important">
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
		    <div class="value" style="font-size: 2rem !important">
		      <?php 
		      	echo($total);
		       ?>
		    </div>
		    <div class="label">
		      Total games played
		    </div>
		  </div>

		  <div class="statistic">
		    <div class="value" style="font-size: 2rem !important">
		      <?php 
				$n_user = $bdd->query('SELECT COUNT(*) FROM user')->fetchColumn();
				echo($n_user);
		       ?>
		    </div>
		    <div class="label">
		      Number of users
		    </div>
		  </div>

		  <div class="statistic">
		    <div class="value" style="font-size: 2rem !important">
		      <?php 

				$user_score = $bdd->query('SELECT * FROM user WHERE user.n_victory > 0 AND user.n_lost > 0');
				$max = 0;
				$nom = "Chuck Norris";

				foreach($user_score as $score){	
					$ratio = $score['n_victory'] / $score['n_lost'];

		       		if ($ratio >= $max){
		       			$max = $ratio;
		       			$nom = $score['username'];
		       		}
				}
				echo($nom);
		       ?>
		    </div>
		    <div class="label">
		      Best player
		    </div>
		  </div>

		</div>
	</div>


	<div class="ui container">
		<div class="ui inverted clearing segment">
			<?php 
				echo('<p><h1 class="ui white left floated header">Hello, '.$_SESSION["username"].' ! <i class="hand peace icon"></i></h1></p>');
			 ?>

			<a href="unlog.php" class="ui red right floated button">Logout</a>
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

	<script src="static/js/script.js"></script>
	<?php
}
else {
	echo("not logged in");
}
		include('footer.php');

	 ?>
</body>
</html>