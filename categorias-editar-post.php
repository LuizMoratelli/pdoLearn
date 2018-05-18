<?php
require_once 'classes/Categoria.php';

try {
    $id = $_POST['id'];
    $categoria = new Categoria($id);
    $categoria->nome = $_POST['nome'];
    $categoria->atualizar();
    header('Location: categorias-editar.php?id='.$categoria->id);
} catch (Exception $e) {
    Erro::trataErro($e);
}
