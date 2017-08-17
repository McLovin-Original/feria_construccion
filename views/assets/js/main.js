var btnmenu = document.getElementById('btnmenu');
var sidenav = document.getElementById('sidenav');
var contentwelcome = document.getElementById('contentwelcome');
var btnmenures = document.getElementById('btnmenures');

function abrir(){
  sidenav.classList.add("abrirmenu")
  sidenav.classList.remove("cerrarmenu")
  btnmenures.setAttribute("onclick","cerrar()")
}

function cerrar(){
  sidenav.classList.remove("abrirmenu")
  sidenav.classList.add("cerrarmenu")
  btnmenures.setAttribute("onclick","abrir()")
}


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

$("#reg_sex").focus(function(){
    $("#reg_email").siblings("span").remove();
    var data = $("#reg_email").val();
    if (data.length > 0) {
        $.post("validar-email",{data:data},function(response){
            var response = JSON.parse(response);
            if (response == true) {
              $("#reg_email").after("<span>El Correo Ya Existe</span>")
              $("#btn_reg").attr("disabled",true);
            } else {
              $("#btn_reg").attr("disabled",false);
            }
        });
    }
});


$("#reg_email").focus(function(){
   $(this).siblings("span").remove();
   $("#btn_reg").attr("disabled",false);
});

$("#reg_email").focus(function(){
  $("#reg_doc").siblings("span").remove();
  var data = $("#reg_doc").val();
  if (data.length > 0) {
    $.post("validar-documento",{data:data},function(response){
      var response = JSON.parse(response);
      if (response[0] == true) {
        $("#reg_doc").after("<span>El Documento Ya Existe</span>")
        $("#btn_reg").attr("disabled",true);
      } else {
        $("#btn_reg").attr("disabled",false);
      }
    });
  }
});


$("#reg_doc").focus(function(){
  $(this).siblings("span").remove();
  $("#btn_reg").attr("disabled",false);
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

$("#frm_con").submit(function(e){
  e.preventDefault();
  var jsonObj=[];
  $("#frm_con input,#sel_dia,#con_user,#frm_con textarea").each(function(){
    var structure = {};
    structure = $(this).val();
    jsonObj.push(structure);
  });
  $.post("crear-conferencia",{data:jsonObj},function(data){
    var data = JSON.parse(data);
    if (data[0]==true) {
      alert(data[1]);
      document.location.href=data[2];
    }else{
      alert(data[1]);
    }
  });
});

$("#sel_evento").change(function(){
  var evento = $(this).val();
  $.post("con-eventos",{data:evento},function(data){
    $("#sel_dia").html(data);
  });
});

$("#frm_pav").submit(function(e){
  e.preventDefault();
  if ($(this).parsley().isValid()) {
    var data = [$("#nam_pav").val(),
                $("#sel_dia_p").val()];
    $.post("crear-pabellon",{data:data},function(data){
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

$("#frm_sta").submit(function(e){
  e.preventDefault();
  if ($(this).parsley().isValid()) {
    var jsonObj=[];
    $("#frm_sta select,#frm_sta input,#frm_sta textarea").each(function(){
      var structure = {};
      structure = $(this).val();
      jsonObj.push(structure);
    });
    $.post("crear-stand",{data:jsonObj},function(data){
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

$("#frm_con_u").submit(function(e){
  e.preventDefault();
  if ($(this).parsley().isValid()) {
    var jsonObj=[];
    $("#frm_con_u select,#frm_con_u input,#frm_con_u textarea").each(function(){
      var structure = {};
      structure = $(this).val();
      jsonObj.push(structure);
    });
    console.log(jsonObj);
    $.post("update-conference",{data:jsonObj},function(data){
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

$("#frm_pav_u").submit(function(e){
  e.preventDefault();
  if ($(this).parsley().isValid()) {
    var jsonObj=[];
    $("#frm_pav_u select,#frm_pav_u input").each(function(){
      var structure = {};
      structure = $(this).val();
      jsonObj.push(structure);
    });
    console.log(jsonObj);
    $.post("update-pavilion",{data:jsonObj},function(data){
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

$("#frm_sta_u").submit(function(e){
  e.preventDefault();
  if ($(this).parsley().isValid()) {
    var jsonObj=[];
    $("#frm_sta_u select,#frm_sta_u input,#frm_sta_u textarea").each(function(){
      var structure = {};
      structure = $(this).val();
      jsonObj.push(structure);
    });
    console.log(jsonObj);
    $.post("update-stands",{data:jsonObj},function(data){
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

$("#sel_evento_p").change(function(){
  var evento = $(this).val();
  $.post("con-pabellon",{data:evento},function(data){
    $("#sel_dia_p").html(data);
  });
});

$("#document").keyup(function(){
  $(this).siblings("span").remove();
  $("#inputdoc").remove();
  var doc = $(this).val();
  console.log(doc);
  $.post("validar-documento",{data:doc},function(data){
    var data = JSON.parse(data);
    if (data[0]==true) {
      $("#document").after("<input id='inputdoc' type='hidden' name='data' value='"+data[1]+"'>");
      $("#btn_doc").attr("disabled",false);
    }else{
      $("#document").after("<span>El documente no existe</span>");
      $("#btn_doc").attr("disabled",true);
    }
  });
});

$("#frm_stand_visit").submit(function(e){
  e.preventDefault();
  if ($(this).parsley().isValid()) {
    var jsonObj=[];
    $("input[name=data]").each(function(){
      var structure = {};
      structure = $(this).val();
      jsonObj.push(structure);
    });
    console.log(jsonObj);
    $.post("crear-visita",{data:jsonObj},function(data){
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
$("#frm_conf_visit").submit(function(e){
  e.preventDefault();
  if ($(this).parsley().isValid()) {
    var jsonObj=[];
    $("input[name=data]").each(function(){
      var structure = {};
      structure = $(this).val();
      jsonObj.push(structure);
    });
    console.log(jsonObj);
    $.post("crear-visitc",{data:jsonObj},function(data){
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

function estado(id,val){
    var estado = [id,val];
  $.post("update-user-status",{data:estado},function(data){
    var data = JSON.parse(data);
    if (data[0]==true) {
      alert(data[1]);
      document.location.href=data[2];
    }else{
      alert(data[1]);
    }
  });
}
