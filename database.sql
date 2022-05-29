CREATE DATABASE db1;

CREATE TABLE cliente(
    user_id int AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    cognome VARCHAR(255),
    username VARCHAR(255),
    data_nascita DATE,
    email VARCHAR(255),
    password VARCHAR(255)
)engine = 'innodb';

CREATE TABLE posts (
    id integer primary key auto_increment,
    cliente integer,
    nlikes integer default 0,
    content json,
    foreign key(cliente) references cliente(user_id) on delete cascade on update cascade
)engine = 'innodb';

CREATE TABLE likes (
    id_utente integer not null,
    id_post integer not null,
    index i_user(id_utente),
    index i_post(id_post),
    foreign key(id_utente) references cliente(user_id) on delete cascade on update cascade,
    foreign key(id_post) references posts(id) on delete cascade on update cascade,
    primary key(id_utente, id_post)
)engine = 'innodb';

CREATE TABLE preferiti (
    id_utente integer not null,
    id_post integer not null,
    index i_user(id_utente),
    index i_post(id_post),
    foreign key(id_utente) references cliente(user_id) on delete cascade on update cascade,
    foreign key(id_post) references posts(id) on delete cascade on update cascade,
    primary key(id_utente, id_post)
)engine = 'innodb';

DELIMITER //
CREATE TRIGGER likes_trigger
AFTER INSERT ON likes
FOR EACH ROW
BEGIN
UPDATE posts 
SET nlikes = nlikes + 1
WHERE id = new.id_post;
END //
DELIMITER ;


DELIMITER //
CREATE TRIGGER unlikes_trigger
AFTER DELETE ON likes
FOR EACH ROW
BEGIN
UPDATE posts 
SET nlikes = nlikes - 1
WHERE id = old.id_post;
END //
DELIMITER ; 



