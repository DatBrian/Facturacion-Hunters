CREATE DATABASE db_hunter_facture_brian;

use db_hunter_facture_brian;

CREATE TABLE
    tb_Users(
        cc INT(11) NOT NULL COMMENT 'Campo para el documento de identidad',
        name_com VARCHAR(57) NOT NULL COMMENT 'Campo para el nombre completo',
        age INTEGER(3) NOT NULL COMMENT 'Campo para la edad',
        PRIMARY KEY (cc)
    );

CREATE TABLE
    tb_Bill(
        n_bill VARCHAR(25) NOT NULL COMMENT 'Número de factura',
        bill_date DATETIME NOT NULL DEFAULT NOW() UNIQUE COMMENT 'Fecha de la factura',
        PRIMARY KEY(n_bill)
    );

CREATE TABLE
    tb_client(
        identification INT NOT NULL COMMENT 'Campo identificación para el cliente',
        full_name VARCHAR(50) NOT NULL COMMENT 'Campo para el nombre completo del cliente',
        email VARCHAR(50) NOT NULL COMMENT 'Campo para el email del cliente',
        address VARCHAR(50) NOT NULL COMMENT 'Campo para la dirección del cliente',
        phone VARCHAR(11) NOT NULL COMMENT 'Campo para el teléfono del cliente',
        PRIMARY KEY(identification)
    );

CREATE TABLE
    tb_product(
        id_product INT NOT NULL COMMENT 'Campo identificación para el producto',
        name_product VARCHAR(15) NOT NULL COMMENT 'Campo para el nombre del producto',
        amount INT NOT NULL COMMENT 'Campo para la cantidad del producto',
        value_product FLOAT NOT NULL COMMENT 'Campo para el valor del producto',
        PRIMARY KEY(id_product)
    );

CREATE TABLE
    tb_seller(
        id_seller INT NOT NULL COMMENT 'Campo para el id del vendedor',
        seller VARCHAR(60) NOT NULL COMMENT 'Campo para el nombre del vendedor',
        PRIMARY KEY(id_seller)
    );

CREATE TABLE
    tb_bill(
        n_bill VARCHAR(25) NOT NULL COMMENT 'Campo para el número de la factura',
        bill_date DATETIME NOT NULL COMMENT 'Campo para la fecha de la factura',
        fk_identificacion INT NOT NULL COMMENT 'LLave foranea para la identificacion del cliente',
        fk_id_seller INT NOT NULL COMMENT 'Llave foranea para la identificacion del cliente',
        fk_id_product INT NOT NULL COMMENT 'Llave foranea para la identificacion del producto',
        PRIMARY KEY(n_bill)
    );

ALTER TABLE tb_bill
ADD
    FOREIGN KEY (fk_identificacion) REFERENCES tb_client (identification),
ADD
    FOREIGN KEY(fk_id_seller) REFERENCES tb_seller (id_seller),
ADD
    FOREIGN KEY (fk_id_product) REFERENCES tb_product (id_product);

INSERT INTO tb_client(identification, full_name, email, address, phone) VALUES ('1097490746', 'Brian Kaleth Melo Arroyo', 'vikard.2005@hotmail.com', 'CAlle 58', '3118779881');

SELECT full_name AS "all_names_ñ" FROM tb_client;

USE db_hunter_facture;

INSERT INTO tb_client(identificacion, full_name, email, address, phone) VALUES (1097490746,
'Brian Kaleth Melo Arroyo',
'vikard.2005@hotmail.com',
'CAlle 58',
'3118779881');