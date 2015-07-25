<?php 
include ('Conexion.php');
//Acentos
header('Content-Type: text/html; charset=UTF-8'); 
mysql_set_charset('utf8');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Carrito de Compras</h1>
        <hr>
        <?php
        if (isset($_POST['txt_id'])) 
        {
             $id        =  $_POST['txt_id'];
             $nombre    =  $_POST['txt_nombre'];
             $cantidad  =  $_POST['txt_cantidad'];       
             $precio    =  $_POST['txt_precio'];                 
//            //Como mostrarlo Por BD
//            $nRegistro = $_POST['txt_id'];
//            $consulta = "SELECT * FROM productos WHERE id = " . $nRegistro . ";";
//            $result = mysql_query($consulta);
//            $filas = mysql_fetch_array($result);
//            
//            echo 'Productos: <br>';
//            echo 'ID    : ' . $filas['id']     . '<br>';
//            echo 'Nombre: ' . $filas['nombre'] . '<br>';
        }
        ?>
        <table border="0">
            <tbody>
                <tr align="center" valign="middle">
                    <td colspan="4" aling="center">Listado de sus compras</td>
                </tr>
                <tr>
                    <td>Producto</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                    <td>Subtotal</td>
                </tr>
                <tr>
                    <td><?php echo $nombre;?></td>
                    <td><?php echo $precio;?></td>
                    <td><?php echo $cantidad;?></td>
                    <td><?php echo $precio * $cantidad;?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td>XX</td>
                </tr>
            </tbody>
        </table>
        <br>        
        <a href="index.php">Volver</a>
    </body>
</html>
