<?php 

include("Game.php");

if (isset($_GET["name"])) {
	$name = $_GET["name"];

	// opening data stored in memory
	$g = apcu_fetch("game0");

	

	$player = $g->addPlayer($name);

	echo(json_encode($player));

	// saving modifications
	apcu_store("game0", $g);
}

?>