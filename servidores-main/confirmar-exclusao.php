<main>


<section>
    <h2 class="mt-3">Excluir Solicitação</h2>

    <form method="post">

        <div class="form-group">
            <p>Gostaria de excluir a solicitação de: <strong><?=$obVaga->nome?></strong></p>
           
        </div>


        <div class="form-group">
            <a href="index.php">
                <button type="button" class="btn btn-success btn-lg">Cancelar</button>
            </a>
                <button type="submit" name='excluir' class="btn btn-danger btn-lg">Excluir</button>
        </div>

    </form>
</section>

</main>
