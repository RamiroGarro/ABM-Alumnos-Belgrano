<?php
 
function Conectarse()
{
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = 'mysql';
         $db = 'sga_belgrano';
         $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db);
         
         if($mysqli->connect_errno ) {
            printf("Connect failed: %s<br />", $mysqli->connect_error);
            exit();
         }
         else{
            //printf('Connected successfully.<br />');
            return $mysqli;
         }
}

?>



