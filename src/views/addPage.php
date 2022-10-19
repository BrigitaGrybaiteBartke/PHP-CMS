<?php
require_once "bootstrap.php";
session_start();

use models\Page;

$base_url = 'http://localhost:8080/cms';

// Cancel add page
if (isset($_POST['cancel'])) {
    header('Location:' . $base_url . '/admin');
}

// Add new page
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

<?php require_once "./src/views/fragments/head.php"; ?>

<body>
    <div <?php isset($_SESSION['logged']) == true ? print('style="display: block"') : print('style="display: none"') ?>></div>
    <div <?php if (isset($_SESSION['logged']) == false) header('Location: ./login'); ?>></div>
    <div class="container">
        <div class="text-center mt-5">
            <h3>Create a new Page</h3>
        </div>
        <div class="mt-5">
            <form action="" method="POST">
                <div class="my-3">
                    <label for="pageTitle" class="form-label">Page title:</label>
                    <input type="text" name="pageTitle" placeholder="Enter new Page title" class="form-control">
                </div>
                <div class="my-3">
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