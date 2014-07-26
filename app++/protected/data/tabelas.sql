CREATE TABLE usuario (
    idusuario INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    nome VARCHAR(128) NOT NULL,
    ultimaconexao DATETIME
);

CREATE TABLE mesagem (
    idmensagem INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    mensagem VARCHAR(128) NOT NULL,
    datahora DATETIME,
   usuario_idusuario  INTEGER NOT NULL
);
