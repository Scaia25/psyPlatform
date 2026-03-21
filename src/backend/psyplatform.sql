CREATE DATABASE psyplatform;

CREATE TABLE utenti (
	email varchar(255) PRIMARY KEY,
    tipologia varchar(255) not null,
    nome varchar(255) not null,
    cognome varchar(255) not null,
    provincia varchar(255) not null,
    password varchar(255) not null,
    tariffa_oraria double(5,2) not null,
    comune varchar(255) not null,
    indirizzo varchar(255) not null
);

CREATE TABLE prenotazioni (
	ID_prenotazione int AUTO_INCREMENT PRIMARY KEY,
    email_paziente varchar(255) not null,
    email_psicologo varchar(255) not null,
    orario time not null,
    data date not null,
    foreign key (email_paziente) references utenti (email),
    foreign key (email_psicologo) references utenti (email)
)