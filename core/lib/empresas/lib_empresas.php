<?php

class Empresas{

    // PROPIEDADES
    private $descripcion = '';

    // COSTRUCTOR DESPARAMETRIZADO
    function __construct(){
        $this->descripcion = '';
    }

    // SETTERS
    private function setDescripcion($var){
        $this->descripcion = $var;
    }

    // GETTERS
    private function getDescripcion($var){
        return $this->descripcion = $var;
    }

    public function listEmpresas($nEmpresa,$conn,$dbname){

        if($conn){

                $sql = "SELECT * FROM g_empresas";
                mysqli_select_db($conn,$dbase);
                $resultado = mysqli_query($conn,$sql);

                //mostramos fila x fila
                $count = 0;
                echo '<div class="container-fluid">
                            <div class="jumbotron">

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-oil" aria-hidden="true"></span> <strong>Empresas</strong>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success btn-sm" onclick="callNewEmpresa();">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Empresa</button>
                            <hr>';


                echo "<table class='display compact' style='width:100%' id='empresasTable'>";


                echo "<thead>
                                <th class='text-nowrap text-center'><span class='label label-default'>Empresa</span></th>
                                <th class='text-nowrap text-center'><span class='label label-warning'>Acciones</span></th>
                            </thead>";


                while($fila = mysqli_fetch_array($resultado)){
                        // Listado normal
                        echo "<tr>";
                        echo "<td align=center>".$nEmpresa->getDescripcion($fila['descripcion'])."</td>";
                        echo '<td class="text-nowrap" align=center>
                                        <button type="button" class="btn btn-warning btn-block" value="'.$fila['id'].'"  onclick="callEditEmpresa(this.value);">
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

    public function formNewEmpresa(){

        echo '<div class="container">
                <div class="jumbotron">
                <div class="alert alert-info">
                <h2><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Empresa</h2>
                </div><hr>
                <form id="fr_new_empresa_ajax" method="POST">
                    <div class="form-group">
                    <label for="descripcion">Empresa:</label>
                    <input type="text" class="form-control" id="descripcion" placeholder="Ingrese la razón social de la empresa" name="descripcion">
                    </div>

                    <button type="submit" class="btn btn-success" id="add_empresa">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aceptar</button>
                </form><hr>

                <div id="messageNewEmpresa"></div>

                </div>
                </div>';
    }


    // ====================================================================================================================================== //
    // PERSISTENCIA
    // ====================================================================================================================================== //
    public function addEmpresa($nEmpresa,$descripcion,$conn,$dbname){

        mysqli_select_db($conn,$dbname);
        $sql = "select * from g_empresas where descripcion = $nEmpresa->getDescripcion('$descripcion')";
        $query = mysqli_query($conn,$sql);
        $rows = mysqli_num_rows($query);

        if($rows == 0){

            $sql_1 = "insert into g_empresas ".
                     "(descripcion) ".
                     "VALUES ".
                     "($nEmpresa->setDescripcion('$descripcion'))";
            $query_1 = mysqli_query($conn,$sql_1);

            if($query_1){
                $success = 'Alta de empresa existosa';
                $nEmpresa->successMysqlEmpresa($success);
                echo 1; // registro guardado exitosamente
            }else{
                $error = 'Hubo un error al dar de alta empresa '.mysqli_error($conn);
                $nEmpresa->errorMysqlEmpresa($error);
                echo -1; // hubo un problema al guardar el registro
            }


        }if($rows > 0){
            echo 9; // registro existente
        }



    }


    // MENEJO DE  ACTUALIZACION EXITOSA

    public function successMysqlEmpresa($success){

        $fileName = "empresa_mysql_success.log";
        $date = date("d-m-Y H:i:s");
        $message = 'Success: '.$success.' - '.$date;

        if (file_exists($fileName)){

        $file = fopen($fileName, 'a');
        fwrite($file, "\n".$message);
        fclose($file);
        chmod($file, 0777);

        }else{
            $file = fopen($fileName, 'w');
            fwrite($file, $message);
            fclose($file);
            chmod($file, 0777);
            }
    }

    // MANEJO DE ERRORES

    public function errorMysqlEmpresa($error){

        $fileName = "empresa_mysql_error.log";
        $date = date("d-m-Y H:i:s");
        $message = 'Error: '.$error.' - '.$date;

        if (file_exists($fileName)){

        $file = fopen($fileName, 'a');
        fwrite($file, "\n".$message);
        fclose($file);
        chmod($file, 0777);

        }else{
            $file = fopen($fileName, 'w');
            fwrite($file, $message);
            fclose($file);
            chmod($file, 0777);
            }
    } // END OF FUNCTION




} // END CLASS

?>
