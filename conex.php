<?php
function Conexion_pozos(){
    $db=mysqli_connect('localhost', 'root', 'J1mmyB@rne3', 'zulusales') or die("No se conecto al servidor");
            return $db;
}
$dbx=Conexion_pozos();
?>