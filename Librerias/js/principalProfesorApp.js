/*Script para detectar eventos que suceden en la pagina principal del profesor*/
$(document).ready(function() {



    actualizarLista();
    contadores();
    var idElimSeleccionado;

insertarModal(); 

    function insertarModal(){

         templateModal = `
<div class="modal fade" id="confirmarEliminarCuestionario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de eliminar el cuestionario?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Elige una opción
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        <button type="button" class="btn btn-primary" id="elimCuestionario" data-dismiss="modal"> Confirmar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="confirmarEliminarCuestionario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de eliminar el cuestionario?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Elige una opción
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        <button type="button" class="btn btn-primary" id="elimCuestionario" data-dismiss="modal"> Confirmar</button>
      </div>
    </div>
  </div>
</div>`;

  document.getElementById('modalAlerta').innerHTML=templateModal;
    }
  function contadores(){
        $.ajax({
            url: 'Modelo/principalProfesorModelContadores.php',
            type: 'GET',
            success: function(response) {
                console.log(response);
                const task=JSON.parse(response);
               document.getElementById('tc').innerHTML="Cuestionarios: "+task[1].cantCues;
               document.getElementById('tr').innerHTML="Reportes: "+task[0].cantRepor;
              
            }
        });
    
  }


    /*Function que actualiza la lista de cuestionarios en la pagina principal del profesor*/
    function actualizarLista() {
        $.ajax({
            url: 'Modelo/principalProfesorModelConsultarCuestionarios.php',
            type: 'GET',
            success: function(response) {
                console.log(response);
                let tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(task => {
                    template += `
<div class="row">
<div class="col-sm-2">
<img class="img-thumbnail" src="/PROYECTO/${task.rutaImagenCuestionario}">
</div>
<div class="col-sm-8">
<h4 class="mt-1">
<a  href="" id="cuestionarioR" idCues="${task.idCuestionario}">${task.posicion}.${task.tituloCuestionario}</a>
</h4>
<p class="bg-light">${task.descripcion} </p>
Fecha y hora:
<p class="bg-light">${task.fecha}</p>
</div>
<div class="col-sm-2">
<div class="row justity-content-center" idCues="${task.idCuestionario}">
<button id="elim" class="btn btn-danger mb-md-2"  data-toggle="modal" data-target="#confirmarEliminarCuestionario">Eliminar</button>
<button class="btn btn-info" id="editarCuestionario">Editar</button>
</div>
</div>
</div>  `
                });
                $('#seccionCuestionarios').html(template);
            }
        });
    }
    /*Evento que sucede al hacer click en el boton editar de un cuestionario*/
    $(document).on('click', '#editarCuestionario', function(e) {
        let element = $(this)[0].parentElement;
        let id = $(element).attr('idCues');
        $.post('Modelo/principalProfesorEditarCuestionario.php', {
            id
        }, function(response) {
            window.location.href = "/PROYECTO/registroCuestionario";
        });
        e.preventDefault();
    });

      $(document).on('click', '#elim', function(e) {
        let element = $(this)[0].parentElement;
        let id = $(element).attr('idCues');
        idElimSeleccionado = id;
    });
    /*Evento que sucede al hacer click en el boton eliminar de un cuestionario*/
    $(document).on('click', '#elimCuestionario', function(e) {
        let id = idElimSeleccionado;
        $.post('Modelo/principalProfesorModelEliminarCuestionario.php', {
            id
        }, function(response) {
            console.log(response);
            actualizarLista();
        });
        e.preventDefault();
    });
    /*Oculta el contenedor resultados (Es aquel donde se muestran las busquedas)*/
    $('#contenedorResultados').hide();
    /*Evento de teclado, sucede cuando el usuario oprime teclas para buscar un cuestionario*/
    $('#buscar').keyup(function() {
        if ($('#buscar').val()) {
            let buscar = $('#buscar').val();
            $.ajax({
                url: 'Modelo/principalProfesorModelBuscarCuestionario.php',
                data: {
                    buscar
                },
                type: 'POST',
                success: function(response) {
                    console.log(response);
                    if (!response.error) {
                        let tasks = JSON.parse(response);
                        let template = '';
                        tasks.forEach(task => {
                            template += `
<div class="col-sm-8">
<h4 class="mt-1">
<a id="cuestionarioR" href="" idCues="${task.idCuestionario}">${task.tituloCuestionario}</a>
</h4>
</div>
`
                        });
                        $('#contenedorResultados').show();
                        $('#container').html(template);
                    }
                }
            })
        }
    });
    $('#segundaSeccion').hide();
    $('#volver').hide();
    $(document).on('click', '#cuestionarioR', function(e) {
        $('#segundaSeccion').show();
        $('#volver').show();
        $('#primeraSeccion').hide();
        let element = $(this)[0];
        let idCuestionario = $(element).attr('idCues');
        $.post('Modelo/principalProfesorModelObtenerCuestionario.php', {
            idCuestionario
        }, function(response) {
            const task = JSON.parse(response);
            let template = `
<div class="card mb-3 mt-5">
<div class="row">
    <div class="col-md-4">
      <img src="${task.rutaImagenCuestionario}" class="card-img" id="imagenPRCP">
    </div>
    <div class="col-md-5">
      <div class="card-body">
        <h5 class="card-title" id="tituloPRCP" style="text-align: center">${task.tituloCuestionario}</h5>
         <p class="card-text" id="fechaPRCP" style="text-align: center">${task.descripcion}</p>
        <p class="card-text" id="desPRCP" style="text-align: center">${task.fecha}</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="row justify-content-center">
        <button id="jugarC" idCues="${task.idCuestionario}" class="btn btn-info mt-md-5">¡Jugar!</button>
      </div>     
    </div>
   </div> 
</div> `;
            $('#tarjetaCuestionario').html(template);
            /*
            $("#imagenPRCP").attr('src', task.rutaImagenCuestionario);
            var titulo = document.getElementById('tituloPRCP').innerHTML = task.tituloCuestionario;
            var desc = document.getElementById('desPRCP').innerHTML = task.descripcion;
            var fecha = document.getElementById('fechaPRCP').innerHTML = task.fecha;*/
        });
        $.post('Modelo/principalProfesorModelObtenerPreguntas.php', {
            idCuestionario
        }, function(response) {
            const tasks = JSON.parse(response);
            let template = '';
            tasks.forEach(task => {
                template += `
            <li class="list-group-item" id="itemPRCP">${task.tituloPregunta}</li>
 `
            });
            $('#itemsPRCP').html(template);
        });
        e.preventDefault();
    });
    
    $(document).on('click', '#volver', function(e) {
        $('#volver').hide();
        $('#segundaSeccion').hide();
        $('#primeraSeccion').show();
        e.preventDefault();
    });

    $(document).on('click', '#jugarC', function(e) {
        let element = $(this)[0];
        let idCuestionario = $(element).attr('idCues');
        $.post('Modelo/realizarCuestionarioModelAgregarReporte.php', {
            idCuestionario
        }, function(response) 
        {
            if (response == 1) {
                window.location.href = "/PROYECTO/principalRealizarCuestionarioProfesor";
            }
        });
        e.preventDefault();
    });


});