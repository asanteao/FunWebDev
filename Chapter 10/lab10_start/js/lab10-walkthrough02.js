/* try the different selection calls here */
var msg = $('#msgArea');
msg.val('here is some new text');

//$('#first').html("new title");

$('#msgArea').val("My class is " + $('#msgArea').attr('class'));

$('button').css('background', 'red');
console.log($("button").length);

var temp = $('body');
temp.css('background', 'ivory');

console.log($(".center-icons"));
$(".center-icons").addClass("selected");
console.log($(".center-icons"));
