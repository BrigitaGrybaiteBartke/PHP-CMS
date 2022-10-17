<?php

require_once "bootstrap.php";
session_start();
use models\Page;

$message = '';
$greeting = '';

$base_url = 'http://localhost:8080/cms';


if (!empty($_SESSION['username']) and !empty($_SESSION['password'])) {
    $greeting = "<h3 class='text-center mt-4 mb-4' style='font-size: 35px'>Hello {$_SESSION['username']}!</h3>";
    $logout = "<a href=\"?action=logout\" class=\"nav-link\">Logout</a>";
}

if (isset($_GET['action']) == 'logout') {
    session_destroy();
    header('Location:' . './');
}

// Helper functions
function redirect_to_root()
{
    header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}

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
    <div <?php isset($_SESSION['logged']) == true ? print('style="display: block"') : print('style="display: none"') ?>>
        <div <?php if (isset($_SESSION['logged']) == false) header('Location: ./login'); ?>>

            <nav class="navbar navbar-expand-lg bg-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./">Home</a>
                        </li>
                        <li class="nav-item">
                            <?php echo $logout ?? null ?>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container">
                <?php isset($_SESSION['logged']) == true ? print($greeting) : null ?>
                <!-- add new page -->
                <div>
                    <a href="./add" class="btn btn-primary mb-3">Add new page</a>
                </div>
                <div>
                    <table class="table table-hover table-bordered shadow p-3 mb-3 bg-body rounded">
                        <tr class="table-secondary">
                            <!-- <th>Id</th> -->
                            <th>Page Name</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $page = $entityManager->getRepository('models\Page')->findAll();
                        foreach ($page as $p) {
                        ?>
                            <tr>
                                <!-- <td><?php echo $p->getId() ?></td> -->
                                <td><?php echo $p->getPageTitle() ?></td>
                                <td>
                                    <a href="./update?update=<?php echo $p->getId() ?>" class="btn btn-outline-primary">Update</a>
                                    <a href="./delete?delete=<?php echo $p->getId() ?>" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>

        <?php require_once "./src/views/footer.php" ?>

</body>

</html>