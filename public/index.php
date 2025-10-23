<?php
require_once __DIR__ . '/../app/controllers/ContatoController.php';

$controller = new ContatoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->salvarContato();
} else {
    $controller->index();
}
