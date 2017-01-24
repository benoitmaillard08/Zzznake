<?php 
session_start();

include('connect.php');
include("Game.php");

if (isset($_GET['id'])) {
	$session_id = $_GET["id"];

	// opening data stored in memory
	$key = 'session#' . $session_id;
	$game = apcu_fetch($key);

	$name = $_SESSION['username'];
	$player_id = $_SESSION['key'];

	$player = $game->addPlayer($name, $player_id);
	echo(json_encode($player->getData()));

	// echo(json_encode($player->getData()));

	// saving modifications
	apcu_store($key, $game);

	$query = $bdd->prepare('UPDATE user SET user.fk_room = :roomNumber WHERE user.pk_user = :pk_user');
	$query->execute(array(
		'roomNumber' => $session_id,
		'pk_user' => $_SESSION['key']
	));
}

?>