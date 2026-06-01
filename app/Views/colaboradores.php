<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <title>Gestão de Colaboradores - ProtecEPI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('public/css/principal.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/css/colaboradores.css') ?>">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="d-flex">
  <?= view('partials/menu_lateral', ['paginaAtiva' => 'colaboradores']) ?>

  <!-- Main Content -->
  <div class="flex-grow-1">
    <!-- Header Top -->
    <div class="header-top">
      <div>
        <i class="fas fa-bell"></i>
      </div>
      <div>
        <span class="badge bg-warning text-dark">MS</span>
        <strong>Maria Santos</strong><br>
        <small>Administrador</small>
      </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
      <!-- Page Header -->
      <div class="page-header">
        Gestão de Colaboradores
      </div>

      <!-- Table Section -->
      <div class="table-container">
        <div class="table-header">
          <div class="table-title">Colaboradores Cadastrados</div>
          <button class="btn-novo" data-bs-toggle="modal" data-bs-target="#modalNovoColaborador">
            <i class="fas fa-plus"></i> Novo Colaborador
          </button>
        </div>

        <div class="search-box mb-4">
          <i class="fas fa-search"></i>
          <input type="text" placeholder="Buscar por nome, CPF ou cargo...">
        </div>

        <div style="overflow-x: auto;">
          <table>
            <thead>
              <tr>
                <th>NOME</th>
                <th>CPF</th>
                <th>CARGO</th>
                <th>SETOR</th>
                <th>ADMISSÃO</th>
                <th>AÇÕES</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="td-name">João Silva</td>
                <td class="td-cpf">123.456.789-00</td>
                <td class="td-cargo">Operador</td>
                <td>Produção</td>
                <td>15/01/2020</td>
                <td class="td-actions">
                  <button class="btn-action btn-edit" title="Editar">
                    <i class="fas fa-pen"></i>
                  </button>
                  <button class="btn-action btn-delete" title="Deletar">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="td-name">Maria Santos</td>
                <td class="td-cpf">987.654.321-00</td>
                <td class="td-cargo">Técnica</td>
                <td>Manutenção</td>
                <td>20/03/2021</td>
                <td class="td-actions">
                  <button class="btn-action btn-edit" title="Editar">
                    <i class="fas fa-pen"></i>
                  </button>
                  <button class="btn-action btn-delete" title="Deletar">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="td-name">Carlos Oliveira</td>
                <td class="td-cpf">456.789.123-00</td>
                <td class="td-cargo">Supervisor</td>
                <td>Qualidade</td>
                <td>10/06/2019</td>
                <td class="td-actions">
                  <button class="btn-action btn-edit" title="Editar">
                    <i class="fas fa-pen"></i>
                  </button>
                  <button class="btn-action btn-delete" title="Deletar">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalNovoColaborador" tabindex="-1" aria-labelledby="modalNovoColaboradorLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content modal-colaborador">
      <div class="modal-header">
        <h2 class="modal-title" id="modalNovoColaboradorLabel">Novo Colaborador</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="nomeColaborador" class="form-label colaborador-form-label">Nome Completo *</label>
            <input type="text" class="form-control colaborador-form-control" id="nomeColaborador">
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cpfColaborador" class="form-label colaborador-form-label">CPF *</label>
              <input type="text" class="form-control colaborador-form-control" id="cpfColaborador">
            </div>
            <div class="col-md-6 mb-3">
              <label for="admissaoColaborador" class="form-label colaborador-form-label">Data de Admissão *</label>
              <input type="text" class="form-control colaborador-form-control" id="admissaoColaborador" placeholder="DD/MM/AAAA">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cargoColaborador" class="form-label colaborador-form-label">Cargo *</label>
              <input type="text" class="form-control colaborador-form-control" id="cargoColaborador">
            </div>
            <div class="col-md-6 mb-3">
              <label for="setorColaborador" class="form-label colaborador-form-label">Setor *</label>
              <input type="text" class="form-control colaborador-form-control" id="setorColaborador">
            </div>
          </div>
          <div class="colaborador-modal-actions">
            <button type="button" class="btn btn-colaborador-cancelar" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-colaborador-cadastrar">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
