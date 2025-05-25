<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])) {
    $mensagem = $_SESSION['mensagem'];
    $tipo = $_SESSION['tipo-msg'];

    if ($tipo == 'sucesso') {
        echo '<div class="alert alert-success text-center fw-bold" role="alert">'
            . $mensagem .
            '</div>';
    } elseif ($tipo == 'erro') {
        echo '<div class="alert alert-danger text-center fw-bold" role="alert">'
            . $mensagem .
            '</div>';
    }

    unset($_SESSION['mensagem']);
    unset($_SESSION['tipo-msg']);
}
?>



<div class="container">
    <div class="glass-container text-center">
        <h2 class="title-listar">Clientes Cadastrados:</h2>
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Senha</th>
                        <th scope="col">CPF</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $linha): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($linha['nome_cliente']); ?></td>
                            <td><?php echo htmlspecialchars($linha['email_cliente']); ?></td>
                            <td><?php echo htmlspecialchars($linha['senha_cliente']); ?></td>
                            <td><?php echo htmlspecialchars($linha['cpf_cliente']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="btn-dash">
        <h2>Não Encontrou o Cliente? Cadastre Abaixo</h2>
        <a href="http://localhost/venda/public/clientes/adicionar">
            <button class="btn btn-primary">Adicionar</button>
        </a>
    </div>
</div>
