$(function() {
$("#consume").click(function() {
    var url = "http://www.randyconnolly.com/funwebdev/services/travel/cities.php";
    $("#results").html("<ul></ul>");
    $.get(url, function (data, status) {
        if (status == "success") {
/*                var list = "";
            for (var i=0; i < data.length; i++) {
                list += data[i].name + "<br>";
            }
            $("#results").html(list);*/

            $.each(data, function(index,value) {

                var li = $('<li/>').html(value.name);
                li.appendTo("div#results ul");                
            });                
        }
    });

});
});