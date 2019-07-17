/* put your DOM code here */

$(function () {
   
    var panel = $('.panel');
    
    var img = $('<img src="images/art/thumbs/13030.jpg" >');    
    //panel.prepend(img);
    
img.insertBefore(panel);      
    
});