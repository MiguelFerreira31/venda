<form method="POST" action="http://localhost/venda/public/venda/editar/<?php echo $vendas[0]['id_compra']; ?>" enctype="multipart/form-data" onsubmit="return validarTotal()">
  <div class="container mt-4">
    <div id="alert-container" style="position: relative; min-height: 60px;"></div>
    <h3>Detalhes da Compra</h3>

    <!-- Compra e Cliente -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label>Nome do Cliente</label>
        <input type="text" name="nome_cliente" class="form-control" value="<?= htmlspecialchars($vendas[0]['nome_cliente']) ?>" readonly>
      </div>
      <div class="col-md-3">
        <label>Data da Compra</label>
        <input type="datetime-local" name="data_compra" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($vendas[0]['data_compra'])) ?>">
      </div>
      <div class="col-md-3">
        <label>Total</label>
        <input type="number" step="0.01" name="total" id="input-total" class="form-control" value="<?= $vendas[0]['total'] ?>" data-total-original="<?= $vendas[0]['total'] ?>">
      </div>
    </div>

    <!-- Itens da Compra -->
    <div class="mb-3">
      <h5>Itens da Compra</h5>
      <div class="table-responsive">
        <table class="table table-bordered table-sm">
          <thead class="table-light">
            <tr>
              <th>Produto</th>
              <th>Descrição</th>
              <th>Preço Unitário</th>
              <th>Quantidade</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($itens as $index => $item): ?>
              <?php if (!empty($item['id_item'])): ?>
                <tr>
                  <input type="hidden" name="itens[<?= $index ?>][id_item]" value="<?= $item['id_item'] ?>">
                  <td>
                    <input type="text" name="itens[<?= $index ?>][nome_produto]" class="form-control" value="<?= htmlspecialchars($item['nome_produto']) ?>">
                  </td>
                  <td>
                    <input type="text" name="itens[<?= $index ?>][descricao]" class="form-control" value="<?= htmlspecialchars($item['descricao']) ?>">
                  </td>
                  <td>
                    <input type="number" step="0.01" name="itens[<?= $index ?>][preco_unitario]" class="form-control" value="<?= $item['preco_unitario'] ?>">
                  </td>
                  <td>
                    <input type="number" name="itens[<?= $index ?>][quantidade]" class="form-control" value="<?= $item['quantidade'] ?>">
                  </td>
                  <td>
                    <input type="number" step="0.01" name="itens[<?= $index ?>][subtotal]" class="form-control" value="<?= $item['subtotal'] ?>">
                  </td>
                </tr>
              <?php endif; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Parcelas -->
    <div class="mb-3">
      <h5>Parcelas</h5>
      <div class="table-responsive">
        <table class="table table-bordered table-sm">
          <thead class="table-light">
            <tr>
              <th>Nº Parcela</th>
              <th>Valor</th>
              <th>Vencimento</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($parcelas as $index => $parcela): ?>
              <?php if (!empty($parcela['id_parcela'])): ?>
                <tr>
                  <input type="hidden" name="parcelas[<?= $index ?>][id_parcela]" value="<?= $parcela['id_parcela'] ?>">
                  <td>
                    <input type="number" name="parcelas[<?= $index ?>][numero_parcela]" class="form-control" value="<?= $parcela['numero_parcela'] ?>">
                  </td>
                  <td>
                    <input type="number" step="0.01" name="parcelas[<?= $index ?>][valor]" class="form-control" value="<?= $parcela['valor'] ?>">
                  </td>
                  <td>
                    <input type="date" name="parcelas[<?= $index ?>][data_vencimento]" class="form-control" value="<?= date('Y-m-d', strtotime($parcela['data_vencimento'])) ?>">
                  </td>
                  <td>
                    <select name="parcelas[<?= $index ?>][pago]" class="form-select">
                      <option value="1" <?= $parcela['pago'] ? 'selected' : '' ?>>Pago</option>
                      <option value="0" <?= !$parcela['pago'] ? 'selected' : '' ?>>Pendente</option>
                    </select>
                  </td>
                </tr>
              <?php endif; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Botão de Envio -->
    <div class="text-end">
      <button type="submit" class="btn btn-success">Salvar Alterações</button>
    </div>
  </div>


<input type="hidden" name="id_venda" value="<?= $vendas[0]['id_compra'] ?>">
<input type="hidden" name="id_cliente" value="<?= $vendas[0]['id_cliente'] ?>">


</form>

<script>
function mostrarAlertaBootstrap(mensagem, tipo = 'danger') {
  // tipo pode ser: 'success', 'danger', 'warning', 'info', etc.

  // Remove alertas anteriores
  const container = document.getElementById('alert-container');
  container.innerHTML = '';

  // Cria o alerta Bootstrap
  const alertDiv = document.createElement('div');
  alertDiv.className = `alert alert-${tipo} alert-dismissible fade show`;
  alertDiv.role = 'alert';
  alertDiv.innerHTML = `
    ${mensagem}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  `;

  // Adiciona no container
  container.appendChild(alertDiv);

  // Remove automaticamente após 5 segundos
  setTimeout(() => {
    // Desaparece com fade
    bootstrap.Alert.getOrCreateInstance(alertDiv).close();
  }, 5000);
}

function validarTotal() {
  const inputTotal = document.getElementById('input-total');
  const totalInformado = parseFloat(inputTotal.value);

  const subtotaisInputs = document.querySelectorAll('input[name^="itens"][name$="[subtotal]"]');
  let somaSubtotais = 0;
  subtotaisInputs.forEach(input => {
    const val = parseFloat(input.value);
    if (!isNaN(val)) somaSubtotais += val;
  });

  const parcelasInputs = document.querySelectorAll('input[name^="parcelas"][name$="[valor]"]');
  let somaParcelas = 0;
  parcelasInputs.forEach(input => {
    const val = parseFloat(input.value);
    if (!isNaN(val)) somaParcelas += val;
  });

  if (Math.abs(somaSubtotais - totalInformado) > 0.01) {
    mostrarAlertaBootstrap(`A soma dos subtotais (${somaSubtotais.toFixed(2)}) não é igual ao total informado (${totalInformado.toFixed(2)}).`);
    inputTotal.focus();
    return false;
  }

  if (Math.abs(somaParcelas - totalInformado) > 0.01) {
    mostrarAlertaBootstrap(`A soma dos valores das parcelas (${somaParcelas.toFixed(2)}) não é igual ao total informado (${totalInformado.toFixed(2)}).`);
    parcelasInputs[0].focus();
    return false;
  }

  return true;
}
</script>
