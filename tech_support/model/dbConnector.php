<?php
    $dsn = 'mysql:host=localhost;dbname=tech_support';
    $username = 'php';
    $password = 'Drpepper1991';
    $dbName = "tech_support";
    $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');


        if ($openShiftVar === null || $openShiftVar == "")
     {
          // Not in the openshift environment
//          echo "Using local credentials: "; 
//         echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br >\n";
            try {
                $db = new PDO($dsn, $username, $password);
                } catch (PDOException $e) {
                    $error_message = $e->getMessage();
                    include('database_error.php');
                    exit();
                }
     }
     else 
     { 
          // In the openshift environment
//          echo "Using openshift credentials: ";

          $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
          $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
          $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
          $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
         try {
                $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/database_error.php');
                exit();
                }
     } 
     
    
?>