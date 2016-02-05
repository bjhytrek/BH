<?php
// Start the session
session_start();


?>
 <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../../css/materialize.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
    <?php include $_SERVER["DOCUMENT_ROOT"]."/components/header/header.php"  ?>
     <main>
         <h2>PHP Survey</h2>
        <h3>Best Game of 2015 Results:</h3>
        <?php 
    
        $vote = $_POST["game"];
        if(isset($vote) or $_SESSION["visited"] == 1) {
            echo "<h4>You have voted for $vote as the best game of 2015.</h4>";
            $_SESSION["visited"] = 1;
        }else {
//            print_r($_SESSION);
            echo "<h4>You haven't voted yet!</h4><a class=\"waves-effect waves-light btn\" href=\"survey.php\">Take Survey</a><br>";
            unset($_SESSION["visited"]);
            
        }

        $file = 'vote_data.txt';
        
        // Check to see if $current is set
        if(file_exists($file)){
            // Open the file to get existing content
            $votes = file_get_contents($file);
            // decode json
            $votes = json_decode($votes,true);
            // Find index value of $vote, then add a vote.
            $votes[$vote] += 1;
            
            
        }else {
            // Initialize array
             $votes = array_fill_keys(array('StarCraft', 'Witcher 3', 'Fallout 4', 'StarWars Battlefront', 'Euro Trucker', 'Diddy Kong'), '0');
            $votes[$vote]+=1;
            
        }
        foreach ($votes as $key => $value) {
            echo "<br>$key: Total Votes: $value\n<br>";
        }
        
            // Encode the array back into json
            $votes = json_encode($votes);
            // Write the contents back to the file
            file_put_contents($file, $votes);
        ?>
     </main>
     <?php include $_SERVER["DOCUMENT_ROOT"]."/components/footer/footer.php"  ?>
     
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../../js/bin/materialize.min.js"></script>
    </body>
  </html>
        