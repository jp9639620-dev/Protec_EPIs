<?php
$paginaAtiva = $paginaAtiva ?? '';

$itensMenu = [
    ['id' => 'dashboard', 'numero' => '1', 'titulo' => 'Dashboard', 'icone' => 'fa-house', 'url' => base_url('home/principal')],
    ['id' => 'colaboradores', 'numero' => '2', 'titulo' => 'Colaboradores', 'icone' => 'fa-users', 'url' => base_url('colaboradores')],
    ['id' => 'epis', 'numero' => '3', 'titulo' => 'EPIs', 'icone' => 'fa-shield-halved', 'url' => base_url('epis')],
    ['id' => 'entregas', 'numero' => '4', 'titulo' => 'entregas', 'icone' => 'fa-box', 'url' => base_url('entregas')],                               
];
?>

<aside class="sidebar sidebar--recolhido" id="sidebarMenu">
  <div class="sidebar-topo">
    <div class="sidebar-topo-marca">
      <i class="fa-solid fa-building" aria-hidden="true"></i>
      <span>Protec_EPI</span>
    </div>
    <button type="button" class="sidebar-btn-recolher" id="btnRecolherMenu" aria-label="Abrir menu" aria-expanded="false">
      <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
    </button>
  </div>

  <nav class="sidebar-menu">
    <?php foreach ($itensMenu as $item): ?>
      <?php $ativo = ($paginaAtiva === $item['id']) ? ' active' : ''; ?>
      <a href="<?= $item['url'] ?>" class="sidebar-item<?= $ativo ?>">
        <i class="fa-solid <?= esc($item['icone']) ?> sidebar-item-icone" aria-hidden="true"></i>
        <span class="sidebar-item-texto"><?= esc($item['numero']) ?>. <?= esc($item['titulo']) ?></span>
      </a>
    <?php endforeach; ?>
  </nav>
</aside>

<script>
  (function () {
    const sidebar = document.getElementById('sidebarMenu');
    const btn = document.getElementById('btnRecolherMenu');
    if (!sidebar || !btn) return;

    const icone = btn.querySelector('i');
    const storageKey = 'protecEpi.sidebar.recolhido';

    function menuEstaFechado() {
      return sidebar.classList.contains('sidebar--recolhido');
    }

    function atualizarBotao() {
      const fechado = menuEstaFechado();
      btn.setAttribute('aria-label', fechado ? 'Abrir menu' : 'Fechar menu');
      btn.setAttribute('aria-expanded', fechado ? 'false' : 'true');
      if (icone) {
        icone.classList.toggle('fa-chevron-right', fechado);
        icone.classList.toggle('fa-chevron-left', !fechado);
      }
    }

    // Ao entrar no site: fechado por padrão. Depois, mantém a escolha do usuário.
    const estadoSalvo = localStorage.getItem(storageKey);
    if (estadoSalvo === 'aberto') {
      sidebar.classList.remove('sidebar--recolhido');
    } else if (estadoSalvo === 'fechado') {
      sidebar.classList.add('sidebar--recolhido');
    } else {
      sidebar.classList.add('sidebar--recolhido');
    }

    btn.addEventListener('click', function () {
      sidebar.classList.toggle('sidebar--recolhido');
      localStorage.setItem(storageKey, menuEstaFechado() ? 'fechado' : 'aberto');
      atualizarBotao();
    });

    atualizarBotao();
  })();
</script>
