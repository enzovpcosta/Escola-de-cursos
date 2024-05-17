<main>
    <section class="my-4">
        <a href="aulas.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2><?=TITLE?></h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label" for="titulo">Título</label>
            <input type="text" name="titulo" class="form-control" placeholder="Digite o título da aula" required value="<?=$obAula->Titulo?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="descricao">Descrição</label>
            <input type="text" name="descricao" class="form-control" placeholder="Digite a descrição da aula" required value="<?=$obAula->Descricao?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="professor">Professor</label>
            <input type="text" name="professor" class="form-control" placeholder="Digite o nome do professor" required value="<?=$obAula->Professor?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="data">Data</label>
            <input type="date" max="9999-12-31" name="data" class="form-control" required value="<?=$obAula->Data?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="curso">Curso</label>
            <input type="text" name="curso" class="form-control" placeholder="Digite o nome do curso" required value="<?=$obAula->Curso?>">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
    <script>
    </script>
</main>