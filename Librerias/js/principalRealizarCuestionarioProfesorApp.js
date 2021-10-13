var totalTime;
   $('#idCuesActual').hide();
   $('#seccionDos').hide();
   $('#seccionTres').hide();
   $('#seccionCuatro').hide();
   $('#seccionCinco').hide();
   $('#seccionSeis').hide();
$(document).ready(function() 
{ 

   $("#volver").on('click', function() {
    location.href="/PROYECTO/principalProfesor";
    });

    $("#iniciarC").on('click', function() 
    {
    iniciarPregunta();
    }
    );

    function iniciarPregunta(){
    formData = new FormData();
    let id =$('#idCuesActual').val();
    formData.append('id', id);
    $.ajax({
            url: 'Modelo/realizarCuestionarioModelConsultarCuestionario.php',
            type: 'POST',
            data:formData,  
            contentType: false,
            processData: false,
            success: function(response)
            {
              if(response!=0){
                $('#seccionUno').hide();
                $('#seccionDos').show();
                const task = JSON.parse(response);
                $("#cargaImagen").attr('src', task.rutaImagenPregunta);
                document.getElementById("tituloP").innerHTML=task.tituloPregunta;
                mostrarRespuesta("contUno","respuestaUno",task.respuestaUno);
                mostrarRespuesta("contDos","respuestaDos",task.respuestaDos);
                mostrarRespuesta("contTres","respuestaTres",task.respuestaTres);
                mostrarRespuesta("contCuatro","respuestaCuatro",task.respuestaCuatro);
                totalTime=task.tiempo;
                formData = new FormData();
                let id =$('#idCuesActual').val();
                formData.append('id', id);
                $.ajax({
                url: 'Modelo/realizarCuestionarioModelActivarCuestionario.php',
                type: 'POST',
                data:formData,  
                contentType: false,
                processData: false,
                success: function(response)
                {

                      updateClock();
                }
                });
            }else{
              $('#seccionUno').hide();
              $('#seccionSeis').show();
              actualizarTabla();
            }
            }
        });
      
    }

      $(".buttonSeccionTres").on('click', function() 
        {
            $('#seccionTres').hide();
            $('#seccionCuatro').show();
            formData = new FormData();
            let id =$('#idCuesActual').val();
            formData.append('id', id);
            $.ajax({
            url: 'Modelo/realizarCuestionarioModelConsultarCuestionario.php',
            type: 'POST',
            data:formData,  
            contentType: false,
            processData: false,
            success: function(response)
            {
              
            
                const task = JSON.parse(response);
                $("#cargaImagenT").attr('src', task.rutaImagenPregunta);
                   document.getElementById("tituloPT").innerHTML=task.tituloPregunta;
                mostrarRespuesta("contUno","respuestaUnoT",task.respuestaUno);
                mostrarRespuesta("contDos","respuestaDosT",task.respuestaDos);
                mostrarRespuesta("contTres","respuestaTresT",task.respuestaTres);
                mostrarRespuesta("contCuatro","respuestaCuatroT",task.respuestaCuatro);
                respuestaCorrecta("respuestaUnoT",task.estadoUno);
                respuestaCorrecta("respuestaDosT",task.estadoDos);
                respuestaCorrecta("respuestaTresT",task.estadoTres);
                respuestaCorrecta("respuestaCuatroT",task.estadoCuatro);
            }
        });

        });

  function respuestaCorrecta(respuesta,valor)
  {
    if(valor==1 && respuesta=="respuestaUnoT")
    {
      $('#'.concat(respuesta)).attr('class',"card-body border border-danger bg-danger");
    }
        if(valor==1 && respuesta=="respuestaDosT")
    {
      $('#'.concat(respuesta)).attr('class',"card-body border border-primary bg-primary");
    }
         if(valor==1 && respuesta=="respuestaTresT")
    {
      $('#'.concat(respuesta)).attr('class',"card-body border border-warning bg-warning");
    }
         if(valor==1 && respuesta=="respuestaCuatroT")
    {
      $('#'.concat(respuesta)).attr('class',"card-body border border-success bg-success");
    }
  }
  function actualizarVistaRespuestas(respuesta)
  {

    var res=document.getElementById(respuesta);


    if(respuesta=="respuestaUnoT")
    {
         res.setAttribute("class","card-body border border-danger");
    }
        if(respuesta=="respuestaDosT")
    {
               res.setAttribute("class","card-body border border-primary");
    }
         if(respuesta=="respuestaTresT")
    {
        res.setAttribute("class","card-body border border-warning");
    }
         if(respuesta=="respuestaCuatroT")
    {
        res.setAttribute("class","card-body border border-success");
    }
  }

    function mostrarRespuesta(contenedor,respuesta,valor){
    if(valor!=""){
          $('#'.concat(respuesta)).show();
          $('#'.concat(contenedor)).show();
    document.getElementById(respuesta).innerHTML=valor;
    }else{
           $('#'.concat(respuesta)).hide();
           $('#'.concat(contenedor)).hide();
    }

    }
  $("#btnContinuar").on('click', function() 
        {
                  $('#seccionCuatro').hide();
        $('#seccionCinco').show();
        actualizarVistaRespuestas("respuestaUnoT");
        actualizarVistaRespuestas("respuestaDosT");
        actualizarVistaRespuestas("respuestaTresT");
        actualizarVistaRespuestas("respuestaCuatroT");
        actualizarTabla();

              
        }); 

  function actualizarTabla(){
 formData = new FormData();
            let id =$('#idCuesActual').val();
            formData.append('id', id);
            $.ajax({
            url: 'Modelo/realizarCuestionarioModelConsultarTabla.php',
            type: 'POST',
            data:formData,  
            contentType: false,
            processData: false,
            success: function(response)
            {
                                       
           const tasks=JSON.parse(response);

             let template = '';
                tasks.forEach(task => {
                    template += `
                    <tr>
                    <td>
                    ${task.posicion}
                    </td>
                     <td>
                    ${task.nombre}
                    </td>
                     <td>
                    ${task.puntos}
                    </td>
                    </tr>

                    `
                });
               $('#tablaAlumnos').html(template);
                 $('#tablaAlumnosFinal').html(template);
            }
            });

  }

    $("#btnSiguiente").on('click', function() 
        {
        
            $('#seccionCinco').hide();
            formData = new FormData();
            let id =$('#idCuesActual').val();
            formData.append('id', id);
            $.ajax({
            url: 'Modelo/realizarCuestionarioModelAumentarPregunta.php',
            type: 'POST',
            data:formData,  
            contentType: false,
            processData: false,
            success: function(response)
            {
              if(response==1){

            formData = new FormData();
            let id =$('#idCuesActual').val();
            formData.append('id', id);
            $.ajax({
            url: 'Modelo/realizarCuestionarioModelActivarCuestionario.php',
            type: 'POST',
            data:formData,  
            contentType: false,
            processData: false,
             success: function(response)
            {
               if(response==1){
                 iniciarPregunta();
               }
            }
            });
            }
            }
            });

        }); 


});

 function updateClock() 
 {
  document.getElementById('countdown').innerHTML = totalTime;
  if(totalTime==0)
  {   
    $('#seccionDos').hide();
    $('#seccionTres').show();

    formData = new FormData();
            let id =$('#idCuesActual').val();
            formData.append('id', id);
            $.ajax({
            url: 'Modelo/realizarCuestionarioModelDesactivarCuestionario.php',
            type: 'POST',
            data:formData,  
            contentType: false,
            processData: false,
            success: function(response)
            {
  
            }

            });

          

  }else{
    totalTime-=1;
    setTimeout("updateClock()",1000);
  }
}

