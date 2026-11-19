<?php
    namespace ClinicaVeterinaria\projeto\HTML;

    require_once('../DAO/conexao.php');
    require_once('../DAO/excluir.php');

    use ClinicaVeterinaria\projeto\DAO\Conexao;
    use ClinicaVeterinaria\projeto\DAO\Excluir;

    $conexao = new Conexao();
    $excluir = new Excluir();
    $resultado = "";

    // Verificar se o formulario foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $codigo = filter_input(
            INPUT_POST,
            'codigo',
            FILTER_VALIDATE_INT
        );

        if ($codigo !== false && $codigo !== null && $codigo > 0) {

            $resultado = $excluir->excluirVeterinario(
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
    <title>Excluir Veterinario</title>
</head>

<body>

    <h1>Excluir Veterinario</h1>

    <form method="POST">

        <label>Codigo:</label>

        <input
            type="number"
            name="codigo"
            id="codigo"
            required
        >

        <br><br>

        <button type="submit">Excluir</button>

    </form>

    <div>
        <?php echo htmlspecialchars($resultado); ?>
    </div>

    <br>

    <a href="../index.php">
        <button type="button">Voltar</button>
    </a>

</body>
</html>
