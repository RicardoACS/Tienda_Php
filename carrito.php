<?php 

include ('conexion.php');
//Acentos
header('Content-Type: text/html; charset=UTF-8'); 
mysql_set_charset('utf8');
session_start();
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
             $carrito[] = array('id' => $id,'nombre' => $nombre, 
                             'precio' => $precio,'cantidad' => $cantidad);
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
        if (isset($_SESSION['carrito'])) 
        {
            $carrito = $_SESSION['carrito'];
            if(isset($_POST['txt_id']))
            {                          
                $id        =  $_POST['txt_id'];
                $nombre    =  $_POST['txt_nombre'];
                $cantidad  =  $_POST['txt_cantidad'];       
                $precio    =  $_POST['txt_precio'];  
                $carrito[] = array('id' => $id,'nombre' => $nombre, 
                                'precio' => $precio,'cantidad' => $cantidad);
             }
        }
        if(isset($carrito))
        {
           $_SESSION['carrito'] = $carrito;  
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
                <?php
                $total = 0;
                   if(isset($carrito))
                   {
                       
                       for($i = 0; $i < count($carrito);$i++)
                        {                          
                ?>
                <tr>
                    <td>
                        <?php echo $carrito[$i]['nombre']?>
                    </td>
                    <td>
                        <?php echo $carrito[$i]['precio']?>
                    </td>
                    <td>
                        <?php echo $carrito[$i]['cantidad']?>
                    </td>
                    <td>
                        <?php
                        $subTotal = $carrito[$i]['precio'] * $carrito[$i]['cantidad'];
                        $total += $subTotal;
                        ?>
                        <?php echo $subTotal; ?>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td>
                        <?php
                        echo $total;
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>        
        <a href="index.php">Volver</a>
    </body>
</html>
