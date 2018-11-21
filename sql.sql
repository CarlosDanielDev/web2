CREATE TABLE usuarios(
	id int NOT null PRIMARY KEY AUTO_INCREMENT,
    login varchar(100) NOT null,
    senha varchar(32) NOT null,
    adm varchar(1) NOT NULL default 0
);

INSERT INTO usuarios(login, senha) VALUES ('027.322.982-63','admin');
select md5('admin');