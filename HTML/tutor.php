<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Tutor</title>

    <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Cadastro de Tutor</h2>
        <form action="../PHP/salvarTutor.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Nome:</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">CPF:</label>
                <input type="text" name="cpf" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Telefone:</label>
                <input type="tel" name="telefone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Endereço:</label>
                <input type="text" name="endereco" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Tutor</button>
            <a href="listar_tutores.php" class="btn btn-secondary">Listar Tutores</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>