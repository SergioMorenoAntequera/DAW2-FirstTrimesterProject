
var search = document.getElementById("search");
var element = document.getElementsByClassName("movieDiv");
var forEach = Array.prototype.forEach;


$(search).keydown(function(e){
    letra = String.fromCharCode(e.which);

    var number = "<?php echo(sizeof(movies)) ?>";

    console.log(number);

});


/*
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
*/