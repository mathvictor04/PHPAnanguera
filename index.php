<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clínica Veterinária</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>

<link rel="stylesheet" href="../CSS/estilo.css">
</head>

<body class="bg-light">

<!-- MENU -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">
            🐾 Clínica Veterinária
        </a>

    </div>
</nav>

<!-- CONTEÚDO PRINCIPAL -->
<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="fw-bold text-success">
            Clínica Veterinária
        </h1>

        <p class="text-muted">
            Sistema de gerenciamento veterinário
        </p>

        <h5>Bem-vindo! O que deseja fazer?</h5>

    </div>

    <div class="row g-4">

        <!-- VETERINÁRIO -->
        <div class="col-md-4">

            <div class="card shadow h-100 border-0">

                <div class="card-body text-center">

                    <h2>🩺</h2>

                    <h4>Veterinários</h4>

                    <p class="text-muted">
                        Gerencie os profissionais da clínica.
                    </p>

                    <div class="d-grid gap-2">

                        <a href="HTML/telaVeterinario.php"
                           class="btn btn-success">
                            Cadastrar
                        </a>

                        <a href="HTML/consultarVeterinario.php"
                           class="btn btn-outline-success">
                            Consultar
                        </a>

                        <a href="HTML/atualizarVeterinario.php"
                           class="btn btn-outline-warning">
                            Atualizar
                        </a>

                        <a href="HTML/excluirVeterinario.php"
                           class="btn btn-outline-danger">
                            Excluir
                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!-- TUTOR -->
        <div class="col-md-4">

            <div class="card shadow h-100 border-0">

                <div class="card-body text-center">

                    <h2>👤</h2>

                    <h4>Tutores</h4>

                    <p class="text-muted">
                        Gerencie os responsáveis pelos animais.
                    </p>

                    <div class="d-grid gap-2">

                        <a href="HTML/tutor.php"
                           class="btn btn-success">
                            Cadastrar
                        </a>

                        <a href="HTML/listar_tutores.php"
                           class="btn btn-outline-success">
                            Consultar
                        </a>

                        <a href="HTML/atualizarTutor.php"
                           class="btn btn-outline-warning">
                            Atualizar
                        </a>

                        <a href="HTML/excluirTutor.php"
                           class="btn btn-outline-danger">
                            Excluir
                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!-- ANIMAL -->
        <div class="col-md-4">

            <div class="card shadow h-100 border-0">

                <div class="card-body text-center">

                    <h2>🐶</h2>

                    <h4>Animais</h4>

                    <p class="text-muted">
                        Gerencie os animais cadastrados na clínica.
                    </p>

                    <div class="d-grid gap-2">

                        <a href="HTML/telaAnimal.php"
                           class="btn btn-success">
                            Cadastrar
                        </a>

                        <a href="HTML/consultarAnimal.php"
                           class="btn btn-outline-success">
                            Consultar
                        </a>

                        <a href="HTML/consultarAnimal.php"
                           class="btn btn-outline-warning">
                            Atualizar / Gerenciar
                        </a>

                        <a href="HTML/consultarAnimal.php"
                           class="btn btn-outline-danger">
                            Excluir / Gerenciar
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- RODAPÉ -->
<footer class="bg-success text-white text-center py-3 mt-5">

    Clínica Veterinária - Sistema de Gerenciamento

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
