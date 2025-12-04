-- Criando a tabela "usuarios" que armazenará os dados de login
CREATE TABLE usuarios (

    -- Coluna "id" : identificador único para cada usuário
    -- INT = número inteiro
    -- AUTO_INCREMENT = o MySql incrementa automaticamente (1, 2, 3, ...)
    -- PRIMARY KEY = chave primária da tabela
id INT AUTO_INCREMENT PRIMARY KEY,

-- Coluna "nome": armazena o nome da pessoa
-- VARCHAR(100) = texto de até 100 caracteres
-- NOT NULL = não pode ser deixado vazio
nome VARCHAR(100) NOT NULL,

-- Coluna "email" : guarda o email do usuário
email VARCHAR(150) NOT NULL UNIQUE,

-- Coluna "senha": armazena a senha criptografada
-- VARCHAR(255) = tamanho suficiente para o hash da senha
-- NOT NULL = obrigatório
senha VARCHAR(255) NOT NULL
);