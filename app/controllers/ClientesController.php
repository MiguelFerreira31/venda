<?php

class ClientesController extends Controller
{

    private $clienteModel;

    public function __construct()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Instaciar o modelo cliente
        $this->clienteModel = new Cliente();
    }


    // 1- Método para listar todos os 
    public function listar()
    {
        $dados = array();



        $clienteModel = new Cliente();
        $cliente = $clienteModel->getListarCliente();
        $dados['clientes'] = $cliente;

        $dados['conteudo'] = 'dash/cliente/listar';

        $this->carregarViews('dash/dashboard', $dados);
    }


    // 2- Método para adicionar Alunos
    public function adicionar()
    {


        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // TBL Cliente
            // TBL Cliente
            $email_cliente                  = filter_input(INPUT_POST, 'email_cliente', FILTER_SANITIZE_EMAIL);
            $nome_cliente                   = filter_input(INPUT_POST, 'nome_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $senha_cliente                  = filter_input(INPUT_POST, 'senha_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $cpf_cliente                  = filter_input(INPUT_POST, 'cpf_cliente', FILTER_SANITIZE_SPECIAL_CHARS);


            if ($nome_cliente && $email_cliente && $senha_cliente !== false) {

                // 3 Preparar Dados 

                $dadosCliente = array(
                    'nome_cliente'                => $nome_cliente,
                    'email_cliente'               => $email_cliente,
                    'senha_cliente'               => $senha_cliente,
                    'cpf_cliente'               => $cpf_cliente,

                );


                // 4 Inserir Cliente

                $id_cliente = $this->clienteModel->addCliente($dadosCliente);


                if ($id_cliente) {

                    // Mensagem de SUCESSO 
                    $_SESSION['mensagem'] = "Cliente Cadastrado com Sucesso";
                    $_SESSION['tipo-msg'] = "sucesso";
                    header('Location: http://localhost/venda/public/clientes/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao adicionar Ao adcionar cliente";
                    $dados['tipo-msg'] = "erro";
                }
            } else {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios";
                $dados['tipo-msg'] = "erro";
            }
        }



        $dados['conteudo'] = 'dash/cliente/adicionar';

        $this->carregarViews('dash/dashboard', $dados);
    }

    public function buscar()
    {
        ob_clean(); // limpa qualquer HTML anterior

        $query = $_GET['q'] ?? '';

        if (strlen($query) < 2) {
            header('Content-Type: application/json');
            echo json_encode([]);
            return;
        }

        $resultados = $this->clienteModel->buscarPorNome($query);

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

    $cliente = $this->clienteModel->buscarPorId($id);

    header('Content-Type: application/json');
    echo json_encode($cliente);
}

  // 1- Método para listar todos as compras
  
    public function ListarCompras()
    {
        $dados = array();



        $clienteModel = new Cliente();
        $cliente = $clienteModel->getListarCliente();
        $dados['clientes'] = $cliente;

        $dados['conteudo'] = 'dash/cliente/listar';

        $this->carregarViews('dash/dashboard', $dados);
    }



}
