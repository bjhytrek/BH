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
                        <h2>CIT336 Assignments</h2>
                        <ul>
                            <li class="flow-text"><a href="/assignments/cit336/exercises/chapter02/index.html">Chapter 2 Exercise 1</a></li>
                            <li class="flow-text"><a href="/assignments/cit336/enhancements/chapter02/index.html">Chapter 2 Enhancement</a></li>
                            <li class="flow-text"><a href="/assignments/cit336/exercises/chapter04/index.php">Chapter 4 Exercise/Enhancement 1</a></li>
                            <li class="flow-text"><a href="/assignments/cit336/chapter05/">Chapter 5 Exercise/Enhancement 1</a></li>
                            <li class="flow-text"><a href="/assignments/cit336/chapter06/">Chapter 6 Exercise 2</a></li>
                            <li class="flow-text"><a href="/assignments/cit336/chapter07/index.php">Chapter 7 Enhancement 2</a></li>
                            <li class="flow-text"><a href="/assignments/cit336/chapter08/index.php">Chapter 8 Enhancement 2</a></li>
                            <li class="flow-text"><a href="/assignments/cit336/exercises/chapter11-1/index.php">Chapter 11 Exercise 11-1</a></li>
                            <li class="flow-text"><a href="/assignments/cit336/enhancements/chapter11/index.php">Chapter 11 Enhancement 11</a></li>
                        </ul>
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