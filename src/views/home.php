<?php

require "bootstrap.php";
session_start();

use models\Page;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./">Home</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./about">About</a>
                </li> -->

                <?php
                $page = $entityManager->getRepository('models\Page')->findAll();
                foreach ($page as $p) {
                ?>

                    <!-- <li class="nav-item">
                        <a type="hidden" class="nav-link" href="./?path=<?php echo $p->getId() ?>"></a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="./?path=<?php echo $p->getId() ?>"><?php echo $p->getPageTitle() ?></a>
                    </li>

                <?php } ?>

            </ul>
        </div>
    </nav>


    <?php
    if (isset($_GET['path'])) {
        $path = $_GET['path'];
        $page = $entityManager->find('models\Page', $path);
        $page->getId();
        $page->getPageTitle();
        $page->getPageContent();
        echo "<div class=\"container\">";

        print($page->getPageContent());
        echo "</div>";
    }
    ?>

    <?php
    if (!isset($_GET['path'])) {
    ?>
        <div class="container">
            <h1 class="mt-5 mb-3 h4 pb-2 mb-4 fs-1 text-secondary border-bottom border-secondary">WELCOME</h1>
            <div class="d-flex">
                <div class="m-3">
                    <p class="text-center">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
                <div class="m-3">
                    <p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                
            </div>
            <figure class="text-center">
                    <blockquote class="blockquote">
                        <p>A well-known quote, contained in a blockquote element.</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        Someone famous in <cite title="Source Title">Source Title</cite>
                    </figcaption>
                </figure>
        </div>

    <?php } ?>



    <!-- issiloginimo zinute turi pasirodyti viena karta -->
    <!-- <?php
            if (isset($_SESSION['logged']) == false)
                echo $message = "You have successfully logged out";
            else
                echo '';
            ?> -->


    <?php require_once "./src/views/footer.php" ?>


</body>

</html>