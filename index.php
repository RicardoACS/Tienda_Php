<?php 
include ('conexion.php');
//Acentos
header('Content-Type: text/html; charset=UTF-8'); 
mysql_set_charset('utf8');
?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="index.php" method="POST">
        <table border="0">
            <tbody>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        Buscar
                    </td>
                    <td>
                        <input type="text" name="buscar" value="" />
                    </td>
                    <td>
                        <input type="submit" value="Aceptar" name="aceptar" />
                        </form>
                    </td>
                    <td>
                        <a href="carrito.php">Ver carrito</a>
                    </td>
                </tr>
                <tr align="center" valign="middle">
                    <td colspan="8" aling="center">
                   Listado de Productos
                    </td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>Imagen</td>
                    <td>Nombre</td>
                    <td>Descripción</td>
                    <td>Precio</td>
                    <td>Stock</td>
                    <td>Fecha</td>
                    <td>Agregar</td>
                </tr>
                <?php
                //Consulta SQL para ver todos los productos
                    $consulta = mysql_query("SELECT * FROM productos");
                    //Funciona parecido a request, el cual obtiene el valor del txt
                    if(isset($_POST['buscar']))
                    {
                       //Solo se verá el producto escrito
                       $query = "SELECT * FROM productos WHERE nombre LIKE '%".$_POST['buscar']."%';";
                       $consulta = mysql_query($query); 
                    }
                    while ($filas = mysql_fetch_array($consulta))
                    {
                        //Se obtiene los valores del producto
                        $id = $filas['id'];
                        $imagen = $filas['imagen'];
                        $nombre = $filas['nombre'];
                        $desc = $filas['descripcion'];
                        $precio = $filas['precio'];
                        $stock = $filas['cuanto_hay'];
                        $fecha = $filas['fecha'];
                        //Agregando al carrito los productos, SIN SEGURIDAD
                        //$agregar = '<a href ="carrito.php?id='.$filas['id'].'" title="'.$filas['id'].'">Agregar</a>';
                ?>
                <tr>
                    <td>
                       <?php echo $id ;?> 
                    </td>
                    <td>
                       <img src="Imagenes/<?php echo $imagen; ?>" width="100" height="100"/> 
                    </td>
                    <td>
                        <?php echo $nombre;?> 
                    </td>
                    <td>
                        <?php echo $desc ;?> 
                    </td>
                    <td>
                        <?php echo $precio ;?> 
                    </td>
                    <td>
                        <?php echo $stock;?> 
                    </td>
                    <td>
                        <?php echo $fecha;?> 
                    </td>
                    <td>
                        <form action="carrito.php" method="POST" name="compra">
                            <input type="hidden" name="txt_id" value="<?php echo $id ;?> " />
                            <input type="hidden" name="txt_nombre" value="<?php echo $nombre ;?> " />
                            <input type="hidden" name="txt_precio" value="<?php echo $precio ;?> " />
                            <input type="hidden" name="txt_cantidad" value="1" />
                            <input type="submit" value="Comprar" name="btn_comprar" />
                        </form>
                    </td>
                </tr>
            </tbody>
            <?php }?>
        </table>
     
    </body>
</html>

