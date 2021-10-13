drop database sistemaCuestionarios;
create database sistemaCuestionarios;
use sistemaCuestionarios;

CREATE TABLE `sistemacuestionarios`.`Usuario` ( 
`idUsuario` VARCHAR(7) NOT NULL ,
 `nombreUsuario` VARCHAR(30) NOT NULL ,
 `contrasenia` VARCHAR(40) NOT NULL , 
 PRIMARY KEY (`idUsuario`)
 ) ENGINE = InnoDB;
 
 CREATE TABLE `sistemacuestionarios`.`Profesor` ( 
`idProfesor` VARCHAR(7) NOT NULL ,
 `nombreCompleto` VARCHAR(30) NOT NULL ,
 `idUsuario` VARCHAR(7) NOT NULL , 
 PRIMARY KEY (`idProfesor`),
 FOREIGN KEY(`idUsuario`) REFERENCES Usuario(`idUsuario`)
 ) ENGINE = InnoDB;

 CREATE TABLE `sistemacuestionarios`.`Alumno` ( 
`idAlumno` VARCHAR(7) NOT NULL ,
 `idUsuario` VARCHAR(7) NOT NULL , 
 PRIMARY KEY (`idAlumno`),
 FOREIGN KEY(`idUsuario`) REFERENCES Usuario(`idUsuario`)
 ) ENGINE = InnoDB;

 CREATE TABLE `sistemacuestionarios`.`Cuestionario` ( 
`idCuestionario` VARCHAR(7) NOT NULL ,
 `tituloCuestionario` VARCHAR(40),
  `fecha` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `descripcion` VARCHAR(100),
   `rutaImagenCuestionario` VARCHAR(80),
   `idProfesor` VARCHAR(7) NOT NULL , 
 PRIMARY KEY (`idCuestionario`),
 FOREIGN KEY(`idProfesor`) REFERENCES Profesor(`idProfesor`)
 ) ENGINE = InnoDB;

 CREATE TABLE `sistemacuestionarios`.`Pregunta` ( 
   `idPregunta` INT AUTO_INCREMENT NOT NULL,
   `tituloPregunta` VARCHAR(50),
   `rutaImagenPregunta` VARCHAR(100),
   `respuestaUno` VARCHAR(50),
   `respuestaDos` VARCHAR(50),
   `respuestaTres` VARCHAR(50),
   `respuestaCuatro` VARCHAR(50),
   `estadoUno` BOOLEAN,
   `estadoDos` BOOLEAN,
   `estadoTres` BOOLEAN,
   `estadoCuatro`BOOLEAN,
   `tiempo` INT,
   `puntos` INT,
   `idCuestionario` VARCHAR(7) NOT NULL,
 PRIMARY KEY (`idPregunta`),
 FOREIGN KEY(`idCuestionario`) REFERENCES Cuestionario(`idCuestionario`)
 ) ENGINE = InnoDB;


 CREATE TABLE `sistemacuestionarios`.`ReporteCuestionario` ( 
   `idReporte` VARCHAR(7) NOT NULL,
      `fecha` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      `estado` BOOLEAN,
    `numPregunta` INT,
   `idCuestionario` VARCHAR(7) NOT NULL,
 PRIMARY KEY (`idReporte`),
 FOREIGN KEY(`idCuestionario`) REFERENCES Cuestionario(`idCuestionario`)
 ) ENGINE = InnoDB;
 

 CREATE TABLE `sistemacuestionarios`.`AlumnoReporte` ( 
   `puntos` INT,
   `idAlumno` VARCHAR(7) NOT NULL,
	`idReporte` VARCHAR(7) NOT NULL,
 FOREIGN KEY(`idAlumno`) REFERENCES Alumno(`idAlumno`),
 FOREIGN KEY(`idReporte`) REFERENCES ReporteCuestionario(`idReporte`)
 ) ENGINE = InnoDB;
 

