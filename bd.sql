CREATE DATABASE ANALISIS;
USE ANALISIS;

CREATE TABLE FINCA(
    idFinca BIGINT unsigned not null auto_increment,
    nombreFinca varchar(100),
    propietarioFinca varchar(100),
    coFinca varchar(100),
    PRIMARY KEY (idFinca)
);

CREATE TABLE ZONA(
    idZona BIGINT unsigned not null auto_increment,
    idFinca BIGINT unsigned not null,
    nombreZona varchar(100),
    canton varchar(100),
    parroquia varchar(100),
    localidad varchar(100),
    coZona varchar(100),
    FOREIGN KEY (idFinca) REFERENCES FINCA(idFinca),
    PRIMARY KEY (idZona)   
);

CREATE TABLE ESTUDIO(
    idEstudio BIGINT unsigned not null auto_increment,
    idFinca BIGINT unsigned not null,
    fenologia varchar(100),
    densidad varchar(100),
    fechaInicio date,
    fechaFin date,
    activo varchar(100),
    FOREIGN KEY (idFinca) REFERENCES FINCA(idFinca),
    PRIMARY KEY (idEstudio)   
);

CREATE TABLE MONITOREO(
    idMonitoreo BIGINT unsigned not null auto_increment,
    idEstudio BIGINT unsigned not null,
    fechaPlanificada date,
    fechaEjecucion date,
    observaciones varchar(100),
    FOREIGN KEY (idEstudio) REFERENCES ESTUDIO(idEstudio),
    PRIMARY KEY (idMonitoreo)   
);

CREATE TABLE TECNICO(
    idTecnico BIGINT unsigned not null auto_increment,
    idMonitoreo BIGINT unsigned not null,
    nombreTecnico varchar(100),
    institucion varchar(100),
    telefono varchar(100),
    email varchar(100),
    activo varchar(100),
    FOREIGN KEY (idMonitoreo) REFERENCES MONITOREO(idMonitoreo),
    PRIMARY KEY (idTecnico)   
);

CREATE TABLE DATOS(
    idDatos BIGINT unsigned not null auto_increment,
    idMonitoreo BIGINT unsigned not null,
    incidencia varchar(100),
    severidad varchar(100),
    planta BIGINT unsigned not null,
    fruto BIGINT unsigned not null,
    FOREIGN KEY (idMonitoreo) REFERENCES MONITOREO(idMonitoreo),
    PRIMARY KEY (idDatos)
);
 CREATE TABLE ARCHIVO(
    idArchivo BIGINT unsigned not null auto_increment,
    idMonitoreo BIGINT unsigned not null,
    descripcion varchar(100),
    FOREIGN KEY (idMonitoreo) REFERENCES MONITOREO(idMonitoreo),
    PRIMARY KEY (idArchivo)
 );

 CREATE TABLE VARIEDAD(
    idVariedad BIGINT unsigned not null auto_increment,
    descripcion varchar(100),
    PRIMARY KEY (idVariedad)
 );


