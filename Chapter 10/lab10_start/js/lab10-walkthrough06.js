/* put your animation code here */

$(function () {
	$('#btnFadeIn').click(function () {
		$('figure').fadeIn(1000);
	});
	
	$('#btnFadeOut').click(function () {
		$('figure').fadeOut(1000);
	});
	
	$('#btnFade').click(function () {
		$('figure').fadeToggle(1000);
	});

	$('#btnSlideDown').click(function () {
		$('figure').slideDown(1000);
	});
	$('#btnSlideUp').click(function () {
		$('figure').slideUp(1000);
	});
	$('#btnSlide').click(function () {
		$('figure').slideToggle(1000);
	});
	
});
