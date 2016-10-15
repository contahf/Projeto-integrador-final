--primeiro criar o banco projetointegrador
--abra outro sql e execute o scrip abaixo
 
create table curso (

numero integer primary key,
nome varchar(150) not null,
sigla char(3) not null

);


create table disciplina (

codigo integer primary key,
nome varchar(80) not null,
ch integer not null

);

create table aluno(

matricula char(15) primary key,
nome varchar(80) not null,
sexo char(1) not null,
dtnasc date not null,
cidade varchar(40) not null,
uf  char(2) not null

);

create table usuario (

login varchar(20) primary key,
senha varchar(50) not null,
nome varchar(80)not null,
categoria char(1)not null,
situacao char(1) not null

);


create table projeto(

numero serial primary key,
ano integer not null,
semestre integer not null,
modulo char(3) not null,
dt_inicio date not null,
dt_termino date not null,
tema varchar(100) not null,
descricao varchar(8000) not null,
num_curso integer not null
);


create table composto(

num_proj  integer,
cod_disc integer,
desc_atividade varchar(2000) not null,
primary key (num_proj, cod_disc)
);


create table grupo(

id integer primary key,
nome varchar(60),
num_proj integer not null 

);


create table participa(

matricula char(15) not null,
id_grupo integer not null ,
nota numeric(3,1),

primary key(matricula,id_grupo)
);


ALTER TABLE projeto ADD CONSTRAINT fk_projeto
	FOREIGN KEY (num_curso) 
		REFERENCES curso(numero);

--adicionar as chaves estrangeiras de acordo com a modelagem

ALTER TABLE composto
	add constraint fk_projeto foreign key (num_proj) references projeto (numero);

ALTER TABLE composto
	add constraint fk_disc foreign key (cod_disc) references disciplina (codigo);

--adicionar as chaves estrangeiras de acordo com a modelagem
ALTER TABLE grupo ADD CONSTRAINT fk_grupo 
	FOREIGN KEY (num_proj) 
		REFERENCES projeto(numero);
	
	
ALTER TABLE participa ADD CONSTRAINT fk_participa
	FOREIGN KEY ( matricula ) 
		REFERENCES aluno( matricula );

ALTER TABLE participa ADD CONSTRAINT fk_grupo
	FOREIGN KEY ( id_grupo ) 
		REFERENCES grupo( id );