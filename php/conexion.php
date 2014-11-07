<?php
function Conectarse() 
{ 
   if (!($link=mysql_connect("localhost","root","entrar"))) 
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   }
 
   if (!mysql_select_db("seminario", $link)) 
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
   return $link; 
} 
?>