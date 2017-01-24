	<?php 
		session_start();

		include('doctype.html');
	    include('connect.php');
	?>
	<div class="ui raised padded container segment">

		<div class="ui text container">
		
			<div class="ui one column grid">
				<div class="column">
					<div class="right floated content">
						<h2 class="ui header">Michel &nbsp;
						<a class="ui red tag label">Not ready</a></h2>
					</div>
				</div>
				
			</div>

			<div class="ui one column grid">
				<div class="column">
					<div class="right floated content">
						<h2 class="ui header">Michel &nbsp;
						<a class="ui green tag label">Ready</a></h2>
					</div>	
				</div>
			</div>

			<div class="ui one column grid">
				<div class="column">
					<div class="right floated content">
						<h2 class="ui header">Michel &nbsp;
						<a class="ui red tag label">Not ready</a></h2>
					</div>
				</div>
			</div>

			<div class="ui one column grid">
				<div class="column">
					<div class="right floated content">
						<h2 class="ui header">Michel &nbsp;
						<a class="ui green tag label">Ready</a></h2>
					</div>	
				</div>
			</div>
		</div>
	</div>

	<?php 
		include('footer.php');
	 ?>

</body>
</html>