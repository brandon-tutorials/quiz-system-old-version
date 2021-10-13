var totalTime;
$(document).ready(function()
{ 
    $('#seccionDos').hide();
      $('#seccionTres').hide();
           $('#seccionCuatro').hide();
                  $('#seccionCinco').hide();

   
    $("#ContinuarCA").on('click', function() {
    
     var formData = new FormData();
     var pinReporte = $('#input').val();
     formData.append('pinReporte', pinReporte);
     $.ajax({
            url: 'Modelo/realizarCuestionarioModelAgregarAlumno.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
         
             if(response!=0){
            
            var idReporte=document.getElementById('idReporte');
            idReporte.setAttribute("value",response);
            $('#seccionUno').hide();
            $('#seccionDos').show();

            }else if(response==0){
            document.getElementById("mensaje").innerHTML="<div class='alert alert-danger' role='alert'>Error al ingresar PIN</div>"
            }
            }
        });
    });

        $("#iniciarCuestionario").on('click', function() 
        { 
            iniciarPregunta();

        }
        );

        function iniciarPregunta()
        {
           var idReporte= $('#idReporte').val();

           var formData = new FormData();
           formData.append('idReporte', idReporte);
            $.ajax({
            url: 'Modelo/realizarCuestionarioModelConsultarEstado.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) 
            {
           
            
            if (response==1) {
            var idReporte= $('#idReporte').val();
            var formData = new FormData();
            formData.append('id', idReporte);
            $.ajax({
            url: 'Modelo/realizarCuestionarioModelConsultarCuestionario.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response)
            {
                console.log(response);
            if(response!=0){
                var consulta=JSON.parse(response);       
                $('#seccionDos').hide();
                $('#seccionTres').show();
                $('#seccionCuatro').hide();
                var temp= actualizarRespuestas(consulta);
                document.getElementById("respCompleto").innerHTML=temp;
                totalTime=consulta.tiempo;
                updateClock();          
            }
            else if(response==0)
            {
            $('#seccionDos').hide();
            $('#seccionCuatro').hide();
            $('#seccionCinco').show();
            actualizarTabla();


            }

            }   
            }
            );
            }else if(response==0)
            {
                   
            
            }
            }
            });
            }

              function actualizarTabla(){
            formData = new FormData();
            let id =$('#idReporte').val();
            formData.append('id', id);
            console.log(id);
            $.ajax({
            url: 'Modelo/realizarCuestionarioModelConsultarTabla.php',
            type: 'POST',
            data:formData,  
            contentType: false,
            processData: false,
            success: function(response)
            {
                                       
            console.log(response);
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
            }
            });  
            }
         
  $("#contPreg").on('click', function() 
        {  
            iniciarPregunta();
        }
        );
        });


 function cambiarValorBoton(idBoton)
 {
    var btn= document.getElementById(idBoton);
    if(idBoton=="botonUno"){
        if(($('#botonUno').val())==0){
        $('#botonUno').val(1);
        btn.setAttribute("class","card-body border border-danger bg-danger");
        }else{
        $('#botonUno').val(0);
        btn.setAttribute("class","card-body border border-danger");
        }
     
    }
    if(idBoton=="botonDos"){

         if(($('#botonDos').val())==0)
         {
         $('#botonDos').val(1);
         btn.setAttribute("class","card-body border border-primary bg-primary");
         }else{
         $('#botonDos').val(0);
         btn.setAttribute("class","card-body border border-primary");
         } 
    
    }
    if(idBoton=="botonTres"){

         if(($('#botonTres').val())==0){
         $('#botonTres').val(1);
         btn.setAttribute("class","card-body border border-warning bg-warning");
     }else{
         $('#botonTres').val(0);
         btn.setAttribute("class","card-body border border-warning");
     }
    
    }
    if(idBoton=="botonCuatro"){
         if(($('#botonCuatro').val())==0){
         $('#botonCuatro').val(1);
         btn.setAttribute("class","card-body border border-success bg-success");

     }else{
         $('#botonCuatro').val(0);
         btn.setAttribute("class","card-body border border-success");

     }
 
    }

 }


