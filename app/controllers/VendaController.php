<?php
class VendaController extends Controller
{

    private $vendaModel;

    public function __construct()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Instaciar o modelo Venda
        $this->vendaModel = new Venda();
    }



    public function salvar()
    {
        header('Content-Type: application/json');



        try {
            $json = file_get_contents('php://input');
            $dados = json_decode($json, true);

            error_log('Dados recebidos: ' . print_r($dados, true));

            if (!$dados) {
                throw new Exception("Dados inválidos");
            }

            // Validações básicas
            if (empty($dados['id_cliente'])) {
                throw new Exception("Cliente não informado");
            }

            if (empty($dados['itens']) || !is_array($dados['itens'])) {
                throw new Exception("Nenhum item informado");
            }

            if (empty($dados['parcelas']) || !is_array($dados['parcelas'])) {
                throw new Exception("Nenhuma parcela informada");
            }

            if (!$this->vendaModel->clienteExiste($dados['id_cliente'])) {
                throw new Exception("Cliente não existe");
            }

            foreach ($dados['itens'] as $item) {
                if (
                    empty($item['id_produto']) ||
                    empty($item['quantidade']) ||
                    !is_numeric($item['preco_produto']) ||
                    !is_numeric($item['subtotal']) ||
                    !$this->vendaModel->produtoExiste($item['id_produto'])
                ) {
                    throw new Exception("Item inválido ou produto ID {$item['id_produto']} não existe");
                }
            }

            $this->vendaModel->iniciarTransacao();

            $idVenda = $this->vendaModel->criarVenda(
                $dados['id_cliente'],
                $dados['total_geral'],
                count($dados['parcelas'])
            );

            if (!$idVenda) {
                throw new Exception("Erro ao criar venda");
            }

            foreach ($dados['itens'] as $item) {
                $success = $this->vendaModel->adicionarItem(
                    $idVenda,
                    $item['id_produto'],
                    $item['quantidade'],
                    $item['preco_produto'],
                    $item['subtotal']
                );

                if (!$success) {
                    throw new Exception("Erro ao adicionar item ID {$item['id_produto']}");
                }
            }

            $numeroParcela = 1;
            foreach ($dados['parcelas'] as $parcela) {
                if (!is_numeric($parcela['valor']) || empty($parcela['vencimento'])) {
                    throw new Exception("Parcela inválida");
                }

                $success = $this->vendaModel->adicionarParcela(
                    $idVenda,
                    $parcela['valor'],
                    $parcela['vencimento'],
                    $numeroParcela
                );

                if (!$success) {
                    throw new Exception("Erro ao adicionar parcela #$numeroParcela");
                }

                $numeroParcela++;
            }

            $this->vendaModel->commitTransacao();

            echo json_encode([
                'success' => true,
                'id_venda' => $idVenda,
                'message' => 'Venda registrada com sucesso'
            ]);
        } catch (Exception $e) {
            if (method_exists($this->vendaModel, 'rollbackTransacao')) {
                $this->vendaModel->rollbackTransacao();
            }

            http_response_code(400);
            echo json_encode([
                'success' => false,
                'error' => $e->getMessage()
            ]);

            error_log('Erro ao salvar venda: ' . $e->getMessage());
        }
    }

    // 1- Método para listar todos os 
    public function listar()
    {
        $dados = array();



        $vendaModel = new Venda();
        $venda = $vendaModel->getListarVenda();
        $dados['vendas'] = $venda;

        $dados['conteudo'] = 'dash/venda/listar';

        $this->carregarViews('dash/dashboard', $dados);
    }



    public function desativar($id = null)
    {
        if ($id === null) {
            http_response_code(400);
            echo json_encode(['sucesso' => false, "mensagem" => "ID Invalido."]);
            exit;
        }

        $resultado = $this->vendaModel->excluirVenda($id);

        header('Content-Type: application/json');

        if ($resultado) {
            $_SESSION['mensagem'] = "Venda Excluida com Sucesso";

            $_SESSION['tipo-msg'] = "sucesso";

            echo json_encode(['sucesso' => true]);
        } else {
            $_SESSION['mensagem'] = "falha ao Excluir ";

            $_SESSION['tipo-msg'] = "erro";


            echo json_encode(['sucesso' => false, "mensagem" => 'falha ao Excluir Venda']);
        }
    }



    public function editar($id = null)
    {

        $dados = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Dados principais da venda
            $id_venda = $_POST['id_venda'];
            $id_cliente = $_POST['id_cliente'];
            $data_venda = $_POST['data_compra'];
            $total = $_POST['total'];

            // Atualiza os dados principais da venda
            $this->vendaModel->atualizarVenda($id_venda, $id_cliente, $total, $data_venda);

            // Itens da venda
            if (isset($_POST['itens']) && is_array($_POST['itens'])) {
                foreach ($_POST['itens'] as $item) {
                    $this->vendaModel->atualizarItem(
                        $item['id_item'],
                        $item['nome_produto'],
                        $item['descricao'],
                        $item['preco_unitario'],
                        $item['quantidade'],
                        $item['subtotal']
                    );
                }
            }

            // Parcelas da venda
            if (isset($_POST['parcelas']) && is_array($_POST['parcelas'])) {
                foreach ($_POST['parcelas'] as $parcela) {
                    $this->vendaModel->atualizarParcela(
                        $parcela['id_parcela'],
                        $parcela['numero_parcela'],
                        $parcela['valor'],
                        $parcela['data_vencimento'],
                        $parcela['pago']
                    );
                }
            }

            // Redireciona ou envia feedback
            header('Location: http://localhost/venda/public/venda/listar');
            exit;
        }

        // Carrega dados para o formulário de edição (modo GET)
        $venda =  $this->vendaModel->getVendaById($id);
        $dados['vendas'] = $venda;

        $parcelas =  $this->vendaModel->getParcelaById($id);
        $dados['parcelas'] = $parcelas;

        $itens =  $this->vendaModel->getItemById($id);
        $dados['itens'] = $itens;

        $dados['conteudo'] = 'dash/venda/editar';
        $this->carregarViews('dash/dashboard', $dados);
    }


    public function detalhe($id = null)
    {

        $dados = array();
        $venda =  $this->vendaModel->getVendaById($id);
        $dados['vendas'] = $venda;

        $parcelas =  $this->vendaModel->getParcelaById($id);
        $dados['parcelas'] = $parcelas;

        $itens =  $this->vendaModel->getItemById($id);
        $dados['itens'] = $itens;

        $dados['conteudo'] = 'dash/venda/detalhe';
        $this->carregarViews('dash/dashboard', $dados);
    }
    
}
