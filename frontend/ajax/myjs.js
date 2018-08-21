/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 //Funcion de JQuery para poder abrir la ventana modal de edicion del usuario.
/*$(function (){
  $('#botonModal').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
      .load($(this).attr('value'));
  });
});*/


 function url(url){
  document.getElementById('urlNuevoUsu').value = url;
 }

function instancias()
{
    document.getElementById('p_instancia').style.display = 'block';
    document.getElementById('p_ami').style.display = 'none';
   
    
}
function ami()
{ 
    document.getElementById('p_instancia').style.display = 'none';
    document.getElementById('p_ami').style.display = 'block';
 
}
function llenar(id, tag_name, url)
{
  document.getElementById('idUsuarioElim').value = id;
  document.getElementById("nombPrograElim").innerHTML = tag_name;
  document.getElementById('urlActual2').value =url;
    //alert("El id es: " + id);
}
//Recibe la informacion del usuario y se la coloca a los input del formulario como values.
/*Con el dropDownList primero verifica a que grupo pertenece, remueve todos los items existentes dentro de el y vuelve a 
llenarse en el orden del array.
*/
var pass = "";
var form = "";

/*function peticion(grupo){
  $.ajax({
    type:'post',
    url : 'index.php?r=consultas%2Fcombo',
    data : {envio : grupo},
    dataType : 'string',
    success : function(respuesta){
      var i = 0;
      $.each(respuesta,function(index,value){
        var drop = document.getElementById('dropHtml');
        var option = document.createElement('option');
        drop.options.add(option, i)
        drop.options[i].value = index;
        drop.options[i].innerText = value;
        i++;
      });
    },
    error : function(respuesta){
      alert("No Funca");
      alert(this.url);
    },
  });
}*/

function idEditar(id, usuario, numero_colab, grupo, no_colab_admin, passwordUsuario, url)
{
  document.getElementById("idUsuario").value = id;
  document.getElementById("usuario").value = usuario;
  document.getElementById("numero_colaborador").value = numero_colab;
  var drop = document.getElementById("dropGrupos");
  var dropContra = document.getElementById('dropContra');
  document.getElementById("contraActual").value = passwordUsuario;
  document.getElementById("url").value = url;
  pass = passwordUsuario;
  form = document.getElementById("formEdit");

  if (numero_colab == no_colab_admin) {
    document.getElementById('checkbox').style.display = 'block';
  }else{
    document.getElementById('checkbox').style.display = 'none';
  }

  //this.peticion(grupo);


//Forma estatica del llenado del combo con los grupos para la edicion del usuario.

  /*if(grupo == 'Datacenter'){
    removeOptions(drop);
    var array = ["Datacenter", "Clubes", "Web wire", "Mobiles", "Peoplesoft"];
    for (var i = 0; i < array.length; i++) {
      var opcion = document.createElement("option");
      opcion.innerHTML = array[i];
      drop.appendChild(opcion);
    }
  }
  if(grupo == 'clubes-dev'){
    removeOptions(drop);
    var array = ["Clubes", "Web wire", "Mobiles", "Peoplesoft", "Datacenter"];
    for (var i = 0; i < array.length; i++) {
      var opcion = document.createElement("option");
      opcion.innerHTML = array[i];
      drop.appendChild(opcion);
    }
  }
  if(grupo == 'wire-dev'){
    removeOptions(drop);
    var array = ["Web wire", "Mobiles", "Peoplesoft", "Datacenter", "Clubes"];
    for (var i = 0; i < array.length; i++) {
      var opcion = document.createElement("option");
      opcion.innerHTML = array[i];
      drop.appendChild(opcion);
    }
  }
  if(grupo == 'mobile-dev'){
    removeOptions(drop);
    var array = ["Mobiles", "Peoplesoft", "Datacenter", "Clubes", "Web wire"];
    for (var i = 0; i < array.length; i++) {
      var opcion = document.createElement("option");
      opcion.innerHTML = array[i];
      drop.appendChild(opcion);
    }
  }
  if(grupo == 'ps-dev'){
    removeOptions(drop);
    var array = ["Peoplesoft", "Datacenter", "Clubes", "Web wire", "Mobiles"];
    for (var i = 0; i < array.length; i++) {
      var opcion = document.createElement("option");
      opcion.innerHTML = array[i];
      drop.appendChild(opcion);
    }
  }
  if(grupo == 'clubes-asp'){
    //alert(grupo);
    removeOptions(drop);
    var array = ["Clubes Aspirantes", "Datacenter", "Clubes", "Web wire", "Mobiles", "Peoplesoft"];
    for (var i = 0; i < array.length; i++) {
      var opcion = document.createElement("option");
      opcion.innerHTML = array[i];
      drop.appendChild(opcion);
    }
  }*/
}

function checkbox(contenido){
  var check = document.getElementById('check');
  var divContra = document.getElementById('frmContrasenia');
  var contrActual = document.getElementById("contraActual");
  if (check.checked == true) {
    divContra.style.display = 'block';
    contrActual.value = "";
  }else{
    divContra.style.display = 'none';
    location.reload();
  }
}

function cerrarCheck(){
  var check = document.getElementById('check');
  var divContra = document.getElementById('frmContrasenia');
  check.checked = false;
  divContra.style.display = 'none';
  document.getElementById('contraActual').value = "";
  document.getElementById('contraNueva').value = "";
}

function eliminar(id, username, url)
{
  document.getElementById("id").value = id;
  document.getElementById('usuarioElim').innerHTML = username;
  document.getElementById('uri').value = url;
  //alert("Id: " + id);
}

