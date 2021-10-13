/*Crea un nuevo cuestionario en la base de datos*/
function inicializarCuestionario() {
    $.ajax({
        url: 'Modelo/registroCuestionarioModelAgregarCuestionario.php',
        type: 'GET',
        success: function(response) {
      
        }
    });
}
$(document).ready(function() {
    var idPreguntaSeleccionada;
    var primero = true;
    var idElimSeleccionado;

       actualizarLista();

    
    /*Funcion para actualizar las preguntas*/
    function actualizarLista() {
        $.ajax({
            url: 'Modelo/registroCuestionarioModelConsultarListaPreguntas.php',
            type: 'GET',
            success: function(response) {
              
                let tasks = JSON.parse(response);
                if (primero == true) {
                    idPreguntaSeleccionada = tasks[0].idPregunta;
                    cargarPrimerEnlace();
                    primero = false;
                }
                let template = '';
                tasks.forEach(task => {
                    template += `<a 
          class="card card-block bg-light" id="enlace" idPregunta="${task.idPregunta}">
          ${task.posicion}
          </a>
            <button class="btn bg-light" id="elim"  data-toggle="modal" data-target="#confirmarEliminarPregunta" idElim="${task.idPregunta}">
          <i class="fas fa-trash-alt"></i>
          </button>`
                });
                $('#my-custom-scrollbar').html(template);
            }
        });
    }
    /*Se muestra el primer elemento del cuestionario al ingresar*/
    function cargarPrimerEnlace() {
        var formData = new FormData();
        let id = idPreguntaSeleccionada;
        formData.append('id', id);
        $.ajax({
            url: 'Modelo/registroCuestionarioModelConsultarPregunta.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
              
                const task = JSON.parse(response);
                $("#cargaImagen").attr('src', task.rutaImagenPregunta);
                $('#pregunta').val(task.tituloPregunta);
                $('#input3').val(task.puntos);
                $('#selecTiempo').val(task.tiempo);
                $('#op1').val(task.respuestaUno);
                $('#op2').val(task.respuestaDos);
                $('#op3').val(task.respuestaTres);
                $('#op4').val(task.respuestaCuatro);
                $('#botonUno').val(task.estadoUno);
                $('#botonDos').val(task.estadoDos);
                $('#botonTres').val(task.estadoTres);
                $('#botonCuatro').val(task.estadoCuatro);
                actualizarBoton('botonUno', 'iUno');
                actualizarBoton('botonDos', 'iDos');
                actualizarBoton('botonTres', 'iTres');
                actualizarBoton('botonCuatro', 'iCuatro');
                actualizarBarra();
            }
        });
    }
    /*Evento que sucede al dar click en el boton Nuevo, lo cual crea una nueva pregunta*/
    $("#nuevo").on('click', function() {
        $.ajax({
            url: 'Modelo/registroCuestionarioModelAgregarPregunta.php',
            type: 'get',
            success: function(response) {
              
                actualizarLista();
            }
        });
        return false;
    });
    /*Evento que sucede al dar click en otra pregunta*/
    /*Guarda los datos de la pregunta anterior*/
    $(document).on('click', '#enlace', function() {
        var formData = new FormData();
        var imagenPregunta = $('#imagenPregunta')[0].files[0];
        $('#imagenPregunta').val('');
        var tituloPregunta = $('#pregunta').val();
        var puntos = $('#input3').val();
        var tiempo = $('#selecTiempo').val();
        var respuestaUno = $('#op1').val();
        var respuestaDos = $('#op2').val();
        var respuestaTres = $('#op3').val();
        var respuestaCuatro = $('#op4').val();
        var estadoUno = $('#botonUno').val();
        var estadoDos = $('#botonDos').val();
        var estadoTres = $('#botonTres').val();
        var estadoCuatro = $('#botonCuatro').val();
        formData.append('idPregunta', idPreguntaSeleccionada);
        formData.append('imagenPregunta', imagenPregunta);
        formData.append('tituloPregunta', tituloPregunta);
        formData.append('puntos', puntos);
        formData.append('tiempo', tiempo);
        formData.append('respuestaUno', respuestaUno);
        formData.append('respuestaDos', respuestaDos);
        formData.append('respuestaTres', respuestaTres);
        formData.append('respuestaCuatro', respuestaCuatro);
        formData.append('estadoUno', parseInt(estadoUno, 10));
        formData.append('estadoDos', parseInt(estadoDos, 10));
        formData.append('estadoTres', parseInt(estadoTres, 10));
        formData.append('estadoCuatro', parseInt(estadoCuatro, 10));
        $.ajax({
            url: 'Modelo/registroCuestionarioModelModificarPregunta.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               
            }
        });
        /*Carga los datos de la pregunta seleccionada*/
        formData = new FormData();
        let element = $(this)[0];
        let id = $(element).attr('idPregunta');
        idPreguntaSeleccionada = id;
        formData.append('id', id);
        $.ajax({
            url: 'Modelo/registroCuestionarioModelConsultarPregunta.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                const task = JSON.parse(response);
                $("#cargaImagen").attr('src', task.rutaImagenPregunta);
                $('#pregunta').val(task.tituloPregunta);
                $('#input3').val(task.puntos);
                $('#selecTiempo').val(task.tiempo);
                $('#op1').val(task.respuestaUno);
                $('#op2').val(task.respuestaDos);
                $('#op3').val(task.respuestaTres);
                $('#op4').val(task.respuestaCuatro);
                $('#botonUno').val(task.estadoUno);
                $('#botonDos').val(task.estadoDos);
                $('#botonTres').val(task.estadoTres);
                $('#botonCuatro').val(task.estadoCuatro);
                actualizarBoton('botonUno', 'iUno');
                actualizarBoton('botonDos', 'iDos');
                actualizarBoton('botonTres', 'iTres');
                actualizarBoton('botonCuatro', 'iCuatro');
                actualizarBarra();
            }
        });
    });
    /*Evento que sucede al dar click guarda la informacion del cuestionario*/
    $("#guardarCuestionario").on('click', function() {

        var formData = new FormData();
        var imagenCuestionario = $('#imagenCuestionario')[0].files[0];
        var tituloCuestionario = $('#tituloCuestionario').val();
        var descripcion = $('#descripcion').val();
        formData.append('imagenCuestionario', imagenCuestionario);
        formData.append('tituloCuestionario', tituloCuestionario);
        formData.append('descripcion', descripcion);
        $.ajax({
            url: 'Modelo/registroCuestionarioModelModificarCuestionario.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) 
            {
  
            }
        });
    });
    $('#iUno').hide();
    $('#iDos').hide();
    $('#iTres').hide();
    $('#iCuatro').hide();
    /*Evita que se recargue la pagina cuando se oprimen los siguientes botones*/
    $("#botonUno").on('click', function(e) {
        e.preventDefault();
    });
    $("#botonDos").on('click', function(e) {
        e.preventDefault();
    });
    $("#botonTres").on('click', function(e) {
        e.preventDefault();
    });
    $("#botonCuatro").on('click', function(e) {
        e.preventDefault();
    });
    $(document).on('click', '#elim', function(e) {
        let element = $(this)[0];
        let id = $(element).attr('idElim');
        idElimSeleccionado = id;
 
    });
    /*Evento que al dar click elimina una pregunta del cuestionario*/
    $(document).on('click', '#confirmarElim', function(e) {
        let id = idElimSeleccionado;
        $.post('Modelo/registroCuestionarioModelEliminarPregunta.php', {
            id
        }, function(response) {
         
            actualizarLista();
        });
        e.preventDefault();
    });
    /*Evento al dar click modifica una pregunta del cuestionario*/
    $(document).on('click', '#hecho', function(e) {
        var formData = new FormData();
        var imagenPregunta = $('#imagenPregunta')[0].files[0];
        $('#imagenPregunta').val('');
        var tituloPregunta = $('#pregunta').val();
        var puntos = $('#input3').val();
        var tiempo = $('#selecTiempo').val();
        var respuestaUno = $('#op1').val();
        var respuestaDos = $('#op2').val();
        var respuestaTres = $('#op3').val();
        var respuestaCuatro = $('#op4').val();
        var estadoUno = $('#botonUno').val();
        var estadoDos = $('#botonDos').val();
        var estadoTres = $('#botonTres').val();
        var estadoCuatro = $('#botonCuatro').val();
        formData.append('idPregunta', idPreguntaSeleccionada);
        formData.append('imagenPregunta', imagenPregunta);
        formData.append('tituloPregunta', tituloPregunta);
        formData.append('puntos', puntos);
        formData.append('tiempo', tiempo);
        formData.append('respuestaUno', respuestaUno);
        formData.append('respuestaDos', respuestaDos);
        formData.append('respuestaTres', respuestaTres);
        formData.append('respuestaCuatro', respuestaCuatro);
        formData.append('estadoUno', parseInt(estadoUno, 10));
        formData.append('estadoDos', parseInt(estadoDos, 10));
        formData.append('estadoTres', parseInt(estadoTres, 10));
        formData.append('estadoCuatro', parseInt(estadoCuatro, 10));
        $.ajax({
            url: 'Modelo/registroCuestionarioModelModificarPregunta.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {

       window.location.href="principalProfesor/finalizarSessionCuestionario";
 
            }
        });
        e.preventDefault();
    });
});
/*De manera dinamica cambia el valor del boton de repuesta*/
function cambiarValorBoton(idBoton, idEtiqueta) {
    var estado = $('#'.concat(idBoton)).val();
    var etiqueta = document.getElementById(idEtiqueta);
    if (estado == 0) {
        $('#'.concat(idBoton)).val("1");
        $('#'.concat(idEtiqueta)).show();
    } else {
        $('#'.concat(idBoton)).val("0");
        $('#'.concat(idEtiqueta)).hide();
    }
}
/*Actualiza el valor del boton de respuesta*/
function actualizarBoton(idBoton, idEtiqueta) {
    var estado = $('#'.concat(idBoton)).val();
    var etiqueta = document.getElementById(idEtiqueta);
    if (estado == 0) {
        $('#'.concat(idEtiqueta)).hide();
    } else {
        $('#'.concat(idEtiqueta)).show();
    }
}