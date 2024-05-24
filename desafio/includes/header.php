<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escola de cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="bg-dark text-light">
      <div style="height: 100vh;" class="d-flex justify-content-between gap-3">
        <div style="width: 10%;" class="bg-light d-flex
        flex-column justify-content-between align-items-center py-4 px-5 text-light">
            <div class="d-flex flex-column gap-2">
                <a href="professores.php"><button type="button" class="btn btn-dark" style="width: 100%;">Professores</button></a>
                <a href="alunos.php"><button type="button" class="btn btn-dark" style="width: 100%">Alunos</button></a>
                <a href="aulas.php"><button type="button" class="btn btn-dark" style="width: 100%">Aulas</button></a>
                <a href="presenca.php"><button type="button" class="btn btn-dark" style="width: 100%">Presença</button></a>
            </div>
            <div class="d-flex justify-content-center align-center mt-3">
                <a href="logout.php" class="btn btn-danger" style="width: 100%;">LOGOUT</a>
            </div>
        </div>
        <div class="container">
            <div class="text-center my-4">
                <h1><a href="menu-prof.php" class="text-light text-decoration-none"><strong>Escola de cursos</strong></a></h1>
                <p>Informações sobre os professores, os alunos, as aulas e presença.</p>
            </div>