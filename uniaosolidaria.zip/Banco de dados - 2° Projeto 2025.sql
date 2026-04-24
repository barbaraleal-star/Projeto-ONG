CREATE DATABASE uniao_solidaria_db;
USE uniao_solidaria_db;

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha_hash VARCHAR(255) NOT NULL
);

CREATE TABLE doacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_doador VARCHAR(100) NOT NULL,
    email_doador VARCHAR(100) NOT NULL,
    cpf_doador CHAR(14) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    chave_pix_destino VARCHAR(150) NOT NULL DEFAULT 'Financeiro@uniaosolidaria.org.br',
    data_doacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pendente', 'confirmada', 'cancelada') DEFAULT 'confirmada'
);

CREATE TABLE logs_acesso (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_admin INT,
    acao VARCHAR(255) NOT NULL,
    ip VARCHAR(45),
    data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_admin) REFERENCES admins(id)
);

SELECT nome_doador, valor, data_doacao
FROM doacoes
WHERE status = 'confirmada'
ORDER BY data_doacao DESC;


INSERT INTO admins (nome, email, senha_hash)
VALUES ('Administrador', 'admin@uniaosolidaria.com.br', 'uniaoadmin');

INSERT INTO doacoes (nome_doador, email_doador, cpf_doador, valor)
VALUES
('Maria Silva', 'maria@gmail.com', '123.456.789-00', 50.00),
('Carlos Souza', 'carlos@hotmail.com', '987.654.321-00', 120.00),
('Fernanda Lima', 'fernanda.lima@gmail.com', '321.654.987-00', 80.00),
('Ricardo Alves', 'ricardo.alves@yahoo.com', '654.987.321-00', 200.00),
('Juliana Pereira', 'juliana.p@hotmail.com', '789.123.456-00', 150.00);

INSERT INTO logs_acesso (id_admin, acao, ip)
VALUES (1, 'Login realizado com sucesso', '192.168.0.10');
