<?php 
	session_start();

	include('doctype.html');
 ?>

<?php
	include('connect.php');
	//après que l'utilisateur ait entré ses coordonnées, il faut insérer les données dans la base de donnée

	//il faut connaître le nombre d'utilisateur pour la valeur de la pk utilisateur
	$pk_user = $bdd->query('SELECT COUNT(*) FROM user')->fetchColumn();
	$pk_user += 1;

	$req = $bdd->prepare('INSERT INTO user VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
	//On insüre les valeurs dans la base de donnée
	$req->execute(array($pk_user, $_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['username'], $_POST['password'], 0, 0, NULL)) or die(print_r($req->errorInfo(), true));
	
	header('Location: index.php'); 

 ?>
</body>
</html>
