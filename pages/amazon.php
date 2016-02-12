<?php $_POST["site_id"] = "amazon";  ?>

    <h1>Log in and Pay with Amazon</h1>
    <h3>This page is still under construction. Please do not attempt to login.</h3>
    <div id="amazon-root"></div>
    <script type="text/javascript">
        window.onAmazonLoginReady = function () {
            amazon.Login.setClientId('amzn1.application-oa2-client.ef152a240a7741718b01300dc81d08b8');
            
        };
        (function (d) {
            var a = d.createElement('script');
            a.type = 'text/javascript';
            a.async = true;
            a.id = 'amazon-login-sdk';
            a.src = 'https://api-cdn.amazon.com/sdk/login1.js';
            d.getElementById('amazon-root').appendChild(a);
        })(document);
    </script>

    <!--    Login Code-->

    <a href id="LoginWithAmazon">
        <img border="0" alt="Login with Amazon" src="https://images-na.ssl-images-amazon.com/images/G/01/lwa/
btnLWA_gold_156x32.png" width="156" height="32" />
    </a>
    <script type="text/javascript">
        document.getElementById('LoginWithAmazon').onclick = function () {
            options = {
                scope: 'profile'
            };
            amazon.Login.authorize(options,
                'https://bh.dev/pages/handle_login.php');
            return false;
        };
    </script>


    <!--    Log out code-->
    <a href id="Logout">Logout</a>
    <script type="text/javascript">
        document.getElementById('Logout').onclick = function () {
            amazon.Login.logout();
        };
    </script>







    <!--    PAY WITH AMAZON CODE-->
    <!--
    
    <div class="text-center" style="margin-top:40px;" id="AmazonPayButton"></div>
    <script type='text/javascript'>
        window.onAmazonLoginReady = function () {
            amazon.Login.setClientId('amzn1.application-oa2-client.ef152a240a7741718b01300dc81d08b8');
            amazon.Login.setUseCookie(true);
        };
    </script>


    
    <script type='text/javascript' src='https://static-na.payments-amazon.com/OffAmazonPayments/us/sandbox/js/Widgets.js'></script>
    <script type='text/javascript'>
        var authRequest;
        OffAmazonPayments.Button("AmazonPayButton", "amzn1.application-oa2-client.ef152a240a7741718b01300dc81d08b8", {
            type: "PwA",
            authorization: function () {
                loginOptions = {
                    scope: "profile postal_code payments:widget payments:shipping_address",
                    popup: true
                };
                authRequest = amazon.Login.authorize(loginOptions, "/index.php?page=user");
            },
            onError: function (error) {
                // something bad happened
            }
        });
    </script>-->