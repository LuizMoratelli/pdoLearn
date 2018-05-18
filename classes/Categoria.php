<?php
require_once 'global.php';
//Include é para arquivos que não são obrigatórios para o funcionamento da página, pois geram apenas warning
//Require é para arquivos que são obrigatórios para o funcionamento da página, pois gera um fatal error
//Once significa que caso o arquivo seja solicitado mais de uma vez, apenas será ignorado sem ocasionar erro
class Categoria {

    //Atributos
    public $id;
    public $nome;

    //Construtor, sempre chamado quando a classe é instanciada
    public function __construct($id = false) { //Caso não seja passado um valor, o valor default é false
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    //Query retorna um PHPstatement que tem varias informações do retorno da nossa query
    //Exec apenas executa e retorna o número de linhas afetadas. Bom para utilizar quando não se deseja retorno de informação, apenas se for número de linhas: Insert, Update, Delete.

    //Métodos
    public function listar() {
        //throw new Exception('Erro de teste'); //Comando utilizado para forçar uma mensagem de erro, quebrando a execução de tudo abaixo dele, indo para o primeiro catch que encontrar
        $query = "SELECT id, nome FROM categorias"; //Comando SQL
        $conexao = Conexao::pegarConexao(); //O méotodo pode ser chamado através de :: pois é estático
        $resultado = $conexao->query($query); //Executa o comando e captura o retorno
        $lista = $resultado->fetchAll(); //Agrupa os valores em um array
        return $lista;
    }

    public function inserir() {
        $query = "INSERT INTO categorias (nome) VALUES ('{$this->nome}')";
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function atualizar() {
        $query = "UPDATE categorias SET nome='{$this->nome}' WHERE id={$this->id}";
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function carregar() {
        $query = "SELECT id, nome FROM categorias WHERE id={$this->id}";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha) { //Como sempre será carregado apenas um elemento, retornará sempre o primeiro (e único)
            $this->nome = $linha['nome'];
        }
    }

    public function excluir() {
        $query = "DELETE FROM categorias WHERE id={$this->id}";
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }
}
