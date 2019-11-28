

var search = document.getElementById("search"),
element = document.getElementsByTagName("span"),
forEach = Array.prototype.forEach;

search.addEventListener("keyup", function(e){
    var choice = search.value;
    forEach.call(element, function(f){
        elementName = f.innerHTML;
        if (elementName.toLowerCase().search(choice.toLowerCase()) == -1){
            f.parentNode.parentNode.style.display = "none";   
        } else {
            f.parentNode.parentNode.style.display = "block";
        }
    });
}, false);