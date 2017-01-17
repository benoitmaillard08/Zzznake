<?php 
	session_start();

	include('doctype.html');

	include('connect.php');

	$nbr_update = $bdd->prepare('UPDATE user SET lastname = :lastame, prenom = :firstname, email = :email WHERE lastname = :id');
	$nbr_update->execute(array(
		'lastname' => $_POST['new_lastname'],
		'firstname' => $_POST['new_firstname'],
		'email' => $_POST['new_email'],
		'id' => $_SESSION['lastname']
		));

	header('Location: room.php');
?>
</body>
</html>