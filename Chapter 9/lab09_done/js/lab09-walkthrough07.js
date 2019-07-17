/* code goes here */

/* This function is going to get called every time the focus or blur events are triggered in one of our form’s input elements. */
function setBackground(e) {
    // here we use the style property instead of the classList property
    // because of specificity conflicts (i.e., attribute selectors
    // override class selectors)
    if (e.type == "focus") {
        e.target.style.backgroundColor = "#FFE393";
    }
    else if (e.type == "blur") {
        e.target.style.backgroundColor = "white";
    }

}

/* This assigns an anonymous function to the load event of the browser.  
*/
window.addEventListener("load", function(){
    
    // The function assigns the setBackground() to the blur and focus
    // events of the relevant <input> elements.    
    var cssSelector = "input[type=text],input[type=password]";
    var fields = document.querySelectorAll(cssSelector);
    for (i=0; i<fields.length; i++)
    {
        fields[i].addEventListener("focus", setBackground);
        fields[i].addEventListener("blur", setBackground);
    }
    
// depending on the state of the payment radio buttons
// change the options of the select list

var label = document.getElementById("payLabel");
var select = document.getElementById("payment");  
select.disabled = true;
var radios = document.querySelectorAll("input[name=region]");

// listen to each radio button
for (var i=0; i < radios.length; i++) {
    // for each button make suitable changes to select list
    // and to the label beside it
    radios[i].addEventListener("change", function (e) {

        select.disabled = false;
        select.innerHTML = "";
        addOption(select, "Select Payment Type" , "0");

        var choice = e.target.value;
        if (choice == "United States") {
            // display the dollar symbol
            label.classList.remove("fa-euro");
            label.classList.add("fa-dollar");

            addOption(select, "American Express" , "1");
            addOption(select, "Mastercard" , "2");
            addOption(select, "Visa" , "3");
        }
        else if (choice == "Europe") {
            // display the euro symbol
            label.classList.remove("fa-dollar");
            label.classList.add("fa-euro");

            addOption(select, "Bitcoin" , "4");
            addOption(select, "PayPal" , "5");               
        }
    });
}
    
    
    function addOption(select, optionText, optionValue) {
        var opt = document.createElement('option');
        opt.appendChild( document.createTextNode(optionText) );
        opt.value = optionValue;
        select.appendChild(opt);
    }
    
});

