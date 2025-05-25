
# Sistema de Vendas MVC em PHP

Este projeto é um sistema de vendas construído utilizando um **framework próprio** inspirado no Laravel, com uma arquitetura **MVC (Model-View-Controller)** desenvolvida em PHP. 

## Tecnologias Utilizadas

- **PHP** (estrutura MVC customizada)
- **jQuery** (para manipulação dinâmica do DOM e requisições AJAX)
- **Bootstrap** (framework CSS para responsividade e componentes prontos)
- **CSS3** (para estilização customizada)
- **Swiper** (para carrosséis e sliders responsivos)

## Estrutura do Projeto

```
venda/
│
├── public/                 # Arquivos públicos acessíveis via web
│   ├── assets/             # Arquivos estáticos como CSS, JS e imagens
│   ├── uploads/            # Uploads de arquivos (ex: imagens de produtos)
│   └── index.html          # Página inicial (ponto de entrada para front-end)
│
├── vendor/                 # Bibliotecas externas (pacotes de terceiros)
│
├── core/                   # Núcleo do framework próprio (base MVC, rotas, helpers)
│
├── config/                 # Arquivos de configuração do sistema (BD, app etc.)
│
├── app/                    # Código da aplicação
│   ├── controllers/        # Controladores (Lógica de controle e fluxo)
│   ├── models/             # Modelos (acesso e manipulação de dados)
│   └── views/              # Visões (templates HTML para exibição)
│       └── templates/      # Templates base para views (layout, cabeçalho, rodapé)
```

## Proposta do Projeto

Este sistema foi criado para atender à seguinte proposta:

- Criar um sistema simples onde seja possível registrar vendas de produtos.
- Para cadastrar uma venda, é necessário informar o cliente (opcional) e os itens da venda.
- Deve haver a opção para selecionar uma forma de pagamento.
- Possibilidade de gerar parcelas para a venda, onde cada parcela possui data de vencimento e valor.
- Exibir uma listagem das vendas realizadas.
- Permitir editar ou excluir uma venda.

## Descrição

O framework utilizado neste projeto foi desenvolvido internamente para seguir os princípios do padrão MVC, inspirado em frameworks PHP robustos como Laravel, mas com código simplificado e específico para as necessidades do sistema de vendas.

- O **core** contém o motor do framework, incluindo roteamento, carregamento automático (autoload), controle de sessões e segurança.
- A pasta **app** contém toda a lógica da aplicação dividida claramente entre controllers, models e views para manter a organização e facilitar a manutenção.
- O front-end usa Bootstrap para garantir um design responsivo e agradável, junto com jQuery para interatividade e Swiper para sliders/carrosséis.

## Como Executar

1. Configure seu servidor local (ex: XAMPP, WAMP) apontando para a pasta `public` como diretório raiz.
2. Ajuste as configurações do banco de dados no arquivo `config/database.php`.
3. Acesse a aplicação via navegador no endereço configurado (ex: http://localhost/).

## Contribuição

Este é um projeto em desenvolvimento. Fique à vontade para abrir issues, sugerir melhorias ou enviar pull requests.

---

Obrigado por conferir este projeto! Qualquer dúvida ou sugestão, entre em contato.
