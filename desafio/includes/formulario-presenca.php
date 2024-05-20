<main>
    <section class="my-4">
        <a href="aulas.php">
            <button class="btn btn-priamry">Voltar</button>
        </a>
    </section>

    <h2><?=TITLE?></h2>
    <form method="post">
    <div class="mb-3">
            <label class="form-label" for="aluno">Nome do Aluno</label>
            <input type="text" name="aluno" class="form-control" placeholder="Digite o nome do aluno" required value="<?=$obPresenca->Aluno?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="titulo">Título da Aula</label>
            <input type="text" name="titulo" class="form-control" placeholder="Digite o título da aula" required value="<?=$obPresenca->Titulo?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="professor">Professor</label>
            <input type="text" name="professor" class="form-control" placeholder="Digite o nome do professor" required value="<?=$obPresenca->Professor?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="curso">Curso</label>
            <input type="text" name="curso" class="form-control" placeholder="Digite o nome do curso" required value="<?=$obPresenca->Curso?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="data">Data</label>
            <input type="date" max="9999-12-31" name="data" class="form-control" required value="<?=$obPresenca->Data?>">
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