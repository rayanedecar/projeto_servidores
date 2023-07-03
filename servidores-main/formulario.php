<main>

<section>
    <a href="index.php">
        <button class="btn btn-success btn-lg">Voltar</button>
    </a>
</section>

<section>
    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="post">

        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" value="<?=$obVaga->nome?>">
        </div>

        <div class="form-group">
            <label>Masp</label>
            <input type="text" class="form-control" name="masp" value="<?=$obVaga->masp?>">
        </div>

        <div class="form-group">
            <label>Setor</label>
            <input type="text" class="form-control" name="setor" value="<?=$obVaga->setor?>">
        </div>

        <div class="form-group">
            <label>Formação</label>
            <input type="text" class="form-control" name="descricao" value="<?=$obVaga->descricao?>">
        </div>

        <div class="form-group">
            <label>Efetivo</label>

            <div>
                <div class="form-check form-check-inline mb-3">
                    <label class="form-control">
                        <input type="radio" name="efetivo" value="s" checked>Sim
                    </label>
                </div>
                <div class="form-check form-check-inline mb-3">
                    <label class="form-control">
                        <input type="radio" name="efetivo" value="n" <?=$obVaga->efetivo == 'n' ? 'checked' : ''?>> Não
                    </label>
                </div>
                
            </div>
        </div>
        <br>

        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg">Enviar</button>
        </div>

    </form>
</section>

</main>
