(() => {
  const modalElement = document.getElementById('modalNovoColaborador');
  const form = modalElement ? modalElement.querySelector('form') : null;
  const inputCPF = document.getElementById('cpfColaborador');
  const inputAdmissao = document.getElementById('admissaoColaborador');
  const inputNome = document.getElementById('nomeColaborador');
  const inputCargo = document.getElementById('cargoColaborador');
  const inputSetor = document.getElementById('setorColaborador');
  const tabelaBody = document.querySelector('.table-container tbody');
  const btnNovo = document.querySelector('.btn-novo');
  const tituloModal = document.getElementById('modalNovoColaboradorLabel');
  const btnSalvar = form ? form.querySelector('.btn-colaborador-cadastrar') : null;
  let linhaEmEdicao = null;

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
    const digitos = (valor || '').replace(/\D/g, '').slice(0, 8);
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

  function limparEstadoEdicao() {
    linhaEmEdicao = null;
    if (tituloModal) tituloModal.textContent = 'Novo Colaborador';
    if (btnSalvar) btnSalvar.textContent = 'Cadastrar';
  }

  function preencherFormularioComLinha(linha) {
    inputNome.value = linha.children[0]?.textContent.trim() || '';
    inputCPF.value = formatarCPF(linha.children[1]?.textContent.trim() || '');
    inputCargo.value = linha.children[2]?.textContent.trim() || '';
    inputSetor.value = linha.children[3]?.textContent.trim() || '';
    inputAdmissao.value = formatarData(linha.children[4]?.textContent.trim() || '');
  }

  function renderizarLinha(linha, dados) {
    linha.innerHTML = `
      <td class="td-name">${dados.nome}</td>
      <td class="td-cpf">${dados.cpf}</td>
      <td class="td-cargo">${dados.cargo}</td>
      <td>${dados.setor}</td>
      <td>${dados.admissao}</td>
      <td class="td-actions">
        ${criarBotaoAcao('btn-edit', 'Editar', 'fa-pen')}
        ${criarBotaoAcao('btn-delete', 'Deletar', 'fa-trash')}
      </td>
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

    const dados = { nome, cpf, cargo, setor, admissao };

    if (linhaEmEdicao) {
      renderizarLinha(linhaEmEdicao, dados);
    } else {
      const novaLinha = document.createElement('tr');
      renderizarLinha(novaLinha, dados);
      tabelaBody.prepend(novaLinha);
    }

    form.reset();
    limparEstadoEdicao();

    if (window.bootstrap?.Modal && modalElement) {
      window.bootstrap.Modal.getOrCreateInstance(modalElement).hide();
    }
  });

  tabelaBody.addEventListener('click', (event) => {
    const botaoEditar = event.target.closest('.btn-edit');
    const botaoExcluir = event.target.closest('.btn-delete');
    const linha = event.target.closest('tr');
    if (!linha) return;

    if (botaoExcluir) {
      const nome = linha.children[0]?.textContent.trim() || 'este colaborador';
      if (window.confirm(`Deseja excluir ${nome}?`)) {
        if (linhaEmEdicao === linha) {
          limparEstadoEdicao();
          form.reset();
        }
        linha.remove();
      }
      return;
    }

    if (botaoEditar) {
      linhaEmEdicao = linha;
      preencherFormularioComLinha(linha);
      if (tituloModal) tituloModal.textContent = 'Editar Colaborador';
      if (btnSalvar) btnSalvar.textContent = 'Salvar';
      if (window.bootstrap?.Modal && modalElement) {
        window.bootstrap.Modal.getOrCreateInstance(modalElement).show();
      }
    }
  });

  if (btnNovo) {
    btnNovo.addEventListener('click', () => {
      form.reset();
      limparEstadoEdicao();
    });
  }

  modalElement.addEventListener('hidden.bs.modal', () => {
    form.reset();
    limparEstadoEdicao();
  });
})();
