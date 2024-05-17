<main>
    <section class="my-4">
       
    </section>

    <h2>Excluir presença</h2>
    <form method="post">
        <div class="mb-3">
            <p>Você deseja realmente excluir a presença do aluno <strong><?=$obPresenca->Aluno?></strong> da aula <strong><?=$obPresenca->Titulo?></strong>?</p>
        </div>
       
        <div class="mb-3">
            <a href="presenca.php">
                <button type="button" class="btn btn-success">Cancelar</button>
            </a>
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>
    </form>
    <script>
    </script>
</main>