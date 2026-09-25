create database crud_yt;

use crud_yt;

create table pessoa(
    id_pessoa int primary key auto_increment,
    nome varchar (255) not null
);

-- seeds
insert into pessoas (nome) values ("João"),("Maria"),("Ana"),("Lucas");