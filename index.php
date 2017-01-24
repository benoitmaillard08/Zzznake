<?php 
	session_start();

	include('doctype.html');
	include('connect.php');

?>	
	<div class="ui container">
		<div class="ui inverted segment">
			<h1 class="ui center aligned header">Welcome to Zzznake !</h1>
		</div>
	</div>
	
<?php
	if (isset($_POST['username_login']) && isset($_POST['password_login'])){

			$query_data = $bdd->query('SELECT * FROM user');
			$correct = 0;

			foreach($query_data as $data){

				if ($data['username'] == $_POST['username_login'] && $data['password'] == $_POST['password_login']){

					$_SESSION['firstname'] = $data['firstname'];
					$_SESSION['lastname'] = $data['lastname'];
					$_SESSION['key'] = $data['pk_user'];
					$_SESSION["username"] = $data['username'];

					echo("You are connected");
					$correct = 1;
					
				}
				if ($correct == 1){
					header('Location: room.php');
				}else{
					header('Location: index.php');
				}
			
			}
			
	}else{		
		include('login.php');
	}
	include('footer.php');

?>
	<script src="static/js/validation.js"></script>
</body>
</html>
