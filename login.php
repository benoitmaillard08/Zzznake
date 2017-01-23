<?php 
	//session_start();

	include('doctype.html');
 ?>
<div class="ui raised padded text container segment">
	<div class="ui two column middle aligned very relaxed stackable grid">

		<div class="column">
			<form action="index.php" method="POST" class="ui form in">
				<h1><i class="sign in green icon"></i> Sign in</h1>


						<div class="field">
							<label>Username : </label>
							<div class="ui left icon input">
								<input type="text" placeholder="Username" name="username_login">
								<i class="user icon"></i>
							</div>
						</div>
					
					<div class="field">
						<label>Password :</label>
						<div class="ui left icon input">
							<input type="password" placeholder="Password" name="password_login">
							<i class="lock icon"></i>
						</div>
					</div>

				<button class="ui green button" type="submit">Login</button>
			</form>
		</div>

		<div class="column">
			<h1><i class="add blue user icon"></i> Sign up</h1>
			
			<form action="user_add.php" method="POST" class="ui form up">
				<div class="two fields">
					<div class="field">
						<label>Lastname : </label>
						<input type="text" placeholder="Lastname" name="lastname">
					</div>

					<div class="field">
						<label>Firstname : </label>
						<input type="text" placeholder="Firstname" name="firstname">
					</div>
				</div>

				<div class="field">
					<label>Email : </label>
					<input type="email" placeholder="Email" name="email">
				</div>

				<div class="field">
					<label>Username : </label>
					<input type="text" placeholder="Username" name="username">
				</div>
				
				<div class="two fields">
					<div class="field">
						<label>Password : </label>
						<input type="password" placeholder="Password" name="password1">
					</div>

					<div class="field">
						<label>Confirm password : </label>
						<input type="password" placeholder="Confirm password" name="password2">
					</div>
				</div>
				

				<button class="ui blue button" type="submit">Register</button>
			</form>
		</div>
	</div>
</div>

</body>
</html>