function detalles(id,nombre,last_ami,last_amirun,ip,ip_private,estado, grupo, url)
{
    
     document.getElementById('nombre').innerHTML =nombre;
     document.getElementById('instance').innerHTML =id;
     document.getElementById('ami1').innerHTML =last_ami;
     document.getElementById('ami2').innerHTML =last_amirun;
     document.getElementById('ip1').innerHTML =ip;
     document.getElementById('ip2').innerHTML =estado;
     document.getElementById('instancia').value =id;
     document.getElementById('url').value =url;
     var boton = document.getElementById('btn');
     var div_Boton = document.getElementById('boton');
     var filaBtn = document.getElementById('Encender/Apagar');
   if(estado=="running")
   {
      if(grupo == "Datacenter"){
        boton.className = 'btn btn-danger';
        boton.innerHTML = "Apagar";
        div_Boton.style.display = 'block';
      }else{
        filaBtn.style.display = 'none';
      }
      document.getElementById('action').value='STOP';
   }
   if(estado=="stopped")
   {
      boton.className = 'btn btn-success';
      boton.innerHTML = "Encender";
      div_Boton.style.display = 'block';
      document.getElementById('action').value='START';
   }
     
}

 function opciones(id)
 {
     document.getElementById('cv_instancia').value=id;
     document.getElementById('cv_instancia1').value=id;
 }

function editarInstanciasProgramadas(dia, horaEncender, horaApagar, status, id, tag_name, url){
  var dropdown = document.getElementById("dia");
  document.getElementById("horaEncender").value = horaEncender;
  document.getElementById("horaApagar").value = horaApagar;
  var dropStatus = document.getElementById("status");
  document.getElementById("id").value = id;
  document.getElementById("grupoNomb").innerHTML = tag_name;
  document.getElementById('urlActual').value =url;

  if(dia == 'Lunes'){
    removeOptions(dropdown);
    var array = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
    for (var i = 0; i < array.length; i++) {
      var opcion = document.createElement("option");
      opcion.innerHTML = array[i];
      dropdown.appendChild(opcion);
    }
  }
  if(dia == 'Martes'){
    removeOptions(dropdown);
    var array = ["Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo", "Lunes"];
    for (var i = 0; i < array.length; i++) {
      var opcion = document.createElement("option");
      opcion.innerHTML = array[i];
      dropdown.appendChild(opcion);
    }
  }
  if(dia == 'Miercoles'){
    removeOptions(dropdown);
    var array = ["Miercoles", "Jueves", "Viernes", "Sabado", "Domingo", "Lunes", "Martes"];
    for (var i = 0; i < array.length; i++) {
      var opcion = document.createElement("option");
      opcion.innerHTML = array[i];
      dropdown.appendChild(opcion);
    }
  }
  if(dia == 'Jueves'){
    removeOptions(dropdown);
    var array = ["Jueves", "Viernes", "Sabado", "Domingo", "Lunes", "Martes", "Miercoles"];
    for (var i = 0; i < array.length; i++) {
      var opcion = document.createElement("option");
      opcion.innerHTML = array[i];
      dropdown.appendChild(opcion);
    }
  }
  if(dia == 'Viernes'){
    removeOptions(dropdown);
    var array = ["Viernes", "Sabado", "Domingo", "Lunes", "Martes", "Miercoles", "Jueves"];
    for (var i = 0; i < array.length; i++) {
      var opcion = document.createElement("option");
      opcion.innerHTML = array[i];
      dropdown.appendChild(opcion);
    }
  }
  if(dia == 'Sabado'){
    removeOptions(dropdown);
    var array = ["Sabado", "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes"];
    for (var i = 0; i < array.length; i++) {
      var opcion = document.createElement("option");
      opcion.innerHTML = array[i];
      dropdown.appendChild(opcion);
    }
  }
  if(dia == 'Domingo'){
    removeOptions(dropdown);
    var array = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
    for (var i = 0; i < array.length; i++) {
      var opcion = document.createElement("option");
      opcion.innerHTML = array[i];
      dropdown.appendChild(opcion);
    }
  }


  if (status == "A"){
    removeOptions(dropStatus);
    var arrayStat = ["A", "X"];
    for (var e = 0; e < arrayStat.length; e++) {
      var opcion = document.createElement("option");
      opcion.innerHTML = arrayStat[e];
      dropStatus.appendChild(opcion);
    }
  }
  if (status == "X"){
    removeOptions(dropStatus);
    var arrayStat = ["X", "A"];
    for (var e = 0; e < arrayStat.length; e++) {
      var opcion = document.createElement("option");
      opcion.innerHTML = arrayStat[e];
      dropStatus.appendChild(opcion);
    }
  }
}

function restContra(id, username, url){
  document.getElementById('URL').value = url;
  document.getElementById('idRestabl').value = id;
  document.getElementById('usuarioNombre').innerHTML = username;
}

function EditarGrupo(id, grupo, descripcion){
  document.getElementById('id').value = id;
  document.getElementById('grupo').value = grupo;
  document.getElementById('descripcion').value = descripcion;
}

function EliminarGrupo(id, grupo, url){
  document.getElementById('idGrupo').value = id;
  document.getElementById('urlEl').value = url;
  document.getElementById('grupoElim').innerHTML = grupo;
}

function removeOptions(selectbox)
{
    var i;
    for(i = selectbox.options.length - 1 ; i >= 0 ; i--)
    {
        selectbox.remove(i);
    }
}