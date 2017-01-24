<?php

include("Game.php");

session_start();

// opening data stored in memory
if (isset($_GET["id"])) {
	// Get id of player sending the request
	$idPlayer = $_SESSION['key'];

	// ID of game session
	$sessionId = $_GET["id"];

	// opening data stored in memory
	$key = 'session#' . $sessionId;
	$session = apcu_fetch($key);

	echo(json_encode($session->update()));



	// player who made the request
	$player = $session->getPlayer($idPlayer);
	

	// in case the game is running
	if (isset($_GET["type"], $_GET["x"], $_GET["y"])) {
		if ($session->isRunning()) {
			$type = $_GET["type"];
			$posX = floatval($_GET["x"]);
			$posY = floatval($_GET["y"]);

			if ($type == "edit") {
				$player->editPoint($posX, $posY);
			}
			else if ($type == "new") {
				$player->newPoint($posX, $posY);
			}
		}
		else {
			echo("The game has not begun yet !");
		}
	}
	// in case players are getting ready
	else if (isset($_GET["ready"]) && $player) {
		if ($_GET["ready"] == "true") {
			$player->ready();
		}
	}

	$data = $session->update();

	

	// saving modifications
	apcu_store($key, $session);
}

?>