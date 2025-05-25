<?php

class HomeController extends Controller
{


    public function index()
    {

        $dados = array();

        $dados['mensagem'] = 'Bem-vindo a vendas';

      

        $this->carregarViews('home', $dados);
    }
}
