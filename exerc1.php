<?php
    class exerc1 {
        public function listar() {
            $query = "SELECT id, nome FROM categorias";
            $conexao = new PDO('mysql:host=127.0.0.1;dbname=estoque', 'root', '');
            $resultado = $conexao->query($query);
            $lista = $resultado->fetchAll();
            return $lista;
        }
    }

    $categoria = new exerc1();
    $lista = $categoria->listar();

    echo "<pre>";
    print_r($lista);
    echo "</pre>";
