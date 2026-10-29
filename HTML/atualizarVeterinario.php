<?php
    namespace ClinicaVeterinaria\projeto\HTML;
    require_once('../DAO/Conexao.php');
    require_once('../DAO/atualizar.php');

    use ClinicaVeterinaria\projeto\DAO\Conexao;
    use ClinicaVeterinaria\projeto\DAO\Atualizar;

    $conexao = new Conexao();
    $atualizar = new Atualizar();
    $resultado = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Veterinario</title>
</head>
<body>
    <h1>Atualizar Veterinario</h1>
    <form method="POST">
        <label>Codigo</label>
        <input type="number" id="codigo" name="codigo"/><br><br>

        <label>Escolha o campo que deseja atualizar</label>
        <select name="campo" id="campo">
            <option value="nome">Nome</option>
            <option value="telefone">Telefone<option>
            <option value="especialidade">Especialidade</option>
            <option value="endereco">Endereço</option>
            <option value="salario">Salario</option>
        </select><br><br>

        <label>Informe o novo dado: </label>
        <input type="text" name="novoDado" id="novoDado" />

        <button type="submit">Atualizar
            <?php
                $codigo = $_POST['codigo'];
                $campo = $_POST['campo'];
                $novoDado = $_POST['novoDado'];
                //fazer a operacao
                $resultado = $atualizar->atualizar($conexao, $codigo, $campo, $novoDado);
            ?>
        </button>
    </form>
    <?php
        echo $resultado;
    ?>
    <a href="../index.php"><button>Voltar</button></a>
</body>
</html>