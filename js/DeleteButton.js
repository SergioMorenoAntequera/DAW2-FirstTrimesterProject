
$('document').ready(function(){
    
    $('.btn-delete').click(function(e){
        e.preventDefault();
        if(!confirm("¿Seguro que quieres eliminar esta película?")){
            return false;
        }

        var box = $(this).parents('div');
        var form = $(this).parents('form');
        var url = form.attr('action');

        $.ajax({
            type: "DELETE",
            url: url,
            data: data,
            success: success,
            dataType: dataType
          });

        $.delete(url, form.serialize(), function(result){
            box.fadeOut();
        }).fail(function(){
            alert("No se ha podido eliminar la película");
        });
    });

});