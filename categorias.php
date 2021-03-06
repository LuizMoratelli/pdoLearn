<?php require_once 'global.php'; ?>
<?php
    try { //Se acontecer um erro nos códigos presentes no try, cai no catch
        $categoria = new Categoria(); //Instancia a classe categoria
        $lista = $categoria->listar(); //Executa o método listar do objeto categoria
    } catch (Exception $e) { //Por padrão recebe uma variável do tipo Exception, classe de erro do PHP
        Erro::trataErro($e);
    }

    // echo "<pre>"; //Debug da lista
    // print_r($lista);
    // echo "</pre>";
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Categorias</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="categorias-criar.php" class="btn btn-info btn-block">Crair Nova Categoria</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha): // Pode-se abrir com : e fechar com endforeach ?>
                    <tr>
                        <td><a href="categorias-detalhe.php" class="btn btn-link"><?= $linha['id'] ?></a></td>
                        <td><a href="categorias-detalhe.php" class="btn btn-link"><?= $linha['nome'] ?></a></td>
                        <td><a href="categorias-editar.php?id=<?= $linha['id'] ?>" class="btn btn-info">Editar</a></td>
                        <td><a href="categorias-excluir-post.php?id=<?= $linha['id'] ?>" class="btn btn-danger">Excluir</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'rodape.php' ?>
