Create database escola;
use escola;

CREATE USER 'lescola'@'localhost' IDENTIFIED BY 'lescola';
GRANT ALL PRIVILEGES ON escola.* TO 'lescola'@'localhost';

create table pessoas (
	cpf int(7) not null,
	p_nome varchar(20) not null,
	p_sobrenome varchar(20) not null,
	p_nascimento varchar(7) ,
	primary key (cpf)
);

insert into pessoas values (1,'Roman','belic',null);
insert into pessoas values (2,'Ronald','Rosse',null);
insert into pessoas values (3,'German','Mara',null);