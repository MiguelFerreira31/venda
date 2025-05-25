<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="http://localhost/venda/public/assets/css/style.css">
<link rel="shortcut icon" href="http://localhost/venda/public/assets/img/logo_php.png" type="image/x-icon">

    <title>Login teste</title>
</head>

<body>

    <section id="home">

        <div class="login-container">

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide" style="background-image: url('http://localhost/venda/public/assets/img/bg1.jpg');">
                        <div class="overlay-gradient"></div>
                        <div class="slide-txt" data-swiper-parallax="-300">
                            <div class="title" data-swiper-parallax="-300">Gestão Inteligente</div>
                            <div class="subtitle" data-swiper-parallax="-200">Controle total em um só lugar</div>
                            <div class="text" data-swiper-parallax="-100">
                                <p>Tenha acesso a relatórios, estoque e vendas em tempo real com facilidade e segurança.</p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide"
                        style="background-image: url('http://localhost/venda/public/assets/img/bg2.jpg'); filter: brightness(0.8);">
                        <div class="overlay-gradient"></div>
                        <div class="slide-txt" data-swiper-parallax="-300">
                            <div class="title" data-swiper-parallax="-250">Vendas sem Complicação</div>
                            <div class="subtitle" data-swiper-parallax="-200">Processos ágeis e intuitivos</div>
                            <div class="text" data-swiper-parallax="-100">
                                <p>Realize suas vendas com poucos cliques e ofereça uma experiência moderna ao seu cliente.</p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide" style="background-image: url('http://localhost/venda/public/assets/img/bg3.jpg'); filter: sepia(0.3);">
                        <div class="overlay-gradient"></div>
                        <div class="slide-txt" data-swiper-parallax="-300">
                            <div class="title" data-swiper-parallax="-250">Tecnologia a seu favor</div>
                            <div class="subtitle" data-swiper-parallax="-200">Eficiência para o seu negócio</div>
                            <div class="text" data-swiper-parallax="-100">
                                <p>Simplifique sua rotina com automações e ferramentas que impulsionam suas vendas.</p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Paginação -->
                <div class="swiper-pagination"></div>
            </div>

            <div class="form-login">



                <!-- Formulário modernizado -->
                <form method="POST" action="http://localhost/venda/public/auth/login" class="glass-form mt-5">

                    <h4 class="text-center mb-4">Login</h4>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail" required>
                    </div>


                    <div class="mb-3 position-relative">
                        <label for="senha" class="form-label">Senha:</label>
                        <div class="input-group">
                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha" required>
                            <button class="btn btn-outline-secondary" type="button" id="toggleSenha" tabindex="-1">
                                <i class="fas fa-eye" id="iconeSenha"></i>
                            </button>
                        </div>
                    </div>

                    <script>
                        const senhaInput = document.getElementById('senha');
                        const toggleBtn = document.getElementById('toggleSenha');
                        const iconeSenha = document.getElementById('iconeSenha');

                        toggleBtn.addEventListener('click', () => {
                            const tipoAtual = senhaInput.getAttribute('type');
                            senhaInput.setAttribute('type', tipoAtual === 'password' ? 'text' : 'password');
                            iconeSenha.classList.toggle('fa-eye');
                            iconeSenha.classList.toggle('fa-eye-slash');
                        });
                    </script>



                    <?php if (isset($_GET['login-erro'])): ?>
                        <div class="alert alert-danger text-center">
                            <?php echo "Preencha todos os dados"; ?>
                        </div>
                    <?php endif; ?>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>

            </div>


        </div>
    </section>

    <!-- JQUERY  -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>


    <script src="http://localhost/venda/public/assets/js/script.js"></script>

</body>

</html>