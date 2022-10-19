<?php
require "bootstrap.php";
session_start();
?>

<?php require_once "./src/views/fragments/head.php"; ?>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                $page = $entityManager->getRepository('models\Page')->findAll();
                foreach ($page as $p) : ?>
                    <li class="nav-item">
                        <?php if ($p->getId() == 1) : ?>
                            <a class="nav-link" href="./"><?php echo $p->getPageTitle() ?></a>
                        <?php else : ?>
                            <a class="nav-link" href="./?path=<?php echo $p->getId() ?>"><?php echo $p->getPageTitle() ?></a>
                        <?php endif ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </nav>

    <?php require_once "./src/views/getContent.php"; ?>
    <?php require_once "./src/views/fragments/footer.php" ?>

</body>

</html>