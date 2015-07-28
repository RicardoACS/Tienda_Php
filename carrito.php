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
            //Sirva para comprar y que no se borre
            $carrito = $_SESSION['carrito'];
            if(isset($_POST['txt_id']))
            {                          
                $id        =  $_POST['txt_id'];
                $nombre    =  $_POST['txt_nombre'];
                $cantidad  =  $_POST['txt_cantidad'];       
                $precio    =  $_POST['txt_precio'];
                $pos       = -1;
                for ($i = 0; $i<count($carrito);$i++)
                {
                    if ($id == $carrito[$i]['id'])
                    {
                        $pos = $i;
                    }
                }
                if ($pos != -1) 
                {
                   $cuanto = $carrito[$pos]['cantidad'] + $cantidad; 
                   $carrito[$pos] = array('id' => $id,'nombre' => $nombre, 
                                'precio' => $precio,'cantidad' => $cuanto); 
                }
                else
                {
                   $carrito[] = array('id' => $id,'nombre' => $nombre, 
                                'precio' => $precio,'cantidad' => $cantidad);
                }
               
             }
        }
        //Actualización de cantida de producto en carrito
        if (isset($_POST['indice2'])) 
        {
            $indice              = $_POST['indice2'];
            $cantidadActualizada = $_POST['cant2'];
            $carrito[$indice]['cantidad'] = $cantidadActualizada;
        }
        //Delete de un producto en carrito
        if (isset($_POST['indice3'])) 
        {
            $indice              = $_POST['indice3'];
            $carrito[$indice]    = NULL;
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
                           if ($carrito[$i] != NULL) 
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
                        <form name="update" action="carrito.php" method="POST">     
                            <!--Este campo hidden permitirá saber que producto será actualizado -->
                            <input type="hidden" name="indice2" value="<?php echo $i ?>" />
                            <input type="text" name="cant2" 
                                   value="<?php echo $carrito[$i]['cantidad']?>" maxlength="2" size="2"/>
                            <input type="image" name = "btn_update" src="Iconos/update.jpg" 
                                   width="20" height="20" alt="update"/>
                        </form>
                    </td>
                    <td>
                        <?php
                        $subTotal = $carrito[$i]['precio'] * $carrito[$i]['cantidad'];
                        $total += $subTotal;
                        ?>
                        <?php echo $subTotal; ?>                       
                    </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="indice3" value="<?php echo $i ?>" />
                            <input type="image" src="Iconos/delete.jpg" 
                                   width="20" height="20" alt="delete"/>

                        </form>
                    </td>
                </tr>
                <?php
                            }
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
