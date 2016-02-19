<?php session_start(); ?>
<!DOCTYPE html>
<html>

<?php include 'components/head/head.php'; ?>

    <body>
        <?php 
        include 'components/nav/nav.php'; 
        ?>
            <main class="container">
                <div class="row">
                    <h2>Brendan Hytrek Home page</h2>
                    <div class="row">
                        <div class="col s12 m7">
                            <div class="card">
                                <div class="card-image">
                                    <img src="/media/selfie.jpg">
                                    <span class="card-title">About Me</span>
                                </div>
                                <div class="card-content">
                                    <p>My name is Brendan Hytrek. I am a Web Design and Development major at BYU-Idaho. I currently live in Rexburg, Idaho. I am currently working locally with a team performing maintenance on LDS.org. I was also part of a small team that built <a href="https://churchhistorianspress.org/">The Church Historian's Press</a>,
                                        <a href="https://churchhistorianspress.org/publications">The George Q. Cannon Papers</a>, and <a href="https://churchhistorianspress.org/publications">The Relief Society Papers</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                <script type="text/javascript" src="/js/bin/materialize.min.js"></script>
                <script type="text/javascript" src="/index.js"></script>
    </body>

</html>