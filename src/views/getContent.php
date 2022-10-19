<?php
// Get page content
    if (isset($_GET['path'])) {
        $path = $_GET['path'];
        $page = $entityManager->find('models\Page', $path);
        $page->getId();
        $page->getPageTitle();
        $page->getPageContent();

        echo "<div class=\"container\">";
        print($page->getPageContent());
        echo "</div>";
    } else {
        $page = $entityManager->getRepository('models\Page')->findBy(array('id' => '1'));
        $page[0] !== NULL ? print $page[0]->getPageContent() : '';
    }
    ?>