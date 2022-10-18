<?php

require_once "bootstrap.php";
session_start();

$base_url = 'http://localhost:8080/cms';
$page = $entityManager->getRepository('models\Page')->findAll();

// Delete page
if (isset($_GET['delete'])) {
    $page = $entityManager->find('models\Page', $_GET['delete']);
    $entityManager->remove($page);
    $entityManager->flush();
    header('Location:' . $base_url . '/admin');
}