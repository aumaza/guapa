<?php


/*
** Funcion que carga el skeleto del sistema
*/

function skeleton(){

  echo '<link rel="stylesheet" href="/guapa/skeleton/css/bootstrap.min.css" >
		<link rel="stylesheet" href="/guapa/skeleton/css/bootstrap-theme.css" >
		<link rel="stylesheet" href="/guapa/skeleton/css/bootstrap-theme.min.css" >
		<link rel="stylesheet" href="/guapa/skeleton/css/scrolling-nav.css" >
		<link rel="stylesheet" href="/guapa/skeleton/css/font-awesome.min.css" >
		<link rel="stylesheet" href="/guapa/core/main/main.css" >
			
		<link rel="stylesheet" href="/guapa/skeleton/Chart.js/Chart.min.css" >
		<link rel="stylesheet" href="/guapa/skeleton/Chart.js/Chart.css" >
		
		<link rel="stylesheet" href="/guapa/skeleton/css/jquery.dataTables.min.css" >
		<link rel="stylesheet" href="/guapa/skeleton/css/buttons.dataTables.min.css" >
		<link rel="stylesheet" href="/guapa/skeleton/css/buttons.bootstrap.min.css" >
		<link rel="stylesheet" href="/guapa/skeleton/css/jquery.dataTables-1.11.5.min.css" >
		<link rel="stylesheet" href="/guapa/skeleton/dataTables/fixedColumns.dataTables.min.css" >
		
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	    
	    <script src="/guapa/skeleton/js/jquery-3.4.1.min.js"></script>
	    <script src="/guapa/skeleton/js/jquery-3.5.1.min.js"></script>
		<script src="/guapa/skeleton/js/bootstrap.min.js"></script>
		
		<script src="/guapa/skeleton/js/jquery.dataTables.min.js"></script>
		<script src="/guapa/skeleton/dataTables/DataTables/js/jquery.dataTables1.min.js"></script>
		<script src="/guapa/skeleton/dataTables/DataTables/js/dataTables.fixedColumns.min.js"></script>
		
		<script src="/guapa/skeleton/js/dataTables.editor.min.js"></script>
		<script src="/guapa/skeleton/js/dataTables.select.min.js"></script>
		<script src="/guapa-informatico/skeleton/js/dataTables.buttons.min.js"></script>
		<script src="/guapa/skeleton/dataTables/DataTables/js/buttons.colVis.min.js"></script>
		
		<script src="/guapa/skeleton/js/jszip.min.js"></script>
		<script src="/guapa/skeleton/js/pdfmake.min.js"></script>
		<script src="/guapa/skeleton/js/vfs_fonts.js"></script>
		<script src="/guapa/skeleton/js/buttons.html5.min.js"></script>
		<script src="/guapa/skeleton/js/buttons.bootstrap.min.js"></script>
		<script src="/guapa/skeleton/js/buttons.print.min.js"></script>
		
		<script src="/guapa/skeleton/js/bootbox/bootbox.all.js"></script>
		<script src="/guapa/skeleton/js/bootbox/bootbox.all.min.js"></script>
		<script src="/guapa/skeleton/js/bootbox/bootbox.js"></script>
		<script src="/guapa/skeleton/js/bootbox/bootbox.locales.js"></script>
		<script src="/guapa/skeleton/js/bootbox/bootbox.locales.min.js"></script>
		<script src="/guapa/skeleton/js/bootbox/bootbox.min.js"></script>
		
		<script src="/guapa/skeleton/Chart.js/Chart.min.js"></script>
		<script src="/guapa/skeleton/Chart.js/Chart.bundle.min.js"></script>
		<script src="/guapa/skeleton/Chart.js/Chart.bundle.js"></script>
		<script src="/guapa/skeleton/Chart.js/Chart.js"></script>';
}


function formLogIn(){

		echo '<div class="container-fluid">
					<div class="jumbotron">

					<hr>
  
				   <form id="fr_login_ajax" method="POST">
				    <div class="form-group">
				      <label for="email">Usuario:</label>
				      <input type="email" class="form-control" id="user" name="user" placeholder="Ingrese su email">
				    </div>
				    <div class="form-group">
				      <label for="pwd">Password:</label>
				      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Ingrese su password">
				    </div><br>
				    
				    <div class="alert alert-info">
					    <button type="submit" class="btn btn-default btn-block" id="login" name="login"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Ingresar</button>
					    <button type="reset" class="btn btn-default btn-block"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpiar Formulario</button>
				    </div>
				  </form><hr>
				  
				  <div id="messageLogIn"></div>

				</div>
				</div>';

}


/*
** Funcion de validación de ingreso
*/
function logIn($user,$pass,$conn,$db_basename){

    mysqli_select_db($conn,$db_basename);
    
	$_SESSION['user'] = $user;
	$_SESSION['pass'] = $pass;
	
	$sql_1 = "select password from g_usuarios where user = '$user'";
	$query_1 = mysqli_query($conn,$sql_1);
	while($row = mysqli_fetch_array($query_1)){
        $hash = $row['password'];
	}
	
    
    
	$sql = "SELECT * FROM g_usuarios where user = '$user' and role = 1";
	$q = mysqli_query($conn,$sql);
	
	$query = "SELECT * FROM g_usuarios where user = '$user' and role = 0";
	$retval = mysqli_query($conn,$query);
	
	
	
	if(!$q && !$retval){	
			echo 7; // CONNECTION FAILURE
			
			}
		
			if(($user = mysqli_fetch_assoc($retval)) && (password_verify($pass,$hash))){
				

				echo -1; // USER BLOCK
			}

			else if(($user = mysqli_fetch_assoc($q)) && (password_verify($pass,$hash))){

				if(strcmp($_SESSION["user"], 'root@mecon.gov.ar') == 0){

					echo 1; // LOGIN SUCCESSFULLY
				
				
			}else{
				echo 1; // LOGIN SUCESSFULLY
				
			}
			}else{
				echo 2; // USER OR PASSWORD INCORRECT
				}
}


function flyerConnFailure(){

		echo '<div class="container">
				  <div class="jumbotron">
				    <h1><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Atención</h1><hr>
				    <div class="alert alert-danger">    
				    	<p><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Sin Conexión a la Base de Datos. Contactese con el Administrador.</p>
				    </div><hr>
				  </div>';

}


function logOut($nombre){
    
    echo '<div class="container"> 
    			<div class="jumbotron">
                <h1 align=center>Hasta Luego '.$nombre.'</h1><hr>
                <p align=center><img src="logout.gif"  class="img-reponsive img-rounded"></p><hr>
                <meta http-equiv="refresh" content="4;URL=../../logout.php "/>
            </div>
            </div>';

}

function home(){

	echo '<div class="container"> 
    			<div class="jumbotron">
    			<footer class="container-fluid text-center">
					  <span class="glyphicon glyphicon-th" aria-hidden="true"></span> GUAPA [ Admininstración de Propiedades en Alquiler ]
					</footer><hr>
                	<p align=center><img src="img/img_01.jpg"  class="img-reponsive img-rounded" style="width:70%"></p><hr>
                	
                	<footer class="container-fluid text-center">
					  Develop by <a href="mailto:develslack@gmail.com">Slackzone Development</a>
					</footer>
          		</div>
            </div>';
}

function modalLogIn(){

    echo '<div class="modal fade" id="myModal_login" role="dialog">
            <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Ingresar</h3>
                </div>
                <div class="modal-body">';

                formLogIn();

            echo '</div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Cerrar</button>
                </div>
            </div>

            </div>
        </div>';
}


?>
