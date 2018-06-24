USE MeLivro;

INSERT INTO PESSOA(CPF, NOME, EMAIL, SENHA,ADMIN)
VALUES ('01987223250', 'Teste', 'mme.ufpel.edu.br', '1234', '0'),
('01921233122', 'Jaspiowwn', 'jaspiwwon@hotmail.com', '123456', '0'),
('01937243253', 'Messias', 'messia@hhha.com', '1234', '1'),
('03247223254', 'Indio', 'indio@inf.ufpel.edu.br', '4434', '1'),
('05251233125', 'Carlos', 'carlos@hotmail.com', '12345677', '0'),
('01467243256', 'Zum', 'zum@hotmail.com', '1234', '1'),
('01377223257', 'Paulo', 'paulo@inf.ufpel.edu.br', '1234', '0'),
('01181233128', 'Joaquim', 'Joaquim@hotmail.com', '1256', '0'),
('01681233129', 'Jaspion', 'jaspion@hotmail.com', '123456', '0');

INSERT INTO usuario(cidade, endereco, telefone, sexo, cpf) 
VALUES ('Pelotas', 'Goncalves Chaves 1003', '32821525', 'M', '01987223250'),
('Pelotas', 'Goncalves Chaves 1003', '32221525', 'F', '01921233122'),
('Pelotas', 'Quinze de novembro 2009', '77777777', 'F', '01937243253'),
('Pelotas', 'Quinze de novembro 2100', '88888888', 'M', '03247223254'),
('Pelotas', 'Gomes Carneiro 4080', '101010101', 'M', '05251233125'),
('Pelotas', 'Gomes Carneiro 900', '333333333', 'M', '01467243256'),
('Pelotas', 'Goncalves Chaves 700', '1212121212', 'M', '01377223257'),
('Pelotas', 'Goncalves Chaves 723', '6666666666', 'M', '01181233128'),
('Pelotas', 'Goncalves Chaves 723', '102910290', 'M', '01681233129');


INSERT INTO PRODUTO(CODPROD, DESCRICAO, IMAGEM, PRECO, TITULO)
VALUES ('1', 'Livro do bira', 'url', '25,50', 'Biografia Bira'),
('2', 'Livro dois', 'url2', '22,50', 'Livro dois'),
('3', 'Livro tres', 'url3', '10', 'Biografia tres'),
('4', 'Artigo 1', 'urlArtigo1', '5,50', 'Artigo1'),
('5', 'Artigo 2', 'urlArtigo2', '2,50', 'Artigo dois'),
('6', 'Revista buena', 'urlbuena', '10,50', 'Revista'),
('7', 'Revista Minha', 'urlminha', '3,50', 'Revista minha');


INSERT INTO LIVRO(AUTOR, CODPROD, EDICAO, ISBN)
VALUES ('Bira', '1', '2', '123455'),
('Manuel Madeira', '2', '1', '123455'),
('Manuel Madeira', '3', '3', '123455');

INSERT INTO REVISTA(ISSN, EDITORA, CODPROD)
VALUES ('524523', 'Abril', '6'),
('52432', 'Globo', '7');

INSERT INTO PAPER(AUTOR, COAUTOR, AREA_CONHECIMENTO,ANO_PUBLICACAO,INSTITUICAO,CODPROD)
VALUES ('Manuel Correia', '','Exatas', '2002', 'UFPEL', '4'),
('Miguelito', '','Humanas', '2012', 'UCPEL', '5');


INSERT INTO PAGAMENTO(CODPAG,METODO_PAG,VALOR,CONCRETIZADO)
VALUES('0','Cartão','65.0',1),
('1','Boleto','90.0',0),
('2','PayPal','20.5',1),
('3','Transferência Bancária','42.5',1);
