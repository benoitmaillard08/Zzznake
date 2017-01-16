<?php

include("Game.php");

// opening data stored in memory
if (isset($_GET["id"], $_GET["type"], $_GET["x"], $_GET["y"])) {
	$idPlayer = $_GET["id"];
	$type = $_GET["type"];
	$posX = intval($_GET["x"]);
	$posY = intval($_GET["y"]);

	// opening data stored in memory
	$session = apcu_fetch("game0");

	// player who made the request
	$player = $session->getPlayer($idPlayer);

	if ($type == "edit") {
		$player->editPoint($posX, $posY);
	}
	else if ($type == "new") {
		$player->newPoint($posX, $posY);
	}

	$data = $session->getLastPositions();

	echo(json_encode($data));

	// saving modifications
	apcu_store("game0", $session);
}

?>