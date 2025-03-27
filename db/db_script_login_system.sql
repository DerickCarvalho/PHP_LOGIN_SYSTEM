create table usuarios(
	id INT(11) primary key auto_increment,
	nome VARCHAR(100) not null,
	login VARCHAR(100) not null,
	senha VARCHAR(100) not null
);