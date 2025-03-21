<?php session_start(); 
      
      error_reporting(E_ALL ^ E_NOTICE);
      ini_set('display_errors', 1);



      include "../../connection/connection.php";
      include "../lib/lib_system.php";
      include "lib_main.php";
      include "../lib/usuarios/lib_usuarios.php";


      $varsession = $_SESSION['user'];
      
      if($conn){

        $sql = "select id, name, avatar from g_usuarios where user = '$varsession'";
        mysqli_select_db($conn,$db_basename);
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)){
          $nombre = $row['name'];
          $user_id = $row['id'];
          $avatar = '..'.substr($row['avatar'], 7);
                  
        }
      }else{
        echo 'CONNECTION FAILURE';
      }
  

  if($varsession == null || $varsession == ''){
        echo '<!DOCTYPE html>
                <html lang="es">
                <head>
                <title>GUAPA - [ Menú Principal ]</title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">';
                skeleton();
                echo '</head><body style = "background: #839192;">';
                echo '<br><div class="container">
                        <div class="alert alert-danger" role="alert">';
                echo '<p align="center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Su sesión ha caducado. Por favor, inicie sesión nuevamente</p>';
                echo '<a href="../../logout.php"><hr><button type="buton" class="btn btn-default btn-block"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Iniciar</button></a>';  
                echo "</div></div>";
                die();
                echo '</body></html>';
  }


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>GUAPA - [ Menú Principal ]</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php skeleton(); ?>
</head>


<body>

<?php mainNavBar($nombre,$avatar); ?>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-2 sidenav"><br>
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Menú</div>
                    <form action="#" method="POST">
                        <div class="panel-body">
                            <div class="list-group">
                                <li class="list-group-item">
                                    <button type="submit" class="btn btn-default btn-block">Default</button>
                                </li>
                                <li class="list-group-item">
                                    <button type="submit" class="btn btn-default btn-block">Default</button>
                                </li>
                                <li class="list-group-item">
                                    <button type="submit" class="btn btn-default btn-block">Default</button>
                                </li>
                                <li class="list-group-item">
                                    <button type="submit" class="btn btn-default btn-block">Default</button>
                                </li>
                            </div>
                        </div>
                    </form>

            </div>
        </div>

<div class="col-sm-10">

<?php

if($conn){
// MODALES
    modalAbout();
    modalDocumentation();

// SALIR DEL SISTEMA
    if(isset($_POST['exit'])){
       logOut($nombre);
    }
// HOME
    if(isset($_POST['dashboard'])){
       dashboard($conn,$dbname);
    }
// USUARIOS
    // se crea el objeto
    $nUsuario = new Usuarios();
    if(isset($_POST['users'])){
        $nUsuario->listUsuarios($nUsuario,$conn,$dbname);
    }

    if(isset($_POST['user_bio'])){
        $nUsuario->userBio($nUsuario,$user_id,$conn,$dbname);
    }

}else{
  flyerConnFailure();
}

?>
</div>
</div>
</div>


<script type="text/javascript" src="../lib/usuarios/lib_usuarios.js"></script>

</body>
</html>
