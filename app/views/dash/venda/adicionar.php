<form method="POST" action="http://localhost/venda/public/produto/adicionar" enctype="multipart/form-data">
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow glass-container">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0">📦 Cadastro de Produto</h5>
          </div>
          <div class="card-body">
            <!-- Nome -->
            <div class="mb-3">
              <label for="nome_produto" class="form-label">Nome do Produto</label>
              <input type="text" class="form-control" id="nome_produto" name="nome_produto" placeholder="Digite o nome do produto" required>
            </div>

     
            <div class="mb-3">
              <label for="descricao_produto" class="form-label">Descrição do Produto</label>
              <textarea class="form-control" id="descricao_produto" name="descricao_produto" rows="4" placeholder="Digite a descrição do produto" required></textarea>
            </div>

            
            <div class="mb-3">
              <label for="preco_produto" class="form-label">Preço (R$)</label>
              <input type="text" class="form-control" id="preco_produto" name="preco_produto" placeholder="Ex: 49.90" required>
            </div>

         
            <div class="d-flex justify-content-between">
              <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle me-1"></i> Cadastrar Produto
              </button>
              <a href="http://localhost/venda/public/produto" class="btn btn-secondary">
                <i class="bi bi-x-circle me-1"></i> Cancelar
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>