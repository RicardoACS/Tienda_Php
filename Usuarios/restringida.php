<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        if($_SESSION['sessionUsuario']['permiso'] == 1)
        {
            echo 'Tiene permisos de admin :3';
            echo $_SESSION['sessionUsuario']['nombre'];
        }
        else
        {
            echo 'No tiene los permisos suficientes';
        }
        ?>
    </body>
</html>
