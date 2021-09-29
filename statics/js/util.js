$( document ).ready(function() {

    $(document).on("click", ".deleteUsuario", function(){
        if(confirm("Estas seguro de eliminar el Usuario seleccionado?")){
            eliminarUsuario($(this).attr("data-id"),this);
        }            
    });       

    

    $("#frmusuario").submit(function(e) {   
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
                        window.location.href = $("#base_url").val()+'index.php/usuario/';
                   }else{
                        $("#mensaje").html(o.mensaje);                   
                   }
               }
             });        
    });

    $("#frmusuarioeditar").submit(function(e) {   
          
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
                        window.location.href = $("#base_url").val()+'index.php/usuario/';
                   }else{
                        $("#mensaje").html(o.mensaje);                   
                   }
               }
             });
        e.preventDefault();
    });
     

    agregarCrudChofer();
    agregarCrudBus();
    agregarCrudViajes();

    
});

function agregarCrudChofer(){
    $(document).on("click", ".deleteChofer", function(){
        if(confirm("Estas seguro de eliminar la fila seleccionada?")){
            eliminarChofer($(this).attr("data-id"),this);
        }            
    });

    $("#frmchofer").submit(function(e) {   
          
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
                        window.location.href = $("#base_url").val()+'index.php/chofer/';
                   }else{
                        $("#mensaje").html(o.mensaje);                   
                   }
               }
             });
        e.preventDefault();
    });

    $("#frmchofereditar").submit(function(e) {   
          
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
                    window.location.href = $("#base_url").val()+'index.php/chofer/';
                   }else{
                        $("#mensaje").html(o.mensaje);                   
                   }
               }
             });
        e.preventDefault();
    });
}

function agregarCrudBus(){
    $("#frmbus").submit(function(e) {   
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
                        window.location.href = $("#base_url").val()+'index.php/bus/';
                   }else{
                        $("#mensaje").html(o.mensaje);                   
                   }
               }
             });
        
    });

    $("#frmbuseditar").submit(function(e) {   
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
                        window.location.href = $("#base_url").val()+'index.php/bus/';
                   }else{
                        $("#mensaje").html(o.mensaje);                   
                   }
               }
             });
    });

    $(document).on("click", ".deleteBus", function(){
        cambiarEstadoBus($(this).attr("data-id"),this);          
    });    
    agregarAsientos();
}

function agregarCrudViajes(){
    $("#frmviaje").submit(function(e) {   
        e.preventDefault();
        if(!($('#origen option').filter(':selected').val()==$('#destino option').filter(':selected').val())){
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
        }else{
            $("#origen-error").removeClass("d-none");
        }
                
    });

    $("#frmviajeeditar").submit(function(e) {   
        e.preventDefault();
        if(!($('#origen option').filter(':selected').val()==$('#destino option').filter(':selected').val())){
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
        }  else{
            $("#origen-error").removeClass("d-none");
        }    
    });  

    $(document).on("click", ".deleteViaje", function(){
        //if(confirm("Estas seguro de eliminar la publicacion seleccionada?")){
            //eliminar($(this).attr("data-id"),this);
            cambiarEstadoViaje($(this).attr("data-id"),this);
        //}            
    }); 
}

