
<?php

require_once __DIR__ . "/../DAO/AnimalDAO.php";

use ClinicaVeterinaria\projeto\DAO\AnimalDAO;

$animalDAO = new AnimalDAO();
$tutores = $animalDAO->listarTutores();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastrar Animal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
    

<link rel="stylesheet" href="../CSS/estilo.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <a href="../index.php" class="navbar-brand">
            🐾 Clínica Veterinária
        </a>
    </div>
</nav>

<div class="container mt-5">

    <div class="card shadow mx-auto" style="max-width: 750px;">

        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Cadastro de Animal</h4>
        </div>

        <div class="card-body">

            <?php if ($tutores === false): ?>

                <div class="alert alert-danger">
                    Erro ao carregar os tutores.
                </div>

            <?php elseif (count($tutores) === 0): ?>

                <div class="alert alert-warning">
                    Cadastre um tutor antes de cadastrar um animal.
                </div>

                <a href="tutor.php" class="btn btn-success">
                    Cadastrar Tutor
                </a>

            <?php else: ?>

            <form action="../PHP/salvarAnimal.php" method="POST">

                <div class="mb-3">
                    <label class="form-label">Nome do animal:</label>
                    <input type="text" name="nome" class="form-control" maxlength="150" required>
                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Espécie:</label>

                        <select name="especie" class="form-select" required>
                            <option value="">Selecione</option>
                            <option value="Cachorro">Cachorro</option>
                            <option value="Gato">Gato</option>
                            <option value="Ave">Ave</option>
                            <option value="Coelho">Coelho</option>
                            <option value="Roedor">Roedor</option>
                            <option value="Réptil">Réptil</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Raça:</label>
                        <input type="text" name="raca" class="form-control" maxlength="100" required>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Sexo:</label>

                        <select name="sexo" class="form-select" required>
                            <option value="">Selecione</option>
                            <option value="Macho">Macho</option>
                            <option value="Fêmea">Fêmea</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Data de nascimento:</label>

                        <input
                            type="date"
                            name="data_nascimento"
                            class="form-control"
                            max="<?= date('Y-m-d') ?>"
                            required
                        >
                    </div>

                </div>

                <div class="mb-4">
                    <label class="form-label">Tutor responsável:</label>

                    <select name="codigo_tutor" class="form-select" required>
                        <option value="">Selecione o tutor</option>

                        <?php foreach ($tutores as $tutor): ?>

                            <option value="<?= (int)$tutor['codigo'] ?>">
                                <?= htmlspecialchars($tutor['nome']) ?>
                            </option>

                        <?php endforeach; ?>

                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    Cadastrar Animal
                </button>

                <a href="consultarAnimal.php" class="btn btn-primary">
                    Ver Animais
                </a>

                <a href="../index.php" class="btn btn-secondary">
                    Voltar
                </a>

            </form>

            <?php endif; ?>

        </div>
    </div>
</div>

</body>
</html>
