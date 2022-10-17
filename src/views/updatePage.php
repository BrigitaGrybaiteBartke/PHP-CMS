<?php

require_once "bootstrap.php";
session_start();
use models\Page;

$base_url = 'http://localhost:8080/cms';


if(isset($_POST['cancel'])) {
    // unset($_GET['update']);
    header('Location:' . $base_url . '/admin');
}

// Update page
if(isset($_POST['updatePage'])) {
    // var_dump($_POST['updateId']);
    if (!empty($_POST['updateTitle']) and !empty($_POST['updateContent'])) {
    $page = $entityManager->find('models\Page', $_POST['updateId']);
    var_dump($page);
    $page->getId($_POST['updateId']);
    $page->setPageTitle($_POST['updateTitle']);
    
    $page->setPageContent($_POST['updateContent']);
    $entityManager->flush();
    // redirect_to_root();
    header('Location:' . $base_url . '/admin');
}
}


// var_dump($_GET);

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
    
    <div class="container">
        <div class="text-center mt-5">
            <h3>Update Page</h3>
        </div>
        <div class="mt-5">
        <?php 
            // if(isset($_GET['update'])) {
                $page = $entityManager->find('models\Page', $_GET['update']);
        ?>
            <form action="" method="POST">
            
            <div class="my-3 width">
                <input type="hidden" name="updateId" value="<?php echo $page->getId() ?>">
            </div>
                <div class="my-3 width">
                    <label for="updateTitle" class="form-label">Update page title:</label>
                    <input type="text" name="updateTitle" value="<?php echo $page->getPageTitle() ?>" class="form-control">
                </div>
                <div class="my-3 width">
                    <label for="updateContent" class="form-label">Update page content:</label>
                    <textarea name="updateContent" rows="10" cols="100" class="form-control"><?php echo $page->getPageContent() ?></textarea>
                </div>
                <div>
                    <button type="submit" name="updatePage" class="btn btn-primary">Update</button>
                    <button type="submit" name="cancel" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>


</body>
</html>
