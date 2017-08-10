var btnmenu = document.getElementById('btnmenu');
var sidenav = document.getElementById('sidenav');
var contentwelcome = document.getElementById('contentwelcome');

// button.onmouseover = function()
// element.classList.add("otherclass");

// DATATABLE
$.extend( true, $.fn.dataTable.defaults, {
   "ordering": true,
   "lengthChange": false,
   "info": false
});


$('#dataTable').DataTable({
   "language": {
       "responsive" : true,
       "search" : "Buscar",
       "zeroRecords": "No se encontró ningún resultado",
       "paginate" : {
           "first" : "<i class='fa fa-chevron-left' aria-hidden='true'></i>",
           "last" : "<i class='fa fa-chevron-right' aria-hidden='true'></i>",
           "next" : "<i class='fa fa-chevron-right' aria-hidden='true'></i>",
           "previous" : "<i class='fa fa-chevron-left' aria-hidden='true'></i>"
       }
   }
});

$("#pas_log").focus(function(){
    $("#ema_log").siblings("span").remove();
    var data = $("#ema_log").val();
    if (data.length > 0) {
        $.post("validar-email",{data:data},function(response){
            var response = JSON.parse(response);
            if (response == false) {
              $("#ema_log").after("<span>El Correo No Existe</span>")
              $("#btn_log").attr("disabled",true);
            } else {
              $("#btn_log").attr("disabled",false);
            }
        });
    }
});


$("#ema_log").focus(function(){
   $(this).siblings("span").remove();
   $("#btn_log").attr("disabled",false);
});

$("#frm_log").submit(function(e){
  e.preventDefault();
  var data = [$("#ema_log").val(),
              $("#pas_log").val()];
  $.post("iniciar",{data:data},function(data){
    var data = JSON.parse(data);
    if (data[0]==true) {
      document.location.href=data[1];
    }else{
      alert(data[1]);
    }
  });
});

$("#frm_eve").submit(function(e){
  e.preventDefault();
  if ($(this).parsley().isValid()) {
    var jsonObj=[];
    $("input[name=data]").each(function(){
      var structure = {};
      structure = $(this).val();
      jsonObj.push(structure);
    });
    $.post("crear-evento",{data:jsonObj},function(data){
      var data = JSON.parse(data);
      if (data[0]==true) {
        alert(data[1]);
        document.location.href=data[2];
      }else{
        alert(data[1]);
      }
    });
  }
});

$("#frm_reg").submit(function(e){
  e.preventDefault();
    var jsonObj=[];
    $("#frm_reg input,#frm_reg select").each(function(){
      var structure = {};
      structure = $(this).val();
      jsonObj.push(structure);
    });
    //console.log(jsonObj);
    $.post("crear-usuario",{data:jsonObj},function(data){
      var data = JSON.parse(data);
      if (data[0]==true) {
        alert(data[1]);
        document.location.href=data[2];
      }else{
        alert(data[1]);
      }
    });
});
