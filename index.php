<!DOCTYPE html>
    <html>
   <?php
    $site_id = $_POST["site_id"];
    session_start();

//  IMPORTS AND REQUIRES
// ROUTING VARIABLES
//  
    $path = 'pages/';
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null ;
    $php  = '.php';
    $both = $path . $page . $php;
    $pages = array( 'bh', 'cit336', 'cs313', 'amazon', 'my user', 'php project', 'login','logout', 'register');
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


    

    <head>

        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!--
        <script type='text/javascript'>
            window.onAmazonLoginReady = function () {
                amazon.Login.setClientId('amzn1.application-oa2-client.ef152a240a7741718b01300dc81d08b8');
            };
        </script>
        <script type='text/javascript' src='https://static-na.payments-amazon.com/OffAmazonPayments/us/
          sandbox/lpa/js/Widgets.js'>
        </script>
-->




        <title>Brendan Hytrek</title>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    </head>

    <body>
        <?php include 'components/nav/nav.php'; 
        // DATABASE CONNECTION

//        require($_SERVER['DOCUMENT_ROOT'] . "/php_functions/dbConnector.php"); 
//        $db = loadDatabase(); 
        ?>
            <main class="container">
                <div class="row">
                    <?php
                    echo $content; 
            
                ?>
                </div>

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
                <script type="text/javascript" src="index.js"></script>
    </body>

    </html>