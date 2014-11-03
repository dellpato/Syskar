<?php
function Conectarse() 
{ 
   if (!($link=mysql_connect("localhost","syskaradmin","Syskar2014"))) 
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   }
 
   if (!mysql_select_db("syskardb", $link)) 
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
   return $link; 
} 
?>