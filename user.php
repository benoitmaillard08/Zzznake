<?php 
	session_start();

	include('doctype.html');
 ?>

<div id="content">
	<h1>Modify your account</h1>

	<form action="user_edit.php" method="POST" class="ui form">
		
			<div class="six wide field">
				<label>New lastname : </label>
				<input type="text" name="new_lastname">
			</div>

			<div class="six wide field">
				<label>New firstname : </label>
				<input type="text" name="new_firstname">
			</div>

			<div class="six wide field">
				<label>New email : </label>
				<input type="mail" name="new_email"> 
			</div>
		

		<input type="submit" value="Modify">
	</form>

</div>
</body>
</html>