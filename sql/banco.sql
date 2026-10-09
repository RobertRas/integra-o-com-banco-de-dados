create database crud_yt;

use crud_yt;

create table pessoa(
    id_pessoa int primary key auto_increment,
    nome varchar (255) not null,
    foto LONGBLOB
);

create table usuario(
    id_usuario int primary key auto_increment,
    email varchar (255) not null,
    senha varchar (255) not null,
    id_pessoa int,
    nivel_acesso varchar (50) default 1
);