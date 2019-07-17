$(function() {
    $('.animLoading').hide();
	$("#consume").click(function() {
        $('.animLoading').show();
		$.get("http://www.randyconnolly.com/funwebdev/services/travel/cities.php")
            .done(function(data) {
                console.log("done should be first");
                $.each(data, function(index,value) {

                    var li = $('<li/>').html(value.name);
                    li.appendTo("div#results ul");                
                });
		    })
            .fail(function(xhr,status,error) {
                console.log("fail will be before always");
                alert("failed loading data - status=" + status + " error=" + error);
            })
            .always(function(data) {
                $('.animLoading').fadeOut("slow");
                console.log("always should be last");
            });
	});
});