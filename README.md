# GameXchange

GameXchange é um marketplace para compra, venda e troca de jogos. O site é desenvolvido em PHP e utiliza MySQL para armazenamento de dados, oferecendo um sistema de login seguro e um painel para gerenciamento de produtos.

## Tecnologias Utilizadas

- **PHP**: Linguagem principal para o backend.
- **MySQL**: Banco de dados para armazenar usuários e produtos.
- **HTML, CSS e JavaScript**: Para a estruturação e estilização do site.
- **PDO (PHP Data Objects)**: Para conexão segura com o banco de dados.
- **Sessions**: Para controle de autenticação e manutenção do estado do usuário.

## Estrutura do Projeto

A estrutura de diretórios do projeto é organizada da seguinte forma:


- **Assets/**: Contém recursos estáticos como folhas de estilo, imagens e scripts PHP auxiliares.
  - **Css/**: Arquivos de estilo CSS.
  - **Img/**: Imagens utilizadas no site.
  - **php/**: Scripts PHP auxiliares.
- **Bd/**: Scripts relacionados ao banco de dados.
- **classes/**: Classes PHP que representam entidades e manipulam a lógica de negócios.
- **config/**: Arquivos de configuração, como detalhes de conexão com o banco de dados.
- **includes/**: Arquivos PHP incluídos em várias partes do site, como cabeçalhos e rodapés.
- Arquivos PHP na raiz do projeto correspondem a diferentes páginas e funcionalidades do site.

## Funcionalidades Principais

- **Autenticação de Usuário**: Sistema de login e logout seguro utilizando sessões PHP.
- **Gerenciamento de Jogos**: Formulário para adicionar, editar e excluir jogos do marketplace.
- **Pesquisa**: Funcionalidade para pesquisar jogos disponíveis no marketplace.
- **Perfil do Usuário**: Página para visualizar e editar informações do perfil do usuário.
- **Suporte**: Página dedicada para suporte ao cliente.
- **Sobre**: Página com informações sobre o GameXchange.

## index.php

Este documento fornece uma visão detalhada das funcionalidades e elementos presentes no arquivo `index.php` do projeto GameXchange.

## Navegação Principal

A barra de navegação localizada no cabeçalho (`<header>`) contém os seguintes elementos:

- **Logo**: Uma imagem que representa o logotipo do GameXchange.

- **Links de Navegação**:
  - **Store**: Redireciona para a página principal da loja (`index.php`).
  - **Sobre**: Leva o usuário à página "Sobre" (`sobre.php`), que provavelmente contém informações sobre o site ou a empresa.
  - **Suporte**: Direciona para a página de suporte (`suporte.php`), onde os usuários podem buscar ajuda ou entrar em contato com a equipe de suporte.

- **Menu do Usuário**:
  - Se o usuário estiver logado, exibe o nome do perfil como um link para a página de perfil (`perfil.php`) e um botão "Sair" que redireciona para `logout.php`, encerrando a sessão.
  - Se o usuário não estiver logado, exibe um botão "Entrar" que leva à página de login (`login1.php`).

## Seção "Descobrir"

Esta seção permite que os usuários explorem e pesquisem jogos na loja:

- **Barra de Pesquisa**: Um formulário que envia a consulta de pesquisa para `pesquisa.php` via método GET. O campo de entrada aceita o termo de pesquisa e o botão de submissão contém uma imagem de lupa.

- **Links de Navegação Interna**:
  - **Mais vendidos**: Âncora que leva o usuário à seção de jogos mais vendidos na mesma página.
  - **Escolhas do editor**: Âncora que direciona para a seção de recomendações do editor.
  - **Lançamentos**: Âncora que leva à seção de novos lançamentos.

## Seção "Carrossel"

Exibe um banner promocional e uma lista de produtos em destaque:

- **Banner**: Imagem destacada (por exemplo, "Banner God Of War: Ragnarok").

- **Lista de Produtos**: Inclui o arquivo `lista_produtos.php`, que provavelmente gera dinamicamente uma lista de produtos em destaque.

## Seções de Jogos

Cada uma dessas seções exibe diferentes categorias de jogos:

- **Mais Vendidos**: Inclui o arquivo `vendidos.php` para listar os jogos mais vendidos.

- **Escolhas do Editor**: Inclui o arquivo `escolhasDoEditor.php` para mostrar os jogos recomendados pelo editor.

- **Lançamentos**: Inclui o arquivo `lancamentos.php` para apresentar os jogos recém-lançados.

## Rodapé

Contém informações de direitos autorais e links para redes sociais:

- **Texto de Direitos Autorais**: "© 2024, GameXchange, Inc. Todos os direitos reservados..."

- **Ícones de Redes Sociais**: Links para Facebook, Twitter (X) e YouTube, cada um representado por um ícone correspondente.

Cada botão e link no `index.php` tem a função de facilitar a navegação do usuário pelo site, permitindo acesso rápido às principais seções e funcionalidades da plataforma GameXchange.

## Documentação do Arquivo login1.php do Projeto GameXchange

Este documento fornece uma visão detalhada das funcionalidades e elementos presentes no arquivo `login1.php` do projeto GameXchange.

## Objetivo

O arquivo `login1.php` é responsável por fornecer a interface de autenticação para os usuários do GameXchange, permitindo que eles façam login em suas contas.

## Estrutura e Funcionalidades

- **Formulário de Login**: Apresenta campos para que o usuário insira seu nome de usuário (ou e-mail) e senha.

- **Botão "Entrar"**: Ao ser acionado, envia as credenciais fornecidas para validação e autenticação.

- **Link "Esqueceu sua senha?"**: Direciona o usuário para uma página onde ele pode recuperar ou redefinir sua senha, caso a tenha esquecido.

- **Link "Criar uma conta"**: Leva o usuário à página de registro, permitindo que novos usuários criem uma conta no GameXchange.

## Processo de Autenticação

1. **Entrada de Credenciais**: O usuário insere seu nome de usuário (ou e-mail) e senha nos campos apropriados.

2. **Submissão do Formulário**: Ao clicar no botão "Entrar", as informações são enviadas para o servidor para validação.

3. **Validação no Servidor**: O servidor verifica se as credenciais correspondem a um usuário registrado:
   - **Sucesso**: Se as credenciais forem válidas, o usuário é redirecionado para a página principal ou para o seu painel de controle.
   - **Falha**: Se as credenciais forem inválidas, uma mensagem de erro é exibida, informando que o nome de usuário ou senha estão incorretos.

## Considerações de Segurança

- **Proteção de Senha**: As senhas devem ser armazenadas no banco de dados de forma segura, utilizando técnicas de hash e salt.

- **Prevenção contra Ataques de Força Bruta**: Implementar medidas como bloqueio temporário após múltiplas tentativas falhas de login.

- **Uso de HTTPS**: Garantir que o tráfego de dados entre o cliente e o servidor seja criptografado para proteger as credenciais dos usuários.

## Observações

O arquivo `login1.php` desempenha um papel crucial na experiência do usuário, fornecendo uma interface intuitiva e segura para acesso às funcionalidades do GameXchange. É essencial que o processo de login seja protegido contra vulnerabilidades comuns e que ofereça uma experiência fluida para o usuário.

Cada elemento e funcionalidade no `login1.php` é projetado para facilitar o acesso seguro e eficiente dos usuários às suas contas na plataforma GameXchange.

# Documentação do Arquivo login2.php do Projeto GameXchange

Este documento fornece uma visão detalhada das funcionalidades e elementos presentes no arquivo `login2.php` do projeto GameXchange.

## Objetivo

O arquivo `login2.php` é responsável por processar as credenciais fornecidas pelos usuários na página de login (`login1.php`) e gerenciar o processo de autenticação no sistema GameXchange.

## Estrutura e Funcionalidades

1. **Recebimento de Credenciais**: O script recebe os dados enviados via método POST, incluindo:
   - **Nome de Usuário ou E-mail**: Identificação do usuário.
   - **Senha**: Credencial secreta para autenticação.

2. **Validação Inicial**: Verifica se ambos os campos foram preenchidos. Se algum estiver vazio, o usuário é redirecionado de volta à página de login com uma mensagem de erro.

3. **Conexão com o Banco de Dados**: Estabelece uma conexão segura com o banco de dados para verificar as credenciais fornecidas.

4. **Consulta ao Banco de Dados**: Realiza uma consulta para encontrar um usuário que corresponda ao nome de usuário (ou e-mail) fornecido.

5. **Verificação de Senha**: Compara a senha fornecida com a senha armazenada no banco de dados, geralmente utilizando técnicas de hash para segurança.

6. **Gerenciamento de Sessão**:
   - **Sucesso na Autenticação**: Inicia uma sessão para o usuário, armazenando informações relevantes, como ID do usuário e tipo de conta. Em seguida, redireciona o usuário para a página principal ou painel de controle.
   - **Falha na Autenticação**: Redireciona o usuário de volta à página de login com uma mensagem de erro indicando credenciais inválidas.

## Considerações de Segurança

- **Proteção de Senha**: As senhas devem ser armazenadas utilizando algoritmos de hash seguros, como bcrypt, para prevenir ataques de força bruta ou vazamentos de dados.

- **Prevenção contra SQL Injection**: Utilizar declarações preparadas ou consultas parametrizadas ao interagir com o banco de dados para evitar vulnerabilidades de injeção de SQL.

- **Gerenciamento Seguro de Sessão**: Garantir que as sessões sejam gerenciadas de forma segura, utilizando identificadores de sessão únicos e protegendo contra ataques de fixação de sessão.

- **Limitação de Tentativas de Login**: Implementar mecanismos para limitar o número de tentativas de login falhas, prevenindo ataques de força bruta.

## Observações

O `login2.php` é um componente crítico do sistema GameXchange, pois lida diretamente com a autenticação dos usuários. É essencial que este script seja desenvolvido com atenção às melhores práticas de segurança para proteger as informações dos usuários e garantir a integridade do sistema.

Cada etapa do processo de login, desde a validação das entradas até o gerenciamento de sessões, deve ser cuidadosamente implementada para oferecer uma experiência de usuário segura e eficiente.

# Documentação do Arquivo login3.php do Projeto GameXchange

Este documento fornece uma visão detalhada das funcionalidades e elementos presentes no arquivo `login3.php` do projeto GameXchange.

## Objetivo

O arquivo `login3.php` é responsável por processar o registro de novos usuários na plataforma GameXchange, lidando com a validação dos dados fornecidos, a inserção desses dados no banco de dados e a gestão das sessões de usuário.

## Estrutura e Funcionalidades

1. **Início da Sessão**: O script inicia ou retoma uma sessão existente utilizando `session_start()`.

2. **Redirecionamento Baseado na Sessão**:
   - **Usuário Logado**: Se a variável de sessão `$_SESSION['usuario_id']` estiver definida, o usuário é redirecionado para `index.php`, evitando que usuários autenticados acessem a página de registro.
   - **Usuário Não Logado**: Se a variável de sessão `$_SESSION['usuario_id']` não estiver definida, o usuário é redirecionado para `login1.php`, garantindo que apenas usuários não autenticados possam acessar a página de registro.

3. **Conexão com o Banco de Dados**: Estabelece uma conexão com o banco de dados MySQL utilizando PDO (PHP Data Objects) com as seguintes credenciais:
   - **DSN**: `mysql:dbname=bd_gamexchange;host=localhost`
   - **Usuário**: `root`
   - **Senha**: `''` (vazia)

4. **Processamento do Formulário de Registro**:
   - **Método POST**: O script verifica se a requisição foi feita via método POST.
   - **Coleta e Tratamento de Dados**: Os dados do formulário são coletados e tratados:
     - **Email**: Armazenado na variável `$email` após remoção de espaços extras.
     - **Nome Real**: Combinação dos campos `nome_real` e `sobrenome`, separados por um espaço.
     - **Nome de Perfil**: Armazenado na variável `$nome_perfil` após remoção de espaços extras.
     - **Senha**: Armazenada na variável `$senha`.
     - **Data de Nascimento**: Recuperada da variável de sessão `$_SESSION['data_nascimento']`. Se não estiver definida, o script encerra com uma mensagem de erro.

5. **Verificação de Email Duplicado**: Antes de inserir um novo usuário, o script verifica se o email já está cadastrado na tabela `tb_usuario`:
   - **Consulta Preparada**: Utiliza uma consulta preparada para prevenir injeção de SQL.
   - **Bind de Parâmetros**: Associa o parâmetro `:email` ao valor da variável `$email`.
   - **Execução e Verificação**: Executa a consulta e verifica se há resultados. Se o email já estiver cadastrado, o script encerra com uma mensagem de erro.

6. **Inserção de Novo Usuário**: Se o email não estiver cadastrado:
   - **Consulta de Inserção**: Prepara uma consulta SQL para inserir os dados do novo usuário na tabela `tb_usuario`.
   - **Bind de Parâmetros**: Associa os parâmetros correspondentes aos valores das variáveis coletadas.
   - **Execução da Inserção**: Tenta executar a inserção. Se bem-sucedida:
     - **Definição de Variáveis de Sessão**: Armazena `email`, `nome_perfil` e `tipo` na sessão.
     - **Flag de Novo Cadastro**: Define `$_SESSION['recem_cadastrado']` como `true`.
     - **Redirecionamento**: Redireciona o usuário para `logado.php`.
   - Se a inserção falhar, exibe uma mensagem de erro.

7. **Tratamento de Exceções**: Caso ocorra uma exceção durante a conexão ou operação com o banco de dados, uma mensagem de erro é exibida com detalhes do erro.

## Estrutura HTML

O arquivo também contém a estrutura HTML para o formulário de criação de conta:

- **Cabeçalho (`<head>`)**:
  - **Metadados**: Define o conjunto de caracteres e a configuração de viewport.
  - **Título**: "gameXchange - Criar conta".
  - **Links de Estilo e Scripts**: Inclui o arquivo CSS `login3.css` e o script JavaScript `login3.js` localizados no diretório `./Assets/`.

- **Corpo (`<body>`)**:
  - **Container Principal**: Div com a classe `container` que engloba o formulário de registro.
  - **Formulário de Registro**:
    - **Logotipo**: Exibe a logo do GameXchange.
    - **Título**: "Criar conta".
    - **Campos de Entrada**:
      - **Email**: Campo para o endereço de e-mail.
      - **Nome e Sobrenome**: Campos para o primeiro nome e sobrenome.
      - **Nome de Exibição**: Campo para o nome de perfil.
      - **Senha**: Campo para criação de senha.
    - **Checkboxes**:
      - **Termos de Serviço**: Confirmação de leitura e aceitação dos termos de serviço (obrigatório).
      - **Recebimento de Novidades**: Opção para receber novidades e ofertas da GameXchange (opcional).
    - **Botão de Submissão**: Botão "Continuar" para enviar o formulário.
    - **Link para Login**: Link para a página de login caso o usuário já possua uma conta.

## Considerações de Segurança

- **Armazenamento de Senhas**: As senhas devem ser armazenadas de forma segura utilizando hashing robusto (por exemplo, `password_hash()` do PHP) para proteger contra acessos não autorizados.
- **Validação e Sanitização de Dados**: Todos os dados recebidos do usuário devem ser validados e sanitizados para prevenir ataques como injeção de SQL e XSS.
- **Gerenciamento de Sessão**: Assegurar que as sessões sejam gerenciadas de forma segura, utilizando identificadores únicos e protegendo contra ataques de fixação de sessão.

## Observações

O `login3.php` desempenha um papel crucial no fluxo de registro de novos usuários na plataforma GameXchange. Sua implementação deve seguir as melhores práticas de segurança e usabilidade para garantir uma experiência positiva e segura para os usuários.

# Documentação do Arquivo logado.php do Projeto GameXchange

Este documento fornece uma visão detalhada das funcionalidades e elementos presentes no arquivo `logado.php` do projeto GameXchange.

## Objetivo

O arquivo `logado.php` serve como a página principal para usuários autenticados no sistema GameXchange. Ele exibe informações relevantes ao usuário e fornece acesso às principais funcionalidades da plataforma.

## Estrutura e Funcionalidades

1. **Início da Sessão**: O script inicia ou retoma uma sessão existente utilizando `session_start()`.

2. **Verificação de Autenticação**:
   - O script verifica se a variável de sessão `$_SESSION['usuario_id']` está definida, indicando que o usuário está autenticado.
   - Se a variável não estiver definida, o usuário é redirecionado para `login1.php` para realizar o login.

3. **Conexão com o Banco de Dados**:
   - Estabelece uma conexão com o banco de dados MySQL utilizando PDO (PHP Data Objects) com as seguintes credenciais:
     - **DSN**: `mysql:dbname=bd_gamexchange;host=localhost`
     - **Usuário**: `root`
     - **Senha**: `''` (vazia)

4. **Recuperação de Informações do Usuário**:
   - Utiliza o `usuario_id` armazenado na sessão para recuperar informações adicionais do usuário, como `nome_perfil`, `email`, e outras informações relevantes da tabela `tb_usuario`.

5. **Exibição de Informações Personalizadas**:
   - Exibe uma mensagem de boas-vindas personalizada utilizando o `nome_perfil` do usuário.
   - Apresenta informações adicionais, como a quantidade de jogos cadastrados, histórico de transações ou outras métricas relevantes.

6. **Navegação e Funcionalidades**:
   - Fornece links ou botões para as principais funcionalidades disponíveis para o usuário autenticado, como:
     - **Catálogo de Jogos**: Acesso à lista de jogos disponíveis para troca ou venda.
     - **Perfil do Usuário**: Permite que o usuário visualize e edite suas informações pessoais.
     - **Histórico de Transações**: Exibe o histórico de trocas ou compras realizadas pelo usuário.
     - **Sair**: Opção para encerrar a sessão e sair do sistema.

7. **Tratamento de Exceções**:
   - Caso ocorra uma exceção durante a conexão ou operação com o banco de dados, uma mensagem de erro é exibida com detalhes do erro.

## Estrutura HTML

O arquivo contém a estrutura HTML para a interface do usuário autenticado:

- **Cabeçalho (`<head>`)**:
  - **Metadados**: Define o conjunto de caracteres e a configuração de viewport.
  - **Título**: "gameXchange - Área do Usuário".
  - **Links de Estilo e Scripts**: Inclui arquivos CSS e JavaScript necessários para o funcionamento e estilização da página.

- **Corpo (`<body>`)**:
  - **Barra de Navegação**: Contém links para as principais seções do site, como Catálogo de Jogos, Perfil, Histórico de Transações e Sair.
  - **Conteúdo Principal**:
    - **Mensagem de Boas-Vindas**: Saudação personalizada utilizando o `nome_perfil` do usuário.
    - **Seções Informativas**: Blocos que exibem informações relevantes, como número de jogos cadastrados, últimas transações, notificações ou mensagens do sistema.
    - **Links Rápidos**: Botões ou links para ações rápidas, como adicionar um novo jogo, procurar jogos para troca ou atualizar informações do perfil.

## Considerações de Segurança

- **Proteção de Sessão**: Assegurar que as sessões sejam gerenciadas de forma segura, utilizando identificadores únicos e protegendo contra ataques de fixação de sessão.
- **Validação de Entrada**: Garantir que todas as entradas do usuário sejam validadas e sanitizadas para prevenir ataques como injeção de SQL e XSS.
- **Controle de Acesso**: Verificar constantemente as permissões do usuário para assegurar que apenas funcionalidades autorizadas estejam acessíveis.

## Observações

O `logado.php` é uma peça central na experiência do usuário autenticado no GameXchange. Sua implementação deve focar na usabilidade, fornecendo acesso fácil e intuitivo às principais funcionalidades, ao mesmo tempo em que mantém rigorosos padrões de segurança para proteger as informações dos usuários.

É recomendável manter o design responsivo para garantir uma boa experiência em dispositivos móveis e desktops, além de considerar a acessibilidade para usuários com necessidades especiais.

# Documentação do Arquivo index.php

Este documento descreve as funcionalidades de cada botão e seção presentes no arquivo `index.php` do projeto **gameXchange**.

## Estrutura do index.php

O arquivo `index.php` é a página principal do projeto **gameXchange**. Ele contém as seguintes seções e botões:

1. [Cabeçalho (Header)](#1-cabeçalho-header)
2. [Barra de Navegação (Navbar)](#2-barra-de-navegação-navbar)
3. [Seção Principal (Main Section)](#3-seção-principal-main-section)
4. [Rodapé (Footer)](#4-rodapé-footer)

### 1. Cabeçalho (Header)

- **Logo do site**: Localizado no topo da página, exibe o logotipo do **gameXchange**. Ao clicar nele, o usuário é redirecionado para a página principal (`index.php`).

### 2. Barra de Navegação (Navbar)

A barra de navegação contém os seguintes links:

- **Store**: Redireciona o usuário para a página da loja, onde estão listados todos os jogos disponíveis.
- **Sobre**: Leva o usuário à página "Sobre", que contém informações sobre o projeto **gameXchange**.
- **Suporte**: Direciona o usuário à página de suporte, onde é possível encontrar ajuda ou entrar em contato com a equipe.

Além disso, na extremidade direita da barra de navegação:

- **Botão "Entrar"**: Se o usuário não estiver logado, este botão o redireciona para a página de login (`login1.php`).
- **Nome de Usuário e Botão "Sair"**: Se o usuário estiver logado, exibe o nome de perfil e um botão "Sair" que, ao ser clicado, encerra a sessão e redireciona para a página de login.

### 3. Seção Principal (Main Section)

Nesta seção, são exibidos os jogos disponíveis para compra ou troca. Cada jogo é apresentado com as seguintes informações:

- **Imagem do Jogo**: Uma miniatura representativa do jogo.
- **Nome do Jogo**: Título do jogo.
- **Descrição Breve**: Uma breve descrição ou tagline do jogo.
- **Botão "Detalhes"**: Ao clicar, o usuário é levado para uma página com informações detalhadas sobre o jogo.
- **Botão "Adicionar ao Carrinho"**: Adiciona o jogo ao carrinho de compras do usuário.

### 4. Rodapé (Footer)

O rodapé contém links adicionais e informações de contato:

- **Links Rápidos**: Como "Política de Privacidade", "Termos de Serviço" e "Contato".
- **Redes Sociais**: Ícones que levam às páginas oficiais do **gameXchange** em diversas plataformas sociais.
- **Informações de Contato**: Endereço de e-mail ou número de telefone para suporte ao cliente.

---

*Observação*: As funcionalidades descritas acima são baseadas na estrutura padrão do `index.php` do projeto **gameXchange**. Caso haja personalizações ou modificações no código, as funcionalidades podem variar.

# Documentação do Arquivo pesquisa.php do Projeto GameXchange

Este documento descreve as funcionalidades e estrutura do arquivo `pesquisa.php`, responsável por exibir os resultados de uma pesquisa de jogos no site **GameXchange**.

## Funcionalidade Geral

O arquivo `pesquisa.php` realiza a busca de jogos com base no termo informado pelo usuário e exibe os resultados em uma grade visualmente atrativa.

## Fluxo do Código PHP

### Sessão e Dependências

- `session_start()` inicia a sessão do usuário.
- `require_once 'Assets/php/Pesquisa.php'` importa a classe responsável pela lógica de pesquisa de jogos no banco de dados.

### Variáveis Principais

- `$usuario_logado`: recebe o nome do usuário logado a partir da sessão (se estiver logado).
- `$termo`: termo de pesquisa capturado via parâmetro GET (`?q=`).
- `$pesquisa`: instância da classe `Pesquisa`.
- `$resultados`: array que armazenará os jogos retornados pela busca.

### Execução da Pesquisa

Se o termo de pesquisa (`$termo`) for preenchido, o método `buscarJogos()` é chamado e retorna os jogos correspondentes ao termo informado.

---

## Estrutura HTML

### `<head>`

Inclui:

- Título da página: **Resultados da Pesquisa**
- Link para o CSS externo: `Assets/Css/style.css`
- Estilos adicionais para responsividade, organização da lista de jogos e personalização visual (fundo escuro, cartões roxos, animações no hover etc.)

### `<header>`

Contém:

- **Logo** do site (`Assets/Img/Logo.png`)
- **Menu de Navegação** com links:
  - `index.php` (Store)
  - `sobre.php`
  - `suporte.php`
- **Menu do Usuário**:
  - Se o usuário estiver logado:
    - Link para `perfil.php` com o nome do usuário
    - Botão "Sair" (logout)
  - Se não estiver logado:
    - Botão "Entrar" que redireciona para `login1.php`

---

## `<main>` — Conteúdo Principal

### Título

Apresenta o termo pesquisado com a mensagem:

Resultados da Pesquisa por "termo"

markdown
Sempre exibir os detalhes

Copiar


### Resultados Encontrados

Se houver jogos correspondentes:

- Um container `.area-roxa` exibe todos os jogos encontrados, cada um com:
  - Imagem do jogo (`foto0`)
  - Nome do jogo
  - Descrição
  - Preço formatado (ex: R$ 99,99)
  - Link que leva à página `vendas.php?id=...` do jogo clicado

### Nenhum Resultado

Caso não existam jogos para o termo pesquisado, a mensagem `"Nenhum jogo encontrado."` é exibida.

---

## Considerações Finais

O arquivo `pesquisa.php` integra a lógica de backend (consulta com PHP) e frontend (exibição com HTML/CSS) para apresentar os jogos pesquisados pelo usuário de forma clara e estilizada. Ele é fundamental para a usabilidade e navegação da loja GameXchange.

# Documentação do Arquivo `sobre.php` do Projeto GameXchange

Este documento detalha o funcionamento e a estrutura do arquivo `sobre.php`, presente no site GameXchange. Ele foi desenvolvido como parte do Projeto Integrador do curso de Jogos Digitais, e sua função principal é apresentar ao usuário informações sobre a proposta do projeto e o histórico dos desenvolvedores.

---

## Objetivo do Arquivo

O arquivo `sobre.php` serve como a página “Sobre nós” do site. Seu objetivo é explicar o que motivou a criação do GameXchange, qual a proposta da plataforma, e relatar a experiência dos criadores durante o desenvolvimento do projeto acadêmico.

---

## Lógica PHP

Antes da estrutura HTML, o arquivo executa uma série de comandos PHP para garantir o funcionamento adequado da página:

### Início da Sessão

A sessão é iniciada para manter dados do usuário logado, caso exista. Isso permite personalizar a navegação e exibir ou ocultar opções específicas no menu.

### Conexão com o Banco de Dados

O código realiza uma conexão com o banco de dados chamado `bd_gamexchange` utilizando PDO. Essa conexão é estabelecida com um usuário local (root) e sem senha, assumindo que a aplicação está em ambiente de desenvolvimento.

### Consulta de Jogos

Logo após a conexão, é feita uma consulta que seleciona todos os registros da tabela de jogos. No entanto, os dados recuperados não são utilizados diretamente nesta página, o que indica que essa parte pode ser uma preparação para funcionalidades futuras ou uma herança de outro template.

### Verificação de Login

O sistema verifica se existe um usuário logado através da variável de sessão que armazena o nome de perfil. Essa verificação é usada para personalizar o menu superior da página.

---

## Estrutura HTML

A página é composta pelas seguintes seções:

### Cabeçalho

O topo da página contém:

- A logo da GameXchange;
- Um menu com links para a loja, a própria página “Sobre” e a página de suporte;
- Um espaço à direita com o nome do usuário logado (caso exista) e um botão de “Sair”;
- Caso não haja login ativo, é exibido apenas o botão “Entrar”.

Essa estrutura garante que o usuário possa navegar facilmente pelas áreas principais do site.

### Conteúdo Principal

O conteúdo está centrado visualmente e apresenta:

- Um título principal com a frase “Nosso Site e Nossa História!”;
- Um subtítulo com o tema “Nosso PI, nossas dificuldades e nossos aprendizados”;
- Um bloco de texto explicativo, dividido em parágrafos, abordando:

  - O que é o PI (Projeto Integrador);
  - A proposta de unir os conhecimentos das aulas em um projeto prático;
  - A motivação para criar o GameXchange, mencionando que a Steam (principal concorrente) possui uma interface que deixou a desejar;
  - A autoria da ideia, creditando Matheus Guida e Ryan Germano.

---

## Estilos e Layout

O visual da página é definido por dois arquivos CSS:

- Um arquivo geral (`style.css`) que contém os estilos principais do site;
- Um arquivo específico (`sobre.css`) com personalizações para a página atual.

Além disso, o site utiliza um ícone personalizado (favicon), que aparece na aba do navegador, reforçando a identidade visual da marca.

---

## Considerações Finais

O arquivo `sobre.php` é uma página informativa e institucional, essencial para apresentar o contexto do projeto GameXchange aos visitantes. Mesmo contendo uma conexão com o banco de dados, seu foco é exclusivamente na apresentação de conteúdo estático e textual.

# Documentação do Arquivo `suporte.php` do Projeto GameXchange

Este documento descreve detalhadamente as funcionalidades e a estrutura do arquivo `suporte.php`, integrante da plataforma GameXchange.

## Objetivo

A página `suporte.php` tem como função oferecer aos usuários um canal direto para relatar problemas encontrados na plataforma. O formulário presente permite a coleta de informações essenciais sobre o problema, facilitando o diagnóstico e correção por parte da equipe técnica.

---

## Funcionalidades do PHP

### Sessão

Logo no início, o script inicia a sessão PHP, permitindo acesso às variáveis de sessão durante a execução da página.

### Conexão com o Banco de Dados

É estabelecida uma conexão com o banco de dados MySQL utilizando a biblioteca PDO. A base de dados utilizada se chama `bd_gamexchange`, com usuário `root` e senha vazia. 

### Consulta de Jogos

É executada uma consulta SQL para selecionar todos os dados da tabela `tb_jogos`, e o resultado é armazenado em uma variável para possível uso futuro (embora não utilizado diretamente neste arquivo).

### Verificação de Login

O script verifica se há um usuário logado consultando uma variável de sessão que armazena o nome de perfil. Se estiver presente, a interface será adaptada para mostrar o nome do usuário e um botão de logout; caso contrário, será exibido um botão para login.

---

## Estrutura da Página HTML

### Cabeçalho

A seção `<head>` define metadados importantes como codificação de caracteres e compatibilidade com dispositivos móveis. Também define o título da aba como "Suporte" e importa dois arquivos de estilo CSS: um específico para a página de suporte e outro com estilos gerais do site. Um ícone de atalho (favicon) também é referenciado.

### Header

No cabeçalho visual da página:

- É exibido o logotipo do GameXchange.
- Um menu de navegação oferece links para as páginas principais: "Store", "Sobre" e "Suporte".
- Um menu de usuário mostra:
  - O nome do usuário logado com um link para a página de perfil, seguido de um botão "Sair".
  - Ou, se o usuário não estiver logado, um botão "Entrar" redirecionando para a página de login.

---

## Corpo da Página (Main)

### Título

A primeira parte do conteúdo principal apresenta um texto em destaque que convida o usuário a relatar problemas encontrados na plataforma, incentivando a colaboração para resolução rápida.

### Linha Divisória

Após o título, uma barra visual é utilizada como separador entre o título e o formulário.

### Formulário de Suporte

Abaixo do título e da barra, há um formulário com três campos essenciais:

1. **Título**: Campo de texto onde o usuário deve inserir um título resumido para o problema.
2. **Descrição**: Área de texto expandida onde o usuário pode descrever com detalhes o problema encontrado.
3. **Gravidade**: Campo numérico com valor mínimo 1 e máximo 10, onde o usuário avalia a gravidade do problema relatado.

#### Ação do Formulário

O formulário utiliza o método POST e envia os dados para o script `form_suporte.php`, localizado dentro da pasta `Assets/php/`. Este script é responsável por processar as informações do suporte (não descrito neste documento).

#### Botão de Envio

Ao final do formulário, há um botão com o texto "Enviar" que submete as informações fornecidas.

---

## Considerações Finais

A página `suporte.php` desempenha um papel essencial no atendimento ao usuário, fornecendo uma via de comunicação para identificar falhas ou dificuldades no uso do GameXchange. A implementação é simples, clara e funcional, garantindo que qualquer usuário consiga registrar facilmente uma solicitação de suporte.

Boas práticas como uso de sessões, verificação de login e conexão segura com banco de dados via PDO foram corretamente aplicadas.

# Documentação do Arquivo `form_suporte.php` do Projeto GameXchange

Este documento descreve detalhadamente o funcionamento do arquivo `form_suporte.php`, utilizado no sistema GameXchange.

## Objetivo

O arquivo `form_suporte.php` é responsável por receber os dados enviados através do formulário de suporte localizado na página `suporte.php`, processar essas informações e armazená-las no banco de dados.

## Estrutura Geral

1. **Sessão**
   - O arquivo inicia ou retoma uma sessão existente com o intuito de associar o envio do suporte ao usuário logado (caso exista).

2. **Conexão com o Banco de Dados**
   - É estabelecida uma conexão com o banco de dados MySQL utilizando PDO.
   - Os parâmetros de conexão incluem o nome do banco (`bd_gamexchange`), o host (`localhost`), o nome de usuário (`root`) e a senha (geralmente vazia em ambientes locais).

3. **Recebimento dos Dados do Formulário**
   - Os dados são enviados via método POST e incluem:
     - **Título**: Assunto principal do problema reportado.
     - **Descrição**: Explicação detalhada do erro ou problema enfrentado pelo usuário.
     - **Gravidade**: Nível de gravidade do problema, em uma escala de 1 a 10.

4. **Identificação do Usuário**
   - O script tenta identificar o nome de perfil do usuário por meio de uma variável de sessão.
   - Caso o usuário não esteja logado, o sistema poderá tratar como anônimo ou impedir o envio (dependendo da lógica implementada).

5. **Validação Básica**
   - Verifica-se se os campos obrigatórios foram preenchidos antes de inserir os dados no banco.
   - É importante garantir que os valores sejam válidos e estejam dentro do formato esperado (por exemplo, gravidade entre 1 e 10).

6. **Inserção no Banco de Dados**
   - Os dados são inseridos em uma tabela específica de suporte (geralmente chamada de `tb_suporte` ou equivalente).
   - É utilizada uma instrução preparada para proteger contra injeção de SQL, garantindo segurança ao sistema.

7. **Redirecionamento ou Mensagem**
   - Após o envio, o usuário pode ser redirecionado para uma página de confirmação ou receber uma mensagem na tela.
   - Também é possível registrar o horário do envio utilizando a data e hora do servidor.

## Considerações de Segurança

- **SQL Injection**: O uso de consultas preparadas com bind de parâmetros ajuda a evitar ataques de injeção de SQL.
- **Autenticação**: É recomendável que apenas usuários autenticados possam enviar formulários de suporte, ou que os envios anônimos sejam identificados de forma adequada.
- **Validação e Sanitização**: Os dados recebidos devem ser validados (tipo, tamanho, conteúdo) e sanitizados para evitar ataques de XSS e outros.

## Conclusão

O `form_suporte.php` é um componente fundamental para o canal de comunicação entre usuários e administradores da plataforma GameXchange. Ele permite que problemas sejam reportados de forma estruturada, armazenando informações relevantes para posterior análise e resolução.

# Documentação do Arquivo carrinho.php do Projeto GameXchange

Este documento descreve o funcionamento do arquivo `carrinho.php` do projeto GameXchange, que é responsável por exibir o carrinho de compras do usuário, listando os jogos selecionados e oferecendo opções de compra.

## Objetivo Geral

O objetivo do arquivo é recuperar os jogos adicionados ao carrinho na sessão do usuário, exibi-los em uma página HTML estruturada e oferecer opções para concluir ou continuar a compra.

## Início da Sessão e Conexão com o Banco de Dados

- A sessão é iniciada com `session_start()`.
- É criada uma conexão com o banco de dados MySQL via PDO, utilizando as credenciais definidas para o banco hospedado remotamente.
- Um bloco `try/catch` é utilizado para capturar possíveis erros de conexão.

## Verificação de Sessão do Usuário

- A variável `$_SESSION['usuario_nome_perfil']` é verificada para identificar se o usuário está logado. Se estiver, o nome de perfil é armazenado para uso na interface.

## Recuperação dos Jogos no Carrinho

- O carrinho é recuperado da sessão via `$_SESSION['carrinho']`, contendo os IDs dos jogos.
- Se o carrinho não estiver vazio:
  - é montada uma consulta SQL com `placeholders` para selecionar os jogos correspondentes aos IDs.
  - A consulta é preparada e executada com os valores do carrinho.
  - Os jogos retornados são armazenados em `lista_jogos` para exibição na interface.

## Estrutura HTML da Página

### Cabeçalho (Header)

- Inclui o logotipo e uma barra de navegação com links para:
  - Store (index.php)
  - Sobre (sobre.php)
  - Suporte (suporte.php)
- Exibe opções de login ou nome do usuário logado e botão para sair da conta.

### Conteúdo Principal (Main)

- Exibe um título "Seu Carrinho".
- Se o carrinho estiver vazio:
  - Mostra uma mensagem indicando que não há itens no carrinho.
- Se houver jogos no carrinho:
  - Para cada jogo, é exibido:
    - Imagem
    - Nome
    - Nota (de 0 a 100)
    - Classificação indicativa
    - Botão para comprar o jogo individualmente (enviando o ID via GET para `finalizar_venda.php`).
  
### Ações Disponíveis

- Um botão para voltar à loja e continuar comprando (link para `index.php`).
- Um botão para finalizar a compra de todos os jogos do carrinho (link para `finalizar_venda_jogos.php`).

### Rodapé (Footer)

- Inclui uma mensagem com direitos autorais da plataforma.

## Considerações Finais

- O `carrinho.php` é essencial para permitir que os usuários revisem suas escolhas antes de finalizar a compra.
- A utilização de sessões garante que os dados do carrinho sejam persistentes durante a navegação.
- A implementação utiliza boas práticas de segurança como uso de `htmlspecialchars` e consultas preparadas com PDO.

# `finalizar_venda.php`

## Visão Geral

Este arquivo é responsável por exibir as informações da compra de um jogo selecionado no carrinho, incluindo os detalhes do jogo, valores com e sem desconto, e opções de confirmação ou cancelamento da compra. Ele também aplica cupons promocionais e finaliza a compra via requisição `fetch`.

---

## Sessão

- Inicia uma sessão com `session_start();`.
- Verifica se o usuário está logado por meio da variável `$_SESSION['usuario_id']`.
- Caso o usuário não esteja autenticado, redireciona para `login1.php`.

---

## Conexão com o Banco de Dados

- Conecta ao banco MySQL com as credenciais fornecidas.
- Usa a biblioteca PDO para comunicação segura com o banco de dados.

---

## Recuperação de Dados

- Obtém o `id` do jogo passado via `GET`.
- Valida a existência do ID.
- Executa uma query parametrizada para buscar as informações do jogo correspondente.
- Em caso de falha (jogo não encontrado), exibe uma mensagem de erro.

---

## Exibição dos Dados

- Exibe os seguintes dados do jogo selecionado:
  - Imagem (`foto0`)
  - Nome (`nome`)
  - Preço original
  - Desconto aplicado (inicialmente zero)
  - Preço final

---

## Lógica de Preço

- Define o preço base a partir do banco de dados.
- Define o desconto como 0 inicialmente.
- Calcula o preço final como `preço base - desconto`.

---

## Campo de Cupom

- Campo de entrada para código promocional.
- Ao digitar no campo, uma requisição `fetch` é feita para `Assets/php/cupom.php`, que retorna o percentual de desconto.
- Os preços na tela são atualizados dinamicamente com base no valor retornado.

---

## Termos e Condições

- Checkbox que o usuário deve marcar para aceitar os termos de licença e políticas de privacidade, além de receber a confirmação via e-mail.

---

## Botões de Ação

- **Confirmar compra**: 
  - Ao clicar, executa uma requisição `fetch` via POST para `Assets/php/finalizar_compra.php`.
  - Envia o ID do jogo.
  - Em caso de sucesso, mostra um `alert` com a chave de ativação do jogo e redireciona para `perfil.php`.

- **Cancelar compra**:
  - Redireciona para a página `index.php`.

---

## Scripts JavaScript

- Manipulação do campo de cupom e atualização de preços com desconto.
- Função de confirmação da compra com tratamento de resposta JSON.


# Documentação - finalizar_venda_jogo.php

Este arquivo PHP exibe o resumo da compra dos jogos presentes no carrinho do usuário, calculando o total e exibindo as informações detalhadas de cada item.

## Sessão e Conexão

- A sessão é iniciada com `session_start()`.
- Conecta-se ao banco de dados MySQL usando PDO, tratando possíveis erros com try-catch.
- Verifica se há um usuário logado (`usuario_nome_perfil`) e armazena essa informação.

## Recuperação dos Dados

- O carrinho é recuperado da sessão (`$_SESSION['carrinho']`).
- Se o carrinho contiver itens, uma query SQL busca os jogos correspondentes à lista de IDs.
- Os jogos encontrados são armazenados em `$lista_jogos`.

## Exibição

- A página HTML exibe a lista de jogos no carrinho com:
  - Imagem, nome, nota, classificação indicativa e preço.
- O total da compra é calculado somando os preços dos jogos.
- Botões permitem:
  - Voltar para a loja
  - Finalizar a compra através de um formulário que envia os dados do carrinho serializados para `salvar_compra.php`.

## Estrutura HTML

- Cabeçalho com menu de navegação e verificação de usuário logado.
- Bloco principal com a listagem dos jogos e total da compra.
- Rodapé padrão com direitos autorais.

## Resumo

O script `finalizar_venda_jogo.php` apresenta um resumo da compra baseada nos jogos armazenados no carrinho da sessão, exibindo cada item com seus respectivos dados e o total a pagar. Ele permite que o usuário retorne à loja ou prossiga para salvar a compra.


### `salvar_compra.php` - Documentação

Este arquivo é responsável por registrar as compras realizadas pelo usuário no sistema **GameXchange**, salvando cada item do carrinho na tabela de compras do banco de dados.

---

### Funcionamento

1. **Sessão Iniciada**  
   A sessão é iniciada para acessar as informações do usuário logado.

2. **Verificação de Autenticação**  
   Verifica se a sessão possui o `usuario_id`. Caso contrário, redireciona o usuário para a página de login.

3. **Conexão com o Banco de Dados**  
   Realiza a conexão utilizando PDO. Em caso de falha, exibe uma mensagem de erro.

4. **Verificação de Método POST**  
   O script checa se a requisição é do tipo POST e se o carrinho foi enviado via formulário.

5. **Processamento do Carrinho**  
   - O carrinho é desserializado.
   - Para cada ID de jogo no carrinho:
     - Gera uma chave de ativação aleatória (`bin2hex(random_bytes(16))`).
     - Insere um novo registro na tabela `tb_compras` com o ID do usuário, ID do jogo e a chave gerada.

6. **Limpeza da Sessão**  
   Após o processamento da compra, o carrinho é removido da sessão.

7. **Redirecionamento**  
   O usuário é redirecionado automaticamente para a página `perfil.php`.
## Resumo

O script salvar_compra.php processa a finalização da compra ao receber os dados do carrinho via POST, registra cada jogo adquirido na tabela de compras com uma chave de ativação gerada automaticamente, limpa o carrinho da sessão e redireciona o usuário para a página de perfil.

## Documentação do C#

# Documentação do Formulário Principal (Form1)

Este documento tem como objetivo descrever o funcionamento geral do formulário principal do projeto **gameXchange**, detalhando as funcionalidades de cada botão e comentando sobre a estrutura do formulário.

## Inicialização do Formulário

Ao ser iniciado, o formulário principal é configurado para aparecer centralizado na tela, proporcionando uma melhor experiência de usuário. Além disso, a borda do formulário é definida como fixa, impedindo o redimensionamento da janela. Isso contribui para a consistência visual da interface.

## Funcionalidade dos Botões

### Botão 1 (Ação de Login)
Este botão é responsável por abrir um novo formulário de login. Quando clicado, ele instancia o formulário de login e o exibe como uma janela modal. Isso significa que o usuário precisa interagir com a janela de login antes de retornar à janela principal.

### Botão Sair
Este botão encerra a aplicação ao ser clicado. Sua função é fechar o formulário principal e, consequentemente, encerrar o programa.

## Comentários Gerais

- A utilização da janela modal para login é uma prática comum para garantir que apenas usuários autenticados prossigam no sistema.
- A fixação da borda do formulário impede problemas de layout que poderiam surgir com o redimensionamento da janela.
- A presença de um botão sem implementação indica uma possível expansão futura da aplicação.

## Resumo Geral

O formulário principal do projeto **gameXchange** atua como uma tela inicial da aplicação, oferecendo opções para realizar o login ou encerrar o programa. Ele apresenta uma interface simples e objetiva, com foco na navegação inicial do usuário. A estrutura atual já oferece uma base funcional para expansão futura, como a inserção de funcionalidades no botão "gameXchange".

# Documentação do Formulário de Login (Login.cs)

Este documento tem como objetivo descrever detalhadamente o funcionamento do formulário de **login** do projeto **gameXchange**, explicando os componentes, suas funcionalidades, comportamentos esperados e lógicas de validação.

## Inicialização do Formulário

Ao ser iniciado, o formulário é centralizado na tela e possui a borda fixada, impedindo redimensionamento. Essas configurações garantem consistência visual na interface do sistema.

O campo de senha é configurado para esconder os caracteres digitados por padrão, aumentando a segurança no momento da digitação.

## Funcionalidades dos Componentes

### Campo de Email e Senha
Os usuários devem preencher os dois campos com seus dados de acesso. Caso qualquer um dos campos esteja vazio ao tentar realizar o login, uma mensagem de erro é exibida.

### Caixa de seleção "Mostrar Senha"
Este checkbox permite alternar entre mostrar ou ocultar os caracteres digitados no campo de senha. Quando marcado, a senha se torna visível; quando desmarcado, os caracteres são ocultados novamente.

### Botão "Entrar"
Este é o principal botão do formulário, utilizado para autenticar o usuário. Ele realiza os seguintes passos:

1. Valida se os campos de email e senha foram preenchidos.
2. Estabelece conexão com o banco de dados MySQL remoto.
3. Executa uma consulta SQL para verificar se o email e a senha correspondem a um usuário válido.
4. Caso um usuário seja encontrado:
   - Se o tipo for "comum": exibe uma mensagem dizendo que o usuário comum não tem permissão de login.
   - Se o tipo for "admin": exibe mensagem de sucesso e redireciona o usuário para o formulário principal do sistema.
   - Se o tipo for outro: exibe mensagem de erro indicando tipo não reconhecido.
5. Se não encontrar usuário correspondente: exibe mensagem de email ou senha inválidos.
6. Em caso de erro de conexão com o banco, exibe uma mensagem apropriada.

## Comentários Adicionais

- O uso de mensagens informativas e coloridas (vermelho para erro, verde para sucesso) ajuda na usabilidade.
- A senha é tratada de forma insegura, pois é comparada diretamente no banco sem criptografia. Seria recomendável o uso de hash.
- O checkbox de "mostrar senha" é um recurso simples, mas muito útil para evitar erros de digitação.

## Resumo Geral

O formulário de login do **gameXchange** é responsável por autenticar administradores no sistema. Ele oferece uma interface simples e funcional para entrada de credenciais, validação com o banco de dados e direcionamento ao menu principal, garantindo controle de acesso adequado à aplicação.

# Gerenciador de Compras (`GerCompra.cs`)

Este formulário do sistema **gameXchange** é responsável pela visualização, edição, exclusão e pesquisa das compras realizadas pelos usuários.

## Funcionalidades Gerais

- O formulário é iniciado centralizado na tela e com layout fixo.
- A aparência do formulário é ajustada para manter uma identidade visual consistente (fundo roxo escuro e texto branco, com botões em azul escuro).
- Os dados são carregados diretamente do banco de dados MySQL hospedado externamente.

## Botões e Suas Funcionalidades

### Botão **Pesquisar**
- Realiza a filtragem das compras exibidas com base no nome do usuário ou nome do jogo.
- Utiliza uma query SQL com cláusula `LIKE` para buscar as correspondências no banco de dados.

### Botão **Editar**
- Permite que o usuário selecione uma linha no `DataGridView` para editar manualmente campos como a chave de ativação e a data da compra.
- Exibe uma mensagem informativa sobre a necessidade de clicar em "Salvar" após editar.

### Botão **Salvar**
- Salva as alterações feitas nos campos permitidos de uma linha previamente editada (chave de ativação e data da compra).
- Realiza a atualização via comando `UPDATE` na tabela `tb_compras`.
- Exibe uma confirmação de sucesso após salvar.

### Botão **Excluir**
- Remove do banco de dados a compra selecionada.
- Exige confirmação do usuário antes de prosseguir com a exclusão.
- Utiliza o comando `DELETE` para remover a linha da tabela `tb_compras`.

### Botão **Sair**
- Fecha o formulário atual.

## Outras Observações

- Apenas duas colunas podem ser editadas diretamente: `chave_ativacao` e `data_compra`.
- A estrutura do `DataGridView` é configurada dinamicamente após o carregamento dos dados.
- Todos os campos são obtidos com `JOIN` entre as tabelas de compras, usuários e jogos para exibir dados relevantes como nome do usuário e nome do jogo.
- A conexão com o banco é encerrada automaticamente com `using`, garantindo segurança e boa prática de codificação.

## Resumo do Formulário

O formulário **GerCompra** oferece uma interface administrativa robusta para gerenciar o histórico de compras dentro da plataforma **gameXchange**. Ele facilita ações comuns como consulta, edição e exclusão de registros, mantendo a integridade visual e funcional do sistema.

# Documentação do Formulário de Gerenciamento de Cupons - gameXchange

Este formulário faz parte do sistema **gameXchange** e é utilizado para o gerenciamento de cupons promocionais aplicados na plataforma. Abaixo estão descritas as funcionalidades e comportamentos de cada botão presente no formulário, bem como um resumo geral sobre o que o formulário realiza.

## Funcionalidades dos Botões

### Botão "Pesquisar"
- Permite buscar cupons cadastrados com base no nome digitado no campo de pesquisa.
- Após a digitação e clique no botão, a tabela é atualizada com os resultados correspondentes.

### Botão "Excluir"
- Remove permanentemente um cupom da base de dados.
- Requer que o usuário selecione uma linha da tabela antes de realizar a ação.
- Após a confirmação do usuário, o cupom é deletado do banco de dados.

### Botão "Editar"
- Permite a edição dos campos "nome do cupom" e "desconto" diretamente na tabela.
- Ao clicar, uma mensagem informa ao usuário que ele pode fazer edições e deve clicar em "Salvar" para aplicar as mudanças.

### Botão "Salvar"
- Aplica e salva no banco de dados as alterações feitas pelo usuário na tabela.
- Verifica se os valores estão válidos antes de salvar, evitando erros de formato.
- Atualiza a lista de cupons após a conclusão.

### Botão "Criar"
- Cria um novo cupom com base nas informações preenchidas nos campos "Nome do Cupom" e "Desconto".
- Faz a validação dos campos antes de enviar ao banco.
- Ao sucesso, limpa os campos e atualiza a tabela de cupons.

### Botão "Sair"
- Fecha a janela do formulário de gerenciamento de cupons.

## Outras Características

- A tabela é central no formulário, sendo utilizada tanto para visualização quanto para edição de dados.
- O formulário é carregado centralizado na tela e com tamanho fixo, não permitindo redimensionamento.
- Estilo visual personalizado com tema escuro: fundo roxo escuro, botoes em azul escuro e fontes brancas, mantendo a identidade visual do **gameXchange**.
- Somente os campos "nome_cupom" e "desconto" podem ser editados diretamente na tabela.

## Resumo Geral

O formulário **GerCupom** é uma ferramenta administrativa essencial do sistema **gameXchange**, permitindo ao operador criar, pesquisar, editar, excluir e visualizar cupons promocionais que podem ser utilizados na plataforma. Ele fornece uma interface intuitiva e segura para a gestão desses recursos, com validação de entradas, confirmações de exclusão e atualização automática dos dados exibidos.

# Gerenciamento de Jogos - gameXchange

Este formulário permite o gerenciamento completo dos jogos cadastrados no sistema **gameXchange**. Através dele, o administrador pode visualizar, editar, excluir, pesquisar e atualizar dados diretamente no banco de dados MySQL.

---

## Funcionalidades dos Botões

### `Pesquisar`
- Permite buscar jogos pelo nome.
- Se o campo de texto estiver vazio, todos os jogos serão listados novamente.
- Os resultados da busca aparecem na grade principal.

### `Excluir`
- Remove o jogo selecionado do banco de dados.
- Exibe um aviso de confirmação antes de excluir.
- Só funciona se uma linha estiver selecionada.

### `Editar`
- Permite que os campos **nome**, **nota**, **preço** e **descrição** da linha selecionada fiquem editáveis.
- Exibe um aviso orientando que é necessário clicar em “Salvar” após as edições.

### `Salvar`
- Atualiza os dados do jogo no banco com base nas alterações feitas na tabela.
- Valida o campo de **preço** e **nota** antes de salvar.
- Exibe uma mensagem de sucesso ou erro ao final da operação.

### `Sair`
- Fecha o formulário atual.

---

## Descrição Geral do Formulário

- A interface carrega automaticamente todos os jogos ao iniciar.
- Os dados são exibidos em uma **DataGridView**, com apenas alguns campos liberados para edição.
- Cada jogo traz informações como ID, nome, fotos, classificação indicativa, nota, descrição, preço e data de lançamento.
- A quantidade total de jogos é exibida no rodapé após o carregamento.

---

## Banco de Dados

- Os dados são obtidos e atualizados diretamente na tabela `tb_jogos`.
- A conexão utiliza o servidor externo do banco MySQL com os dados do projeto **gameXchange**.

---

## Observações

- É obrigatório selecionar uma linha da tabela para usar os botões **Excluir**, **Editar** ou **Salvar**.
- A interface é centralizada na tela e não permite redimensionamento para manter o layout padronizado.
- Mensagens de erro e sucesso são exibidas através do componente `labelInfo` ou caixas de diálogo.

# Documentação do Arquivo `GerSuporte.cs`

## Descrição Geral

O formulário `GerSuporte` é responsável por gerenciar a visualização de chamados de suporte registrados pelos usuários no sistema. Ele permite listar os chamados e visualizar os detalhes (descrição) de cada um. O formulário também aplica um estilo visual escuro à interface.

## Funcionalidades

- Carrega os chamados da tabela `tb_suporte` ao iniciar.
- Permite ao usuário visualizar a descrição completa de um chamado selecionado.
- Aplica estilização personalizada aos controles da interface.

## Componentes Utilizados

- `DataGridView` (`dataGridViewDescricao`): exibe a lista de chamados com `id_suporte`, `titulo` e `gravidade`.
- `RichTextBox` (`richTextBox1`): mostra a descrição do chamado selecionado.
- `Button` (`buttonVisualizar` e `buttonSair`): para visualizar a descrição e sair do formulário, respectivamente.

## Eventos e Métodos

### `GerSuporte()` (Construtor)
- Centraliza o formulário e define o estilo fixo.
- Associa os eventos `Click` aos botões.
- Carrega os chamados ao iniciar.

### `GerSuporte_Load`
- Método chamado no `Load` do formulário.
- Executa os métodos `CarregarChamados()` e `AjustarCores()`.

### `CarregarChamados()`
- Conecta ao banco de dados.
- Executa `SELECT id_suporte, titulo, gravidade FROM tb_suporte`.
- Preenche o `dataGridViewDescricao` com os dados.

### `buttonVisualizar_Click`
- Verifica se uma linha está selecionada.
- Usa o `id_suporte` para buscar a `descricao` do chamado.
- Exibe a descrição no `richTextBox1`.

### `AjustarCores()`
- Define cores personalizadas para o fundo do formulário e os controles.

### `buttonSair_Click`
- Fecha o formulário.

## Banco de Dados

- **Tabela**: `tb_suporte`
- **Colunas Usadas**:
  - `id_suporte`
  - `titulo`
  - `gravidade`
  - `descricao`

## Observações

- O sistema utiliza a biblioteca `MySql.Data.MySqlClient` para conexão com banco MySQL.
- A string de conexão está codificada diretamente no formulário.

# Documentação do Arquivo `GerUsuario.cs`

## Visão Geral

O formulário `GerUsuario` é parte do sistema **gameXchange**, utilizado para gerenciar os usuários cadastrados na base de dados. Ele realiza operações como:
- Listagem de usuários;
- Pesquisa por nome de perfil ou nome real;
- Edição de informações dos usuários;
- Exclusão de registros;
- Atualização de dados;
- Personalização de cores da interface.

## Funcionalidades Principais

### 1. Carregamento Inicial
- Atribui posição central ao formulário.
- Torna a janela fixa.
- Define eventos de clique para os botões.
- Configurações iniciais do `DataGridView`:
  - Edição permitida;
  - Adição de linhas desabilitada;
  - Modo de seleção por linha inteira.

### 2. CarregarUsuários(string filtro = "")
Consulta a tabela `tb_usuario` e preenche o `DataGridView`. Caso um filtro seja informado, aplica um `LIKE` no `nome_perfil` e `nome_real`.

### 3. Pesquisar
O botão `buttonPesquisar` chama `CarregarUsuarios()` com base no texto inserido em `textBoxPesquisa`.

### 4. Excluir
- Verifica se uma linha foi selecionada.
- Solicita confirmação do usuário.
- Executa a exclusão via `DELETE` pelo `id_usuario`.

### 5. Editar
- Habilita edição do `DataGridView`.
- Informa o usuário para clicar em Salvar para concluir.

### 6. Salvar
- Coleta dados da linha selecionada.
- Verifica campos obrigatórios.
- Atualiza os dados no banco via `UPDATE`.
- Mostra mensagens de sucesso ou erro.

### 7. Ajustar Cores
Altera o estilo visual da tela e seus componentes, deixando o fundo roxo escuro e os elementos com cores apropriadas para leitura.

### 8. Fechar
O botão `buttonSair` fecha o formulário.

## Conexão com o Banco
A conexão é feita com o banco MySQL remoto, utilizando a biblioteca `MySql.Data.MySqlClient`.

## Tabela Manipulada
**tb_usuario**:
- `id_usuario`
- `email`
- `nome_perfil`
- `nome_real`
- `data_nascimento`
- `qtd_jogos`
- `tipo`

## Resumo
Essa documentação descreve de forma descritiva e didática o funcionamento interno do arquivo `GerUsuario.cs` para fins de manutenção e compreensão da lógica de negócio do sistema gameXchange.

<h2>🤝 Colaboradores</h2>

<p>Agradecemos às seguintes pessoas que contribuíram para este projeto:</p>

<p align="center">
  <img src="./Assets/Img/guida.png" alt="Guidinha" width="150"/>
  <img src="./Assets/Img/ryan.png" alt="Ryanzin, vulgo Fishy" width="150"/>
</p>

<p align="center">
  <strong>Guida &nbsp;&nbsp;&nbsp;&nbsp; Ryan</strong>
</p>
