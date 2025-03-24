<?php session_start();

      error_reporting(E_ALL ^ E_NOTICE);
      ini_set('display_errors', 1);



      include "../../../connection/connection.php";
      include "../lib_system.php";
      include "lib_servicios.php";

      if($conn){

          // se crea el objeto
          $nServicio = new Servicios();

          // se capturan los datos
          $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);

          if($descripcion == ""){
            echo 5; // hay campos sin completar
          }else{
              $nServicio->addServicio($nServicio,$descripcion,$conn,$dbname);
        }


      }else{
        echo 7; // sin conexion a la base de datos
      }



?>
