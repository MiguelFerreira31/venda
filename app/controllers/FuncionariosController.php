<?php

class FuncionariosController extends Controller
{
    private $funcionarioModel;

    public function __construct()
    {
        // Inicia a sessão se não estiver iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Instancia o modelo no constructor (Injeção de Dependência)
        $this->funcionarioModel = new Funcionario();
    }

    // 1- Método para listar todos os funcionários
    public function listar()
    {
        $dados = [
            'funcionarios' => $this->funcionarioModel->getListarFuncionario(),
            'conteudo' => 'dash/funcionario/listar'
        ];

        $this->carregarViews('dash/dashboard', $dados);
    }

    // 2- Método para adicionar Funcionários
    public function adicionar()
    {
        $dados = [
            'conteudo' => 'dash/funcionario/adicionar',
            'mensagem' => null,
            'tipo-msg' => null
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Filtragem dos dados
            $dadosFuncionario = [
                'nome_funcionario' => filter_input(INPUT_POST, 'nome_funcionario', FILTER_SANITIZE_SPECIAL_CHARS),
                'email_funcionario' => filter_input(INPUT_POST, 'email_funcionario', FILTER_SANITIZE_EMAIL),
                'senha_funcionario' => filter_input(INPUT_POST, 'senha_funcionario', FILTER_SANITIZE_SPECIAL_CHARS),
                'cpf_funcionario' => filter_input(INPUT_POST, 'cpf_funcionario', FILTER_SANITIZE_SPECIAL_CHARS)
            ];

            // Validação dos campos obrigatórios
            if (in_array(false, $dadosFuncionario, true)) {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios";
                $dados['tipo-msg'] = "erro";
            } else {
                // Inserir Funcionário
                $id_funcionario = $this->funcionarioModel->addFuncionario($dadosFuncionario);

                if ($id_funcionario) {
                    $_SESSION['mensagem'] = "Funcionário Cadastrado com Sucesso";
                    $_SESSION['tipo-msg'] = "sucesso";
                    header('Location: http://localhost/venda/public/funcionarios/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao adicionar funcionário";
                    $dados['tipo-msg'] = "erro";
                }
            }
        }

        $this->carregarViews('dash/dashboard', $dados);
    }

  
}