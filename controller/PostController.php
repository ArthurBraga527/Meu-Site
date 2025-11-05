<?php
// controller/PostController.php
require_once '../model/Post.php';

class PostController {
    private $model;

    public function __construct() {
        $this->model = new Post();
    }

    public function index() {
        $posts = $this->model->all();
        include '../view/header.php';
        include '../view/home.php';
        include '../view/footer.php';
    }

    public function showCreateForm() {
        include '../view/header.php';
        include '../view/form.php';
        include '../view/footer.php';
    }

    public function create($data) {
        $titulo = trim($data['titulo'] ?? '');
        $conteudo = trim($data['conteudo'] ?? '');

        if ($titulo === '' || $conteudo === '') {
            $_SESSION['flash'] = 'Título e conteúdo são obrigatórios.';
            header('Location: index.php?action=create');
            exit;
        }

        $id = $this->model->create($titulo, $conteudo);
        $_SESSION['flash'] = 'Post criado com sucesso e enviado para o Discord! 🎵';
        header('Location: index.php?action=view&id=' . $id);
        exit;
    }

    public function showEditForm($id) {
        $post = $this->model->find($id);
        if (!$post) {
            $_SESSION['flash'] = 'Post não encontrado.';
            header('Location: index.php');
            exit;
        }
        include '../view/header.php';
        include '../view/form.php';
        include '../view/footer.php';
    }

    public function update($id, $data) {
        $titulo = trim($data['titulo'] ?? '');
        $conteudo = trim($data['conteudo'] ?? '');
        if ($titulo === '' || $conteudo === '') {
            $_SESSION['flash'] = 'Título e conteúdo são obrigatórios.';
            header('Location: index.php?action=edit&id=' . $id);
            exit;
        }
        $this->model->update($id, $titulo, $conteudo);
        $_SESSION['flash'] = 'Post atualizado com sucesso!';
        header('Location: index.php?action=view&id=' . $id);
        exit;
    }

    public function delete($id) {
        $this->model->delete($id);
        $_SESSION['flash'] = 'Post excluído com sucesso!';
        header('Location: index.php');
        exit;
    }

    public function view($id) {
        $post = $this->model->find($id);
        if (!$post) {
            $_SESSION['flash'] = 'Post não encontrado.';
            header('Location: index.php');
            exit;
        }
        include '../view/header.php';
        include '../view/post_view.php';
        include '../view/footer.php';
    }
}