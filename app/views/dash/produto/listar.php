<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])) {
    $mensagem = $_SESSION['mensagem'];
    $tipo = $_SESSION['tipo-msg'];

    // Exibir alerta estilizado
    $alertClass = $tipo === 'sucesso' ? 'alert-success' : 'alert-danger';
    echo '
    <div class="container mt-4">
        <div class="alert ' . $alertClass . ' alert-dismissible fade show" role="alert">
            ' . $mensagem . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>';

    unset($_SESSION['mensagem']);
    unset($_SESSION['tipo-msg']);
}
?>

<div class="container">
    <div class="glass-container text-center">
        <h2 class="title-listar">Produtos Cadastrados:</h2>
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Preço</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td class="fw-semibold text-capitalize">
                                <?php echo htmlspecialchars($produto['nome_produto']); ?>
                            </td>

                            <td class="text-muted">
                                <?php echo nl2br(htmlspecialchars($produto['descricao_produto'])); ?>
                            </td>

                            <td class="text-end text-success fw-bold">
                                R$ <?php echo number_format($produto['preco_produto'], 2, ',', '.'); ?>
                            </td>


                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="btn-dash">
        <h2>Não Encontrou o Produto? Cadastre Abaixo</h2>
        <a href="http://localhost/venda/public/produto/adicionar">
            <button class="btn btn-primary">Adicionar</button>
        </a>
    </div>
</div>