<?php 

include('connect.php');
include("Game.php");

// clearing cache
$sessions = apcu_fetch("sessions");

if ($sessions) {
	// next id -> last id + 1
	$new_id = $sessions[count($sessions) - 1] + 1;
}
else {
	// in case there is no other current sessions, next id is 0
	$sessions = array();
	apcu_add("sessions", $sessions);
	$new_id = 0;
}


array_push($sessions, $new_id);
apcu_store("sessions", $sessions);

$game_session = new Game($new_id, 'game#' . $new_id);

// new session is stores at key "game-id" in apcu cache

$key = 'session#' . $new_id;

apcu_add($key, $game_session);
echo(json_encode(apcu_fetch($key)->update()));

$query = $bdd->prepare('INSERT INTO room (pk_room, playing) VALUES (:pk_room, :playing)');
$query->execute(array(
	'pk_room' => $new_id,
	'playing' => 0
));

header('Location: ' . 'game-session.php?id=' . $new_id);

?>