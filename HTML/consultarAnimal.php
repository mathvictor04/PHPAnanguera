
<?php

require_once __DIR__ . "/../DAO/AnimalDAO.php";

use ClinicaVeterinaria\projeto\DAO\AnimalDAO;

$animalDAO = new AnimalDAO();
$animais = $animalDAO->listarTodos();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Animais Cadastrados</title>

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

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Animais Cadastrados</h2>

        <a href="telaAnimal.php" class="btn btn-success">
            + Novo Animal
        </a>
    </div>

    <?php if ($animais === false): ?>

        <div class="alert alert-danger">
            Erro ao consultar animais.
        </div>

    <?php elseif (count($animais) > 0): ?>

        <div class="card shadow">
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-striped table-hover align-middle">

                        <thead class="table-success">
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Espécie</th>
                                <th>Raça</th>
                                <th>Sexo</th>
                                <th>Nascimento</th>
                                <th>Tutor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($animais as $animal): ?>

                                <tr>
                                    <td><?= (int)$animal['codigo'] ?></td>

                                    <td>
                                        <strong><?= htmlspecialchars($animal['nome']) ?></strong>
                                    </td>

                                    <td><?= htmlspecialchars($animal['especie']) ?></td>

                                    <td><?= htmlspecialchars($animal['raca']) ?></td>

                                    <td><?= htmlspecialchars($animal['sexo']) ?></td>

                                    <td>
                                        <?= date('d/m/Y', strtotime($animal['data_nascimento'])) ?>
                                    </td>

                                    <td><?= htmlspecialchars($animal['nome_tutor']) ?></td>

                                    <td>
                                        <a
                                            href="atualizarAnimal.php?codigo=<?= (int)$animal['codigo'] ?>"
                                            class="btn btn-warning btn-sm"
                                        >
                                            Editar
                                        </a>

                                        <a
                                            href="excluirAnimal.php?codigo=<?= (int)$animal['codigo'] ?>"
                                            class="btn btn-danger btn-sm"
                                        >
                                            Excluir
                                        </a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>
            </div>
        </div>

    <?php else: ?>

        <div class="alert alert-info">
            Nenhum animal cadastrado.
        </div>

    <?php endif; ?>

    <a href="../index.php" class="btn btn-secondary mt-3">
        Voltar ao início
    </a>

</div>

</body>
</html>
