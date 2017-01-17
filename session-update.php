<?php

include("Game.php");

// opening data stored in memory
if (isset($_GET["id"])) {
	$idPlayer = $_GET["id"];

	// opening data stored in memory
	$session = apcu_fetch("game0");

	// player who made the request
	$player = $session->getPlayer($idPlayer);

	// in case the game is running
	if (isset($_GET["type"], $_GET["x"], $_GET["y"])) {
		if ($session->isRunning()) {
			$type = $_GET["type"];
			$posX = intval($_GET["x"]);
			$posY = intval($_GET["y"]);

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
	else if (isset($_GET["ready"])) {
		if ($_GET["ready"] == "true") {
			$player->ready();
		}
	}

	$data = $session->update();

	echo(json_encode($data));

	// saving modifications
	apcu_store("game0", $session);
}

?>