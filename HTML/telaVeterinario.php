<?php
    namespace ClinicaVeterinaria\projeto\HTML;

    require_once('../DAO/conexao.php');
    require_once('../DAO/inserir.php');

    use ClinicaVeterinaria\projeto\DAO\Conexao;
    use ClinicaVeterinaria\projeto\DAO\Inserir;

    $conexao = new Conexao();
    $inserir = new Inserir();
    $mensagem = "";

    // Verificar se o formulario foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nome = trim($_POST['nome'] ?? '');
        $telefone = trim($_POST['telefone'] ?? '');
        $endereco = trim($_POST['endereco'] ?? '');
        $salario = $_POST['salario'] ?? '';
        $especialidade = trim($_POST['especialidade'] ?? '');

        if (
            $nome !== '' &&
            $telefone !== '' &&
            $endereco !== '' &&
            $especialidade !== '' &&
            $salario !== '' &&
            is_numeric($salario) &&
            (float)$salario >= 0
        ) {

            $mensagem = $inserir->cadastrarVeterinario(
                $conexao,
                $nome,
                $telefone,
                $endereco,
                (float)$salario,
                $especialidade
            );

        } else {

            $mensagem = "Preencha todos os campos corretamente!";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar Veterinario</title>
</head>

<body>

    <h1>Cadastrar Veterinario</h1>

    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" id="nome" required>

        <br><br>

        <label>Especialidade:</label>
        <input type="text" name="especialidade" id="especialidade" required>

        <br><br>

        <label>Salario:</label>
        <input
            type="number"
            step="0.01"
            name="salario"
            id="salario"
            min="0"
            required
        >

        <br><br>

        <label>Endereco:</label>
        <input type="text" name="endereco" id="endereco" required>

        <br><br>

        <label>Telefone:</label>
        <input type="text" name="telefone" id="telefone" required>

        <br><br>

        <button type="submit">Cadastrar</button>

        <a href="../index.php">
            <button type="button">Voltar</button>
        </a>

    </form>

    <br>

    <div>
        <?php echo htmlspecialchars($mensagem); ?>
    </div>

</body>
</html>
