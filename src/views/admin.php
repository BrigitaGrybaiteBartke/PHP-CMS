<?php
require_once "bootstrap.php";
session_start();

$message = '';
$greeting = '';

$base_url = 'http://localhost:8080/cms';

if (!empty($_SESSION['username']) and !empty($_SESSION['password'])) {
    $greeting = "<h3 class='text-secondary text-center mt-4 mb-4' style='font-size: 35px; font-weight: 700'>Hello {$_SESSION['username']}!</h3>";
    $logout = "<a href=\"?action=logout\" class=\"nav-link\">Logout</a>";
}

// Admin logout logic
if (isset($_GET['action']) == 'logout') {
    session_destroy();
    header('Location:' . './');
}
?>

<?php require_once "./src/views/fragments/head.php"; ?>

<body>
    <div <?php isset($_SESSION['logged']) == true ? print('style="display: block"') : print('style="display: none"') ?>></div>
    <div <?php if (isset($_SESSION['logged']) == false) header('Location: ./login'); ?>></div>

    <nav class="navbar navbar-expand-lg bg-light sticky-top">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li>
                    <a href="./" class="nav-link">
                        <?php
                        $page = $entityManager->getRepository('models\Page')->findBy(array('pageTitle' => 'Home'));
                        $page[0] !== NULL ? print $page[0]->getPageTitle() : '';
                        ?>
                    </a>
                </li>
                <li class="nav-item">
                    <?php echo $logout ?? null ?>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <?php isset($_SESSION['logged']) == true ? print($greeting) : null ?>
        <div>
            <a href="./add" class="btn btn-primary mb-3">Add new page</a>
        </div>
        <div>
            <table class="table table-hover table-bordered shadow p-3 mb-3 bg-body rounded">
                <tr class="table-secondary">
                    <th>Page Name</th>
                    <th>Action</th>
                </tr>
                <?php
                $page = $entityManager->getRepository('models\Page')->findAll();
                foreach ($page as $p) :
                ?>
                    <tr>
                        <td><?php echo $p->getPageTitle() ?></td>
                        <td>
                            <?php if ($p->getId() != '1') : ?>
                                <a href="./update?update=<?php echo $p->getId() ?>" class="btn btn-outline-primary">Update</a>
                                <a href="./delete?delete=<?php echo $p->getId() ?>" class="btn btn-outline-danger">Delete</a>
                            <?php else : ?>
                                <a href="./update?update=<?php echo $p->getId() ?>" class="btn btn-outline-primary">Update</a>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>

    <?php require_once "./src/views/fragments/footer.php" ?>

</body>

</html>