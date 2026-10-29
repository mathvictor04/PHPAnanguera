<?php
    namespace ClinicaVeterinaria\projeto\HTML;
    require_once('../PHP/veterinario.php');
    require_once('../DAO/conexao.php');
    require_once('../DAO/Inserir.php');
    use ClinicaVeterinaria\projeto\php\Veterinario;
    use ClinicaVeterinaria\projeto\DAO\Conexao;
    use ClinicaVeterinaria\projeto\DAO\Inserir;

    $conexao = new Conexao();
    $inserir = new Inserir();
    $mensagem = "";//Retornar o resultado do cadastro
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
            if(isset($_POST['nome'])){
            $nome          = $_POST ['nome'];
            $telefone      = $_POST ['telefone'];
            $endereco      = $_POST ['endereco'];
            $salario       = $_POST ['salario'];
            $especialidade = $_POST ['especialidade'];
            
        
            $mensagem = $inserir->cadastrarVeterinario($conexao,
                                                       $nome,
                                                       $telefone,
                                                       $endereco,
                                                       $salario,
                                                       $especialidade);
        }
     ?>
     </button>
        <button><a href="../index.php">Voltar</a></button>
        <div>
        <?php
            if(isset($_POST['nome'])){
                echo $mensagem;
            }else{
            echo "Preencha os campos";
            }
        ?>
        </div>   
    </form>
    
</body>
</html>