<?php
    namespace ClinicaVeterinaria\projeto\HTML;

    require_once('../DAO/conexao.php');
    require_once('../DAO/atualizar.php');

    use ClinicaVeterinaria\projeto\DAO\Conexao;
    use ClinicaVeterinaria\projeto\DAO\Atualizar;

    $conexao = new Conexao();
    $atualizar = new Atualizar();
    $resultado = "";

    // Verificar se o formulario foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $codigo = filter_input(
            INPUT_POST,
            'codigo',
            FILTER_VALIDATE_INT
        );

        $campo = $_POST['campo'] ?? '';
        $novoDado = trim($_POST['novoDado'] ?? '');

        if ($codigo !== false && $codigo !== null
            && $codigo > 0 && $novoDado !== '') {

            $resultado = $atualizar->atualizar(
                $conexao,
                $codigo,
                $campo,
                $novoDado
            );

        } else {

            $resultado = "Preencha os campos corretamente!";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Veterinario</title>
</head>

<body>

    <h1>Atualizar Veterinario</h1>

    <form method="POST">

        <label>Codigo:</label>
        <input type="number" name="codigo" id="codigo" required>

        <br><br>

        <label>Escolha o campo que deseja atualizar:</label>

        <select name="campo" id="campo" required>
            <option value="nome">Nome</option>
            <option value="telefone">Telefone</option>
            <option value="especialidade">Especialidade</option>
            <option value="endereco">Endereco</option>
            <option value="salario">Salario</option>
        </select>

        <br><br>

        <label>Informe o novo dado:</label>
        <input type="text" name="novoDado" id="novoDado" required>

        <br><br>

        <button type="submit">Atualizar</button>

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
