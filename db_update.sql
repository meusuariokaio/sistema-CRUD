USE crud_php;

ALTER TABLE usuarios 
ADD titulo_tarefa VARCHAR(255) NOT NULL AFTER telefone,
ADD descricao TEXT AFTER titulo_tarefa,
ADD data_vencimento DATE NOT NULL AFTER descricao,
ADD status_tarefa ENUM('pendente', 'em_andamento', 'concluida') NOT NULL DEFAULT 'pendente' AFTER data_vencimento; 