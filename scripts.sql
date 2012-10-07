CREATE DATABASE rsportal;

USE rsportal;
CREATE TABLE users(user_id INT(5) AUTO_INCREMENT NOT NULL, 
username VARCHAR(20) NOT NULL, password VARCHAR(40) NOT NULL, PRIMARY KEY (user_id));


CREATE TABLE proposals(proposal_id INT(5) AUTO_INCREMENT NOT NULL, user_id INT(5) NOT NULL, 
title VARCHAR(20) NOT NULL, proposal BLOB NOT NULL, description VARCHAR(40) NOT NULL, fundingreq NUMERIC(12,2) NOT NULL, 
startdate DATE NOT NULL, enddate DATE NOT NULL, FOREIGN KEY (user_id) REFERENCES users(user_id),
PRIMARY KEY (proposal_id));

CREATE TABLE proponent(proponent_id INT(5) AUTO_INCREMENT NOT NULL, proposal_id INT(5) NOT NULL, proponent_name VARCHAR(20) NOT NULL,
emailadd VARCHAR(20), contactnum INT(11), officeadd VARCHAR(30), 
FOREIGN KEY (proposal_id) REFERENCES proposals(proposal_id), PRIMARY KEY (proponent_id));

CREATE TABLE user_roles(user_role_id INT(5) AUTO_INCREMENT NOT NULL, 
usertype CHAR(1) NOT NULL, user_id INT(5) NOT NULL, FOREIGN KEY (user_id) REFERENCES users(user_id), 
PRIMARY KEY (user_role_id));

CREATE TABLE reviews(review_id INT(5) AUTO_INCREMENT NOT NULL, 
verdict CHAR(1) NOT NULL, comment CHAR(40), file BLOB NOT NULL, user_id INT(5) NOT NULL, proposal_id INT(5)
NOT NULL, FOREIGN KEY (user_id) REFERENCES users(user_id), FOREIGN KEY (proposal_id) REFERENCES proposals(proposal_id), 
PRIMARY KEY (review_id)); 

insert into users(username, password) values('adelen', md5('12345'));
insert into users(username, password) values('elijah', md5('12345'));
insert into users(username, password) values('josh', md5('12345'));
insert into users(username, password) values('carmeli', md5('12345'));
insert into users(username, password) values('noel', md5('12345'));
insert into users(username, password) values('ray', md5('12345'));

insert into userroles(usertype, user_id) values('P', 1);
insert into userroles(usertype, user_id) values('P', 2);
insert into userroles(usertype, user_id) values('P', 3);
insert into userroles(usertype, user_id) values('P', 4);
insert into userroles(usertype, user_id) values('P', 5);
insert into userroles(usertype, user_id) values('P', 6);