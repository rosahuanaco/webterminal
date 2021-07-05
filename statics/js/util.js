$( document ).ready(function() {

    $(document).on("click", ".deletePublicacion", function(){
        if(confirm("Estas seguro de eliminar la publicacion seleccionada?")){
            eliminar($(this).attr("data-id"),this);
        }            
    });

    $(document).on("click", ".deleteFlota", function(){
        if(confirm("Estas seguro de eliminar la Flota seleccionada?")){
            eliminarFlota($(this).attr("data-id"),this);
        }            
    });

    $("#frmpublicacion").submit(function(e) {   
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');        
        $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(),
               dataType : 'json',
               success: function(o)
               {
                   if(o && o.exito==200){
                        window.location.href = './';
                   }else{
                        $("#mensaje").html(o.mensaje);                   
                   }
               }
             });        
    });

    $("#frmpublicacioneditar").submit(function(e) {   
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');        
        $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(),
               dataType : 'json',
               success: function(o)
               {
                   if(o && o.exito==200){
                        window.location.href = '../';
                   }else{
                        $("#mensaje").html(o.mensaje);                   
                   }
               }
             });        
    });

    $("#frmflota").submit(function(e) {   
          
        var form = $(this);
        var url = form.attr('action');        
        $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(),
               dataType : 'json',
               success: function(o)
               {
                   if(o && o.exito==200){
                        window.location.href = './';
                   }else{
                        $("#mensaje").html(o.mensaje);                   
                   }
               }
             });
        e.preventDefault();
    });

    $("#frmflotaeditar").submit(function(e) {   
          
        var form = $(this);
        var url = form.attr('action');        
        $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(),
               dataType : 'json',
               success: function(o)
               {
                   if(o && o.exito==200){
                        window.location.href = '../';
                   }else{
                        $("#mensaje").html(o.mensaje);                   
                   }
               }
             });
        e.preventDefault();
    });frmflotaeditar

    
});

function eliminar(idPublicacion,element){
    $.ajax({
        url : 'publicacion/eliminar',
        data : { id : idPublicacion },
        type : 'POST',
        dataType : 'json',
        success : function(json) {
            if(json && json.exito==200){
                $(element).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            }           
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
        complete : function(xhr, status) {
            
        }
    });   
}

function eliminarFlota(idFlota,element){
    $.ajax({
        url : 'flota/eliminar',
        data : { id : idFlota },
        type : 'POST',
        dataType : 'json',
        success : function(json) {
            if(json && json.exito==200){
                $(element).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            }
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
        complete : function(xhr, status) {
            
        }
    });   
}