-- ===========================================================================
-- ARA0062 — STARK SHOP — o banco do projeto
-- Ciclo 9: rode este arquivo uma vez no phpMyAdmin (aba SQL → Executar).
-- Ele cria o banco e a tabela; o banco não vai para o GitHub, este arquivo vai.
-- ===========================================================================

CREATE DATABASE IF NOT EXISTS stark_shop
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE stark_shop;

-- uma linha por mensagem do formulário "Fale Conosco / Agendamento"
-- as colunas têm os mesmos nomes do name de cada campo do formulário
CREATE TABLE IF NOT EXISTS mensagens (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    nome       VARCHAR(60)  NOT NULL,
    pet        VARCHAR(30)  NOT NULL,
    assunto    VARCHAR(20)  NOT NULL,
    mensagem   TEXT         NOT NULL,
    criada_em  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP
);
