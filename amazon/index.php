<?php session_start(); ?>
    <!DOCTYPE html>
    <html>

    <?php include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/head/head.php'; ?>

        <body>
            <?php 
        include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/nav/nav.php'; 
        ?>

                <main class="container">
                    <div class="row">
                        <div id="AmazonPayButton">
                        </div>

                        <script type="text/javascript">
                            var authRequest;
                            OffAmazonPayments.Button("AmazonPayButton", "amzn1.application-oa2-client.ef152a240a7741718b01300dc81d08b8", {
                                type: "PwA",
                                color: "Gold",
                                size: "large",

                                authorization: function () {
                                    loginOptions = {
                                        scope: "profile",
                                        popup: "true"
                                    };
                                    authRequest = amazon.Login.authorize(loginOptions, "REDIRECT_URL");
                                },

                                onError: function (error) {
                                    // your error handling code.
                                    // alert("The following error occurred: " 
                                    //        + error.getErrorCode() 
                                    //        + ' - ' + error.getErrorMessage());
                                }
                            });
                        </script>
                        <div id="Logout"></div>
                        <script type="text/javascript">
                            document.getElementById('Logout').onclick = function () {
                                amazon.Login.logout();
                            };
                        </script>





                    </div>

                </main>

        </body>


        <?php 
    if($site_id === "cit336"){
        include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/cit336/cit336.php';
    }else {
            include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/footer/footer.php';
    } 
    ?>
            <!--Import jQuery before materialize.js-->
            <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script type="text/javascript" src="/js/bin/materialize.min.js"></script>
            <script type="text/javascript" src="/index.js"></script>

    </html>