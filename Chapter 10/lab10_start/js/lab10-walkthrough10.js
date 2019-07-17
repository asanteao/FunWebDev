$(function () {
	$('.animLoading').hide();
	$("#consume").click(function () {
		$(".animLoading").show();
		var url = "http://www.randyconnolly.com/funwebdev/services/travel/cities.php";
		$.get(url)
			.done(function (data) {
				$.each(data, function (index, value) {
					var li = $('<li/>').html(value.name);
					li.appendTo("div#results ul");
				});
			})
			.fail(function(xhr, status, error) {
				alert("failed loading data - status=" + status + " error=" + error);
			})
			.always(function (data) {
				$('.animLoading').fadeOut('slow');
			});
	});
});
