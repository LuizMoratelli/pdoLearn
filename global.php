<?php

require_once 'config.php';

spl_autoload_register('carregarClasse');

function carregarClasse($nomeClasse) { //Configuração de AutoLoader
    if(file_exists('classes/'.$nomeClasse.'.php')) {
        require_once 'classes/'.$nomeClasse.'.php';
    }
}
