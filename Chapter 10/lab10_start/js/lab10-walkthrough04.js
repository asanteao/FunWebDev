/* put your event code here */
$(function () {
	//Chaining handlers
	$(".panel").on("mouseover", function (e) {
		$('#message').html("x=" + e.pageX + " y=" + e.pageY);
	})
	.on("mouseleave", function (e) {
		$('#message').html('goodbye');
	})
	.on("click", function () {   
		$("#message").html("You clicked in the panel");
	});
});
