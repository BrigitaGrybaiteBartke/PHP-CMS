<?php
require_once "bootstrap.php";
session_start();

$base_url = 'http://localhost:8080/cms';

// Cancel page update
if (isset($_POST['cancel'])) {
    header('Location:' . $base_url . '/admin');
}

// Update page
if (isset($_POST['updatePage'])) {
    if (isset($_POST['updateTitle']) AND isset($_POST['updateContent'])) {
        $page = $entityManager->find('models\Page', $_POST['updateId']);
        $page->getId($_POST['updateId']);

        if ($page->getId() !== 1)
            $page->setPageTitle($_POST['updateTitle']);

        $page->setPageContent($_POST['updateContent']);
        $entityManager->flush();

        header('Location:' . $base_url . '/admin');
    }
}
?>

<?php require_once "./src/views/fragments/head.php" ?>

<body>
    <div class="container">
        <div class="text-center mt-5">
            <h3>Update Page</h3>
        </div>
        <div class="mt-5">
            <?php $page = $entityManager->find('models\Page', $_GET['update']); ?>
            <form action="" method="POST">
                <div class="my-3">
                    <input type="hidden" name="updateId" value="<?php echo $page->getId() ?>">
                </div>
                <div class="my-3">
                    <label for="updateTitle" class="form-label">Update page title:</label>
                    <input type="text" name="updateTitle" value="<?php echo $page->getPageTitle() ?>" class="form-control" <?php echo $page->getId() === 1 ? 'readonly' : '' ?>>
                </div>
                <div class="my-3">
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