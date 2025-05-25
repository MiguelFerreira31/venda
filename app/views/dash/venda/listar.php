<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])) {
    $mensagem = $_SESSION['mensagem'];
    $tipo = $_SESSION['tipo-msg'];

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
        <h2 class="title-listar">Vendas Cadastradas:</h2>
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Parcelas</th>
                        <th scope="col">Detalhes</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vendas as $venda): ?>
                        <tr>
                            <td class="fw-semibold text-capitalize">
                                <?= htmlspecialchars($venda['nome_cliente']) ?>
                            </td>
                            <td class="text-muted">
                                <?= nl2br(htmlspecialchars($venda['data_compra'])) ?>
                            </td>
                            <td class="text-center text-success fw-bold">
                                R$ <?= number_format($venda['total'], 2, ',', '.') ?>
                            </td>
                            <td class="text-center fw-bold">
                                <?= $venda['num_parcelas'] ?>
                            </td>
                            <td>
                                <a href="http://localhost/venda/public/venda/detalhe/<?= $venda['id_compra'] ?>">
                                    <button class="btn btn-primary">Ver</button>
                                </a>
                            </td>
                            <td>
                                <a href="http://localhost/venda/public/venda/editar/<?= $venda['id_compra'] ?>" title="Editar">
                                    <i class="fa fa-pencil-alt" style="font-size: 20px; color:rgb(22, 22, 22);"></i>
                                </a>
                            </td>
                            <td>
                                <a href="#" title="Desativar" onclick="abrirModalDesativar(<?= $venda['id_compra'] ?>)">
                                    <i class="fa fa-ban" style="font-size: 20px; color: #ff4d4d;"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    
</div>

<!-- MODAL DESATIVAR VENDA -->
<div class="modal fade" tabindex="-1" id="modalDesativar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Desativar Venda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja desativar esta venda?</p>
                <input type="hidden" id="idCompraDesativar" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnConfirmar">Desativar</button>
            </div>
        </div>
    </div>
</div>




<script>
    function abrirModalDesativar(idCompra) {
        // Define o valor no campo oculto
        document.getElementById('idCompraDesativar').value = idCompra;
        console.log("ID definido para desativar:", idCompra);

        // Abrir modal com Bootstrap 5
        const modal = new bootstrap.Modal(document.getElementById('modalDesativar'));
        modal.show();
    }

    document.getElementById('btnConfirmar').addEventListener('click', function () {
        const idCompra = document.getElementById('idCompraDesativar').value;
        console.log("Confirmado ID:", idCompra);

        if (idCompra) {
            desativarVenda(idCompra);
        }
    });

    function desativarVenda(idCompra) {
        fetch(`http://localhost/venda/public/venda/desativar/${idCompra}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error(`Erro HTTP: ${response.status}`);
            return response.json();
        })
        .then(data => {
            if (data.sucesso) {
                console.log('Venda desativada com sucesso!');
                const modalElement = bootstrap.Modal.getInstance(document.getElementById('modalDesativar'));
                modalElement.hide();
                setTimeout(() => location.reload(), 500);
            } else {
                alert(data.mensagem || "Erro ao desativar venda");
            }
        })
        .catch(erro => {
            console.error("Erro:", erro);
            alert('Erro na requisição');
        });
    }
</script>
