
$('#search').keyup(function(r){
    var text = $('#search').val();
    var elements = $('.element');

    elements.each(function(index){
        var name = $(this).find(".nameSearch").text();
        if(name.toLowerCase().includes(text.toLowerCase())) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
});
