$(document).ready(function() {
	      $('#volver').hide();
        $('#segundaSeccion').hide();
  

   actualizarListaProfesores();


       function actualizarListaProfesores()
        {
            $.ajax({
            url: 'Modelo/principalAlumnoModelConsultarProfesores.php',
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
<a  href="" id="profGam" idProf="${task.idProfesor}">${task.posicion}.Gamificación_${task.nombre}</a>
</h4>
</div>
</div>
  `
                });

                $('#seccionGam').html(template);
            }
        });

        }

           $(document).on('click', '#volver', function(e) {
                   $('#primeraSeccion').show();
             $('#segundaSeccion').hide();
               $('#volver').hide();

           });

    $(document).on('click', '#profGam', function(e) {
        let element = $(this)[0];
        let idProfesor = $(element).attr('idProf');
        actualizarTablaGeneral(idProfesor);
         e.preventDefault();
           $('#primeraSeccion').hide();
             $('#segundaSeccion').show();
               $('#volver').show();
      });


    function actualizarTablaGeneral(idProfesor)
    {      
            formData = new FormData();
            formData.append('idProfesor', idProfesor);
            $.ajax({
            url: 'Modelo/principalAlumnoModelConsultarTablaGeneral.php',
            type: 'POST',
            data:formData,  
            contentType: false,
            processData: false,
            success: function(response)
            {
           
           console.log(response);
           const tasks=JSON.parse(response);
           let template = '';
           var primeroN;
           var primeroP;
           var segundoN;
           var segundoP;
           let templateGanadores = '';
                tasks.forEach(task => {
                  if(task.posicion==1){
                    primeroN=task.nombreUsuario;
                    primeroP=task.puntos;

                     templateGanadores+=`
<div class="col-lg-4">
<div class="card mb-3 mt-5">

<div class="row">

    <div class="col-5">
      <img src="Img/medallaPrimerLugar.png" class="card-img">
    </div>

    <div class="col">
      <div class="card-body" id="textG">
        <h2 class="card-title" id="tituloPRCP" style="text-align: center">1° lugar</h2>
         <h1 class="card-text" id="fechaPRCP" style="text-align: center">${task.nombreUsuario}</h1>
        <h5 class="card-text" id="desPRCP" style="text-align: center">${task.puntos} puntos</h5>
      </div>
    </div>
 
</div>

</div>
</div>

                     `
                  }else if(task.posicion==2){
     segundoN=task.nombreUsuario;
     segundoP=task.puntos;
      templateGanadores+=`
<div class="col-lg-4">
<div class="card mb-3 mt-5">

<div class="row justify-content-center">

    <div class="col-5">
      <img src="Img/medallaSegundoLugar.png" class="card-img" >
    </div>

    <div class="col">
      <div class="card-body"  id="textG">
        <h2 class="card-title" id="tituloPRCP" style="text-align: center">2° lugar</h2>
         <h1 class="card-text" id="fechaPRCP" style="text-align: center">${task.nombreUsuario}</h1>
        <h5 class="card-text" id="desPRCP" style="text-align: center">${task.puntos} puntos</h5>
      </div>
    </div>
 
</div>

</div>
</div>

                     `                    

                  }else if(task.posicion==3){
                      templateGanadores=`
                     `;

                         templateGanadores+=`

                         <div class="col-lg-4">
<div class="card mb-3 mt-5">

<div class="row justify-content-center">

    <div class="col-5">
      <img src="Img/medallaSegundoLugar.png" class="card-img" >
    </div>

    <div class="col">
      <div class="card-body"  id="textG">
        <h2 class="card-title" id="tituloPRCP" style="text-align: center">2° lugar</h2>
         <h1 class="card-text" id="fechaPRCP" style="text-align: center">${segundoN}</h1>
        <h5 class="card-text" id="desPRCP" style="text-align: center">${segundoP} puntos</h5>
      </div>
    </div>
 
</div>

</div>
</div>

<div class="col-lg-4">
<div class="card mb-3 mt-5">

<div class="row">

    <div class="col-5">
      <img src="Img/medallaPrimerLugar.png" class="card-img">
    </div>

    <div class="col">
      <div class="card-body"  id="textG">
        <h2 class="card-title" id="tituloPRCP" style="text-align: center">1° lugar</h2>
         <h1 class="card-text" id="fechaPRCP" style="text-align: center">${primeroN}</h1>
        <h5 class="card-text" id="desPRCP" style="text-align: center">${primeroP} puntos</h5>
      </div>
    </div>
 
</div>

</div>
</div>

<div class="col-lg-4">
<div class="card mb-3 mt-5">

<div class="row">

    <div class="col-5">
      <img src="Img/medallaTercerLugar.png" class="card-img">
    </div>

    <div class="col">
      <div class="card-body"  id="textG">
        <h2 class="card-title" id="tituloPRCP" style="text-align: center">3° lugar</h2>
         <h1 class="card-text" id="fechaPRCP" style="text-align: center">${task.nombreUsuario}</h1>
        <h5 class="card-text" id="desPRCP" style="text-align: center">${task.puntos} puntos</h5>
      </div>
    </div>
 
</div>

</div>
</div>

                     `     

                  }
                    template += `
                    <tr>
                    <td>
                    ${task.posicion}
                    </td>
                     <td>
                    ${task.nombreUsuario}
                    </td>
                     <td>
                    ${task.puntos}
                    </td>
                    </tr>
                    `
                });
               $('#tablaAlumnosGeneral').html(template);
               $('#secRec').html(templateGanadores);


            }
            });

  }


});
