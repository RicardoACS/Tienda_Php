<?php include ('conexion.php');?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
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
                        
                    </td>
                    <td>
                        Buscar
                    </td>
                    <td>
                        <input type="text" name="buscar" value="" />
                    </td>
                    <td>
                        <input type="submit" value="Aceptar" name="aceptar" />
                    </td>
                </tr>
                <tr>
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
                     $consulta = mysql_query("SELECT * FROM productos");
                    if(isset($_POST['buscar']))
                    {
                       $query = "SELECT * FROM productos WHERE nombre LIKE '%".$_POST['buscar']."%';";
                       $consulta = mysql_query($query); 
                    }
                    while ($filas = mysql_fetch_array($consulta))
                    {
                        $id = $filas['id'];
                        $imagen = $filas['imagen'];
                        $nombre = $filas['nombre'];
                        $desc = $filas['descripcion'];
                        $precio = $filas['precio'];
                        $stock = $filas['cuanto_hay'];
                        $fecha = $filas['fecha'];
                    
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
                        
                    </td>
                </tr>
            </tbody>
            <?php }?>
        </table>
     </form>
    </body>
</html>

