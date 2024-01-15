<?php
    header('Access-Control-Allow-Origin: *');
    $arr = array('server' => 'Error', 'registro' => 'Error');
    try{
        if ($conexion=mysqli_connect('localhost','root','','SICMAI_Soporte')){
            $corre = $_GET['corre'];
            $nom   = $_GET['nom'];
            $ape   = $_GET['ape'];
            $pass  = $_GET['pass'];
            $sql="INSERT INTO clientes (Correo, Nombre, Apellido, Contra) VALUES ('$corre','$nom','$ape',hex(AES_ENCRYPT('$pass','aslolas1231sdsa')));";
            if (mysqli_query($conexion,$sql)) {
                $arr = array('server' => 'Ok', 'registro' => 'ok');
            } else {
                $arr = array('server' => 'error', 'registro' => 'error');
            }
        }

    }catch (Exception $ex){
        $arr = array('server' => 'error', 'registro' => 'error');
    }
    echo json_encode($arr);
?>
