<?php 

include("Game.php");

session_start();

if (isset($_GET['id'])) {
	$id = $_GET["id"];

	// opening data stored in memory
	$key = 'session#' . $id;
	$game = apcu_fetch($key);
	echo("---");
	echo(json_encode(apcu_fetch($key)->update()));
	echo("---");

	$name = $_SESSION['username'];
	$id = $_SESSION['key'];

	$player = $game->addPlayer($name, $id);

	// echo(json_encode($player->getData()));

	// saving modifications
	apcu_store($key, $game);
}

?>