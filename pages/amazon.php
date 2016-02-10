<?php $_POST["site_id"] = "amazon";  ?>

    <h1>Log in and Pay with Amazon</h1>
    <div id="AmazonLoginButton"></div>

    <div id="AmazonPayButton" />
    <script type="text/javascript">
        var authRequest;
        OffAmazonPayments.Button("AmazonPayButton", "amzn1.application-oa2-client.ef152a240a7741718b01300dc81d08b8", {
            type: "LwA",
            color: "Gold",
            size: "small",
            authorization: function () {
                loginOptions = {
                    scope: "payments:widget payments:shipping_address",
                    popup: true;
                };
                authRequest = amazon.Login.authorize(loginOptions,
                    "YOUR_REDIRECT_URL_HERE");
            },
            onError: function (error) {
                // your error handling code
            }
        });
    </script>