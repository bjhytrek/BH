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
        <?php 
            print_r($_SESSION);
            if($_SESSION["visted"] !== "true"){
         echo '<h3>Please take a moment to cast your vote for the best game of 2015.</h3>
         
         <form action="results.php" method="POST">
             <p>
              <input name="game" type="radio" value="StarCraft" id="test1" />
              <label for="test1">StarCraft Lagacy of The Void</label>
            </p>
            <p>
              <input name="game" type="radio" value="Witcher 3" id="test2" />
              <label for="test2">The Witcher 3</label>
            </p>
            <p>
              <input name="game" type="radio" value="Fallout 4" id="test3" />
              <label for="test3">Fallout 4</label>
            </p>
            <p>
              <input name="game" type="radio" value="StarWars Battlefront" id="test4" />
              <label for="test4">StarWars Battlefront:EA</label>
            </p>
            <p>
              <input name="game" type="radio" value="Euro Trucker" id="test5" />
              <label for="test5">Euro Truck Simulator</label>
            </p>
            <p>
              <input name="game" type="radio" value="Diddy Kong" id="test6" />
              <label for="test6">Diddy Kong (For Clint..)</label>
            </p>
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button><br>
        </form>';
}else{
    echo '<h3>Thank you for your vote! Please proceed to the results page.</h3>';
}
        
        ?>
         <br><a class="waves-effect waves-light btn" href="results.php">Results</a>
         
     </main>
     <?php include $_SERVER["DOCUMENT_ROOT"]."/components/footer/footer.php"  ?>
     
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../../js/bin/materialize.min.js"></script>
    </body>
  </html>
        