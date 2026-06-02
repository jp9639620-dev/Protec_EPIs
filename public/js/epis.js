(() => {
  const modalElement = document.getElementById('modalNovoEpi');
  const form = modalElement ? modalElement.querySelector('form') : null;
  const tabelaBody = document.querySelector('.table-epis tbody');
  const btnNovo = document.querySelector('.btn-novo-epi');
  const tituloModal = document.getElementById('modalNovoEpiLabel');
  const btnSalvar = form ? form.querySelector('.btn-epi-cadastrar') : null;

  const inputNome = document.getElementById('nomeEquipamento');
  const inputCA = document.getElementById('caEpi');
  const inputValidade = document.getElementById('validadeEpi');
  const inputQuantidade = document.getElementById('quantidadeEpi');
  const inputDescricao = document.getElementById('descricaoEpi');

  let linhaEmEdicao = null;

  if (
    !modalElement ||
    !form ||
    !tabelaBody ||
    !inputNome ||
    !inputCA ||
    !inputValidade ||
    !inputQuantidade
  ) {
    return;
  }

  function formatarData(valor) {
    const digitos = (valor || '').replace(/\D/g, '').slice(0, 8);
    if (digitos.length <= 2) return digitos;
    if (digitos.length <= 4) return `${digitos.slice(0, 2)}/${digitos.slice(2)}`;
    return `${digitos.slice(0, 2)}/${digitos.slice(2, 4)}/${digitos.slice(4)}`;
  }

  function limparEstadoEdicao() {
    linhaEmEdicao = null;
    if (tituloModal) tituloModal.textContent = 'Novo EPI';
    if (btnSalvar) btnSalvar.textContent = 'Cadastrar';
  }

  function valorTexto(input) {
    return (input?.value || '').trim();
  }

  function montarDescricao(nome, descricao) {
    if (descricao) return descricao;
    return `${nome} cadastrado`;
  }

  function definirStatusPorData(validade) {
    const [dia, mes, ano] = validade.split('/');
    const data = new Date(`${ano}-${mes}-${dia}T00:00:00`);
    const hoje = new Date();
    hoje.setHours(0, 0, 0, 0);
    if (Number.isNaN(data.getTime())) {
      return { classe: 'status-vencido', texto: 'Vencido' };
    }
    if (data < hoje) {
      return { classe: 'status-vencido', texto: 'Vencido' };
    }
    return { classe: 'status-valido', texto: 'Valido' };
  }

  function renderizarLinha(linha, dados) {
    const status = definirStatusPorData(dados.validade);
    linha.innerHTML = `
      <td>
        <div class="epi-name">${dados.nome}</div>
        <span class="epi-desc">${montarDescricao(dados.nome, dados.descricao)}</span>
      </td>
      <td>${dados.ca}</td>
      <td>${dados.validade}</td>
      <td>${dados.quantidade}</td>
      <td><span class="status-badge ${status.classe}">${status.texto}</span></td>
      <td class="actions-cell">
        <i class="fa-regular fa-pen-to-square icon-edit" title="Editar"></i>
        <i class="fa-regular fa-trash-can icon-delete" title="Excluir"></i>
      </td>
    `;
  }

  function preencherFormularioComLinha(linha) {
    inputNome.value = linha.querySelector('.epi-name')?.textContent.trim() || '';
    inputDescricao.value = linha.querySelector('.epi-desc')?.textContent.trim() || '';
    inputCA.value = linha.children[1]?.textContent.trim() || '';
    inputValidade.value = formatarData(linha.children[2]?.textContent.trim() || '');
    inputQuantidade.value = linha.children[3]?.textContent.trim() || '';
  }

  inputValidade.addEventListener('input', (event) => {
    event.target.value = formatarData(event.target.value);
  });

  form.addEventListener('submit', (event) => {
    event.preventDefault();

    const nome = valorTexto(inputNome);
    const ca = valorTexto(inputCA);
    const validade = formatarData(valorTexto(inputValidade));
    const quantidade = valorTexto(inputQuantidade);
    const descricao = valorTexto(inputDescricao);

    if (!nome || !ca || !validade || !quantidade) {
      window.alert('Preencha todos os campos obrigatorios.');
      return;
    }

    const dados = { nome, ca, validade, quantidade, descricao };

    if (linhaEmEdicao) {
      renderizarLinha(linhaEmEdicao, dados);
    } else {
      const novaLinha = document.createElement('tr');
      renderizarLinha(novaLinha, dados);
      tabelaBody.prepend(novaLinha);
    }

    form.reset();
    limparEstadoEdicao();
    window.bootstrap?.Modal.getOrCreateInstance(modalElement).hide();
  });

  tabelaBody.addEventListener('click', (event) => {
    const iconeEditar = event.target.closest('.icon-edit');
    const iconeExcluir = event.target.closest('.icon-delete');
    const linha = event.target.closest('tr');
    if (!linha) return;

    if (iconeExcluir) {
      const nome = linha.querySelector('.epi-name')?.textContent.trim() || 'este EPI';
      if (window.confirm(`Deseja excluir ${nome}?`)) {
        if (linhaEmEdicao === linha) {
          limparEstadoEdicao();
          form.reset();
        }
        linha.remove();
      }
      return;
    }

    if (iconeEditar) {
      linhaEmEdicao = linha;
      preencherFormularioComLinha(linha);
      if (tituloModal) tituloModal.textContent = 'Editar EPI';
      if (btnSalvar) btnSalvar.textContent = 'Salvar';
      window.bootstrap?.Modal.getOrCreateInstance(modalElement).show();
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
