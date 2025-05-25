<!DOCTYPE html>
<html lang="pt">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>venda - Excelência em Serviços | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">

    <link rel="shortcut icon" href="http://localhost/venda/public/assets/img/logo_php.png" type="image/x-icon">

    <title>Login teste</title>

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
                                <span><i class="bi bi-gear me-2"></i>Minhas Vendas</span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse ps-3" id="servicosMenu">
                                <a href="http://localhost/venda/public/venda/listar" class="nav-link text-white-50 d-flex align-items-center gap-2">
                                    <i class="bi bi-tools"></i>
                                    <span>Ver mais</span>
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
                                echo '<h2>Bem-vindo ' . $cliente['nome_cliente'] . '!</h2>';
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