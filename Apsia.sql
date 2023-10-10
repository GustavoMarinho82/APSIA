CREATE TABLE usuarios (
	id_usuario MEDIUMINT UNSIGNED AUTO_INCREMENT,
	nome VARCHAR(50) NOT NULL,
	senha VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL UNIQUE,
	psicologo ENUM('sim', 'nao') DEFAULT 'nao',
		PRIMARY KEY (id_usuario)
);

CREATE TABLE mensagens (
	id_mensagem MEDIUMINT UNSIGNED AUTO_INCREMENT,
	conteudo TEXT NOT NULL,
  	horario DATETIME NOT NULL, #'AAAA-MM-DD HH:MM'
	#status_mensagem ENUM('Pendente', 'Enviada', 'Visualizada') NOT NULL,
  		PRIMARY KEY (id_mensagem),
  
  	remetente_id MEDIUMINT UNSIGNED NOT NULL,
	destinatario_id MEDIUMINT UNSIGNED NOT NULL,
		FOREIGN KEY (remetente_id) REFERENCES usuarios (id_usuario),
		FOREIGN KEY (destinatario_id) REFERENCES usuarios (id_usuario)
);