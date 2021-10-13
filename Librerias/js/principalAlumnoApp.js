$(document).ready(function()
{

    contadores();
   
    $('#volver').hide();

     $("#caja3").on('click', function() {
    
     location.href="principalRealizarCuestionarioAlumno";
     });
  
     function contadores(){
            $.ajax({
            url: 'Modelo/principalAlumnoModelContadores.php',
            type: 'GET',
            success: function(response) {
            
                const task=JSON.parse(response);
            
               document.getElementById('cr').innerHTML="Cuestionarios resueltos: "+task[0].totalC;
               document.getElementById('cp').innerHTML="Profesores: "+task[1].profesores;
              
            }
        });

     }

});
