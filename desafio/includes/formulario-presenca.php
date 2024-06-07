<main>
    <section class="my-4">
        <a href="presenca.php">
            <button class="btn btn-primary">Voltar</button>
        </a>
</section>

    <h2><?=TITLE?></h2>
    <form method="post">
    <div class="mb-3">
            <label class="form-label" for="aluno">idAluno</label>
            <input type="text" name="aluno" class="form-control" placeholder="Digite o id do aluno" required value="<?=$obPresenca->idAluno?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="aula">idAula</label>
            <input type="text" name="aula" class="form-control" placeholder="Digite o id da aula" required value="<?=$obPresenca->idAula?>">
        </div>
        <div class="mb-3 form-group">
            <label class="mb-2">Status</label>
            <div>
                <div class="form-check-inline">
                    <label class="form-control">
                    <input type="radio" name="status" value="Presente" checked> Presente
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-control">
                    <input type="radio" name="status" value="Ausente"> Ausente
                    </label>
                </div>
            </div>
            </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
    <script>
    </script>
</main>