function actualizarRespuestas(tasks){
            let template = '';

            if(tasks.respuestaUno!="")
            {
            template += `
            <div class="col-8 mt-2">
            <div class="card-body border border-danger" id="botonUno" onClick="cambiarValorBoton('botonUno');">
            ${tasks.respuestaUno}
            </div>
            </div>
            `
            }
            if(tasks.respuestaDos!="")
            {
            template += `
            <div class="col-8 mt-2">
            <div class="card-body border border-primary" id="botonDos"  onClick="cambiarValorBoton('botonDos');"> 
            ${tasks.respuestaDos}
            </div>
            </div>
            `    

            }
            if(tasks.respuestaTres!="")
            {
            template += `
            <div class="col-8 mt-2">
            <div value="0" class="card-body border border-warning"  id="botonTres"  onClick="cambiarValorBoton('botonTres');">
            ${tasks.respuestaTres}
            </div>
            </div>
            `

            }
            if(tasks.respuestaCuatro!="")
            {
            template += `
            <div class="col-8 mt-2">
            <div value="0" class="card-body border border-success" id="botonCuatro"  onClick="cambiarValorBoton('botonCuatro');">
            ${tasks.respuestaCuatro}
            </div>
            </div>
            `
            }

    return template;
    }

 function updateClock() 
 {
  document.getElementById('countdown').innerHTML = totalTime;
  if(totalTime==0)
  {   

 var idReporte= $('#idReporte').val();
            var formData = new FormData();
            formData.append('id', idReporte);
            $.ajax({
            url: 'Modelo/realizarCuestionarioModelConsultarCuestionario.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
            $('#seccionTres').hide();
            $('#opcionCorrecta').hide();
            $('#opcionIncorrecta').hide();
            $('#seccionCuatro').show();
            completarRespuestas();
            const task = JSON.parse(response);
           if(verificarRespuestas(task.estadoUno,task.estadoDos,task.estadoTres,task.estadoCuatro))
           {
                
            
            var idReporte= $('#idReporte').val();
            var formData = new FormData();
            formData.append('id', idReporte);
                 formData.append('puntajeGanado',task.puntos);
            $.ajax({
            url: 'Modelo/realizarCuestionarioModelAumentarPuntos.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
            $('#opcionCorrecta').show();    
            }
            });
           
           }
           else
           {
           $('#opcionIncorrecta').show();
        
           }


            }
            });
  }else{
    totalTime-=1;
    setTimeout("updateClock()",1000);
  }
}

function completarRespuestas(){
      var btnUno=$('#botonUno').val();
          var btnDos=$('#botonDos').val();
    var btnTres=$('#botonTres').val();
    var btnCuatro=$('#botonCuatro').val();
      
      if(btnUno!=1){
        $('#botonUno').val(0);
      }
      if(btnDos!=1){
         $('#botonDos').val(0);
      }
      if(btnTres!=1){
         $('#botonTres').val(0);
      }
      if(btnCuatro!=1){
         $('#botonCuatro').val(0);
      }
}

function verificarRespuestas(estadoUno,estadoDos,estadoTres,estadoCuatro)
{
    var btnUno=$('#botonUno').val();
    var btnDos=$('#botonDos').val();
    var btnTres=$('#botonTres').val();
    var btnCuatro=$('#botonCuatro').val();

if(btnUno==null){
btn=0;
}
if(btnDos==null){
btnDos=0;
}
if(btnTres==null){
btnTres=0;
}
if(btnCuatro==null)
{
btnCuatro=0;
}
    console.log('btnUno'+btnUno);
    console.log(btnDos);
      console.log(btnTres);
        console.log(btnCuatro);
      console.log('empiezan los estados');
        console.log(estadoUno);
          console.log(estadoDos);
            console.log(estadoTres);
              console.log(estadoCuatro);

    if(btnUno==estadoUno){
    if(btnDos==estadoDos){
    if(btnTres==estadoTres){
    if(btnCuatro==estadoCuatro){
return true;
    }


}
}
}
return false;
}