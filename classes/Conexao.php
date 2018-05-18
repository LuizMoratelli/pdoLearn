<?php

class Conexao {
    public static function pegarConexao() { //Métodos estáticos podem ser acessíves sem instanciar a classe, utilizado para métodos onde a classe não possuem atributos e propriedades
        $conexao = new PDO(DB_DRIVE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS); //Criado uma nova PDO para realizar a conexão com o SGBD
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Define a forma como os erros serão tratados, neste caso em exceções parando no ponto do erro do banco de dados. Sendo este o melhor, em vista da utilização de try e catch
        return $conexao;
    }
}
