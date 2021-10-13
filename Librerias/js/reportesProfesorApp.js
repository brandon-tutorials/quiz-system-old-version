$(document).ready(function() {
		 $('#volver').hide();
		  $('#segundaSeccion').hide();
	 actualizarLista();
     var idReporteEliminado;

function actualizarLista() {
        $.ajax({
            url: 'Modelo/principalProfesorModelConsultarReportes.php',
            type: 'GET',
            success: function(response) {
                
                let tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(task => {
                    template += `
<div class="row justify-content-center">
<div class="col-sm-10 ml-lg-4">
<h4 class="mt-1">
<a  href="" id="reporteR" idRepor="${task.idReporte}">${task.posicion}.${task.tituloCuestionario}</a>
</h4>
Fecha y hora:
<p class="bg-light">${task.fecha}</p>
</div>

<div class="col">
<div class="row justity-content-center" idRepor="${task.idReporte}">
<button class="btn btn-danger" id="elimReporte"  data-toggle="modal" data-target="#confirmarEliminarReporte">Eliminar</button>
</div>
</div>

</div>
  `
                });
                $('#seccionReportes').html(template);
            }
        });
    }
        $(document).on('click', '#elimReporte', function(e) {
            let element = $(this)[0].parentElement;
        let id = $(element).attr('idRepor');
        idReporteEliminado=id;
        e.preventDefault();
        });

    $(document).on('click', '#eliminarReporte', function(e) {
       
       let id=idReporteEliminado;
       console.log(id);
        $.post('Modelo/principalProfesorModelEliminarReporte.php', {
            id
        }, function(response) 
        {
        	console.log(response);
            actualizarLista();
        });
        e.preventDefault();
    });

   $(document).on('click', '#volver', function(e) {
        $('#segundaSeccion').hide();
        $('#volver').hide();
        $('#primeraSeccion').show();
   });

   $(document).on('click', '#reporteR', function(e) {
        $('#segundaSeccion').show();
        $('#volver').show();
        $('#primeraSeccion').hide();
        let element = $(this)[0];
        let idReporte = $(element).attr('idRepor');
        $.post('Modelo/principalProfesorModelObtenerReporte.php', {
            idReporte
        }, function(response) {
       
            const task = JSON.parse(response);
            let template = `
  <div class="card mb-3 mt-5">
  <div class="row">
    
    <div class="col">
      <div class="card-body">
        <h1 class="card-title" id="tituloPRCP" style="text-align: center">${task.titulocuestionario}</h1>
        <h5 class="card-text" id="desPRCP" style="text-align: center">Fecha y hora:<br>${task.fecha}</h5>
      </div>
    </div>

   </div> 
</div> `;
            $('#tarjetaReporte').html(template);

      actualizarTabla(idReporte);




        });
    
 e.preventDefault();
});    
  function actualizarTabla(id){
            formData = new FormData();
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
            }
            });

  }
});