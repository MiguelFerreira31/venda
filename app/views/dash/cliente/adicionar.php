<style>
  .glass-form {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    margin-top: 2rem;
  }

  .glass-form label {
    font-weight: 500;
    color: #333;
  }

  .glass-form input {
    border-radius: 12px;
    border: 1px solid #ced4da;
    padding: 0.5rem 1rem;
  }

  .glass-form input:focus {
    border-color: #86b7fe;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
  }

  .btn-success,
  .btn-secondary {
    padding: 0.6rem 1.5rem;
    font-size: 1rem;
    border-radius: 12px;
  }

  .btn-success {
    box-shadow: 0 4px 12px rgba(25, 135, 84, 0.4);
  }

  .btn-secondary {
    box-shadow: 0 4px 12px rgba(108, 117, 125, 0.4);
  }
</style>

<form method="POST" id="form-cliente" action="http://localhost/venda/public/clientes/adicionar" enctype="multipart/form-data">
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-10 glass-form">
        <h2 class="mb-4 text-center fw-bold">Cadastro de Cliente</h2>
        <div class="row">
          <!-- Nome -->
          <div class="col-md-6 mb-3">
            <label for="nome_cliente" class="form-label">Nome do cliente:</label>
            <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" placeholder="Digite o nome do cliente" required>
          </div>

          <!-- Email -->
          <div class="col-md-6 mb-3">
            <label for="email_cliente" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email_cliente" name="email_cliente" placeholder="exemplo@email.com" required>
          </div>

          <!-- Senha -->
          <div class="col-md-6 mb-3">
            <label for="senha_cliente" class="form-label">Senha:</label>
            <div class="input-group">
              <input type="password" class="form-control" id="senha_cliente" name="senha_cliente" required>
              <button class="btn btn-outline-secondary" type="button" id="toggleSenha">
                <i class="bi bi-eye" id="iconeSenha"></i>
              </button>
            </div>
          </div>

          <script>
            document.getElementById('toggleSenha').addEventListener('click', function() {
              const senhaInput = document.getElementById('senha_cliente');
              const icone = document.getElementById('iconeSenha');

              if (senhaInput.type === 'password') {
                senhaInput.type = 'text';
                icone.classList.remove('bi-eye');
                icone.classList.add('bi-eye-slash');
              } else {
                senhaInput.type = 'password';
                icone.classList.remove('bi-eye-slash');
                icone.classList.add('bi-eye');
              }
            });
          </script>

          <!-- CPF -->
          <div class="col-md-6 mb-3">
            <label for="cpf_cliente" class="form-label">CPF:</label>
            <input type="text" class="form-control" id="cpf_cliente" name="cpf_cliente" required>
          </div>
        </div>

        <!-- Botões -->
        <div class="mt-4 d-flex justify-content-between">
          <button type="submit" class="btn btn-success">Salvar</button>
          <button type="button" class="btn btn-secondary" id="btn-cancelar">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</form>