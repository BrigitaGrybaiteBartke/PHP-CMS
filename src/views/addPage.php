<?php

require_once "bootstrap.php";
session_start();
use models\Page;

$base_url = 'http://localhost:8080/cms';

if (isset($_POST['cancel'])) {
    header('Location:' . $base_url . '/admin');
}

if (isset($_POST['submit'])) {
    if (!empty($_POST['pageTitle'])) {
        $page = new Page();
        $page->setPageTitle($_POST['pageTitle']);
        $page->setPageContent($_POST['pageContent']);
        $entityManager->persist($page);
        $entityManager->flush();
        header('Location:' . $base_url . '/admin');
    }
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

</head>

<body>
    <div <?php isset($_SESSION['logged']) == true ? print('style="display: block"') : print('style="display: none"') ?>>
        <div <?php if (isset($_SESSION['logged']) == false) header('Location: ./login'); ?>>

            <div class="container">
                <div class="text-center mt-5">
                    <h3>Create a new Page</h3>
                </div>
                <div class="mt-5">
                    <form action="" method="POST">
                        <div class="my-3 width">
                            <label for="pageTitle" class="form-label">Page title:</label>
                            <input type="text" name="pageTitle" placeholder="Enter new Page title" class="form-control">
                        </div>
                        <div class="my-3 width">
                            <label for="pageContent" class="form-label">Page content:</label>
                            <textarea name="pageContent" rows="10" cols="100" placeholder="Enter Page content" class="form-control"></textarea>
                        </div>
                        <div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" name="cancel" class="btn btn-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

</body>
</html>