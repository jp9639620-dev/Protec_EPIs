<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <title>Gestão de Colaboradores - ProtecEPI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('public/css/principal.css') ?>">
  <style>
    .table-container {
      background-color: white;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.08);
      border: 1px solid #f0f3f7;
    }

    .table-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
      flex-wrap: wrap;
      gap: 15px;
    }

    .table-title {
      font-size: 24px;
      font-weight: 700;
      color: #2c3e50;
    }

    .btn-novo {
      background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 8px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(243, 156, 18, 0.3);
    }

    .btn-novo:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 18px rgba(243, 156, 18, 0.4);
      color: white;
    }

    .search-box {
      flex: 1;
      min-width: 250px;
      position: relative;
    }

    .search-box input {
      width: 100%;
      padding: 12px 15px 12px 40px;
      border: 1px solid #e0e7f1;
      border-radius: 8px;
      font-size: 14px;
      transition: all 0.3s ease;
    }

    .search-box input:focus {
      outline: none;
      border-color: #3498db;
      box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
    }

    .search-box i {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: #95a5a6;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead {
      background-color: #f9fafb;
      border-bottom: 2px solid #e0e7f1;
    }

    th {
      padding: 15px;
      text-align: left;
      font-weight: 700;
      color: #2c3e50;
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    tbody tr {
      border-bottom: 1px solid #f0f3f7;
      transition: all 0.3s ease;
    }

    tbody tr:hover {
      background-color: #f9fafb;
    }

    td {
      padding: 18px 15px;
      font-size: 14px;
      color: #2c3e50;
    }

    .td-name {
      font-weight: 600;
      color: #2c3e50;
    }

    .td-cpf {
      font-family: 'Courier New', monospace;
      color: #7f8c8d;
    }

    .td-cargo {
      color: #3498db;
      font-weight: 500;
    }

    .td-actions {
      text-align: center;
    }

    .btn-action {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      border-radius: 6px;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
      margin: 0 4px;
    }

    .btn-edit {
      background-color: #e8f4f8;
      color: #3498db;
    }

    .btn-edit:hover {
      background-color: #3498db;
      color: white;
      transform: scale(1.1);
    }

    .btn-delete {
      background-color: #fadbd8;
      color: #e74c3c;
    }

    .btn-delete:hover {
      background-color: #e74c3c;
      color: white;
      transform: scale(1.1);
    }

    .page-header {
      background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
      color: white;
      padding: 25px 30px;
      border-radius: 12px;
      margin-bottom: 30px;
      font-size: 28px;
      font-weight: 700;
      box-shadow: 0 8px 20px rgba(243, 156, 18, 0.3);
    }

    .empty-state {
      text-align: center;
      padding: 40px;
      color: #7f8c8d;
    }

    .empty-state i {
      font-size: 48px;
      color: #bdc3c7;
      margin-bottom: 15px;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="d-flex">
  <!-- Sidebar -->
  <div class="sidebar" style="width: 250px;">
    <div class="logo">
      <img src="<?= base_url('public/imagem/EPI.png') ?>" alt="Logo protecEPI">
      <span>ProtecEPI</span>
    </div>
    <a href="<?= base_url('home/principal') ?>" class="sidebar-item" style="text-decoration: none; color: inherit;">
      <i class="fas fa-home"></i> Dashboard
    </a>
    <div class="sidebar-item active">
      <i class="fas fa-users"></i> Colaboradores
    </div>
    <div class="sidebar-item">
      <i class="fas fa-shield-alt"></i> EPIs
    </div>
    <div class="sidebar-item">
      <i class="fas fa-box"></i> Entregas
    </div>
  </div>

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
          <button class="btn-novo">
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

</body>
</html>
