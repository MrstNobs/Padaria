CREATE BATABASE padaria
USE padaria

CREATE TABLE comprador (
    id INT(11) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(40) NOT NULL,
    endereco VARCHAR(40) NOT NULL
);

CREATE TABLE itemVenda (
    id INT(11) NOT NULL,
    venda_id INT(11) NOT NULL,
    produto_id INT(11) NOT NULL,
    quantidade INT(11) NOT NULL,
    subtotal FLOAT NOT NULL
);

CREATE TABLE venda (
    id INT(11) NOT NULL,
    `data` date NOT NULL,
    comprador_id INT(11) NOT NULL,
    item_id VARCHAR(255) NOT NULL
);

CREATE TABLE produto (
    id INT(11) NOT NULL,
    nome_produto VARCHAR(40) NOT NULL
);


ALTER TABLE comprador 
    ADD PRIMARY KEY (id)

ALTER TABLE itemVenda
    ADD PRIMARY KEY (id),
    ADD KEY (venda_id),
    ADD KEY (produto_id)

ALTER TABLE venda
    ADD PRIMARY KEY (id),
    ADD KEY (comprador_id),
    ADD KEY (item_id)

ALTER TABLE produto
    ADD PRIMARY KEY (id)


ALTER TABLE comprador 
    MODIFY (id) INT(11) NOT NULL AUTO_INCREMENT

ALTER TABLE itemVenda 
    MODIFY (id) INT(11) NOT NULL AUTO_INCREMENT

ALTER TABLE venda 
    MODIFY (id) INT(11) NOT NULL AUTO_INCREMENT

ALTER TABLE produto
    MODIFY id INT(11) NOT NULL AUTO_INCREMENT


ALTER TABLE venda 
    ADD CONSTRAINT FOREIGN KEY (comprador_id) REFERENCES comprador (id),
    ADD CONSTRAINT FOREIGN KEY (item_id) REFERENCES itemVenda (id)

ALTER TABLE itemVenda
    ADD CONSTRAINT FOREIGN KEY (venda_id) REFERENCES venda (id),
    ADD CONSTRAINT FOREIGN KEY (produto_id) REFERENCES produto (id)