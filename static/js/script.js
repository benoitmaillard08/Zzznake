$(function(){
	function update(){

	$.ajax({
		url: "load_room.php",
		dataType: "html",
	}).done(function(result){

	$('#container_id').html(result);

		console.log("Update success");

	}).fail(function(result){

		console.log("Ajax_error", result);

	});

}

setInterval(update, 1000); //update the state of the rooms every 0.5 seconds

});