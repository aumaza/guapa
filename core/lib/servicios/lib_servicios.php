<?php

class Servicios{

    // PROPIEDADES
    private $descripcion = '';

    // CONSTRUCTOR DESPARAMETRIZADO
    function __construct(){
        $this->descripcion = "";
    }

    // SETTERS
    private function setDescripcion($var){
        $this->descripcion = $var;
    }

    // GETTERS
    private function getDescripcion($var){
        return $this->descripcion = $var;
    }

    // METODOS
    public function listServicios($nServicio,$conn,$dbname){

        if($conn){

                $sql = "SELECT * FROM g_servicios";
                mysqli_select_db($conn,$dbase);
                $resultado = mysqli_query($conn,$sql);

                //mostramos fila x fila
                $count = 0;
                echo '<div class="container-fluid">
                            <div class="jumbotron">

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> <strong>Servicios</strong>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success btn-sm" onclick="callNewServicio();">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Servicio</button>
                            <hr>';


                echo "<table class='display compact' style='width:100%' id='serviciosTable'>";


                echo "<thead>
                                <th class='text-nowrap text-center'><span class='label label-default'>Servicio</span></th>
                                <th class='text-nowrap text-center'><span class='label label-warning'>Acciones</span></th>
                            </thead>";


                while($fila = mysqli_fetch_array($resultado)){
                        // Listado normal
                        echo "<tr>";
                        echo "<td align=center>".$nServicio->getDescripcion($fila['descripcion'])."</td>";
                        echo '<td class="text-nowrap" align=center>
                                        <button type="button" class="btn btn-warning btn-block" value="'.$fila['id'].'"  onclick="callEditServicio(this.value);">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>
                                    </td>';
                                $count++;
                    }

                    echo "</table>";
                    echo "<hr>";
                    echo '<div class="alert alert-info">
                                    <span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span>
                                    <strong>Cantidad de Registros:</strong>  ' .$count.'
                                </div><hr>';

                    echo '</div>
                               </div>';
                    }else{
                        echo 'Connection Failure...';
                    }

                mysqli_close($conn);

    } // END OF FUNCTION

    // ====================================================================================================================================== //
    // FORMULARIOS
    // ====================================================================================================================================== //

    public function formNewServicio(){

        echo '<div class="container">
                <div class="jumbotron">
                <div class="alert alert-info">
                <h2><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Servicio</h2>
                </div><hr>
                <form id="fr_new_servicio_ajax" method="POST">
                    <div class="form-group">
                    <label for="descripcion">Empresa:</label>
                    <input type="text" class="form-control" id="descripcion" placeholder="Ingrese la descripcion del tipo de servicio" name="descripcion">
                    </div>

                    <button type="submit" class="btn btn-success" id="add_servicio">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aceptar</button>
                </form><hr>

                <div id="messageNewServicio"></div>

                </div>
                </div>';
    }


    public function formEditServicio($nServicio,$id,$conn,$dbname){

        mysqli_select_db($conn,$dbname);
        $sql = "select * from g_servicios where id = '$id'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);

        echo '<div class="container">
                <div class="jumbotron">
                <div class="alert alert-info">
                <h2><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Editar Servicio</h2>
                </div><hr>
                <form id="fr_edit_servicio_ajax" method="POST">

                    <input type="hidden" id="id" name="id" value="'.$id.'">

                    <div class="form-group">
                    <label for="descripcion">Empresa:</label>
                    <input type="text" class="form-control" id="descripcion" placeholder="Ingrese la descripcion del tipo de servicio" name="descripcion" value="'.$nServicio->getDescripcion($row['descripcion']).'">
                    </div>

                    <button type="submit" class="btn btn-success" id="edit_servicio">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aceptar</button>
                </form><hr>

                <div id="messageEditServicio"></div>

                </div>
                </div>';
    }

    // ====================================================================================================================================== //
    // PERSISTENCIA
    // ====================================================================================================================================== //
    public function addServicio($nServicio,$descripcion,$conn,$dbname){

        mysqli_select_db($conn,$dbname);
        $sql = "select * from g_servicios where descripcion = $nServicio->getDescripcion('$descripcion')";
        $query = mysqli_query($conn,$sql);
        $rows = mysqli_num_rows($query);

        if($rows == 0){

            $sql_1 = "INSERT INTO g_servicios (descripcion) VALUES ($nServicio->setDescripcion('$descripcion'))";
            $query_1 = mysqli_query($conn,$sql_1);

            if($query_1){
                $success = 'Registro guardado exitosamente en tabla g_servicios';
                $nServicio->successMysqlServicio($success);
                echo 1;
            }else{
                $error = 'Hubo un problema al intentar guardar registro en la tabla g_servicios. ERROR: [ '.mysqli_error($conn).' ]';
                $nServicio->errorMysqlServicio($error);
                echo -1;
            }

        }if($rows > 0){
            echo 9; // registro existente
        }

    } // END OF FUNCTION

    public function updateServicio($nServicio,$id,$descripcion,$conn,$dbname){

        mysqli_select_db($conn,$dbname);
        $sql = "update g_servicios set descripcion = $nServicio->setDescripcion('$descripcion') where id = '$id'";
        $query = mysqli_query($conn,$sql);

        if($query){
            $success = 'Registro actualizado exitosamente en tabla g_servicios con ID: [' .$id. ']';
            $nServicio->updateSuccessMysqlServicio($success);
            echo 1;
        }else{
            $error = 'Hubo un problema al intentar actualizar registro en la tabla g_servicios con ID: [ '.$id.' ]. ERROR: [ '.mysqli_error($conn).' ]';
            $nServicio->errorMysqlServicio($error);
            echo -1;
        }

    } // END OF FUNCTION


    // MENEJO DE GUARDADO EXITOSA

    public function successMysqlServicio($success){

        $fileName = "servicio_mysql_success.log";
        $date = date("d-m-Y H:i:s");
        $message = 'Success: '.$success.' - '.$date;

        if (file_exists($fileName)){

        $file = fopen($fileName, 'a');
        fwrite($file, "\n".$message);
        fclose($file);
        //chmod($file, 0777);

        }else{
            $file = fopen($fileName, 'w');
            fwrite($file, $message);
            fclose($file);
            //chmod($file, 0777);
            }
    } // END OF FUNCTION

    // MENEJO DE ACTUALIZACION EXITOSA

    public function updateSuccessMysqlServicio($success){

        $fileName = "servicio_mysql_success.log";
        $date = date("d-m-Y H:i:s");
        $message = 'Success: '.$success.' - '.$date;

        if (file_exists($fileName)){

        $file = fopen($fileName, 'a');
        fwrite($file, "\n".$message);
        fclose($file);
        //chmod($file, 0777);

        }else{
            $file = fopen($fileName, 'w');
            fwrite($file, $message);
            fclose($file);
            //chmod($file, 0777);
            }
    } // END OF FUNCTION

    // MANEJO DE ERRORES

    public function errorMysqlServicio($error){

        $fileName = "servicio_mysql_error.log";
        $date = date("d-m-Y H:i:s");
        $message = 'Error: '.$error.' - '.$date;

        if (file_exists($fileName)){

        $file = fopen($fileName, 'a');
        fwrite($file, "\n".$message);
        fclose($file);
        //chmod($file, 0777);

        }else{
            $file = fopen($fileName, 'w');
            fwrite($file, $message);
            fclose($file);
            //chmod($file, 0777);
            }
    } // END OF FUNCTION

} // END OF CLASS

?>
