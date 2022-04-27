CREATE DATABASE USRPS CHARACTER SET utf8 COLLATE utf8_general_ci;
USE USRPS;

CREATE TABLE Player
(
    pk_ID int AUTO_INCREMENT PRIMARY KEY,
    Vorname varchar(255),
    Nachname varchar(255)
);

CREATE TABLE Round (
    pk_ID int AUTO_INCREMENT PRIMARY KEY,
    fk_pk_player0 int,
    fk_pk_player1 int,
    pick0 char,
    pick1 char,
    datetime varchar(255),
    winner boolean,
    FOREIGN KEY (fk_pk_player0) REFERENCES Player(pk_ID),
    FOREIGN KEY (fk_pk_player1) REFERENCES Player(pk_ID)
);