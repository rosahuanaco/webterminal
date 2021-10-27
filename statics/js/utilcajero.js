$( document ).ready(function() {

    //Filtrar Reserva
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#reservas tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

    //CARGANDO MODAL
      $("#confirmarModal").on("show.bs.modal", function(e) {
        var link = $(e.relatedTarget);
        $(this).find(".modal-body").load(link.attr("href"));
      });            

      //Guardar venta 
      $('#btnVender').click(function(){
        guardarVenta();
      });            

});


function guardarVenta(){
  var form = $("#frmVenta");
      var url = form.attr('action');        
      $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            dataType : 'json',
            success: function(o)
            {
                if(o && o.exito==200){
                      window.location.href = $("#base_url").val()+'index.php/venta/';
                }else{
                      $("#mensaje").html(o.mensaje);                   
                }
            }
          });
}

function checkTiempoReporteVentasChange() {
  var t = $(this);
  if (t.prop("checked")) {
      $("#frmBuscar input[name='fecha_inicio']").datetimepicker({format: 'DD/MM/YYYY HH:mm'});
  } else {
      $("#frmBuscar input.date").datetimepicker("destroy").datepicker({
          dateFormat : "dd/mm/yy"
      }).each(function(o) {
          var v = $(this).val();
          v = v.split(" ");
          $(this).val(v[0]);
      });
  }
}

/*function cargarDetalleReserva(venta_id){
    var form = $(this);
        var url = $("#base_url").val()+"venta/obtenerDetalle";        
        $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(),
               dataType : 'json',
               success: function(o)
               {
                   if(o && o.exito==200){
                        
                   }else{
                        $("#mensaje").html(o.mensaje);                   
                   }
               }
             });
}*/
