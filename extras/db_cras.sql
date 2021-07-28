-- USE suas_macae;

-- CREATE TABLE IF NOT EXISTS enderecos(
--     id_endereco INT (6) AUTO_INCREMENT PRIMARY KEY,
--     tipo_endereco VARCHAR (20),
--     numero_endereco INT,
--     complemento_endereco VARCHAR (80),
--     cep CHAR(9),
--     logradouro VARCHAR (80),
--     bairro VARCHAR (80) NOT NULL
-- );

-- CREATE TABLE IF NOT EXISTS unidades(
--      id_unidade INT AUTO_INCREMENT PRIMARY KEY,
--      nome_unidade VARCHAR (80),
--      id_governo VARCHAR (80),
--      capacidade_atendimento INT,
--      data_inauguracao DATE,
--      horario_funcionamento VARCHAR (45),
--      endereco_unidade INT
-- );

-- CREATE TABLE IF NOT EXISTS telefones_unidades(
--     id_tel_uni INT AUTO_INCREMENT PRIMARY KEY,
--     unidade_telefone INT,
--     telefone_unidade VARCHAR (14),
--     FOREIGN KEY (unidade_telefone) REFERENCES unidades (id_unidade)

-- );

-- CREATE TABLE IF NOT EXISTS familias (
--     id_familia INT (6) AUTO_INCREMENT PRIMARY KEY,
<<<<<<< HEAD
--     data_inclusao DATE NOT NULL,
=======
--     data_entrada DATE NOT NULL,
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
--     ativo_familia BOOLEAN NOT NULL DEFAULT true,
--     data_desligamento DATE,
--     motivo_desligamento VARCHAR (100),
--     mulher_chefe BOOLEAN NOT NULL DEFAULT false,
--     perfil_creas BOOLEAN NOT NULL DEFAULT false,
--     tipo_moradia VARCHAR (20),
--     valor_moradia DOUBLE,
--     endereco_familia INT,
--     unidade_familia INT,
--     FOREIGN KEY (unidade_familia) REFERENCES unidades(id_unidade)
-- );
-- -- estado -> "REFERENCIA", "COMPOSICAO", "FALECIDA"
-- CREATE table IF NOT EXISTS pessoas(

--     id_pessoa INT(6) AUTO_INCREMENT  PRIMARY KEY,
--     nome_pessoa VARCHAR (80),
--     rg_pessoa VARCHAR (20),
--     cpf_pessoa VARCHAR (14),
--     nis VARCHAR (14),
--     data_nascimento DATE,
--     ativo_pessoa BOOLEAN NOT NULL DEFAULT true,
--     com_deficiencia BOOLEAN NOT NULL DEFAULT false,
--     composicao VARCHAR (12),
--     cor VARCHAR (15),
--     escolaridade VARCHAR (20),
--     estado VARCHAR (15),
--     sexo VARCHAR (15),
--     genero VARCHAR (60),
--     gestante BOOLEAN NOT NULL DEFAULT false,
--     no_scfv BOOLEAN NOT NULL DEFAULT false,
--     prioritario_scfv BOOLEAN NOT NULL DEFAULT false,
--     homonimo BOOLEAN NOT NULL DEFAULT false,
--     nome_mae VARCHAR (80),
--     ocupacao VARCHAR (60),
--     renda DOUBLE
-- );
-- -- ambito_beneficio -> "F" (federal), "E" (estadual), "M" (municipal)
-- CREATE TABLE IF NOT EXISTS beneficios(
--     id_beneficio INT (6) AUTO_INCREMENT PRIMARY KEY,
--     ambito_beneficio VARCHAR (20),
--     nome_beneficio VARCHAR (40),
--     valor_beneficio DOUBLE
-- );

-- CREATE TABLE IF NOT EXISTS pessoa_beneficio(
--     id_pes_ben INT (6) AUTO_INCREMENT PRIMARY KEY,
--     pessoa_ben INT,
--     beneficio_pes INT,
--     FOREIGN KEY (pessoa_ben) REFERENCES pessoas (id_pessoa),
--     FOREIGN KEY (beneficio_pes) REFERENCES beneficios (id_beneficio)
-- );
-- --  INSERT INTO funcionario 
-- --        (id,  
-- --         login,  
-- --         senha)  
-- --  VALUES (NULL,  
-- --      'admin',  
-- --      MD5('admin')); -> função MD5 para criptografar senhas

-- -- nível acesso -> "gestao" G , "coordenacao" C, "tecnico" T, "médio" M

-- CREATE TABLE IF NOT EXISTS funcionarios(
--     id_funcionario INT(6) AUTO_INCREMENT PRIMARY KEY,
--     nome_funcionario VARCHAR (80) NOT NULL,
--     cpf_funcionario VARCHAR (14),
--     escolaridade_funcionario VARCHAR (20),
--     data_nascimento_funcionario DATE,
--     email_funcionario VARCHAR (80) NOT NULL,
--     senha_funcionario VARCHAR (100),
--     telefone_funcionario VARCHAR (14),
--     nivel_acesso VARCHAR (20) NOT NULL,
--     profissao VARCHAR (40),
--     cargo VARCHAR (40),
--     vinculo VARCHAR (15),
--     unidade_funcionario INT NOT NULL,
--     ativo_funcionario BOOLEAN NOT NULL DEFAULT true
--     FOREIGN KEY (unidade_funcionario) REFERENCES unidades (id_unidade)
-- );

-- INSERT INTO funcionarios (id_funcionario, nome_funcionario, cpf_funcionario, escolaridade_funcionario,
--     data_nascimento_funcionario, email_funcionario, senha_funcionario, telefone_funcionario,
--     nivel_acesso, profissao, cargo, vinculo, unidade_funcionario)
-- VALUES (1, "admin", NULL, NULL, NULL, "coordenador@gmail.com", PASSWORD('a'), NULL, "C", NULL, NULL,
--     NULL, NULL);
-- INSERT INTO funcionarios (id_funcionario, nome_funcionario, cpf_funcionario, escolaridade_funcionario,
--     data_nascimento_funcionario, email_funcionario, senha_funcionario, telefone_funcionario,
--     nivel_acesso, profissao, cargo, vinculo, unidade_funcionario)
-- VALUES (2, "coord", NULL, NULL, NULL, "coordenador@gmail.com", PASSWORD('a'), NULL, "C", NULL, NULL,
--     NULL, NULL);
-- INSERT INTO funcionarios (id_funcionario, nome_funcionario, cpf_funcionario, escolaridade_funcionario,
--     data_nascimento_funcionario, email_funcionario, senha_funcionario, telefone_funcionario,
--     nivel_acesso, profissao, cargo, vinculo, unidade_funcionario)
-- VALUES (3, "tecnico", NULL, NULL, NULL, "tecnico@gmail.com", PASSWORD('a'), NULL, "T", NULL, NULL,
--     NULL, NULL);
-- INSERT INTO funcionarios (id_funcionario, nome_funcionario, cpf_funcionario, escolaridade_funcionario,
--     data_nascimento_funcionario, email_funcionario, senha_funcionario, telefone_funcionario,
--     nivel_acesso, profissao, cargo, vinculo, unidade_funcionario)
-- VALUES (4, "medio", NULL, NULL, NULL, "medio@gmail.com", PASSWORD('a'), NULL, "M", NULL, NULL,
--     NULL, NULL);

UPDATE funcionarios set senha_funcionario = "$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o." WHERE id_funcionario = 1
