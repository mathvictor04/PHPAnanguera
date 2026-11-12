<?php
namespace ClinicaVeterinaria\projeto\DAO;
require_once __DIR__ . "/Conexao.php";
class TutorDAO{
    private $conexao;
    public function __construct(){
        $objConexao = new Conexao();
        $this->conexao = $objConexao->conectar();
    }
    public function cadastrarTutor($nome, $cpf, $telefone, $email, $endereco){
        $sql = "INSERT INTO tutor (nome, cpf, telefone, email, endereco) VALUES (:nome, :cpf, :telefone, :email, :endereco)";
        $stmt = mysqli_prepare($this->conexao, $sql);
        if (!$stmt) {
            return false;
        }
        mysqli_stmt_bind_param($stmt, "sssss", $nome, $cpf, $telefone, $email, $endereco);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $resultado;
    }

}
?>