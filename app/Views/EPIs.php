<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestao de EPIs - ProtecEPI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('public/css/principal.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/css/epis.css') ?>">
</head>
<body>
<div class="d-flex">
  <?= view('partials/menu_lateral', ['paginaAtiva' => 'epis']) ?>

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
      <div class="epis-header">Gestao de EPIs</div>

      <div class="kpi-grid">
        <div class="kpi-card kpi-success">
          <h3>2</h3>
          <p>EPIs Disponiveis</p>
        </div>
        <div class="kpi-card kpi-warning">
          <h3>0</h3>
          <p>EPIs a Vencer (30 dias)</p>
        </div>
        <div class="kpi-card kpi-danger">
          <h3>4</h3>
          <p>EPIs Vencidos</p>
        </div>
      </div>

      <div class="alert-vencidos" id="alertaEpisVencidos">
        <div class="alert-head">
          <div>
            <div class="alert-title-wrap">
              <i class="fa-solid fa-triangle-exclamation"></i>
              <span>Atencao: EPIs Vencidos!</span>
            </div>
            <p class="alert-message">Existem 4 EPI(s) com validade vencida. Nao e permitido entregar EPIs vencidos aos colaboradores.</p>
          </div>
          <div class="alert-controls">
            <button type="button" class="btn-alert-action" data-bs-toggle="collapse" data-bs-target="#listaEpisVencidos" aria-expanded="false" aria-controls="listaEpisVencidos">
              <i class="fa-solid fa-helmet-safety"></i> Ver EPIs vencidos
            </button>
            <button type="button" class="btn-alert-close" id="fecharAlertaVencidos" aria-label="Fechar alerta">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>
        </div>
        <div class="collapse" id="listaEpisVencidos">
          <ul class="alert-vencidos-lista">
            <li>Luva de Seguranca - validade: 30/06/2024</li>
            <li>Bota de Seguranca - validade: 10/04/2024</li>
            <li>Oculos de Protecao - validade: 26/05/2024</li>
            <li>Avental de Raspa - validade: 12/03/2024</li>
          </ul>
        </div>
      </div>

      <section class="table-wrap">
        <div class="table-head">
          <h2>EPIs Cadastrados</h2>
          <button class="btn-novo-epi" data-bs-toggle="modal" data-bs-target="#modalNovoEpi">
            <i class="fa-solid fa-plus"></i> Novo EPI
          </button>
        </div>

        <div class="search-epis">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Buscar por nome, CA ou descricao...">
        </div>

        <div class="table-scroll">
          <table class="table-epis">
            <thead>
              <tr>
                <th>Equipamento</th>
                <th>CA</th>
                <th>Validade</th>
                <th>Quantidade</th>
                <th>Status</th>
                <th>Acoes</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="epi-name">Capacete</div>
                  <span class="epi-desc">Capacete de seguranca classe A</span>
                </td>
                <td>12345</td>
                <td>31/12/2026</td>
                <td>50</td>
                <td><span class="status-badge status-valido">Valido</span></td>
                <td class="actions-cell">
                  <i class="fa-regular fa-pen-to-square icon-edit" title="Editar"></i>
                  <i class="fa-regular fa-trash-can icon-delete" title="Excluir"></i>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="epi-name">Luva de Seguranca</div>
                  <span class="epi-desc">Luva de protecao mecanica</span>
                </td>
                <td>67890</td>
                <td>30/06/2024</td>
                <td>100</td>
                <td><span class="status-badge status-vencido">Vencido</span></td>
                <td class="actions-cell">
                  <i class="fa-regular fa-pen-to-square icon-edit" title="Editar"></i>
                  <i class="fa-regular fa-trash-can icon-delete" title="Excluir"></i>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="epi-name">Bota de Seguranca</div>
                  <span class="epi-desc">Bota com biqueira de aco</span>
                </td>
                <td>54321</td>
                <td>10/04/2024</td>
                <td>30</td>
                <td><span class="status-badge status-vencido">Vencido</span></td>
                <td class="actions-cell">
                  <i class="fa-regular fa-pen-to-square icon-edit" title="Editar"></i>
                  <i class="fa-regular fa-trash-can icon-delete" title="Excluir"></i>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="epi-name">Oculos de Protecao</div>
                  <span class="epi-desc">Oculos de protecao incolor</span>
                </td>
                <td>98765</td>
                <td>26/05/2024</td>
                <td>75</td>
                <td><span class="status-badge status-vencido">Vencido</span></td>
                <td class="actions-cell">
                  <i class="fa-regular fa-pen-to-square icon-edit" title="Editar"></i>
                  <i class="fa-regular fa-trash-can icon-delete" title="Excluir"></i>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </div>
</div>

<div class="modal fade" id="modalNovoEpi" tabindex="-1" aria-labelledby="modalNovoEpiLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content modal-epi">
      <div class="modal-header">
        <h2 class="modal-title" id="modalNovoEpiLabel">Novo EPI</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="nomeEquipamento" class="form-label epi-form-label">Nome do Equipamento *</label>
            <input type="text" class="form-control epi-form-control" id="nomeEquipamento" placeholder="Ex: Capacete de Seguranca">
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="caEpi" class="form-label epi-form-label">CA (Certificado de Aprovacao) *</label>
              <input type="text" class="form-control epi-form-control" id="caEpi" placeholder="Ex: 12345">
            </div>
            <div class="col-md-6 mb-3">
              <label for="validadeEpi" class="form-label epi-form-label">Data de Validade *</label>
              <input type="text" class="form-control epi-form-control" id="validadeEpi" placeholder="DD/MM/AAAA">
            </div>
          </div>
          <div class="mb-3">
            <label for="quantidadeEpi" class="form-label epi-form-label">Quantidade em Estoque *</label>
            <input type="number" class="form-control epi-form-control" id="quantidadeEpi">
          </div>
          <div class="mb-3">
            <label for="descricaoEpi" class="form-label epi-form-label">Descricao</label>
            <textarea class="form-control epi-form-control" id="descricaoEpi" placeholder="Descricao detalhada do equipamento..."></textarea>
          </div>
          <div class="epi-modal-actions">
            <button type="button" class="btn btn-epi-cancelar" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-epi-cadastrar">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const fecharAlertaBtn = document.getElementById('fecharAlertaVencidos');
  const alertaEpis = document.getElementById('alertaEpisVencidos');

  if (fecharAlertaBtn && alertaEpis) {
    fecharAlertaBtn.addEventListener('click', function () {
      alertaEpis.style.display = 'none';
    });
  }
</script>
<script src="<?= base_url('public/js/epis.js') ?>"></script>
</body>
</html>
