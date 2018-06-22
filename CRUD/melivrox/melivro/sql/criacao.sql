DROP DATABASE IF EXISTS Melivro;
CREATE DATABASE Melivro;

USE Melivro;

-- Tabela generica com dados que são compartilhados por todas as pessoas que possuem acesso ao sistema
CREATE TABLE IF NOT EXISTS pessoa(
    CPF  VARCHAR(14) NOT NULL,
    NOME VARCHAR(30) NOT NULL,
    EMAIL VARCHAR(30) NOT NULL,
    SENHA VARCHAR(15) NOT NULL,
    ADMIN TINYINT(1) NOT NULL, -- 0 = False  1 = True
    PRIMARY KEY(CPF)
);

CREATE TABLE IF NOT EXISTS usuario(
    CIDADE VARCHAR(20) NOT NULL,
    ENDERECO VARCHAR(30) NOT NULL,
    TELEFONE VARCHAR(16) NOT NULL,
    SEXO VARCHAR(1) NOT NULL,
    CPF VARCHAR(14) NOT NULL,
    FOREIGN KEY(CPF) REFERENCES pessoa(CPF)
);

-- Tabela generica referente aos produtos que serão cadastrados pelos usuarios
CREATE TABLE IF NOT EXISTS produto(
    CODPROD INT NOT NULL,
    TITULO VARCHAR(35) NOT NULL,
    PRECO DECIMAL(5,2) NOT NULL,
    DESCRICAO VARCHAR(52)  NOT NULL,
    IMAGEM VARCHAR(52) NOT NULL,
    PRIMARY KEY(CODPROD)
);

CREATE TABLE IF NOT EXISTS livro(
    AUTOR VARCHAR(25) NOT NULL,
    ISBN  VARCHAR(30) NOT NULL,
    EDICAO INT NOT NULL,
    CODPROD INT NOT NULL,
    FOREIGN KEY(CODPROD) REFERENCES produto(CODPROD)
);


CREATE TABLE IF NOT EXISTS revista(
    ISSN  VARCHAR(30) NOT NULL,
    EDITORA VARCHAR(25) NOT NULL,
    CODPROD INT NOT NULL,
    FOREIGN KEY(CODPROD) REFERENCES produto(CODPROD)
);


CREATE TABLE IF NOT EXISTS PAPER(
    AUTOR VARCHAR(30) NOT NULL,
    COAUTOR VARCHAR(32),
    AREA_CONHECIMENTO VARCHAR(20) NOT NULL,
    ANO_PUBLICACAO YEAR NOT NULL,
    INSTITUICAO  VARCHAR(20) NOT NULL,
    CODPROD INT NOT NULL,
    FOREIGN KEY(CODPROD) REFERENCES produto(CODPROD)
);

-- Tabela referente aos anúncios que serão cadastrados pelos usuários
CREATE TABLE IF NOT EXISTS ANUNCIO(
    CODANUNCIO INT NOT NULL,
    TIPO_produto VARCHAR(15) NOT NULL,
    ATIVO TINYINT(1) NOT NULL, -- 0 = False  1 = True
    DATA_PUBLICACAO DATE NOT NULL,
    CPF VARCHAR(14) NOT NULL,
    CODPROD INT NOT NULL,
    PRIMARY KEY(CODANUNCIO),
    FOREIGN KEY(CPF) REFERENCES usuario(CPF),
    FOREIGN KEY(CODPROD) REFERENCES produto(CODPROD)
);

-- Tabela referente aos pedidos realizados pelo usuário
CREATE TABLE IF NOT EXISTS PEDIDO(
    CODPEDIDO INT NOT NULL,
    STATUS_PED TINYINT(1) NOT NULL, -- 0 = False  1 = True
    DATA_PEDIDO DATE NOT NULL,
    CPF VARCHAR(14) NOT NULL,
    PRIMARY KEY(CODPEDIDO),
    FOREIGN KEY(CPF) REFERENCES usuario(CPF)
);

-- Tabela referente ao produto pedido pelo usuário
CREATE TABLE IF NOT EXISTS produto_PEDIDO(
    CODPROD INT NOT NULL,
    CODPEDIDO INT NOT NULL,
    PRIMARY KEY(CODPROD, CODPEDIDO),
    FOREIGN KEY(CODPEDIDO) REFERENCES PEDIDO(CODPEDIDO),
    FOREIGN KEY(CODPROD) REFERENCES produto(CODPROD)
);


-- Tabela referente ao pagamento de alguma compra realizada
CREATE TABLE IF NOT EXISTS PAGAMENTO(
    CODPAG INT NOT NULL,
    METODO_PAG VARCHAR(30) NOT NULL,
    VALOR DECIMAL(10,2) NOT NULL,
    CONCRETIZADO TINYINT(1) NOT NULL, -- 0 = False  1 = True
    PRIMARY KEY(CODPAG)
);


-- Tabela referente a venda de produto
CREATE TABLE IF NOT EXISTS VENDA(
    CODVENDA INT NOT NULL,
    VALOR_VENDA DECIMAL(10,2) NOT NULL,
    DATA_VENDA DATE NOT NULL,
    CPF VARCHAR(14) NOT NULL,
    CODPAG INT NOT NULL,
    PRIMARY KEY(CODVENDA),
    FOREIGN KEY(CPF) REFERENCES usuario(CPF),
    FOREIGN KEY(CODPAG) REFERENCES PAGAMENTO(CODPAG)
);

-- Tabela referente a venda de algum produto pedido
CREATE TABLE IF NOT EXISTS VENDA_PEDIDO(
    CODPEDIDO INT NOT NULL,
    CODVENDA INT NOT NULL,
    PRIMARY KEY(CODPEDIDO,CODVENDA),
    FOREIGN KEY(CODPEDIDO) REFERENCES PEDIDO(CODPEDIDO),
    FOREIGN KEY(CODVENDA) REFERENCES VENDA(CODVENDA)
);

-- Tabela referente a avalição da compra realizada pelo usuário
CREATE TABLE IF NOT EXISTS AVALIACAO(
    CODAVALIACAO INT NOT NULL,
    NOTA INT NOT NULL,
    COMENTARIO VARCHAR(35) NOT NULL,
    CPF VARCHAR(14) NOT NULL,
    PRIMARY KEY(CODAVALIACAO),
    FOREIGN KEY(CPF) REFERENCES usuario(CPF)
);

CREATE TABLE IF NOT EXISTS pessoa(
    CPF  VARCHAR(14) NOT NULL,
    NOME VARCHAR(30) NOT NULL,
    EMAIL VARCHAR(30) NOT NULL,
    SENHA VARCHAR(15) NOT NULL,
    ADMIN TINYINT(1) NOT NULL, -- 0 = False  1 = True
    PRIMARY KEY(CPF)
);