Use suas_macae;
CREATE TABLE funcionarios (
    id_funcionario int AUTO_INCREMENT PRIMARY KEY, 
    nome_funcionario VARCHAR(80), 
    cpf_funcionario VARCHAR(14),
    escolaridade_funcionario VARCHAR(80), 
    data_nascimento_funcionario DATE,
    email_funcionario VARCHAR(80),
    senha_funcionario VARCHAR(100), 
    telefone_funcionario VARCHAR(14), 
    nivel_acesso int, profissao VARCHAR(40),
    cargo VARCHAR(50), 
    vinculo VARCHAR(15), 
    unidade_funcionario INT, 
    ativo_funcionario BOOLEAN NOT NULL DEFAULT true, 
    data_desligamento DATE,
    desligado_por INT);

CREATE TABLE unidades (
    id_unidade int AUTO_INCREMENT PRIMARY KEY,
    nome_unidade VARCHAR(80),
    id_governo VARCHAR(80),
    capacidade_atendimento INT,
    data_inauguracao DATE,
    horario_funcionamento VARCHAR(45),
    tipo_unidade VARCHAR(20),
    logradouro VARCHAR(100),
    num_endereco int,
    tel1_unidade VARCHAR (20),
    tel2_unidade VARCHAR (20),
    bairro_unidade VARCHAR(80));

CREATE TABLE bairros (
    id_bairro int AUTO_INCREMENT PRIMARY KEY,
    nome_bairro VARCHAR(80),
    unidade_bairro INT,
    FOREIGN KEY fk_uni_bai (unidade_bairro) REFERENCES unidades (id_unidade));

CREATE TABLE familias (
        id_familia INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        data_inclusao DATE,
        ativo_familia BOOLEAN DEFAULT true,
        perfil_creas BOOLEAN NOt NULL DEFAULT false,
        mulher_chefe BOOLEAN NOt NULL DEFAULT false,
        descumprimento BOOLEAN NOt NULL DEFAULT false,
        trabalho_infantil BOOLEAN NOt NULL DEFAULT false,
        acolhimento BOOLEAN NOt NULL DEFAULT false,
        data_desligamento DATE,
        motivo_desligamento VARCHAR (100),
        tipo_moradia VARCHAR (20),
        valor_moradia DOUBLE,
        logradouro VARCHAR (100),
        tipo_endereco VARCHAR (20),
        complemento_endereco VARCHAR (80),
        ponto_referencia VARCHAR (200),
        cep VARCHAR (10),
        num_endereco INT,
        telefone1 VARCHAR (20),
        telefone2 VARCHAR (20),
        telefone3 VARCHAR (20),
        nome1 VARCHAR (20),
        nome2 VARCHAR (20),
        nome3 VARCHAR (20),
        bairro INT,
        unidade_familia INT,
        referencia_familiar INT,
        forma_ingresso TEXT,
        demandas_iniciais TEXT,
        FOREIGN KEY fk_bairro (bairro) REFERENCES bairros (id_bairro),
        FOREIGN KEY fk_uni_fam (unidade_familia) REFERENCES unidades (id_unidade)
    );

