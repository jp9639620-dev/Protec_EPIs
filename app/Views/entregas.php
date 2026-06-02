<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <title>Gestão de Entregas - ProtecEPI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('public/css/principal.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/css/entregas.css') ?>">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="d-flex">
  <?= view('partials/menu_lateral', ['paginaAtiva' => 'entregas']) ?>

  <div class="flex-grow-1">
    <div class="header-top">
      <div><i class="fas fa-bell"></i></div>
      <div>
        <span class="badge bg-warning text-dark">MS</span>
        <strong>Maria Santos</strong><br>
        <small>Administrador</small>
      </div>
    </div>

    <div class="main-content">
      <div class="entregas-header">Gestão de Entregas de EPIs</div>

      <div class="entregas-kpi-grid">
        <div class="entregas-kpi-card kpi-total">
          <strong>4</strong>
          <span>Total de entregas</span>
        </div>
        <div class="entregas-kpi-card kpi-mes">
          <strong>2</strong>
          <span>Entregas este mês</span>
        </div>
        <div class="entregas-kpi-card kpi-pendente">
          <strong>1</strong>
          <span>Pendentes</span>
        </div>
      </div>

      <div class="table-container-entregas">
        <div class="entregas-table-header">
          <div class="entregas-table-title">Entregas Registradas</div>
          <button class="btn-nova-entrega" type="button" data-bs-toggle="modal" data-bs-target="#modalNovaEntrega">
            <i class="fas fa-plus"></i> Nova Entrega
          </button>
        </div>

        <div class="search-entregas">
          <i class="fas fa-search"></i>
          <input type="text" placeholder="Buscar por colaborador, EPI ou responsável...">
        </div>

        <div class="table-scroll">
          <table class="table-entregas">
            <thead>
              <tr>
                <th>Colaborador</th>
                <th>EPI</th>
                <th>Data</th>
                <th>Responsável</th>
                <th>Status</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="td-colaborador">João Silva</td>
                <td class="td-epi">Capacete</td>
                <td class="td-data">25/01/2024</td>
                <td class="td-responsavel">Pedro Silva</td>
                <td><span class="badge-entrega-status badge-concluida">Concluída</span></td>
                <td class="td-actions-entrega">
                  <button class="btn-action-entrega btn-edit" type="button" title="Editar">
                    <i class="fas fa-pen"></i>
                  </button>
                  <button class="btn-action-entrega btn-delete" type="button" title="Excluir">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="td-colaborador">Maria Santos</td>
                <td class="td-epi">Luva de Segurança</td>
                <td class="td-data">22/01/2024</td>
                <td class="td-responsavel">Pedro Silva</td>
                <td><span class="badge-entrega-status badge-concluida">Concluída</span></td>
                <td class="td-actions-entrega">
                  <button class="btn-action-entrega btn-edit" type="button" title="Editar">
                    <i class="fas fa-pen"></i>
                  </button>
                  <button class="btn-action-entrega btn-delete" type="button" title="Excluir">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="td-colaborador">Carlos Oliveira</td>
                <td class="td-epi">Bota de Segurança</td>
                <td class="td-data">20/01/2024</td>
                <td class="td-responsavel">Ana Costa</td>
                <td><span class="badge-entrega-status badge-pendente">Pendente</span></td>
                <td class="td-actions-entrega">
                  <button class="btn-action-entrega btn-edit" type="button" title="Editar">
                    <i class="fas fa-pen"></i>
                  </button>
                  <button class="btn-action-entrega btn-delete" type="button" title="Excluir">
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

<div class="modal fade" id="modalNovaEntrega" tabindex="-1" aria-labelledby="modalNovaEntregaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-entrega-dialog">
    <div class="modal-content modal-entrega">
      <div class="modal-header">
        <h2 class="modal-title" id="modalNovaEntregaLabel">Nova Entrega</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="colaboradorEntrega" class="form-label entrega-form-label">Colaborador *</label>
            <input type="text" class="form-control entrega-form-control" id="colaboradorEntrega" placeholder="Nome do colaborador">
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="epiEntrega" class="form-label entrega-form-label">EPI *</label>
              <input type="text" class="form-control entrega-form-control" id="epiEntrega" placeholder="Ex: Capacete">
            </div>
            <div class="col-md-6 mb-3">
              <label for="dataEntrega" class="form-label entrega-form-label">Data da entrega *</label>
              <input type="text" class="form-control entrega-form-control" id="dataEntrega" placeholder="DD/MM/AAAA">
            </div>
          </div>
          <div class="mb-3">
            <label for="responsavelEntrega" class="form-label entrega-form-label">Responsável *</label>
            <input type="text" class="form-control entrega-form-control" id="responsavelEntrega" placeholder="Quem registrou a entrega">
          </div>
          <div class="entrega-modal-actions">
            <button type="button" class="btn btn-entrega-cancelar" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-entrega-cadastrar">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
