<!DOCTYPE html>
<html lang="pt">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" href="http://localhost/venda/public/assets/img/logo_php.png" type="image/x-icon">

    <title>Login teste</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <link rel="stylesheet" href="http://localhost/venda/public/vendors/dash/css/adminlte.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/venda/public/assets/css/dash.css">

    <link rel="stylesheet" href="http://localhost/venda/public/assets/css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">

    <link rel="stylesheet" href="http://localhost/venda/public/assets/css/style.css">

</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <?php
    $totalClienteModel = new Cliente();
    $totalCliente = $totalClienteModel->getContarCliente();
    $dados['totalCliente'] = $totalCliente;

    $totalProdutoModel = new Produto();
    $totalProduto = $totalProdutoModel->getContarProduto();
    $dados['totalProduto'] = $totalProduto;

    $totalFuncionarioModel = new Funcionario();
    $totalFuncionario = $totalFuncionarioModel->getContarFuncionario();
    $dados['totalFuncionario'] = $totalFuncionario;

    $totalVendaModel = new Venda();
    $totalVenda = $totalVendaModel->getContarVenda();
    $dados['totalVenda'] = $totalVenda


    ?>

    <div class="app-wrapper">

        <!-- Cabecalho  -->
        <nav class="app-header navbar navbar-expand bg-body">

            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block"> <a href="<?php BASE_URL; ?>" class="nav-link">Site Vendas </a> </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <a href="http://localhost/venda/public/auth/sair" class="nav-link font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">Sair</span>
                    </a>


                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i>
                        </a>
                    </li>

                </ul>
            </div>

        </nav>

        <!-- MENU LATERAL -->
        <aside class="app-sidebar text-white shadow-lg vh-100 p-3" style="min-width: 250px;  background-image: url(http://localhost/venda/public/assets/img/bg1.jpg); ">
            <div class="sidebar-wrapper" style="background-color: #00000078; padding:0; margin:0;">
                <nav class="mt-2">
                    <ul class="nav flex-column" role="menu">

                        <!-- Dashboard Principal -->
                        <li class="nav-item mb-2">
                            <a href="http://localhost/venda/public/dashboard" class="nav-link text-white d-flex align-items-center gap-2">
                                <i class="bi bi-speedometer2 fs-5"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>


                        <li class="nav-item mb-2">
                            <a class="nav-link text-white d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#servicosMenu" role="button" aria-expanded="false">
                                <span><i class="bi bi-gear me-2"></i>Gestão de Vendas</span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse ps-3" id="servicosMenu">
                                <a href="http://localhost/venda/public/venda/listar" class="nav-link text-white-50 d-flex align-items-center gap-2">
                                    <i class="bi bi-tools"></i>
                                    <span>Vendas</span>
                                </a>
                            </div>
                            <div class="collapse ps-3" id="servicosMenu">
                                <a href="http://localhost/venda/public/produto/listar" class="nav-link text-white-50 d-flex align-items-center gap-2">
                                    <i class="bi bi-tools"></i>
                                    <span>Produtos</span>
                                </a>
                            </div>
                        </li>

                        <!-- Gestão de Clientes -->
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#clientesMenu" role="button" aria-expanded="false">
                                <span><i class="bi bi-people me-2"></i>Gestão de Clientes</span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse ps-3" id="clientesMenu">
                                <a href="http://localhost/venda/public/clientes/listar" class="nav-link text-white-50 d-flex align-items-center gap-2">
                                    <i class="bi bi-person"></i>
                                    <span>Clientes</span>
                                </a>
                            </div>
                        </li>

                        <!-- Gestão de Funcionários -->
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#rhMenu" role="button" aria-expanded="false">
                                <span><i class="bi bi-person-gear me-2"></i>Gestão de RH</span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse ps-3" id="rhMenu">
                                <a href="http://localhost/venda/public/funcionarios/listar" class="nav-link text-white-50 d-flex align-items-center gap-2">
                                    <i class="bi bi-person-workspace"></i>
                                    <span>Funcionários</span>
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>

        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard
                                </li>
                            </ol>

                        </div>
                    </div>
                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box text-bg-primary">
                                <div class="inner">
                                    <h3><?php echo $totalCliente['total_clientes']; ?></h3>
                                    <p>Clientes</p>
                                </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"></path>
                                </svg> <a href="http://localhost/venda/public/clientes/listar" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Ver Mais <i class="bi bi-link-45deg"></i> </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box text-bg-success">
                                <div class="inner">
                                    <h3><?php echo $totalProduto['total_produtos']; ?><sup class="fs-5"></sup></h3>
                                    <p>Produtos</p>
                                </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"></path>
                                </svg> <a href="http://localhost/venda/public/produto/listar" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Ver Mais <i class="bi bi-link-45deg"></i> </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box text-bg-warning">
                                <div class="inner">
                                    <h3><?php echo $totalFuncionario['total_funcionarios']; ?></h3>
                                    <p>Funcionarios</p>
                                </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                                </svg> <a href="http://localhost/venda/public/funcionarios/listar" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Ver Mais <i class="bi bi-link-45deg"></i> </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box text-bg-danger">
                                <div class="inner">
                                    <h3><?php echo $totalVenda['total_vendas']; ?></h3>
                                    <p>Vendas</p>
                                </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"></path>
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"></path>
                                </svg> <a href="http://localhost/venda/public/venda/listar" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Ver Mais <i class="bi bi-link-45deg"></i> </a>
                            </div>
                        </div>

                    </div>

                    <div class="container my-5">

                        <h2>Venda do produto</h2>
                        <form id="formVenda">

                            <!-- Cliente -->
                            <div class="card shadow-sm mb-4">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Buscar Cliente</h5>
                                </div>
                                <div class="card-body">
                                    <div class="position-relative mb-3">
                                        <input type="text" class="form-control" id="cliente_autocomplete" placeholder="Digite o nome do cliente" autocomplete="off">
                                        <input type="hidden" name="id_cliente" id="id_cliente">
                                        <div id="sugestoes-clientes" class="list-group position-absolute w-100" style="z-index: 1000; display: none; max-height: 200px; overflow-y: auto;"></div>
                                    </div>
                                    <div id="cliente-detalhes" class="p-3 border rounded bg-light" style="display: none;"></div>
                                </div>
                            </div>

                            <!-- Produto -->
                            <div class="card shadow-sm mb-4">
                                <div class="card-header bg-success text-white">
                                    <h5 class="mb-0">Buscar Produto</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 position-relative mb-3">
                                            <input type="text" class="form-control" id="produto_autocomplete" placeholder="Digite o nome do produto" autocomplete="off">
                                            <input type="hidden" name="id_produto" id="id_produto">
                                            <div id="sugestoes-produtos" class="list-group position-absolute w-100" style="z-index: 1000; display: none; max-height: 200px; overflow-y: auto;"></div>
                                        </div>
                                    </div>

                                    <div id="produto-detalhes" style="display: none;">
                                        <h6 class="mb-3">Detalhes do Produto</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="nome_produto" class="form-label">Nome</label>
                                                <input type="text" class="form-control" id="nome_produto" readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="preco_produto" class="form-label">Preço (R$)</label>
                                                <input type="text" class="form-control" id="preco_produto">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="descricao_produto" class="form-label">Descrição</label>
                                                <textarea class="form-control" id="descricao_produto" rows="2" readonly></textarea>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="quantidade_produto" class="form-label">Quantidade</label>
                                                <input type="number" min="1" value="1" class="form-control" id="quantidade_produto">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="subtotal_produto" class="form-label">Subtotal (R$)</label>
                                                <input type="text" class="form-control" id="subtotal_produto" readonly>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success mt-2" id="adicionar_item">Adicionar Item</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Itens Adicionados -->
                            <div class="card shadow-sm mb-4">
                                <div class="card-header bg-dark text-white">
                                    <h5 class="mb-0">Itens da Venda</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered align-middle" id="tabela_itens">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Produto</th>
                                                    <th>Descrição</th>
                                                    <th>Preço (R$)</th>
                                                    <th>Quantidade</th>
                                                    <th>Subtotal (R$)</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                    <div class="text-end mt-3">
                                        <h4>Total: R$ <span id="total_geral" class="text-success fw-bold">0.00</span></h4>
                                    </div>
                                </div>
                            </div>

                            <!-- Parcelamento -->
                            <div class="card shadow-sm mb-4">
                                <div class="card-header bg-warning">
                                    <h5 class="mb-0">Pagamento Parcelado</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="num_parcelas" class="form-label">Nº de Parcelas</label>
                                            <input type="number" id="num_parcelas" class="form-control" min="1" value="1">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="dias_intervalo" class="form-label">Intervalo (dias)</label>
                                            <input type="number" id="dias_intervalo" class="form-control" min="1" max="31" value="30">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="data_primeira" class="form-label">Data da 1ª Parcela</label>
                                            <input type="date" id="data_primeira" class="form-control">
                                        </div>
                                    </div>
                                    <div class="text-end mt-3">
                                        <button type="button" class="btn btn-outline-primary" id="calcular_parcelas">Calcular Parcelas</button>
                                    </div>
                                    <div id="parcelas_container" class="row g-2 mt-3"></div>
                                </div>
                            </div>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    // Client autocomplete
                                    $('#cliente_autocomplete').on('input', function() {
                                        let nome = $(this).val();
                                        if (nome.length >= 2) {
                                            $.ajax({
                                                url: 'http://localhost/venda/public/clientes/buscar',
                                                method: 'GET',
                                                data: {
                                                    q: nome
                                                },
                                                success: function(clientes) {
                                                    let lista = '';
                                                    clientes.forEach(cliente => {
                                                        lista += `<a href="#" class="list-group-item list-group-item-action sugestao-cliente" data-id="${cliente.id_cliente}">${cliente.nome_cliente}</a>`;
                                                    });
                                                    $('#sugestoes-clientes').html(lista).show();
                                                }
                                            });
                                        } else {
                                            $('#sugestoes-clientes').hide();
                                        }
                                    });

                                    $(document).on('click', '.sugestao-cliente', function(e) {
                                        e.preventDefault();
                                        let nome = $(this).text();
                                        let id = $(this).data('id');

                                        $('#cliente_autocomplete').val(nome);
                                        $('#id_cliente').val(id);
                                        $('#sugestoes-clientes').hide();

                                        // Load client details
                                        $.ajax({
                                            url: 'http://localhost/venda/public/clientes/detalhes',
                                            method: 'GET',
                                            data: {
                                                id: id
                                            },
                                            success: function(cliente) {
                                                let html = `
                                                    <h5>Detalhes do Cliente</h5>
                                                    <p><strong>Nome:</strong> ${cliente.nome_cliente}</p>
                                                    <p><strong>Email:</strong> ${cliente.email_cliente}</p>
                                                    <p><strong>CPF:</strong> ${cliente.cpf_cliente}</p>`;
                                                $('#cliente-detalhes').html(html).show();
                                            }
                                        });
                                    });

                                    // Product autocomplete
                                    $('#produto_autocomplete').on('input', function() {
                                        let nome = $(this).val();
                                        if (nome.length >= 2) {
                                            $.ajax({
                                                url: 'http://localhost/venda/public/produto/buscar',
                                                method: 'GET',
                                                data: {
                                                    q: nome
                                                },
                                                success: function(produtos) {
                                                    let lista = '';
                                                    produtos.forEach(produto => {
                                                        lista += `<a href="#" class="list-group-item list-group-item-action sugestao-produto" data-id="${produto.id_produto}">${produto.nome_produto}</a>`;
                                                    });
                                                    $('#sugestoes-produtos').html(lista).show();
                                                }
                                            });
                                        } else {
                                            $('#sugestoes-produtos').hide();
                                        }
                                    });

                                    $(document).on('click', '.sugestao-produto', function(e) {
                                        e.preventDefault();
                                        let nome = $(this).text();
                                        let id = $(this).data('id');

                                        $('#produto_autocomplete').val(nome);
                                        $('#id_produto').val(id);
                                        $('#sugestoes-produtos').hide();

                                        $.ajax({
                                            url: 'http://localhost/venda/public/produto/detalhes',
                                            method: 'GET',
                                            data: {
                                                id: id
                                            },
                                            success: function(produto) {
                                                $('#nome_produto').val(produto.nome_produto);
                                                $('#descricao_produto').val(produto.descricao_produto);
                                                $('#preco_produto').val(produto.preco_produto);
                                                $('#quantidade_produto').val(1);
                                                $('#subtotal_produto').val(produto.preco_produto);
                                                $('#produto-detalhes').show();
                                            }
                                        });
                                    });

                                    // Quantity calculation
                                    $('#quantidade_produto').on('input', function() {
                                        let quantidade = parseInt($(this).val());
                                        if (isNaN(quantidade) || quantidade < 1) {
                                            quantidade = 0;
                                            $(this).val(quantidade);
                                        }

                                        let preco = parseFloat($('#preco_produto').val());
                                        if (isNaN(preco)) preco = 0;

                                        let subtotal = preco * quantidade;
                                        $('#subtotal_produto').val(subtotal.toFixed(2));
                                    });

                                    // Hide suggestions when clicking outside
                                    $(document).click(function(e) {
                                        if (!$(e.target).closest('#cliente_autocomplete, #sugestoes-clientes').length) {
                                            $('#sugestoes-clientes').hide();
                                        }
                                        if (!$(e.target).closest('#produto_autocomplete, #sugestoes-produtos').length) {
                                            $('#sugestoes-produtos').hide();
                                        }
                                    });

                                    // Add item to table
                                    $('#adicionar_item').click(function() {
                                        const id = $('#id_produto').val();
                                        const nome = $('#nome_produto').val();
                                        const descricao = $('#descricao_produto').val();
                                        const preco = parseFloat($('#preco_produto').val()).toFixed(2);
                                        const quantidade = parseInt($('#quantidade_produto').val());
                                        const subtotal = parseFloat($('#subtotal_produto').val()).toFixed(2);

                                        if (!id || quantidade < 1) {
                                            alert('Selecione um produto e defina a quantidade!');
                                            return;
                                        }

                                        const linha = `<tr data-id="${id}">
                                                            <td>${nome}</td>
                                                            <td>${descricao}</td>
                                                            <td>${preco}</td>
                                                            <td>${quantidade}</td>
                                                            <td>${subtotal}</td>
                                                            <td><button type="button" class="btn btn-danger btn-sm remover_item">Remover</button></td>
                                                                </tr>`;

                                        $('#tabela_itens tbody').append(linha);
                                        calcularTotal();

                                        // Clear product fields
                                        $('#produto_autocomplete').val('');
                                        $('#id_produto').val('');
                                        $('#nome_produto').val('');
                                        $('#descricao_produto').val('');
                                        $('#preco_produto').val('');
                                        $('#quantidade_produto').val(1);
                                        $('#subtotal_produto').val('');
                                        $('#produto-detalhes').hide();
                                    });

                                    // Remove item from table
                                    $(document).on('click', '.remover_item', function() {
                                        $(this).closest('tr').remove();
                                        calcularTotal();
                                    });

                                    // Calculate installments
                                    $('#calcular_parcelas').click(function() {
                                        if ($('#tabela_itens tbody tr').length === 0) {
                                            alert("Adicione ao menos um item antes de calcular parcelas.");
                                            return;
                                        }

                                        const total = parseFloat($('#total_geral').text());
                                        const numParcelas = parseInt($('#num_parcelas').val());
                                        const diasEntre = parseInt($('#dias_intervalo').val());
                                        const dataPrimeira = $('#data_primeira').val();

                                        if (isNaN(total) || total <= 0) {
                                            alert("O total deve ser maior que 0.");
                                            return;
                                        }

                                        if (isNaN(numParcelas) || numParcelas < 1) {
                                            alert("Número de parcelas inválido.");
                                            return;
                                        }

                                        if (!dataPrimeira) {
                                            alert("Informe a data da 1ª parcela.");
                                            return;
                                        }

                                        if (isNaN(diasEntre) || diasEntre < 1 || diasEntre > 31) {
                                            alert("Informe um intervalo de até 31 dias entre as parcelas.");
                                            return;
                                        }

                                        const parcelas = [];
                                        const valorParcelaBase = Math.floor((total / numParcelas) * 100) / 100;
                                        let soma = 0;

                                        for (let i = 0; i < numParcelas; i++) {
                                            parcelas[i] = valorParcelaBase;
                                            soma += valorParcelaBase;
                                        }

                                        parcelas[parcelas.length - 1] += total - soma;

                                        const html = ['<div class="row">'];
                                        const dataBase = new Date(dataPrimeira);

                                        parcelas.forEach((valor, i) => {
                                            const dataParcela = new Date(dataBase);
                                            dataParcela.setDate(dataBase.getDate() + (i * diasEntre));

                                            const ano = dataParcela.getFullYear();
                                            const mes = String(dataParcela.getMonth() + 1).padStart(2, '0');
                                            const dia = String(dataParcela.getDate()).padStart(2, '0');
                                            const dataFormatadaInput = `${ano}-${mes}-${dia}`;

                                            html.push(`
                                                       <div class="col-md-6 mb-2">
                                                           <label>Valor da Parcela ${i + 1}</label>
                                                           <input type="number" class="form-control parcela-input" step="0.01" min="0" value="${valor.toFixed(2)}" data-index="${i}">
                                                       </div>
                                                       <div class="col-md-6 mb-2">
                                                           <label>Data da Parcela ${i + 1}</label>
                                                           <input type="date" class="form-control parcela-data" value="${dataFormatadaInput}" id="parcela_data_${i}">
                                                       </div>
                                                   `);
                                        });

                                        html.push('</div>');
                                        html.push(`<div class="mt-2"><strong>Total das Parcelas: R$ <span id="total_parcelas">${total.toFixed(2)}</span></strong></div>`);
                                        html.push(`<div class="text-danger mt-2" id="aviso_total_errado" style="display:none;">A soma das parcelas não corresponde ao total da compra!</div>`);

                                        $('#parcelas_container').html(html.join(''));

                                        $(document).off('input', '.parcela-input').on('input', '.parcela-input', function() {
                                            let somaAtual = 0;
                                            $('.parcela-input').each(function() {
                                                const val = parseFloat($(this).val());
                                                if (!isNaN(val)) somaAtual += val;
                                            });

                                            $('#total_parcelas').text(somaAtual.toFixed(2));

                                            if (Math.abs(somaAtual - total) > 0.01) {
                                                $('#aviso_total_errado').show();
                                            } else {
                                                $('#aviso_total_errado').hide();
                                            }
                                        });
                                    });



                                    function calcularTotal() {
                                        let total = 0;
                                        $('#tabela_itens tbody tr').each(function() {
                                            const subtotal = parseFloat($(this).find('td:eq(4)').text());
                                            if (!isNaN(subtotal)) {
                                                total += subtotal;
                                            }
                                        });
                                        $('#total_geral').text(total.toFixed(2));
                                    }

                                    // Enviar dados da venda
                                    $('#formVenda').on('submit', function(e) {
                                        e.preventDefault();

                                        const venda = coletarDadosVenda();

                                        if (!venda.id_cliente || venda.itens.length === 0) {
                                            alert('Selecione um cliente e adicione pelo menos um item.');
                                            return;
                                        }

                                        $.ajax({
                                            url: 'http://localhost/venda/public/venda/salvar',
                                            method: 'POST',
                                            contentType: 'application/json',
                                            data: JSON.stringify(venda),
                                            success: function(response) {
                                                try {

                                                    if (typeof response === 'string') {
                                                        response = JSON.parse(response);
                                                    }

                                                    if (response.success) {
                                                        window.location.href = 'http://localhost/venda/public/venda/listar';
                                                    } else {
                                                        alert('Erro: ' + (response.error || 'Erro desconhecido'));
                                                    }
                                                } catch (err) {
                                                    alert('Erro ao interpretar a resposta do servidor.');
                                                    console.error(err);
                                                }
                                            },
                                            error: function(xhr, status, error) {
                                                alert('Erro na requisição: ' + error);
                                                console.error(xhr.responseText);
                                            }
                                        });

                                    });


                                    function coletarDadosVenda() {
                                        const idCliente = $('#id_cliente').val();
                                        const totalGeral = parseFloat($('#total_geral').text().replace(',', '.'));


                                        const itens = [];
                                        $('#tabela_itens tbody tr').each(function() {
                                            const id_produto = $(this).data('id');
                                            const nome = $(this).find('td:eq(0)').text();
                                            const descricao = $(this).find('td:eq(1)').text();
                                            const preco_produto = parseFloat($(this).find('td:eq(2)').text());
                                            const quantidade = parseInt($(this).find('td:eq(3)').text());
                                            const subtotal = parseFloat($(this).find('td:eq(4)').text());

                                            itens.push({
                                                id_produto,
                                                nome,
                                                descricao,
                                                preco_produto,
                                                quantidade,
                                                subtotal
                                            });
                                        });

                                        const parcelas = [];
                                        $('#parcelas_container .parcela-input').each(function(index) {
                                            const valor = parseFloat($(this).val());
                                            const vencimento = $('#parcelas_container .parcela-data').eq(index).val();
                                            parcelas.push({
                                                valor,
                                                vencimento
                                            });
                                        });

                                        return {
                                            id_cliente: parseInt(idCliente),
                                            total_geral: totalGeral,
                                            itens: itens,
                                            parcelas: parcelas
                                        };
                                    }

                                });
                            </script>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary btn-lg px-4">Salvar Venda</button>
                            </div>
                        </form>

                    </div>



                    <div class="row position-relative" id="dashboard-content-wrapper">

                        <style>
                            #dashboard-preloader {
                                background-color: rgb(248, 249, 250);
                                z-index: 9999;
                                width: 100%;
                                height: 100%;
                            }
                        </style>
                        <!-- Preloader -->
                        <div id="dashboard-preloader" class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center  z-3">
                            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                                <span class="visually-hidden">Carregando...</span>
                            </div>
                        </div>

                        <!-- Conteúdo Dinâmico -->
                        <div id="dashboard-content" class="w-100">
                            <?php
                            if (isset($conteudo)) {
                                $this->carregarViews($conteudo, $dados);
                            } else {
                                echo '<h2>Bem-vindo ' . $func['nome_funcionario'] . '!</h2>';
                            }
                            ?>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const preloader = document.getElementById('dashboard-preloader');
                                if (preloader) {
                                    setTimeout(() => {
                                        preloader.style.opacity = '0';
                                        preloader.style.transition = 'opacity 0.3s ease-in-out';
                                        setTimeout(() => preloader.remove(), 300);
                                    }, 500);
                                }
                            });
                        </script>



                    </div>

                </div>
            </div>

        </main>

        <!-- RODAPÉ MODERNO -->
        <footer class="app-footer bg-dark text-white py-5 shadow-lg">
            <div class="container">
                <div class="row gy-4">
                    <!-- Informações do Sistema -->
                    <div class="col-md-4">
                        <h5 class="fw-bold text-uppercase text-white">Dashboard de Vendas</h5>
                        <p class="small  text-white">Gerencie, acompanhe e analise as métricas de vendas em tempo real. Ferramentas avançadas para decisões inteligentes.</p>
                    </div>

                    <!-- Links Rápidos -->
                    <div class="col-md-4">
                        <h5 class="fw-bold text-uppercase">Navegação</h5>
                        <ul class="list-unstyled small">
                            <li><a href="/" class="text-white text-decoration-none d-block py-1"><i class="fas fa-home me-2"></i>Início</a></li>
                            <li><a href="/relatorios" class="text-white text-decoration-none d-block py-1"><i class="fas fa-chart-line me-2"></i>Relatórios</a></li>
                            <li><a href="/usuarios" class="text-white text-decoration-none d-block py-1"><i class="fas fa-users me-2"></i>Usuários</a></li>
                            <li><a href="/configuracoes" class="text-white text-decoration-none d-block py-1"><i class="fas fa-cog me-2"></i>Configurações</a></li>
                        </ul>
                    </div>

                    <!-- Contato e Suporte -->
                    <div class="col-md-4">
                        <h5 class="fw-bold text-uppercase">Suporte</h5>
                        <p class="small mb-1"><i class="fas fa-envelope me-2"></i> suporte@dashboardvendas.com</p>
                        <p class="small mb-1"><i class="fas fa-phone me-2"></i> (11) 4002-8922</p>
                        <p class="small mb-0"><i class="fas fa-clock me-2"></i> Atendimento: Seg-Sex 9h às 18h</p>
                    </div>
                </div>

                <hr class="border-secondary my-4">

                <div class="row align-items-center">
                    <div class="col-md-6 small text-muted">
                        &copy; 2024 Dashboard Vendas. Todos os direitos reservados.
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="#" class="text-white text-decoration-none me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white text-decoration-none me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white text-decoration-none"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </footer>


    </div>




    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <script src="http://localhost/venda/public/vendors/dash/js/adminlte.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://localhost/venda/public/assets/js/script.js"></script>





</body>


</html>