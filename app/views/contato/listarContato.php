<?php

require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../models/contato.php';

$modelContato = new Contato($pdo);
$contatos = $modelContato->listarContato();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body style="background-color: #698699ff;" class="text-white">
    <a href ="../../../public/index.php" class="btn btn-primary mt-3 ml-3">Voltar</a>
    <h3 class="text-center mt-5">Lista de contatos</h3>
    <table class="table table-striped table-dark table-bordered w-50 m-auto mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Mensagem</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($contatos)): ?>
                <?php foreach ($contatos as $c): ?>
                    <tr>
                        <td><?= htmlspecialchars($c['id']) ?></td>
                        <td><?= htmlspecialchars($c['nome']) ?></td>
                        <td><?= htmlspecialchars($c['email']) ?></td>
                        <td><?= htmlspecialchars($c['telefone']) ?></td>
                        <td><?= nl2br(htmlspecialchars($c['mensagem'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" class="text-center">Nenhum contato cadastrado.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    
</body>
</html>