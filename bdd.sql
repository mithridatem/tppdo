CREATE DATABASE tppdo;
USE tppdo;
create table users(
	id_users int auto_increment primary key not null,
	pseudo_users varchar(50),
    mail_users varchar(50),
    password_users varchar(100)
)engine=InnoDB;