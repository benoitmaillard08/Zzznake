<?php 
session_start();

include('connect.php');
include("Game.php");

if (isset($_GET['id'])) {
	$session_id = $_GET["id"];
	$name = $_SESSION['username'];
	$player_id = $_SESSION['key'];

	// opening data stored in memory
	$key = 'session#' . $session_id;
	$session = apcu_fetch($key);

	var_dump($session->checkPlayer($player_id));

	// echo(json_encode($player->getData()));

	// saving modifications
	apcu_store($key, $session);
}

?>