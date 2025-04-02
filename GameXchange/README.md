GameXchange

GameXchange é um marketplace para compra, venda e troca de jogos. O site é desenvolvido em PHP e utiliza MySQL para armazenamento de dados, garantindo um sistema de login seguro e um painel para gerenciamento de produtos.

Tecnologias Utilizadas

PHP: Linguagem principal para backend.

MySQL: Banco de dados para armazenar usuários e produtos.

HTML, CSS e JavaScript: Para a estruturação e estilização do site.

PDO (PHP Data Objects): Para conexão segura com o banco de dados.

Sessions: Para controle de login e autenticação.

Funcionalidades

1. Cadastro de Usuário

Arquivo: registro.php

Permite que novos usuários se cadastrem com nome, e-mail e senha.

Senhas são armazenadas de forma segura usando hash (password_hash).

Evita cadastro duplicado de e-mails.

2. Login de Usuário

Arquivo: login.php

Usuários podem fazer login usando e-mail e senha.

O sistema verifica as credenciais no banco de dados.

Utiliza password_verify para validar a senha.

Mantém a sessão ativa para o usuário logado.

3. Dashboard

Arquivo: dashboard.php

Exibe informações do usuário logado.

Possibilita a gestão de produtos (futuramente).

Usuário pode sair através do botão de logout.

4. Logout

Arquivo: logout.php

Finaliza a sessão do usuário.

Redireciona para a página de login.

5. Banco de Dados

Arquivo: config.php

Configura a conexão com o banco de dados MySQL usando PDO.

Controla erros de conexão e evita SQL Injection.

Estrutura das tabelas:

CREATE DATABASE gamexchange;
USE gamexchange;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    nome VARCHAR(255) NOT NULL,
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    imagem VARCHAR(255),
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

Instalação e Configuração

Clone o repositório:

git clone https://github.com/seu-usuario/gamexchange.git

Configure o Banco de Dados:

Importe o arquivo SQL para criar as tabelas.

Ajuste as credenciais no config.php.

Rodando o Projeto:

Utilize um servidor local como XAMPP ou Laragon.

Coloque os arquivos na pasta htdocs.

Acesse via navegador: http://localhost/gamexchange
