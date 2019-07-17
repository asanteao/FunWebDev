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
    //select.disabled = true;
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
    
    document.getElementById("loginForm").addEventListener("submit", checkForEmptyFields); 
    
    
    function addOption(select, optionText, optionValue) {
        var opt = document.createElement('option');
        opt.appendChild( document.createTextNode(optionText) );
        opt.value = optionValue;
        select.appendChild(opt);
    }
    
    
    /* ensures form fields are not empty */
    function checkForEmptyFields(e) {
        // hide the error message element 
        var errorArea = document.getElementById("errors");
        errorArea.className = "hidden";

        var cssSelector = "input[type=text],input[type=password]";
        var fields = document.querySelectorAll(cssSelector);

        // loop thru the input elements looking for empty values
        var fieldList = [];
        for (i=0; i<fields.length; i++) {
            if (fields[i].value == null || fields[i].value == "") {
                // since a field is empty prevent the form submission
                e.preventDefault();
                fieldList.push(fields[i]);
            }
        }
        
        var select = document.getElementById("payment");  
        alert("selectedIndex=" + select.selectedIndex);
        if (select.value == 0) alert("zero");
        
        
        var rememberMe = document.getElementById("save");
        if (! rememberMe.checked) {
            alert("not checked");
        }
        
var radios = document.querySelectorAll("input[name=region]");
for (var i=0; i < radios.length; i++) {
    if (radios[i].checked) {
        alert(radios[i].value  + " was checked");    
    }
}
        
        
        // now set up the error message
        var msg = "The following fields can't be empty: ";
        if (fieldList.length > 0) {
            for (i=0; i<fieldList.length; i++) {
                msg += fieldList[i].id + ",";
            }
            errorArea.innerHTML = "<p>" + msg + "</p>";
            errorArea.className = "visible";
        }    
        else {
            e.submit();
        }
    }    
    
});





