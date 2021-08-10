CREATE DATABASE `desenv_crud` COLLATE 'utf8_general_ci';

USE desenv_crud;

CREATE TABLE desenv (
    ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(255) NOT NULL,
    DataNascimento DATE NOT NULL,
    Sexo ENUM('M','F') NULL,
    Idade INT,
    Hobby VARCHAR(100)
);