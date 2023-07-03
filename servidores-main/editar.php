<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar Solicitação:');

use App\Entity\Vaga;

//Validação do ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

//Consulta a Vaga
$obVaga = Vaga::getVaga($_GET['id']);



//Validar a Vaga
if(!$obVaga instanceof Vaga){
    header('location: index.php?status=error');
    exit;
}

//Validação do POST
if(isset($_POST['nome'], $_POST['masp'], $_POST['setor'], $_POST['descricao'], $_POST['efetivo'])){

   
    $obVaga->nome = $_POST['nome'];
    $obVaga->masp = $_POST['masp'];
    $obVaga->setor = $_POST['setor'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->efetivo = $_POST['efetivo'];
    $obVaga->atualizar();

    header('location: index.php?status=success');
    exit;
    
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';