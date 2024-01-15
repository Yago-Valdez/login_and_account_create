<?php
    header('Access-Control-Allow-Origin: *');
    $arr = array('server' => 'Error', 'access' => 'Error');
    try {
        if ($conexion=mysqli_connect('localhost','root','','SICMAI_Soporte')){
            $correo = $_GET['correo'];
            $arr = array('server' => 'Ok', 'access' => 'Error');
            if($correo != ''){
                $contra = $_GET['contra'];
                $sql="SELECT Correo, aes_decrypt(unhex(Contra), 'aslolas1231sdsa')from clientes WHERE Correo = '$correo'";
                $result=mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result)){
                    $corre =$mostrar['Correo'];
                    $cont = $mostrar["aes_decrypt(unhex(Contra), 'aslolas1231sdsa')"];
                    
                }
                if ($contra == strval($cont)){
                    $arr = array('server' => 'Ok', 'access' => 'Ok');
                    session_start();
                    $_SESSION['correo'] = $corre;
                }else{
                    $arr = array('server' => 'Ok', 'access' => 'Error');
                }
            }
        }
    } catch (Exception $ex) {
        $arr = array('server' => 'Error', 'access' => 'denegado');
        
    }
echo json_encode($arr);
?>
