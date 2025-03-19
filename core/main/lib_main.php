<?php

function mainNavBar($nombre,$avatar){
	

	echo '<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			    <form action="#" method="POST">
			      <button class="btn btn-warning btn-sm navbar-btn" type="submit" name="dashboard"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard</button>
			    </form>
			    </div>

			    <ul class="nav navbar-nav">
			      
			      <button type="button" class="btn btn-default btn-sm navbar-btn" data-toggle="modal" data-target="#myModalAbout">
			      	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> A cerca de..</button>
			      
			      <button type="button" class="btn btn-default btn-sm navbar-btn" data-toggle="modal" data-target="#myModalDocumentation">
			      	<span class="glyphicon glyphicon-book" aria-hidden="true"></span> Documentación</button>
			    </ul>
			    
			    <ul class="nav navbar-nav navbar-right">
			      
			      <div class="dropdown">
				    <button class="btn btn-primary dropdown-toggle navbar-btn" type="button" data-toggle="dropdown" data-toggle="tooltip" title="Menú">';
                        if(($avatar == '..') && ($nombre == 'Administrador')){
                            echo '<img src="../img/meeting-chair.png" alt="Avatar" class="avatar" /> '.$nombre.'</button>';
                        }else if(($avatar == '..') && ($nombre != 'Administrador')){
                            echo '<img src="../img/view-media-artist.png" alt="Avatar" class="avatar" /> '.$nombre.'</button>';
                        }else if($avatar != '..'){
                            echo '<img src="'.$avatar.'" alt="Avatar" class="avatar" /> '.$nombre.'</button>';
                        }
            echo '<ul class="dropdown-menu">
				    <form action="#" method="POST">
				      <li class="dropdown-header">Menú del Usuario</li>
				      <li><button type="submit" name="user_bio" class="btn btn-default btn-sm btn-block">
				      	<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> Mis Datos</button></li>';

                        if($nombre == "Administrador"){

                            echo '<li class="divider"></li>
                                    <li class="dropdown-header">Menú del sistema</li>
                                        <li><button type="submit" name="users" class="btn btn-default btn-sm btn-block">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</button></li>';
                        }
				      
				      echo '<li><button class="btn btn-danger btn-sm btn-block" type="submit" name="exit">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir</button></li>
				     </form>
				    </ul>
				  </div>

			</div>
			      
			      
			    </ul>
			  </div>
			</nav>';

}


function modalAbout(){

	echo '<div class="modal fade" id="myModalAbout" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">A Cerca de...</h4>
		        </div>
		        <div class="modal-body">
		          <p>Some text in the modal.</p>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
		        </div>
		      </div>
		      
		    </div>
		  </div>';
}


function modalDocumentation(){

	echo '<div class="modal fade" id="myModalDocumentation" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Documentación</h4>
		        </div>
		        <div class="modal-body">
		          <p>Some text in the modal.</p>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
		        </div>
		      </div>
		      
		    </div>
		  </div>';

}


function dashboard($conn,$dbname){

    echo '<div class="container-fluid">
            <div class="col-sm-12">
            <div class="jumbotron">

                <div class="well">
                    <h4>Dashboard</h4>
                    <p>Some text..</p>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                    <div class="well">
                        <h4>Users</h4>
                        <p>1 Million</p>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="well">
                        <h4>Pages</h4>
                        <p>100 Million</p>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="well">
                        <h4>Sessions</h4>
                        <p>10 Million</p>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="well">
                        <h4>Bounce</h4>
                        <p>30%</p>
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                    <div class="well">
                        <p>Text</p>
                        <p>Text</p>
                        <p>Text</p>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="well">
                        <p>Text</p>
                        <p>Text</p>
                        <p>Text</p>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="well">
                        <p>Text</p>
                        <p>Text</p>
                        <p>Text</p>
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                    <div class="well">
                        <p>Text</p>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="well">
                        <p>Text</p>
                    </div>
                    </div>
                </div>

                </div>
                </div>';
}




?>
