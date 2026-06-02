(() => {
  function somenteDigitos(valor) {
    return (valor || '').replace(/\D/g, '');
  }

  function formatarCPF(valor) {
    const digitos = somenteDigitos(valor).slice(0, 11);
    return digitos
      .replace(/^(\d{3})(\d)/, '$1.$2')
      .replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3')
      .replace(/\.(\d{3})(\d)/, '.$1-$2');
  }

  function aplicarMascaraCPF(input) {
    if (!input || input.dataset.cpfMaskApplied === 'true') return;

    input.addEventListener('input', (event) => {
      event.target.value = formatarCPF(event.target.value);
    });

    input.value = formatarCPF(input.value);
    input.dataset.cpfMaskApplied = 'true';
  }

  function inicializarMascaraCPF() {
    // Aplica apenas onde for marcado explicitamente.
    document.querySelectorAll('input[data-mask="cpf"]').forEach(aplicarMascaraCPF);
  }

  window.CPFMask = {
    formatarCPF,
    aplicarMascaraCPF,
    inicializarMascaraCPF,
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', inicializarMascaraCPF);
  } else {
    inicializarMascaraCPF();
  }
})();
