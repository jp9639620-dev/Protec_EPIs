<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <title>Dashboard - Controle de EPIs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('public/css/principal.css') ?>">
  
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
    <div class="sidebar-item active">
      <i class="fas fa-home"></i> Dashboard
    </div>
    <a href="<?= base_url('colaboradores') ?>" class="sidebar-item" style="text-decoration: none; color: inherit;">
      <i class="fas fa-users"></i> Colaboradores
    </a>
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
        <span class="badge bg-warning text-dark">PS</span>
        <strong> Usuario</strong><br>
        <small>Técnico de Segurança</small>
      </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
      <!-- Dashboard Header -->
      <div class="dashboard-header">
        Dashboard - Controle de EPIs
      </div>

      <!-- Stats Cards -->
      <div class="row">
        <div class="col-md-3">
          <div class="stat-card yellow">
            <div class="stat-icon">
              <img src="<?= base_url('public/imagem/capacete.png') ?>" alt="Capacete" class="stat-icon-img">
            </div>
            <div class="stat-number"><?= $epis_disponiveis ?? 0 ?></div>
            <div class="stat-label">EPIs Disponíveis</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="stat-card blue">
            <div class="stat-icon">
              <img src="<?= base_url('public/imagem/aberto.png') ?>" alt="Entregas" class="stat-icon-img">
            </div>
            <div class="stat-number">5</div>
            <div class="stat-label">Entregas Pendentes</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="stat-card red">
            <div class="stat-icon">
              <img src="<?= base_url('public/imagem/olho.png') ?>" alt="Olhando" class="stat-icon-img">
            </div>
            <div class="stat-number"><?= $epis_vencidos ?? 0 ?></div>
            <div class="stat-label">EPIs Vencidos</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="stat-card blue">
            <div class="stat-icon">
              <img src="<?= base_url('public/imagem/EPIs.png') ?>" alt="Colaboradores" class="stat-icon-img">
            </div>
            <div class="stat-number"><?= $total_colaboradores ?? 0 ?></div>
            <div class="stat-label">Colaboradores</div>
          </div>
        </div>
      </div>

      <!-- Últimas Entregas and Alertas -->
      <div class="row mt-4">
        <div class="col-md-8">
          <div class="card-section">
            <div class="d-flex justify-content-between align-items-center">
              <div class="section-title">Últimas Entregas</div>
              <a href="#" class="see-all">Ver todas →</a>
            </div>
            
            <div class="delivery-item">
              <div class="delivery-avatar">
                <i class="fas fa-user"></i>
              </div>
              <div class="delivery-info">
                <div class="delivery-name">Carlos Oliveira</div>
                <div class="delivery-description">Recebeu: Protetor Auricular</div>
              </div>
              <div class="delivery-date">
                <div class="delivery-date-value">25/01/2024</div>
                <div class="delivery-date-user">Pedro Silva</div>
              </div>
            </div>

            <div class="delivery-item">
              <div class="delivery-avatar">
                <i class="fas fa-user"></i>
              </div>
              <div class="delivery-info">
                <div class="delivery-name">Maria Santos</div>
                <div class="delivery-description">Pré-visualização ao vivo em carregamento, as interações podem não ser salvas</div>
              </div>
              <div class="delivery-date">
                <div class="delivery-date-value">22/01/2024</div>
                <div class="delivery-date-user">Pedro Silva</div>
              </div>
            </div>

            <div class="delivery-item">
              <div class="delivery-avatar">
                <i class="fas fa-user"></i>
              </div>
              <div class="delivery-info">
                <div class="delivery-name">João Silva</div>
                <div class="delivery-description">Recebeu: Bota de Segurança</div>
              </div>
              <div class="delivery-date">
                <div class="delivery-date-value">20/01/2024</div>
                <div class="delivery-date-user">Pedro Silva</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Alertas -->
        <div class="col-md-4">
          <div class="card-section">
            <div class="section-title">
              <i class="fas fa-exclamation-triangle"></i> Alertas
            </div>

            <div class="alert-item">
              <div class="alert-title">EPIs Vencidos</div>
              <div class="alert-content">4 EPI(s) vencido(s) precisam ser trocados!</div>
            </div>

            <div class="alert-item">
              <div class="alert-title">Luva de Segurança</div>
              <div class="alert-content">Vencido em: 30/06/2024</div>
            </div>

            <div class="alert-item">
              <div class="alert-title">Bota de Segurança</div>
              <div class="alert-content">Vencido em: 10/04/2024</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Bottom Section -->
      <div class="row mt-4">
        <div class="col-lg-8">
          <div class="card-section stats-general">
            <div class="section-title">Estatísticas Gerais</div>
            <div class="row">
              <div class="col-md-6">
                <div class="info-card light-green">
                  <div class="info-title"><i class="fas fa-chart-line"></i> Total de Entregas</div>
                  <div class="info-number">4</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-card light-blue">
                  <div class="info-title"><i class="fas fa-clipboard-list"></i> EPIs Cadastrados</div>
                  <div class="info-number">6</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card-section welcome-card">
            <div class="section-title">Bem-vindo!</div>
            <p>Gerencie os EPIs da sua empresa com facilidade. Acompanhe entregas e alertas sobre EPIs vencidos.</p>
            <ul class="welcome-list">
              <li>Monitorar equipamentos entregues</li>
              <li>Controlar validade dos EPIs</li>
              <li>Alertar sobre EPIs vencidos</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
