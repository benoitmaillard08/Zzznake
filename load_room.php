<?php 
    include('connect.php');

    $nbPlayers = $bdd->query('SELECT COUNT(*) FROM user WHERE user.fk_room IS NOT NULL')->fetchColumn();

	if($nbPlayers === '0'){
		echo('<img src="alone.jpg" class="ui centered medium image" alt="Forever alone">');

	}else{

		echo('<div id="rooms"><table class="ui celled striped padded table"><thead><tr><th><h3 class="ui header">Game number</h3></th><th><h3 class="ui header">List of players waiting</h3></th><th><h3 class="ui header">Join</h3></th></thead>');
		
		$user_fk_room = $bdd->query('SELECT DISTINCT user.fk_room FROM user WHERE user.fk_room IS NOT NULL ');
		$i = 1;

		foreach($user_fk_room as $fk_key){	//generation of the rows
			echo("<tr>");
				echo("<td>".$i."</td>");
				$i++;	//Game number
					echo('<td><ul class="ui list">');	//list of the players waiting for a game in the specific room

					$user = $bdd->query('SELECT user.username FROM user WHERE user.fk_room ='.$fk_key['fk_room']);

					foreach($user as $userName){
						echo('<li>'.$userName['username'].'</li>');
					}
					echo('</ul></td>');

					//we check if the game is already launched
					$playing = $bdd->query('SELECT room.playing FROM room WHERE room.pk_room ='.$fk_key['fk_room'])->fetchColumn();

					if ($playing == '0'){
						echo('<td><a href="session-init.php?id='.$fk_key['fk_room'].'" class="ui violet button">Join Game &nbsp; <i class="game icon"></i></a></td>');
					}else{		

						echo('<td><a class="ui red tag label">Playing</a><td>');
			
					}
					
			
			echo("</tr>");
		}
			
		echo("</table></div>");
	}
		

?>
