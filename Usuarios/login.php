<?php
include ('../conexion.php');

//Capturar variables
$usuarioForm = $_POST['txt_user'];
$passForm    = $_POST['txt_pass'];

//Inicio de session
session_start();

//Consulta sql
$consulta = mysql_query("SELECT * FROM usuarios;");

//Busqueda
$puerta = 'continuar';
while ($filas = mysql_fetch_array($consulta) and $puerta = 'continuar')
{
    $id = $filas['id'];
    $nombre = $filas['nombre'];
    $usuario = $filas['usuario'];
    $pass = $filas['pass'];
    $permiso = $filas['permisos'];
    $fecha = $filas['fecha'];
    if(isset($usuarioForm) and isset($passForm))
    {
        if ($usuario == $passForm and $pass == $passForm)
        {
            echo 'Bienvenido' . $nombre;
            $sessionUsuario = array('id' => $id, 'nombre' => $nombre,
                                    'usuario' => $usuario, 'pass' => $pass,
                                    'fecha' => $fecha, 'permiso' => $permiso);
            //Creación de la session
            $_SESSION['sessionUsuario'] = $sessionUsuario;
            ?>
            <html>
                <head>
                    <meta http-equiv="refresh" content="3; url = restringida.php">
                </head>
            </html>
            <?php
            $puerta = 'salir';
            exit();
        }
        else
        {
            $resultado = 'no';
        }
    }
    if($resultado == 'no')
    {
        echo 'Su usuario no fue encontrado';
    }
}

?>