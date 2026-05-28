<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestao de EPIs - ProtecEPI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('public/css/principal.css') ?>">
  <style>
    .epis-header {
      background: #ffcc00;
      color: #101828;
      border-radius: 12px;
      padding: 14px 24px;
      font-size: 40px;
      font-weight: 700;
      margin-bottom: 22px;
    }

    .kpi-grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 16px;
      margin-bottom: 22px;
    }

    .kpi-card {
      border-radius: 12px;
      color: #fff;
      padding: 18px 24px;
      min-height: 122px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    }

    .kpi-card h3 {
      margin: 0;
      font-size: 52px;
      font-weight: 700;
      line-height: 1;
    }

    .kpi-card p {
      margin: 8px 0 0;
      font-size: 30px;
      font-weight: 500;
    }

    .kpi-success { background: #06c755; }
    .kpi-warning { background: #f2b900; color: #111827; }
    .kpi-danger { background: #ff2a39; }

    .alert-vencidos {
      background: #fff5f5;
      border: 1px solid #ffccd1;
      border-left: 4px solid #ff2a39;
      color: #b42318;
      border-radius: 12px;
      padding: 14px 16px;
      margin-bottom: 22px;
    }

    .alert-vencidos .alert-head {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
      flex-wrap: wrap;
    }

    .alert-vencidos .alert-title-wrap {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 34px;
      font-weight: 700;
    }

    .alert-vencidos .alert-title-wrap i {
      color: #ff2a39;
    }

    .alert-vencidos .alert-message {
      font-size: 28px;
      margin: 6px 0 0 44px;
      color: #b42318;
    }

    .alert-controls {
      display: flex;
      gap: 8px;
      align-items: center;
    }

    .btn-alert-action {
      border: 1px solid #ffb4bc;
      background: #fff;
      color: #b42318;
      border-radius: 8px;
      padding: 6px 12px;
      font-size: 16px;
      font-weight: 600;
    }

    .btn-alert-close {
      width: 34px;
      height: 34px;
      border: 1px solid #ffb4bc;
      border-radius: 8px;
      background: #fff;
      color: #b42318;
      line-height: 1;
    }

    .alert-vencidos-lista {
      margin: 12px 0 0 44px;
      padding-left: 18px;
      color: #7a271a;
    }

    .alert-vencidos-lista li {
      font-size: 16px;
      margin-bottom: 4px;
    }

    .table-wrap {
      background: #fff;
      border-radius: 12px;
      border: 1px solid #d0d5dd;
      overflow: hidden;
    }

    .table-head {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 22px 22px 14px;
      flex-wrap: wrap;
      gap: 12px;
    }

    .table-head h2 {
      margin: 0;
      font-size: 40px;
      color: #111827;
      font-weight: 700;
    }

    .btn-novo-epi {
      border: none;
      background: #ffcc00;
      color: #111827;
      border-radius: 12px;
      padding: 10px 20px;
      font-size: 34px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .search-epis {
      position: relative;
      margin: 0 22px 16px;
    }

    .search-epis i {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: #98a2b3;
      font-size: 22px;
    }

    .search-epis input {
      width: 100%;
      height: 56px;
      border: 1px solid #c7ced9;
      border-radius: 12px;
      padding: 0 16px 0 44px;
      font-size: 33px;
      color: #111827;
    }

    .search-epis input::placeholder {
      color: #98a2b3;
    }

    .table-epis {
      width: 100%;
      border-collapse: collapse;
    }

    .table-epis thead {
      background: #f2f4f7;
      border-top: 1px solid #d0d5dd;
      border-bottom: 1px solid #d0d5dd;
    }

    .table-epis th {
      text-transform: uppercase;
      color: #1f2937;
      font-size: 24px;
      font-weight: 600;
      padding: 12px 20px;
    }

    .table-epis td {
      padding: 16px 20px;
      font-size: 34px;
      color: #111827;
      border-bottom: 1px solid #e4e7ec;
      vertical-align: middle;
    }

    .epi-name {
      font-weight: 700;
      margin-bottom: 2px;
    }

    .epi-desc {
      display: block;
      font-size: 16px;
      color: #475467;
    }

    .status-badge {
      border-radius: 999px;
      padding: 4px 14px;
      font-size: 14px;
      font-weight: 700;
      color: #fff;
      display: inline-block;
      min-width: 72px;
      text-align: center;
    }

    .status-valido { background: #06c755; }
    .status-vencido { background: #ff2a39; }

    .actions-cell i {
      font-size: 18px;
      margin-right: 14px;
      cursor: pointer;
    }

    .icon-edit { color: #356dff; }
    .icon-delete { color: #ff2a39; margin-right: 0; }

    .modal-content.modal-epi {
      border: none;
      border-radius: 12px;
      background: #f7f7f8;
      padding: 24px 22px 20px;
      box-shadow: 0 18px 45px rgba(0, 0, 0, 0.35);
    }

    .modal-epi .modal-header {
      border: none;
      padding: 0;
      margin-bottom: 14px;
      align-items: flex-start;
    }

    .modal-epi .modal-title {
      font-size: 40px;
      font-weight: 700;
      color: #101828;
    }

    .modal-epi .btn-close {
      margin: 2px 0 0 auto;
      opacity: 0.7;
    }

    .modal-epi .modal-body {
      padding: 0;
    }

    .epi-form-label {
      font-size: 16px;
      font-weight: 700;
      color: #1d2939;
      margin-bottom: 8px;
    }

    .epi-form-control {
      border: 1px solid #bcc4d0;
      border-radius: 10px;
      background: #f8fafc;
      color: #1f2937;
      font-size: 31px;
      padding: 8px 16px;
      min-height: 42px;
    }

    .epi-form-control::placeholder {
      color: #8b96a7;
      font-size: 20px;
    }

    textarea.epi-form-control {
      min-height: 120px;
      resize: vertical;
    }

    .epi-form-control:focus {
      border-color: #f3c216;
      box-shadow: 0 0 0 0.2rem rgba(243, 194, 22, 0.18);
      background: #fff;
    }

    .epi-modal-actions {
      margin-top: 14px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
    }

    .btn-epi-cancelar,
    .btn-epi-cadastrar {
      border: none;
      border-radius: 10px;
      min-height: 46px;
      font-size: 34px;
      font-weight: 600;
      transition: all 0.2s ease;
    }

    .btn-epi-cancelar {
      background: #d9dde3;
      color: #111827;
    }

    .btn-epi-cancelar:hover {
      background: #ccd2db;
    }

    .btn-epi-cadastrar {
      background: #ffcc00;
      color: #111827;
    }

    .btn-epi-cadastrar:hover {
      background: #f2bf00;
    }

    @media (max-width: 992px) {
      .kpi-grid {
        grid-template-columns: 1fr;
      }

      .epis-header {
        font-size: 30px;
      }

      .table-head h2 {
        font-size: 30px;
      }

      .btn-novo-epi {
        font-size: 22px;
      }

      .search-epis input,
      .table-epis td {
        font-size: 22px;
      }

      .table-epis th {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
<div class="d-flex">
  <div class="sidebar" style="width: 250px;">
    <div class="logo">
      <img src="<?= base_url('public/imagem/EPI.png') ?>" alt="Logo protecEPI">
      <span>ProtecEPI</span>
    </div>
    <a href="<?= base_url('home/principal') ?>" class="sidebar-item" style="text-decoration: none; color: inherit;">
      <i class="fas fa-home"></i> Dashboard
    </a>
    <a href="<?= base_url('home/colaboradores') ?>" class="sidebar-item" style="text-decoration: none; color: inherit;">
      <i class="fas fa-users"></i> Colaboradores
    </a>
    <div class="sidebar-item active">
      <i class="fas fa-shield-alt"></i> EPIs
    </div>
    <div class="sidebar-item">
      <i class="fas fa-box"></i> Entregas
    </div>
  </div>

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

        <div style="overflow-x:auto;">
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
</body>
</html>
