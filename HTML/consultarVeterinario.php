<?php
    namespace ClinicaVeterinaria\projeto\HTML;
    require_once('../DAO/Conexao.php');
    require_once('../DAO/Consultar.php');

    use ClinicaVeterinaria\projeto\DAO\conexao;
    use ClinicaVeterinaria\projeto\DAO\Consultar;

    $conexao = new Conexao();
    $consultar = new Consultar();
    $resultado = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Veterinario</title>
</head>
<body>
    <h1>Consultar Veterinario</h1>
    <form method="POST">
        <label>Codigo: </label>
        <input type="number" id="codigo" name="codigo"/>
        <button type="submit">Consultar
            <?php
                $resultado = $consultar->consultarVeterinario($conexao, $_POST['codigo']);
            ?>
        </button>
    </form>
    <?php   echo $resultado;?>
    <a href="#"><button>Voltar</button></a> 
</body>
</html>