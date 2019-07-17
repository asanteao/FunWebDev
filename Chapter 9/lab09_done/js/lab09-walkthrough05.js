
// this variable has global scope
var boxClass = 'movingDiv';

function outputBox(num) {
   var box = "<div class='" + boxClass + "' id='div" + num + "'>";
   box += "This is div " + num;
   box += "</div>";
   return box;
}

/* your code goes here */

window.addEventListener("load", function(){
//    var divToGet = document.getElementById("div1");
//    alert(divToGet.innerHTML);
    
    var divs = document.querySelectorAll(".movingDiv");
    for (i=0; i<divs.length; i++)
    {
        divs[i].addEventListener("mouseover", function (e) {
            alert("triggered by " + e.target.id);
        });
    }
});
