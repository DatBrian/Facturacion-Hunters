CREATE DATABASE BrianDB;
use BrianDB;
CREATE TABLE tb_Users(
    cc INT(11) NOT NULL COMMENT 'Campo para el documento de identidad',
    name_com VARCHAR(57) NOT NULL COMMENT 'Campo para el nombre completo' ,
    age INTEGER(3) NOT NULL COMMENT 'Campo para la edad',
    PRIMARY KEY (cc)
)