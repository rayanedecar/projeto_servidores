<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Cadastrar Servidor:');

use App\Entity\Vaga;

$obVaga = new Vaga;

//Validação do POST
if(isset($_POST['nome'], $_POST['masp'], $_POST['setor'], $_POST['descricao'], $_POST['efetivo'])){

    $obVaga->nome = $_POST['nome'];
    $obVaga->masp = $_POST['masp'];
    $obVaga->setor = $_POST['setor'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->efetivo = $_POST['efetivo'];
    $obVaga->cadastrar();

    header('location: index.php?status=sucess');
    exit;
    
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';