function eliminarUsuario(idUsuario,element){
    $.ajax({
        url : $("#base_url").val()+'index.php/usuario/eliminar',
        data : { id : idUsuario },
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

function eliminarChofer(idChofer,element){
    $.ajax({
        url : $("#base_url").val()+'index.php/chofer/eliminar',
        data : { id : idChofer },
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

function cambiarEstadoViaje(idViaje,element){
    $.ajax({
        url : $("#base_url").val()+'index.php/viaje/cambiarEstado',
        data : { id : idViaje },
        type : 'POST',
        dataType : 'json',
        success : function(json) {
            if(json && json.exito==200){
                $(element).parents("tr").children(".estado").html(json.estado);
                if(json.estado=='Inactivo'){                  
                    $(element).parents("tr").addClass("inactivo");
                    $(element).parents("td").children(".activar").removeClass("d-none");
                    $(element).parents("td").children(".activar").addClass("d-block");
                    $(element).parents("td").children(".desactivar").removeClass("d-block");                
                    $(element).parents("td").children(".desactivar").addClass("d-none");                
                }else{
                    $(element).parents("tr").removeClass("inactivo");
                    $(element).parents("td").children(".activar").removeClass("d-block");
                    $(element).parents("td").children(".activar").addClass("d-none");
                    $(element).parents("td").children(".desactivar").removeClass("d-none");                
                    $(element).parents("td").children(".desactivar").addClass("d-block"); 
                }
            
            }
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
        complete : function(xhr, status) {
            
        }
    });  
}

function cambiarEstadoBus(idBus,element){
    $.ajax({
        url : $("#base_url").val()+'index.php/bus/cambiarEstado',
        data : { id : idBus },
        type : 'POST',
        dataType : 'json',
        success : function(json) {
            if(json && json.exito==200){
                $(element).parents("tr").children(".estado").html(json.estado);
                if(json.estado=='Inactivo'){                  
                    $(element).parents("tr").addClass("inactivo");
                    $(element).parents("td").children(".activar").removeClass("d-none");
                    $(element).parents("td").children(".activar").addClass("d-block");
                    $(element).parents("td").children(".desactivar").removeClass("d-block");                
                    $(element).parents("td").children(".desactivar").addClass("d-none");                
                }else{
                    $(element).parents("tr").removeClass("inactivo");
                    $(element).parents("td").children(".activar").removeClass("d-block");
                    $(element).parents("td").children(".activar").addClass("d-none");
                    $(element).parents("td").children(".desactivar").removeClass("d-none");                
                    $(element).parents("td").children(".desactivar").addClass("d-block"); 
                    //$(".add-new").removeAttr("disabled");
                }
            
            }
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
        complete : function(xhr, status) {
            
        }
    });  
}

var eliminados = {};
var columnas;
var numeroInicial=1;
function agregarAsientos(){
    $("#pisos").change(function(){
        if($(this).val()==2){
             $("#inputPiso2").css('visibility','visible');
        }else{
            $("#filas2").val("");
            $("#inputPiso2").css('visibility','collapse');
        }
    });
    $('#frmbus #btnGenerar').on("click",function(e){
        e.preventDefault();
        inicializarAsientos();
        agregarEventoAsiento();
               
    });

    $('#frmbuseditar #btnGenerar').on("click",function(e){
        e.preventDefault();
        inicializarAsientos();
        agregarEventoAsiento();
        /*var filas = $("#filas").val();    
        var columnas = $('#columnas option').filter(':selected').val();
        if(filas>0 && columnas>0){
            generarAsiento(1,filas);
        } 
        ///PISO 2
        var filas2 = $("#filas2").val();    
        if(filas2>0 && columnas>0){
            generarAsiento(2,filas2);
        }else{
            $("#piso2 tbody tr").remove();
        }*/
    });
}
function agregarEventoAsiento(){    
    var filas = $("#filas").val();    
    var filas2 = $("#filas2").val();
    columnas = $('#columnas option').filter(':selected').val();
    piso = $('#pisos option').filter(':selected').val();
    if(piso==2){
        ///PISO 2                    
        if(filas2>0  && columnas>0){
            generarAsiento(2,filas2);
        }else{
            $("#piso2 tbody tr").remove();
        }

        if(filas>0 && columnas>0){
            generarAsiento(1,filas);
        }

    }else{
        if(filas>0 && columnas>0){
            generarAsiento(1,filas);
        }
    }
}
function inicializarAsientos(){
    numeroInicial = 1;
    eliminados = {};
    $("#piso1 tbody").empty();
    $("#piso2 tbody").empty();
}
//GENERAR ASIENTO
function generarAsiento(piso, filas){
    var asientos = "";
    //var numeroInicialBackup = numeroInicial;
    $("#piso"+piso+" thead tr th").attr('colspan',columnas+1);
    for(var i=0;i<filas;i++){
        asientos = asientos+"<tr>";
        for(var j=0;j<=columnas;j++){
            if(typeof eliminados[""+i+j+numeroInicial] === 'undefined'){
                var n = "<input name='numero[]' type='hidden' value='"+numeroInicial+"'>";
                var f = "<input name='fila[]' type='hidden' value='"+i+"'>";
                var c = "<input name='columna[]' type='hidden' value='"+j+"'>";
                var p = "<input name='piso[]' type='hidden' value='"+piso+"'>";
                asientos = asientos+"<td class='asiento' attr-id='"+i+j+numeroInicial+"'>"+numeroInicial+n+f+c+p+"</td>"
                numeroInicial++;
            }else{
                asientos = asientos+"<td class='pasillo'></td>"
            }
                        
            if(j==1){
                asientos = asientos+"<td class='pasillo'></td>"
                j++;
            }            
        }
        asientos = asientos+"</tr>";
    }
    $("#piso"+piso+" tbody").html(asientos);

    $("#piso"+piso+" tbody tr td.asiento").dblclick(function(){
        var identificador = $(this).attr("attr-id");
        eliminados[""+identificador] = identificador;
        numeroInicial = 1
        agregarEventoAsiento();
    });

}