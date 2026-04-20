<?php
require_once '../controllers/SelecaoController.php';

$controller = new SelecaoController();

$action = isset($_GET['action']) ? $_GET['action'] : 'listar';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action) {
    case 'criar':
        $controller->criar();
        break;
    case 'salvar':
        $controller->salvar();
        break;
    case 'editar':
        if ($id) {
            $controller->editar($id);
        } else {
            header("Location: index.php");
        }
        break;
    case 'atualizar':
        $controller->atualizar();
        break;
    case 'excluir':
        if ($id) {
            $controller->excluir($id);
        } else {
            header("Location: index.php");
        }
        break;
    case 'listar':
    default:
        $controller->listar();
        break;
}
?>