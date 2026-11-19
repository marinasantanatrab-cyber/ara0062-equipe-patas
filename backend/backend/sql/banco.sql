-- ===========================================================================
-- ARA0062 - STARK SHOP - banco.sql
-- Cria o banco stark_shop e todas as tabelas que o projeto usa.
-- Como usar: no phpMyAdmin, aba "Importar", escolher este arquivo e executar.
-- ===========================================================================

CREATE DATABASE IF NOT EXISTS stark_shop
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE stark_shop;

-- mensagens: o que chega do formulário "Fale Conosco / Agendamento"
-- (gravado por backend/controllers/processa-contato.php
--  e listado por backend/controllers/mensagens.php)
CREATE TABLE IF NOT EXISTS mensagens (
    id        INT AUTO_INCREMENT PRIMARY KEY,
    nome      VARCHAR(60)  NOT NULL,
    pet       VARCHAR(30)  NOT NULL,
    assunto   VARCHAR(20)  NOT NULL,
    mensagem  VARCHAR(500) NOT NULL,
    criado_em DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- duas mensagens de exemplo, para a tela de listagem não começar vazia
INSERT INTO mensagens (nome, pet, assunto, mensagem) VALUES
    ('Ana Souza',  'Thor', 'agendamento', 'Banho e tosa no sábado de manhã.'),
    ('Carlos Lima', 'Mel', 'duvida',      'Vocês aceitam gatos no hotel?');
