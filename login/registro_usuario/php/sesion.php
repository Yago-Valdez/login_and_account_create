<?php
    header('Access-Control-Allow-Origin: *');
    $arr = array('server' => 'Error', 'correo' => 'no_existe');
    try {
        if ($conexion=mysqli_connect('localhost','root','','SICMAI_Soporte')){
            $correo = $_GET['correo'];
            $arr = array('server' => 'Ok', 'correo' => 'no_existe');
            if($correo != ''){
                $contra = $_GET['contra'];
                $sql="SELECT * from clientes WHERE Correo = '$correo'";
                $result=mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result)){
                    $corre =$mostrar['Correo'];
                }
                if ($corre  == $correo){
                    $arr = array('server' => 'Ok', 'correo' => 'existe');
                }else{
                    $arr = array('server' => 'Ok', 'correo' => 'no_existe');
                }
            }
        }
    } catch (Exception $ex) {
        $arr = array('server' => 'Error', 'correo' => 'no_existe');
        
    }
echo json_encode($arr);
?>
