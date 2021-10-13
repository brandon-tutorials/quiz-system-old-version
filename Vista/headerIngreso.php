<!--Header mostrado al tratar de registrarse en el sistema web-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top" id="barraNav">
    <div class="container">
      <a class="navbar-brand" href="#"><!--LOGO--></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
              <li>
                 <a class="nav-link" id="pregunta">¿Ya tienes cuenta?</a>
              </li>

          <li class="nav-item active">

            <a class="nav-link" href="<?php echo constant('URL') ?>ingresar" id="botonIn">
              Iniciar Sesion
              <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


