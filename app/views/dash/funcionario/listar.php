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
        <h2 class="title-listar">Funcionarios Cadastrados:</h2>
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
                    <?php foreach ($funcionarios as $funcionario): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($funcionario['nome_funcionario']); ?></td>
                            <td><?php echo htmlspecialchars($funcionario['email_funcionario']); ?></td>
                            <td><?php echo htmlspecialchars($funcionario['senha_funcionario']); ?></td>
                            <td><?php echo htmlspecialchars($funcionario['cpf_funcionario']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="btn-dash">
        <h2>Não Encontrou o Funcionario? Cadastre Abaixo</h2>
        <a href="http://localhost/venda/public/funcionarios/adicionar">
            <button class="btn btn-primary">Adicionar</button>
        </a>
    </div>
</div>
