<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Formulário de Contato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body style="background-color: #698699ff;" class="text-white">

<div class="container mt-5 ml-0">
    <h2 class="text-center">Contato</h2>

    <?php if (!empty($msg)) echo "$msg" ?>

    <form method="POST" class="p-3 bg-secondary rounded mb-5 w-50 m-auto">
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required />
        </div>
        <div class="mb-3">
            <label>E-mail</label>
            <input type="email" name="email" class="form-control" required />
        </div>
        <div class="mb-3">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control" />
        </div>
        <div class="mb-3">
            <label>Mensagem</label>
            <textarea name="mensagem" class="form-control" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="/Teste/app/views/contato/listarContato.php" class="btn btn-primary">Ver Contatos</a>
    </form>
</div>

</body>
</html>
