<div class="container mt-4">

  <h3>Detalhes da Compra</h3>

  <!-- Compra e Cliente -->
  <div class="row mb-3">
    <div class="col-md-6">
      <label>Nome do Cliente</label>
      <input type="text" name="nome_cliente" class="form-control" value="<?= htmlspecialchars($vendas[0]['nome_cliente']) ?>" readonly>
    </div>
    <div class="col-md-3">
      <label>Data da Compra</label>
      <input type="datetime-local" name="data_compra" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($vendas[0]['data_compra'])) ?>" readonly>
    </div>
    <div class="col-md-3">
      <label>Total</label>
      <input type="number" step="0.01" name="total" id="input-total" class="form-control" value="<?= $vendas[0]['total'] ?>" data-total-original="<?= $vendas[0]['total'] ?>" readonly>
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
                  <input type="text" name="itens[<?= $index ?>][nome_produto]" class="form-control" value="<?= htmlspecialchars($item['nome_produto']) ?>" readonly>
                </td>
                <td>
                  <input type="text" name="itens[<?= $index ?>][descricao]" class="form-control" value="<?= htmlspecialchars($item['descricao']) ?>" readonly>
                </td>
                <td>
                  <input type="number" step="0.01" name="itens[<?= $index ?>][preco_unitario]" class="form-control" value="<?= $item['preco_unitario'] ?>" readonly>
                </td>
                <td>
                  <input type="number" name="itens[<?= $index ?>][quantidade]" class="form-control" value="<?= $item['quantidade'] ?>" readonly>
                </td>
                <td>
                  <input type="number" step="0.01" name="itens[<?= $index ?>][subtotal]" class="form-control" value="<?= $item['subtotal'] ?>" readonly>
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
                  <input type="number" name="parcelas[<?= $index ?>][numero_parcela]" class="form-control" value="<?= $parcela['numero_parcela'] ?>" readonly>
                </td>
                <td>
                  <input type="number" step="0.01" name="parcelas[<?= $index ?>][valor]" class="form-control" value="<?= $parcela['valor'] ?>" readonly>
                </td>
                <td>
                  <input type="date" name="parcelas[<?= $index ?>][data_vencimento]" class="form-control" value="<?= date('Y-m-d', strtotime($parcela['data_vencimento'])) ?>" readonly>
                </td>
                <td>
                  <select name="parcelas[<?= $index ?>][pago]" class="form-select" disabled>
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

</div>
