# Fichier Acteurs.sql
# donne les acteurs et les numéros des films dans lesquels ils ont joué


DROP TABLE ACTEURS;


CREATE TABLE ACTEURS
( NoFilm smallint NOT NULL REFERENCES FILMS,
  Acteur varchar(40) NOT NULL,
  PRIMARY KEY (NoFilm,Acteur)
);

INSERT INTO ACTEURS
VALUES(1,"Eric Caravaca");

INSERT INTO ACTEURS
VALUES(1,"Sabine Azéma");

INSERT INTO ACTEURS
VALUES(1,"André Dussollier");

INSERT INTO ACTEURS
VALUES(2,"Fernando Rey");

INSERT INTO ACTEURS
VALUES(2,"Paul Frankeur");

INSERT INTO ACTEURS
VALUES(2,"Stéphane Audran");

INSERT INTO ACTEURS
VALUES(2,"Bulle Ogier");

INSERT INTO ACTEURS
VALUES(2,"Jean-Pierre Cassel");

INSERT INTO ACTEURS
VALUES(2,"Julien Bertheau");

INSERT INTO ACTEURS
VALUES(2,"Claude Piéplu");

INSERT INTO ACTEURS
VALUES(2,"François Maistre");

INSERT INTO ACTEURS
VALUES(2,"Michel Piccoli");

INSERT INTO ACTEURS
VALUES(3,"Benoît Régent");

INSERT INTO ACTEURS
VALUES(3,"Judith Henry");

INSERT INTO ACTEURS
VALUES(3,"Jean-Jacques Vanier");

INSERT INTO ACTEURS
VALUES(3,"Elisabeth Commelin");

INSERT INTO ACTEURS
VALUES(4,"Catherine Deneuve");

INSERT INTO ACTEURS
VALUES(4,"Jean Sorel");

INSERT INTO ACTEURS
VALUES(4,"Michel Piccoli");

INSERT INTO ACTEURS
VALUES(4,"Geneviève Page");

INSERT INTO ACTEURS
VALUES(4,"Françoise Fabian");

INSERT INTO ACTEURS
VALUES(4,"Macha Méril");

INSERT INTO ACTEURS
VALUES(4,"Francis Blanche");

INSERT INTO ACTEURS
VALUES(5,"Franciszek Pieczka");

INSERT INTO ACTEURS
VALUES(5,"Jerzy Stuhr");

INSERT INTO ACTEURS
VALUES(5,"Mariusz Dmochowski");

INSERT INTO ACTEURS
VALUES(5,"Halina Winiarska");

INSERT INTO ACTEURS
VALUES(5,"Joanna Orzechowska");

INSERT INTO ACTEURS
VALUES(6,"Caroline Ducey");

INSERT INTO ACTEURS
VALUES(6,"Lou Doillon");

INSERT INTO ACTEURS
VALUES(6,"Guillaume Saurrel");

INSERT INTO ACTEURS
VALUES(6,"Xavier Villeneuve");

INSERT INTO ACTEURS
VALUES(7,"Madeleine Renaud");

INSERT INTO ACTEURS
VALUES(7,"Charles Vanel");

INSERT INTO ACTEURS
VALUES(7,"Pierre Blanchar");

INSERT INTO ACTEURS
VALUES(8,"Marcello Mastroianni");

INSERT INTO ACTEURS
VALUES(8,"Anouk Aimée");

INSERT INTO ACTEURS
VALUES(8,"Alain Cuny");

INSERT INTO ACTEURS
VALUES(9,"Freddie Jones");

INSERT INTO ACTEURS
VALUES(9,"Barbara Jefford");

INSERT INTO ACTEURS
VALUES(9,"Victor Poletti");


INSERT INTO ACTEURS
VALUES(10,"Julien Bertheau");

INSERT INTO ACTEURS
VALUES(10,"Michel Piccoli");

INSERT INTO ACTEURS
VALUES(10,"Jean-Claude Brialy");

INSERT INTO ACTEURS
VALUES(10,"Monica Vitti");

INSERT INTO ACTEURS
VALUES(10,"Paul Frankeur");

INSERT INTO ACTEURS
VALUES(10,"Michael Lonsdale");

INSERT INTO ACTEURS
VALUES(11,"Louis Jouvet");

INSERT INTO ACTEURS
VALUES(11,"Michel Simon");

INSERT INTO ACTEURS
VALUES(11,"Gabrielle Dorziat");

INSERT INTO ACTEURS
VALUES(11,"Sylvie");

INSERT INTO ACTEURS
VALUES(12,"Zbigniew Zamachowski");

INSERT INTO ACTEURS
VALUES(12,"Julie Delpy");

INSERT INTO ACTEURS
VALUES(12,"Jerzy Stuhr");

INSERT INTO ACTEURS
VALUES(12,"Grzegorz Warchol");

INSERT INTO ACTEURS
VALUES(12,"Jerzy Nowak");

INSERT INTO ACTEURS
VALUES(13,"Juliette Binoche");

INSERT INTO ACTEURS
VALUES(13,"Benoît Régent");

INSERT INTO ACTEURS
VALUES(13,"Florence Pernel");

INSERT INTO ACTEURS
VALUES(13,"Claude Duneton");

INSERT INTO ACTEURS
VALUES(14,"Irène Jacob");

INSERT INTO ACTEURS
VALUES(14,"Jean-Louis Trintignant");

INSERT INTO ACTEURS
VALUES(14,"Jean-Pierre Lorit");

INSERT INTO ACTEURS
VALUES(15,"Michel Piccoli");

INSERT INTO ACTEURS
VALUES(15,"Catherine Deneuve");

INSERT INTO ACTEURS
VALUES(15,"John Malkovich");

INSERT INTO ACTEURS
VALUES(16,"Jean-Pierre Léaud");

INSERT INTO ACTEURS
VALUES(16,"Delphyne Seyrig");

INSERT INTO ACTEURS
VALUES(16,"Michael Lonsdale");

INSERT INTO ACTEURS
VALUES(16,"Claude Jade");

INSERT INTO ACTEURS
VALUES(17,"Juliette Binoche");

INSERT INTO ACTEURS
VALUES(17,"Johnny Depp");

INSERT INTO ACTEURS
VALUES(17,"Alfred Molina");

INSERT INTO ACTEURS
VALUES(17,"Lena Olin");

INSERT INTO ACTEURS
VALUES(18,"Michel Serrault");

INSERT INTO ACTEURS
VALUES(18,"Mathilde Seigner");

INSERT INTO ACTEURS
VALUES(18,"Jean-Paul Roussillon");