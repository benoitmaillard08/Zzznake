<?php 
	//session_start();

	include('doctype.html');
 ?>

<div class="ui container">

	<form action="index.php" method="POST" class="ui form">
		<h1>Sign in</h1>


				<div class="six wide field">
					<label>Username : </label>
					<input type="text" name="username_login">
				</div>
			
			<div class="six wide field">
				<label>Password :</label>
				<input type="password" name="password_login">
			</div>

		<button class="ui button" type="submit">Login</button>
	</form>

	</div>

</div>

	<div class="ui container">
			<h1>Sign up</h1>
			
			<form action="user_add.php" method="POST" class="ui form">
				<div class="six wide field">
					<label>Lastname : </label>
					<input type="text" name="lastname">
				</div>

				<div class="six wide field">
					<label>Firstname : </label>
					<input type="text" name="firstname">
				</div>

				<div class="six wide field">
					<label>Email : </label>
					<input type="email" name="email">
				</div>

				<div class="six wide field">
					<label>Username : </label>
					<input type="text" name="username">
				</div>

				<div class="six wide field">
					<label>Password : </label>
					<input type="password" name="password">
				</div>
				

				<button class="ui button" type="submit">Register</button>
			</form>
	</div>

</body>
</html>