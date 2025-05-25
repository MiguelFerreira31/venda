<?php

class ProdutoController extends Controller
{

    private $produtoModel;

    public function __construct()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Instaciar o modelo produto
        $this->produtoModel = new Produto();
    }


    // 1- Método para listar todos os 
    public function listar()
    {
        $dados = array();




        $produto = $this->produtoModel->getListarProduto();
        $dados['produtos'] = $produto;

        $dados['conteudo'] = 'dash/produto/listar';

        $this->carregarViews('dash/dashboard', $dados);
    }


    // 2- Método para adicionar Alunos
    public function adicionar()
    {


        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $descricao_produto                  = filter_input(INPUT_POST, 'descricao_produto', FILTER_SANITIZE_EMAIL);
            $nome_produto                   = filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $preco_produto                  = filter_input(INPUT_POST, 'preco_produto', FILTER_SANITIZE_SPECIAL_CHARS);


            if ($nome_produto && $descricao_produto && $preco_produto !== false) {

                // 3 Preparar Dados 

                $dadosProduto = array(
                    'nome_produto'                    => $nome_produto,
                    'descricao_produto'               => $descricao_produto,
                    'preco_produto'                   => $preco_produto,

                );


                // 4 Inserir Produto

                $id_produto = $this->produtoModel->addProduto($dadosProduto);


                if ($id_produto) {

                    // Mensagem de SUCESSO 
                    $_SESSION['mensagem'] = "Produto Cadastrado com Sucesso";
                    $_SESSION['tipo-msg'] = "sucesso";
                    header('Location: http://localhost/venda/public/produto/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao adicionar Ao adcionar produto";
                    $dados['tipo-msg'] = "erro";
                }
            } else {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios";
                $dados['tipo-msg'] = "erro";
            }
        }



        $dados['conteudo'] = 'dash/produto/adicionar';

        $this->carregarViews('dash/dashboard', $dados);
    }



  public function buscar()
    {
        $query = $_GET['q'] ?? '';

        if (strlen($query) < 2) {
            header('Content-Type: application/json');
            echo json_encode([]);
            return;
        }

        $resultados = $this->produtoModel->buscarPorNome($query);

        header('Content-Type: application/json');
        echo json_encode($resultados);
    }

    public function detalhes()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            http_response_code(400);
            echo json_encode(['erro' => 'ID inválido']);
            return;
        }

        $produto = $this->produtoModel->buscarPorId($id);

        header('Content-Type: application/json');
        echo json_encode($produto);
    }




    
}
