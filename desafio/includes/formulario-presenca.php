<main>
    <section class="my-4">
        <a href="presenca.php">
            <button class="btn btn-primary">Voltar</button>
        </a>
</section>

    <h2><?=TITLE?></h2>
    <form method="post">
    <div class="mb-3">
            <label class="form-label" for="aluno">Aluno</label>
            <select name="aluno" id="aluno" class="form-control">
                <option value="0">Selecione um Aluno</option>
                <?php 
                    $sql = 'SELECT * FROM alunos';
                    $res = $conn->query($sql);
                    while($row = $res->fetch_object()){
                        echo '<option value="'.$row->idAluno.'">'.$row->Nome.'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="aula">Aula</label>
            <select name="aula" id="aula" class="form-control">
                <option value="0">Selecione uma Aula</option>
                <?php 
                     $sql = 'SELECT * FROM aulas';
                     $res = $conn->query($sql);
                     while($row = $res->fetch_object()){
                        echo '<option value="'.$row->idAula.'">'.$row->Titulo.'</option>';
                    }
                ?>
            </select>
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