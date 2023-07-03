<?php

$mensagem = '';
if(isset($_GET['status'])){
    switch($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação Executada com Sucesso!</div>';
            break;

        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação Não Executada!</div>';
            break;    
    }
}

$resultados = '';
    foreach($vagas as $vaga){
        $resultados .= '<tr>
                            <td>'.$vaga->id.'</td>
                            <td>'.$vaga->nome.'</td>
                            <td>'.$vaga->masp.'</td>
                            <td>'.$vaga->setor.'</td>
                            <td>'.$vaga->descricao.'</td>
                            <td>'.($vaga->efetivo =='s' ? 'Efetivo': 'Contratado').'</td>
                            <td>'.date('d/m/Y à\s H:i:s', strtotime($vaga->data)).'</td>
                            <td>
                                <a href="editar.php?id='.$vaga->id.'">
                                <button type="button" class="btn btn-primary btn-lg">Editar</button>
                                </a>

                                <a href="excluir.php?id='.$vaga->id.'">
                                <button type="button" class="btn btn-danger btn-lg">Excluir</button>
                                </a>

                            </td>
                        </tr>';
    }

    $resultados = strlen($resultados) ? $resultados : '<tr>
                                                            <td colspan="8" class="text-center">
                                                            Nenhum Servidor Encontrado
                                                            </td>
                                                            </tr>';
?>

<main>

    <?=$mensagem?>

<section>
    <a href="cadastrar.php">
        <button class="btn btn-secondary btn-lg">Cadastrar Servidor</button>
    </a>
</section>

<section>

<table class="table bg-light mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Masp</th>
                <th>Setor</th>
                <th>Formação</th>
                <th>Status</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?=$resultados?>
        </tbody>
</table>

</section>

</main>