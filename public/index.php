<?php
// public/index.php
if (session_status() === PHP_SESSION_NONE) session_start();

require_once '../controller/PostController.php';

$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;

$controller = new PostController();

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->create($_POST);
        } else {
            $controller->showCreateForm();
        }
        break;
    case 'edit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->update($id, $_POST);
        } else {
            $controller->showEditForm($id);
        }
        break;
    case 'delete':
        $controller->delete($id);
        break;
    case 'view':
        $controller->view($id);
        break;
    case 'list':
    default:
        $controller->index();
        break;
}