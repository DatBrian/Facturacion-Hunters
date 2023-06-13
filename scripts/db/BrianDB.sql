CREATE DATABASE db_hunter_facture_brian;
use db_hunter_facture_brian;
CREATE TABLE tb_Users(
    cc INT(11) NOT NULL COMMENT 'Campo para el documento de identidad',
    name_com VARCHAR(57) NOT NULL COMMENT 'Campo para el nombre completo' ,
    age INTEGER(3) NOT NULL COMMENT 'Campo para la edad',
    PRIMARY KEY (cc)
);

CREATE TABLE tb_Bill(
    n_bill VARCHAR(25) NOT NULL COMMENT 'Número de factura',
    bill_date DATETIME NOT NULL DEFAULT NOW() UNIQUE COMMENT 'Fecha de la factura',
    PRIMARY KEY(n_bill)
);