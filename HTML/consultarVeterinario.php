<?php
    namespace ClinicaVeterinaria\projeto\HTML;

    require_once('../DAO/Conexao.php');
    require_once('../DAO/Consultar.php');

    use ClinicaVeterinaria\projeto\DAO\Conexao;
    use ClinicaVeterinaria\projeto\DAO\Consultar;

    $conexao = new Conexao();
    $consultar = new Consultar();
    $resultado = "";

    // Verificar se o formulario foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $codigo = filter_input(
            INPUT_POST,
            'codigo',
            FILTER_VALIDATE_INT
        );

        if ($codigo !== false && $codigo !== null && $codigo > 0) {

            $resultado = $consultar->consultarVeterinario(
                $conexao,
                $codigo
            );

        } else {

            $resultado = "Informe um codigo valido!";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
    <title>Consultar Veterinario</title>
</head>

<body>

    <h1>Consultar Veterinario</h1>

    <form method="POST">

        <label>Codigo:</label>

        <input
            type="number"
            id="codigo"
            name="codigo"
            required
        />

        <br><br>

        <button type="submit">
            Consultar
        </button>

    </form>

    <div>
        <?php
            echo $resultado;
        ?>
    </div>

    <br>

    <a href="../index.php">
        <button type="button">Voltar</button>
    </a>

</body>
</html>
