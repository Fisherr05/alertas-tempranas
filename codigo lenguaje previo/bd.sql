CREATE DATABASE PLANTACION;
USE PLANTACION;
CREATE TABLE PLANTA(
    idPlanta BIGINT unsigned not null auto_increment,
    nombrePlanta varchar(80) not null,
    PRIMARY KEY(idPlanta)
);
CREATE TABLE FRUTO(
    idFruto BIGINT unsigned not null auto_increment,
    nombreFruto varchar(80) not null,
    PRIMARY KEY(idFruto)
);
CREATE TABLE PF(
    idPlanta BIGINT unsigned not null,
    idFruto BIGINT unsigned not null,
    fecha   DATE not null,
    incidencia  varchar(100),
    severidad   varchar(100),
    FOREIGN KEY (idPlanta) REFERENCES PLANTA(idPlanta)on update cascade on delete cascade,
    FOREIGN KEY (idFruto) REFERENCES FRUTO(idFruto)on update cascade on delete cascade,
    PRIMARY KEY(idPlanta,idFruto)
);
INSERT INTO PLANTA (nombrePlanta) VALUE ('PLANTA1');