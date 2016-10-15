create database projetointegrador

create table curso (

numero integer not null primary key,
nome varchar(150) not null,
sigla char(3) not null


);


create table disciplina (

codigo integer not null primary key,
nome varchar(80) not null,
ch integer not null
);

create table aluno(


matricula char(15) not null primary key,
nome varchar(80) not null,
sexo char(1) not null,
dtnasc date not null,
cidade varchar(40) not null,
uf  char(2) not null

);

create table usuario (

loginc varchar(20) not null primary key,
senha varchar(80) not null,
nome varchar(80)not null,
categoria char(1)not null,
situacao char(1) not null


);


create table projeto(

numero serial not null primary key,
ano integer not null,
semestre integer not null,
modulo char(3) not null,
dt_inicio date not null,
dt_termino date not null,
tema varchar(100) not null,
descricao varchar(8000) not null,
num_curso integer not null

);

ALTER TABLE projeto ADD CONSTRAINT fk_projeto
FOREIGN KEY ( num_curso ) 
REFERENCES curso( numero) ;




create table composto(

num_proj  integer not null  ,
cod_disc integer not null  ,
desc_atividade varchar(2000) not null,

 CONSTRAINT pk_CE primary key(num_proj,cod_disc)
);

drop table composto

-- Foi criado a chave primaria composto devido o documento exigir duas chaves primarias



create table grupo(

id integer not null primary key ,
nome varchar(60),
num_proj integer not null 
);

-- Verificar essa alteração abaixo devido a tabela grupo tem chave primaria composto não conseguindo fazer o relacionamento
ALTER TABLE grupo ADD CONSTRAINT fk_grupo 
FOREIGN KEY ( num_proj ) 
REFERENCES composto( num_proj) ;

ALTER TABLE grupo
DROP CONSTRAINT fk_grupo;

drop table grupo
create table participa(

matricula char(15) not null,
id_grupo integer not null ,
nota numeric(3,1),

CONSTRAINT pk_CO primary key(matricula,id_grupo)
);
-- Foi criado a chave primaria composto devido o documento exigir duas chaves primarias
ALTER TABLE participa ADD CONSTRAINT fk_participa
FOREIGN KEY ( matricula ) 
REFERENCES aluno( matricula ) ;

ALTER TABLE participa ADD CONSTRAINT fk_grupo
FOREIGN KEY ( id_grupo ) 
REFERENCES grupo( id ) ;