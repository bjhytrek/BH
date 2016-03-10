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
                        <h2>CIT336 Teaching Presentation:</h2>
                        <?php
                    $cars=array("Volvo","BMW","Toyota", "Acura");
                    $cars2=array
                        (
                        "Volvo"=>array
                        (
                        "XC60",
                        "XC90"
                        ),
                        "BMW"=>array
                        (
                        "X3",
                        "X5"
                        ),
                        "Toyota"=>array
                        (
                        "Highlander"
                        )
                        );
                        $a = array('1.10', 12.4, 1.13);

                    ?>
                            <p>Lets take a look at a few functions we can use to manipulate, or get information from arrays in PHP.</p>

                            <h3>sort()</h3>
                            <h5>This function sorts an array. Elements will be arranged from lowest to highest when this function has completed.</h5>
                            <p>What is the sort() function, what does it do?<em>This function sorts an array. Elements will be arranged from lowest to highest when this function has completed.</em> Sounds pretty straight forward right? Well, lets see it in action..</p>
                            <p>We will use the following array to see how we can use the sort() function.</p>
                            <code>
                        <?php
                   echo htmlspecialchars('<?php cars=array("Volvo","BMW","Toyota", "Acura"); 
                                ?>');
?>
                            </code>
                            <p>First, lets sort this array naturally.</p>
                            <code>sort($fruits);<br>
                                foreach ($fruits as $key => $val) <br>{
                                    echo "fruits[" . $key . "] = " . $val . "\n";
                            }</code>
                            <p>Here is the output:</p>
                            <?php sort($cars);
                                foreach ($cars as $key => $val){
                                    echo "Cars[" . $key . "] = " . $val . "<br>";}?>
                            <p>Notice that the array is now sorted in aphabetial order. This is how the default sort() function orders an array of strings. If this had been an array of numbers, the array would be ordered smallest to largest. There are several different flags we can pass the sort() function. For futher information, follow this link: <a href="http://php.net/manual/en/function.sort.php">php.net Sort()</a></p>
                               
                                <h3>count()</h3>
                                <h5>The count() function returns the number of elements in an array.</h5>
                                <p>This is an easy one! The count() function returns the number of elements in an array, pretty straight forward, right?</p>
                                <p>Lets use the array from ealier, and the following code:</p>
                                <code>
                                    <?php echo htmlspecialchars('echo count($cars);') ?>
                                </code>
                                <p>The results:</p>
                                <?php echo count($cars); ?>
                                <p>Makes sense but, why would I use count()? Well, lets say you query your database by selecting all the car brand names stored and then return that to your php server as an array called "$car_brands". You could easily find out how many were found by running the code: <code><em>count($car_brands);</em></code></p>
                                <p>What if one wishes to get the count() of a multivariable array? Easy, all we have to do is pass in a flag to signal that we want to run count recursively. The flag is the second parameter in count($cars,1); This parameter "1" represents "true".</p>
                                <p>Lets use a new array:</p>
                                <pre>
<code>
<?php echo htmlspecialchars('<?php
$cars2=array
    (
    "Volvo"=>array
    (
    "XC60",
    "XC90"
    ),
    "BMW"=>array
    (
    "X3",
    "X5"
    ),
    "Toyota"=>array
    (
    "Highlander"
    )
    );
echo "Normal count: " . count($cars)."<br>";
echo "Recursive count: " . count($cars,1);
?>'); ?>
</code>
                                </pre>
                                <p>The results:</p>
                                <?php
                                echo "Normal count: " . count($cars2)."<br>";
                                echo "Recursive count: " . count($cars2,1); ?>
                                <p>You can find more information on count() here: <a href="http://php.net/manual/en/function.count.php">php.net count()</a></p>
                                
                                <h3>in_array()</h3>
                                <h5>in_array - Checks if a value exists in an array</h5>
                                <p>This is another easy one. Lets use an example straight from php.net. Here is the code:</p>
<pre>
    <code>
        <?php echo htmlspecialchars('
<?php
$os = array("Mac", "NT", "Irix", "Linux");
if (in_array("Irix", $os)) {
    echo "Got Irix";
}
if (in_array("mac", $os)) {
    echo "Got mac";
}
?>'); ?>
    </code>
</pre>        
                              <p>The second condition fails because in_array() is case-sensitive, so the program above will display:</p>  
                              <code>Got Irix</code> 
                              <p>We can also set a third parameter to <strong>true</strong>, which will enable in_array() to check the type of entity we're looking for.</p>
                              <p>Here is an example using strict with a new array:</p> 
<pre>
    <code>
<?php
echo htmlspecialchars('
<?php
$a = array("1.10", 12.4, 1.13);

if (in_array("12.4", $a, true)) {
    echo " "12.4" found with strict check\n";
}

if (in_array(1.13, $a, true)) {
    echo "1.13 found with strict check\n";
}
?> 
'); ?>
    </code>
</pre>
                                <p>The results:</p>
                                <?php 
                                 if (in_array('12.4', $a, true)) {
                                    echo "'12.4' found with strict check\n";
                                }

                                if (in_array(1.13, $a, true)) {
                                    echo "1.13 found with strict check\n";
                                }
                            ?>
                                <p>"12.4" was not found becuase in_array("12.4", $a, true) is searching for a string of "12.4" not an integer.</p>
                    </div>

                </main>




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
        </body>

    </html>