<?php

function loadDatabase() 
{

  $dbHost = "";
  $dbPort = "";
  $dbUser = "";
  $dbPassword = "";

     $dbName = "store";

     $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

     if ($openShiftVar === null || $openShiftVar == "")
     {
          // Not in the openshift environment
//          echo "Using local credentials: "; 
          require($_SERVER['DOCUMENT_ROOT'] . "/model/setLocalDatabaseCredentials.php");
//         echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br >\n";
     }
     else 
     { 
          // In the openshift environment
//          echo "Using openshift credentials: ";

          $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
          $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
          $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
          $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
     } 
     
    try {
        $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword, array(
    PDO::ATTR_PERSISTENT => true));
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection failed: '. $e->getMessage();
    }
     

     return $db;

}

?>