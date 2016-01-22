<?php
    $site_id = $_POST["site_id"];
    
// ROUTING VARIABLES
    $path = 'pages/';
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null ;
    $php  = '.php';
    $both = $path . $page . $php;
    $pages = array( 'bh', 'cit336', 'cs313');
    $default_page = 'pages/bh.php';
    $error_page = 'pages/error.php';

//  ROUTING LOGIC

    function getContent($requested_page){
        
            ob_start();                      // start capturing output
            include($requested_page);                  // execute the file
            $content = ob_get_contents();    // get the contents from the buffer
            ob_end_clean();                  // stop buffering and discard contents
            return $content;
    }
    if (!empty($page)) {

        if(in_array($page,$pages)) {
            //$page .= '.php';
            $content = getContent($both);
        }
        else {
           $content = getContent($default_page);

        }
    }
    else {
         $content = getContent($default_page);
        
    }
?>


    <!DOCTYPE html>
    <html>

    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
        <title>Brendan Hytrek</title>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    </head>

    <body>
        <?php include 'components/header/header.php'; ?>
        <main>
           
            <?php
            echo $content; ?>
        </main>
        

        

            <?php 
    if($site_id === "cit336"){
        include 'components/cit336/footer/footer.php';
    }else {
            include 'components/footer/footer.php';
    } 
    ?>
                <!--Import jQuery before materialize.js-->
                <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
                <script type="text/javascript" src="js/bin/materialize.min.js"></script>
    </body>

    </html>