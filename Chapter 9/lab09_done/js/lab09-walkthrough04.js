/* code goes here */

function simpleHandler(event) {
    var content = document.getElementById("content");
    if (btn.innerHTML == "Hide") {
        btn.innerHTML = "Show";
        content.className = "makeItDisappear";
        setTimeout(function(){
            content.style.display = "none";
        },1000);        
        
    }
    else {
        btn.innerHTML = "Hide";   
        content.style.display = "block";
         
        setTimeout(function(){
            content.className = "makeItNormal";
        },500); 
    }    
}

window.addEventListener("load", function() {
    var btn = document.getElementById("testButton");
    
    btn.addEventListener("click", function (e) {
        var content = document.getElementById("content");
        if (btn.innerHTML == "Hide") {
            btn.innerHTML = "Show";
            content.className = "makeItDisappear";
          setTimeout(function(){
                content.style.display = "none";
         },1500);      

        }
        else {
            btn.innerHTML = "Hide";   
            content.style.display = "block";

            setTimeout(function(){
                content.className = "makeItNormal";
            },500); 
        }    
    });

    var img = document.getElementById("mainImage");
    /* changes the style of the image when it is moused over */
    img.addEventListener("mouseover",function (event) {    
        img.className = "makeItGray";
    });

    /* remove the styling when mouse leaves image */
    img.addEventListener("mouseout",function (event) {   
        img.className = "makeItNormal";
    });    
    
});

