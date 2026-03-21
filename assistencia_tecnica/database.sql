USE senac_projetos;

CREATE TABLE tb_usuarios (
	id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL UNIQUE,
	senha VARCHAR(64) NOT NULL
);

INSERT INTO tb_usuarios (nome, email, senha) VALUES 
('João Souza', 'joaosouza@apolo.com.ar', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');