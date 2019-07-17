/* put your event code here */

/*$(".panel").click(function() {
    $("#message").html("You clicked in the panel");
});*/

$(function () {
    $(".panel")
        .on("mousemove",function (e) {
           $("#message").html("x=" + e.pageX + " y=" + e.pageY);
        })
        .on("mouseleave",function (e) {
           $("#message").html("goodbye!");
        })
        .on("click",function () {
           $("#message").html("stopped move reporting");
           $(".panel").off("mousemove");
        });  
});