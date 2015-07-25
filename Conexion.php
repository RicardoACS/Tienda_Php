<?php
$conexion = mysql_connect('localhost','root','root') or die ('Error en conexión');
$db = mysql_select_db('tienda',$conexion) or die("No existe");
mysql_set_charset('utf8');
?>