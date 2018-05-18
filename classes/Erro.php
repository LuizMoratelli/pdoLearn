<?php

class Erro {
    public static function trataErro(Exception $e) {
        if (DEBUG) {
            echo '<pre>';
            print_r($e); //Exibe toda uma trajetória que ocasionou o erro
            echo '</pre>';
        } else {
            //echo $e->getMessage(); //Exibe a mensagem configurada
            include 'erro.php';
        }
        exit; //Cancela o processamento da página
    }
}
