<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <link rel="stylesheet" href="<?= base_url('css/clientes.css') ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <!-- CADASTRO -->
    <h2 class="form-title text-center mb-4">
        Cadastrar usuário de EPI
    </h2>

    <div class="card card-form shadow-sm">
        <div class="card-body">

            <form action="<?= base_url('home1/salvar') ?>" method="post">

                <div class="mb-3">
                    <label class="form-label">Nome do Cliente:</label>
                    <input type="text" name="nome_cliente" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">CNPJ:</label>
                    <input type="text" name="cnpj" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Telefone:</label>
                    <input type="text" name="telefone" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status:</label>

                    <select name="status" class="form-select">
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Gravar Cliente
                </button>

            </form>

        </div>
    </div>

    <!-- LISTA -->
    <h2 class="mt-5 mb-4 text-center">
        Lista de Clientes
    </h2>

    <div class="card shadow-sm border-success">
        <div class="card-body">

            <table class="table table-hover table-bordered text-center align-middle">

                <thead class="table-light">
                    <tr>
                        <th>id</th>
                        <th>nome</th>
                        <th>email</th>
                        <th>senha</th>
                        <th>data Criação</th>
                        <th>hora Criação</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach($epi as $c): ?>

                    <tr>
                        <td><?= $c['id'] ?></td>
                        <td><?= $c['nome'] ?></td>
                        <td><?= $c['email'] ?></td>
                        <td><?= $c['senha'] ?></td>
                        <td><?= $c['data_criacao'] ?></td>
                        <td><?= $c['hora_criacao'] ?></td>
                        <td>

                        <a href="<?=base_url('home/editar/'.$c['id']) ?>">Editars</a>
                    </tr>
 
                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>