<?php 
    include('connect.php');

    	$nbPlayersWaiting = $bdd->query('SELECT COUNT(*) FROM user WHERE user.fk_room IS NOT NULL')->fetchColumn();

		if($nbPlayersWaiting == '0'){

			echo('<h2 class="ui violet header">No user waiting for a game ! :( </h2>');
		}else{
			echo('Someone wants to play');
			echo($nbPlayersWaiting);
			echo('<div id="rooms"><table class="ui celled striped table"><thead><tr><th>Game number</th><th>List of players waiting</th><th>Join</th></thead>');
			
			$user_fk_room = $bdd->query('SELECT DISTINCT user.fk_room FROM user WHERE user.fk_room IS NOT NULL ');
			$i = 1;

			foreach($user_fk_room as $fk_key){	//generation of the rows
				echo("<tr>");
					echo("<td>".$i."</td>");
					$i++;	//Game number
						echo('<td><ol class="ui list">');	//list of the players waiting for a game in the specific room

						$user = $bdd->query('SELECT user.username FROM user WHERE user.fk_room ='.$fk_key['fk_room']);

						foreach($user as $userName){
							echo('<li>'.$userName['username'].'</li>');
						}
						echo('</ol></td>');

						echo('<td><form action="index.php?id='.$fk_key['fk_room'].'" method="GET" class="ui form"><button class="ui violet button" type="submit">Join Game</button></form></td>');
				
				echo("</tr>");
			}
				
			echo("</table></div>");
			}
		

?>