CREATE TABLE pessoas (
    id_pessoa int AUTO_INCREMENT PRIMARY KEY,
    nome_pessoa VARCHAR(80),
    rg_pessoa VARCHAR(20),
    cpf_pessoa VARCHAR(14),
    nis VARCHAR(14),
    data_nascimento DATE,
    ativo_pessoa BOOLEAN NOT NULL DEFAULT false,
    com_deficiencia BOOLEAN NOt NULL DEFAULT false,
    no_scfv BOOLEAN NOt NULL DEFAULT false,
    prioritario_scfv BOOLEAN NOt NULL DEFAULT false,
    gestante BOOLEAN NOt NULL DEFAULT false,
    homonimo BOOLEAN NOt NULL DEFAULT false,
    vinculo_formal BOOLEAN NOt NULL DEFAULT false,
    rf BOOLEAN NOt NULL DEFAULT false,
    composicao VARCHAR(30),
    cor VARCHAR(15),
    escolaridade VARCHAR(20),
    estado VARCHAR(15),
    sexo VARCHAR(15),
    genero VARCHAR(60),
    nome_mae VARCHAR(80),
    nome_pai VARCHAR(80),
    ocupacao VARCHAR(60),
    renda DOUBLE,
    data_parto DATE,
    ultimo_atendimento INT,
    familia_pessoa INT,
    FOREIGN KEY fk_fam_pes (familia_pessoa) REFERENCES familias (id_familia),
    FOREIGN KEY fk_ult_aten (ultimo_atendimento) REFERENCES atenimentos (id_atenimento)
    );

    

    CREATE TABLE beneficios_tipo (
        id_beneficio INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        ambito_beneficio VARCHAR (40),
        nome_beneficio VARCHAR (60),
        ativo_beneficio BOOLEAN DEFAULT true,
        sigla_beneficio VARCHAR (7)
    );

    CREATE TABLE beneficio_pessoa (
        id_beneficio_pessoa INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        ben_pes INT,
        pes_ben INT,
        valor_beneficio DOUBLE,
        FOREIGN KEY fk_bp (ben_pes) REFERENCES beneficios_tipo (id_beneficio),
        FOREIGN KEY fk_pb (pes_ben) REFERENCES pessoas (id_pessoa)
     );

     ALTER TABLE familias ADD FOREIGN KEY fk_rf (referencia_familiar) REFERENCES pessoas (id_pessoa);

    CREATE TABLE atendimentos (
        id_atendimento INT AUTO_INCREMENT NOT NULL PRIMARY Key,
        tipo_atendimento VARCHAR (40),
        demanda_atendimento VARCHAR (80),
        beneficio_concedido VARCHAR (150),
        beneficio_solicitado VARCHAR (150),
        data_atendimento DATE,
        gerou_relatorio BOOLEAN NOT NULL DEFAULT false,
        pessoa_atendimento INT,
        funcionario_atendimento INT ,
        unidade_atendimento INT,
        familia_atendimento INT,
        FOREIGN KEY fk_uni_aten (unidade_atendimento) REFERENCES unidades (id_unidade),
        FOREIGN KEY fk_pes_aten (pessoa_atendimento) REFERENCES pessoas (id_pessoa),
        FOREIGN KEY fk_func_aten (funcionario_atendimento) REFERENCES funcionarios (id_funcionario)
        FOREIGN KEY fk_fam_aten (familia_atendimento) REFERENCES familias (id_familia)
    );

    CREATE TABLE rede_referenciada(
        id_rede INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        nome_rede VARCHAR (200),
        tel1_rede VARCHAR (15),
        tel2_rede VARCHAR (15),
        logradouro_rede VARCHAR (100),
        num_endereco_rede INT,
        bairro_rede VARCHAR (80),
        ponto_referencia_rede VARCHAR (100),
        contato_rede VARCHAR (100),
        cargo_contato VARCHAR (60),
        email_rede VARCHAR (100),
        horario_funcionamento_rede VARCHAR(45),
        publico_rede VARCHAR (40),
        descricao_rede TEXT,
        ativo_rede boolean not null DEFAULT true,
        natureza_rede VARCHAR (20),
        setor_rede VARCHAR (40)
    );

    CREATE TABLE encaminhamentos (
        id_encaminhamento INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        destino_encaminhamento VARCHAR(500),
        data_encaminhamento date,
        pessoa_encaminhamento INT,
        familia_encaminhamento INT,
        atendimento_encaminhamento INT,
        FOREIGN KEY fk_pes_enc (pessoa_encaminhamento) REFERENCES pessoas (id_pessoa),
        FOREIGN KEY fk_fam_enc (familia_encaminhamento) REFERENCES familias (id_familia)
        FOREIGN KEY fk_ate_enc (atendimento_encaminhamento) REFERENCES atendimentos (id_atendimento)
    );

    CREATE TABLE eventuais (
        id_eventual INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        nome_eventual VARCHAR (80)
    );

    CREATE TABLE documentacao (
        id_documentacao int AUTO_INCREMENT NOT NULL PRIMARY KEY,
        certidao BOOLEAN NOT NULL DEFAULT false,
        rg_doc BOOLEAN NOT NULL DEFAULT false,
        cpf_doc BOOLEAN NOT NULL DEFAULT false,
        ctps BOOLEAN NOT NULL DEFAULT false,
        titulo_eleitor BOOLEAN NOT NULL DEFAULT false,
        pessoa_documentacao INT,
        FOREIGN KEY fk_pes_doc (pessoa_documentacao) REFERENCES pessoas (id_pessoa)
    );

    CREATE TABLE acompanhamentos ( 
        id_acompanhamento INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        inicio_acompanhamento DATE,
        fim_acompanhamento DATE,
        familia_acompanhamento INT,
        funcionario_acompanhamento INT,
        unidade_acompanhamento INT,
        FOREIGN KEY fk_fam_acom (familia_acompanhamento) REFERENCES familias(id_familia),
        FOREIGN KEY fk_func_acom (funcionario_acompanhamento) REFERENCES funcionarios (id_funcionario)
        FOREIGN KEY fk_uni_acom (unidade_acompanhamento) REFERENCES unidades (id_unidade)
    );

    CREATE TABLE visitas_domiciliares ( 
        id_vd INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        data_vd DATE,
        familia_vd INT,
        unidade_vd INT,
        tecnico_vd INT,
        pessoa_vd VARCHAR (80),
        demanda_vd VARCHAR (100),
        efetivada_vd BOOLEAN DEFAULT true NOT NULL,
        FOREIGN KEY fk_fam_vd(familia_vd) REFERENCES familias(id_familia),
        FOREIGN KEY fk_tec_vd(tecnico_vd) REFERENCES funcionarios(id_funcionario),
        FOREIGN KEY fk_uni_vd(unidade_vd) REFERENCES unidades(id_unidade)
    );

    CREATE TABLE agendas ( 
        id_agenda INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        data_agenda date,
        quantidade_agenda INT,
        vagas_agenda INT,
        fechada_agenda BOOLEAN NOT NULL DEFAULT false
    );

    CREATE TABLE agendamentos (
        id_agendamento INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        agenda_agendamento INT,
        familia_agendamento INT,
        tecnico_agendamento INT,
        unidade_agendamento INT,
        fechado_agendamento BOOLEAN NOT NULL DEFAULT false,
        FOREIGN KEY fk_fam_ag(familia_agendamento) REFERENCES familias (id_familia),
        FOREIGN KEY fk_tec_ag(tecnico_agendamento) REFERENCES funcionarios (id_funcionario),
        FOREIGN KEY fk_ag_ag(agenda_agendamento) REFERENCES agendas (id_agenda),
        FOREIGN KEY fk_uni_a(unidade_agendamento) REFERENCES unidades (id_unidade)
    );

    --criar a primeira unidade
    INSERT INTO unidades (
        nome_unidade,
        horario_funcionamento,
        tipo_unidade,
        logradouro,
        num_endereco,
        tel1_unidade,
        bairro_unidade
    )
    VALUES ('Vigilância Socio-Assistencial',  'De 8:00 as 17:00', 'Gestão', 'Avenida Lacerda Agostinho',
        477, '(22)99999-9999', 'Virgem Santa');

    -- criar o primeiro funcionário para acessar o sistema
    INSERT INTO funcionarios (nome_funcionario,
        cpf_funcionario,
        escolaridade_funcionario, 
        data_nascimento_funcionario,
        email_funcionario,
        senha_funcionario, 
        telefone_funcionario, 
        nivel_acesso, 
        profissao,
        cargo, 
        vinculo, 
        unidade_funcionario, 
        ativo_funcionario)
    VALUES ('Poliana Martins', '000.000.000-00', 'Nível Superior Completo', '1996-01-16', 
    'polianamartinsa@gmail.com', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.',
    '(22)99999-9999', 5, 'Administradora', 'gestão', 'concursada', 1, 1);




