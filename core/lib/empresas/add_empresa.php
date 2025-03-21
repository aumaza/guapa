<?php session_start();

      error_reporting(E_ALL ^ E_NOTICE);
      ini_set('display_errors', 1);



      include "../../../connection/connection.php";
      include "../lib_system.php";
      include "lib_empresas.php";

      if($conn){

          // se crea el objeto
          $nEmpresa = new Empresas();

          // se capturan los datos
          $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);

          if($descripcion == ""){
            echo 5; // hay campos sin completar
          }else{
              $nEmpresa->addEmpresa($nEmpresa,$descripcion,$conn,$dbname);
        }


      }else{
        echo 7; // sin conexion a la base de datos
      }



?>
