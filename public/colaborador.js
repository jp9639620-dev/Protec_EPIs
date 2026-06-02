(() => {
  const modalElement = document.getElementById('modalNovoColaborador');
  const form = modalElement ? modalElement.querySelector('form') : null;
  const inputCPF = document.getElementById('cpfColaborador');
  const inputAdmissao = document.getElementById('admissaoColaborador');
  const inputNome = document.getElementById('nomeColaborador');
  const inputCargo = document.getElementById('cargoColaborador');
  const inputSetor = document.getElementById('setorColaborador');
  const tabelaBody = document.querySelector('.table-container tbody');
  const campoData = document.getElementById("data");

  if (!form || !inputCPF || !inputAdmissao || !tabelaBody) return;


  function formatarCPF(valor) {
    if (window.CPFMask?.formatarCPF) {
      return window.CPFMask.formatarCPF(valor);
    }
    const digitos = (valor || '').replace(/\D/g, '').slice(0, 11);
    return digitos
      .replace(/^(\d{3})(\d)/, '$1.$2')
      .replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3')
      .replace(/\.(\d{3})(\d)/, '.$1-$2');
  }

  function formatarData(valor) {
    const digitos = somenteDigitos(valor).slice(0, 8);
    if (digitos.length <= 2) return digitos;
    if (digitos.length <= 4) return `${digitos.slice(0, 2)}/${digitos.slice(2)}`;
    return `${digitos.slice(0, 2)}/${digitos.slice(2, 4)}/${digitos.slice(4)}`;
  }

  function valorTexto(input) {
    return (input?.value || '').trim();
  }

  function criarBotaoAcao(classes, title, iconClass) {
    return `
      <button class="btn-action ${classes}" title="${title}" type="button">
        <i class="fas ${iconClass}"></i>
      </button>
    `;
  }

  if (window.CPFMask?.aplicarMascaraCPF) {
    window.CPFMask.aplicarMascaraCPF(inputCPF);
  } else {
    inputCPF.addEventListener('input', (event) => {
      event.target.value = formatarCPF(event.target.value);
    });
  }

  inputAdmissao.addEventListener('input', (event) => {
    event.target.value = formatarData(event.target.value);
  });

  form.addEventListener('submit', (event) => {
    event.preventDefault();

    const nome = valorTexto(inputNome);
    const cpf = formatarCPF(valorTexto(inputCPF));
    const admissao = formatarData(valorTexto(inputAdmissao));
    const cargo = valorTexto(inputCargo);
    const setor = valorTexto(inputSetor);

    if (!nome || !cpf || !admissao || !cargo || !setor) {
      window.alert('Preencha todos os campos obrigatorios.');
      return;
    }

    const novaLinha = document.createElement('tr');
    novaLinha.innerHTML = `
      <td class="td-name">${nome}</td>
      <td class="td-cpf">${cpf}</td>
      <td class="td-cargo">${cargo}</td>
      <td>${setor}</td>
      <td>${admissao}</td>
      <td class="td-actions">
        ${criarBotaoAcao('btn-edit', 'Editar', 'fa-pen')}
        ${criarBotaoAcao('btn-delete', 'Deletar', 'fa-trash')}
      </td>
    `;

    tabelaBody.prepend(novaLinha);
    form.reset();

    if (window.bootstrap?.Modal && modalElement) {
      window.bootstrap.Modal.getOrCreateInstance(modalElement).hide();
    }
  });


  //data 
  campoData.addEventListener("input", (evento) => {
    let valor = evento.target.value;
    
    valor = valor.replace(/\D/g, ""); // Remove letras
    valor = valor.replace(/(\d{2})(\d)/, "$1/$2"); // Primeira barra
    valor = valor.replace(/(\d{2})(\d)/, "$1/$2"); // Segunda barra
    
    evento.target.value = valor; // Aplica no campo
});
})();