<main>
    <section class="my-4">
        <a href="professores.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2><?=TITLE?></h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label" for="nome">Nome Completo</label>
            <input type="text" name="nome" class="form-control" placeholder="Digite o seu nome" required value="<?=$obProf->Nome?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="cpf">CPF</label>
            <input type="text" name="cpf" class="form-control" placeholder="Ex: 12345678910" maxlength="11" required value="<?=$obProf->CPF?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="tel">Telefone</label>
            <input type="text" name="tel" class="form-control" placeholder="Ex: 12345678910" maxlength="11" required value="<?=$obProf->Telefone?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="nasc">Data de Nascimento</label>
            <input type="date" max="9999-12-31" name="nasc" class="form-control" required value="<?=$obProf->Nascimento?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="curso">Curso</label>
            <input type="text" name="curso" class="form-control" placeholder="Digite o nome do curso" required value="<?=$obProf->Curso?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">E-mail</label>
            <input type="text" name="email" class="form-control" placeholder="Digite o seu e-mail" required value="<?=$obProf->Email?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="senha">Senha</label>
            <input type="password" name="senha" class="form-control" placeholder="Digite a sua senha" required value="<?=$obProf->Senha?>">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
    <script>
    </script>
</main>