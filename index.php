<?php 
	if(!isset($_SESSION)) { 
        session_start(); 
    } 

	include('doctype.html');
	include('connect.php');

	if (isset($_POST['username_login']) && isset($_POST['password_login'])){

			$query_data = $bdd->query('SELECT * FROM user');

			foreach($query_data as $data){

				if ($data['username'] == $_POST['username_login'] && $data['password'] == $_POST['password_login']){

					$_SESSION['firstname'] = $data['firstname'];
					$_SESSION['lastname'] = $data['lastname'];
					$_SESSION['key'] = $data['pk_user'];
					$_SESSION["username"] = $data['username'];

					echo("You are connected");
					
					header('Location: room.php');
				}	
			
			}
			
	}else{		
		include('login.php');
	}

?>
</body>
</html>
