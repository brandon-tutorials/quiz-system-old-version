$(document).ready(function() {
		 $('#volver').hide();
		  $('#segundaSeccion').hide();
	 actualizarLista();

function actualizarLista() {
        $.ajax({
            url: 'Modelo/principalAlumnoModelConsultarReportes.php',
            type: 'GET',
            success: function(response) {
                console.log(response);
                let tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(task => {
                    template += `
<div class="row justify-content-center">
<div class="col-10">
<h4 class="mt-1">
<a  href="" id="reporteR" idRepor="${task.idReporte}">${task.posicion}.${task.tituloCuestionario}</a>
</h4>
Fecha y hora:
<p class="bg-light">${task.fecha}</p>
</div>
</div>
  `
                });
                $('#seccionReportes').html(template);
            }
        });
    }

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
        $.post('Modelo/principalAlumnoModelObtenerReporte.php', {
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