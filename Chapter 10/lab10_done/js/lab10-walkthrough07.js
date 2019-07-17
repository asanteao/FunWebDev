/* put your animation code here */

$(function () {
    
    $("figure img").on("mouseleave",  removePreview);        
    $("figure img").on("mousemove", movePreview);      
   
    $('figure img').on('mouseover', function (e) {
        
        // construct preview filename based on existing img
        var alt = $(this).attr('alt');
        var src = $(this).attr('src');        
        var newsrc = src.replace("small","medium");
        
        // make dynamic element with larger preview image and caption
        var preview = $('<div id="preview"></div>');
        var image = $('<img src="' + newsrc + '">');
        var caption = $('<p>' + alt + '</p>');
        preview.append(image);
        preview.append(caption);
        $('body').append(preview);
        
        // make small image gray
        $(this).addClass("gray");

        // and then fade preview in
        $("#preview").fadeIn(1000);  
        
    });
    
    function removePreview() {
        $(this).removeClass("gray");
        $("#preview").remove();
    }  

    function movePreview(e) {
        // position preview based on mouse coordinates
        $("#preview")
            .css("top", (e.pageY - 10) + "px")
            .css("left", (e.pageX + 30) + "px");                          
    }    
    
});