<?php
//Conexion via local
//$conexion = mysql_connect('localhost','root','root') or die ('Error en conexión');
//$db = mysql_select_db('tienda',$conexion) or die("No existe");
//mysql_set_charset('utf8');

$conexion = mysql_connect('mysql7.000webhost.com','a7746446_rick','tienda01') or die ('Error en conexion');
$db = mysql_select_db('a7746446_tienda',$conexion) or die("No existe");
mysql_set_charset('utf8');
?>
