DROP DATABASE USRPS;
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


INSERT INTO Player(Vorname, Nachname)
VALUES ('German','Ömer'),
       ('Rodriquez','Hernando'),
       ('Fort','Nite'),
       ('Joe','Mam'),
       ('Paul','Paul');

INSERT INTO Round(fk_pk_player0, fk_pk_player1, pick0, pick1, datetime, winner)
VALUES (1,2,'r','p','2022/04/28 11:19:01',1),
       (2,3,'s','p','2022/02/12 12:18:01',0),
       (3,4,'p','r','2021/01/06 08:12:22',0),
       (2,5,'s','s','2018/11/05 22:10:06',null),
       (4,5,'r','s','2020/04/06 01:16:52',0);