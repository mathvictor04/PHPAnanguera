<?php
    namespace ClinicaVeterinaria\projeto\HTML;
    require_once('../PHP/veterinario.php');
    use ClinicaVeterinaria\projeto\php\Veterinario;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastoro Veterinario</title>
</head>
<body>
    <form method="POST">
        <label>Código</label>
        <input type="number" name="codigo" id="codigo"/><br><br>

        <label>Nome</label>
        <input type="text" name="nome" id="nome"/><br><br>

        <label>Especialidade</label>
        <input type="text" name="especialidade" id="especialidade"/><br><br>

        <label>Salario</label>
        <input type="text" name="salario" id="salario"/><br><br>

        <label>Endereco</label>
        <input type="text" name="endereco" id="endereco"/><br><br>

        <label>Telefone</label>
        <input type="text" name="telefone" id="telefone"/><br><br>

        <button type="submit">Cadastrar
        <?php
            if(isset($_POST['codigo'])){
            $codigo        = $_POST ['codigo'];
            $nome          = $_POST ['nome'];
            $telefone      = $_POST ['telefone'];
            $endereco      = $_POST ['endereco'];
            $salario       = $_POST ['salario'];
            $especialidade = $_POST ['especialidade'];

            $vet = new Veterinario($codigo, $nome, $especialidade, $salario, $endereco, $telefone);

            $logico = true;
        }else{
            $logico = false;
            }
        ?>
        </button>
        <button><a href="#">Voltar</a></button>
        <div>
        <?php
            if($logico == true){
                echo $vet->imprimir();
            }else{
            echo "Preencha os campos";
            }
        ?>
        </div>   
    </form>
    
</body>
</html>