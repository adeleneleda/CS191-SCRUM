CREATE DATABASE rsportal;

USE rsportal;
CREATE TABLE users(user_id INT(5) AUTO_INCREMENT NOT NULL, 
username VARCHAR(20) NOT NULL, password VARCHAR(20) NOT NULL, PRIMARY KEY (user_id));


CREATE TABLE proposals(proposal_id INT(5) AUTO_INCREMENT NOT NULL, user_id INT(5) NOT NULL, 
title VARCHAR(20) NOT NULL, proposal BLOB NOT NULL, abstract TEXT NOT NULL, fundingreq NUMERIC(12,2) NOT NULL, 
startdate DATE NOT NULL, enddate DATE NOT NULL, FOREIGN KEY (user_id) REFERENCES users(user_id),
PRIMARY KEY (proposal_id));

CREATE TABLE updesignation(updesignation_id INT(5) AUTO_INCREMENT NOT NULL, 
title VARCHAR(30) NOT NULL, description TEXT, PRIMARY KEY (updesignation_id));

CREATE TABLE proponent(proponent_id INT(5) AUTO_INCREMENT NOT NULL, proponent_name VARCHAR(20) NOT NULL,
emailadd VARCHAR(20), contactnum INT(11), officeadd VARCHAR(30), updesignation_id INT(5) NOT NULL,
FOREIGN KEY (updesignation_id) REFERENCES updesignation(updesignation_id), PRIMARY KEY (proponent_id));

CREATE TABLE user_roles(user_role_id INT(5) AUTO_INCREMENT NOT NULL, 
usertype CHAR(1) NOT NULL, user_id INT(5) NOT NULL, FOREIGN KEY (user_id) REFERENCES users(user_id), 
PRIMARY KEY (user_role_id));

CREATE TABLE reviews(review_id INT(5) AUTO_INCREMENT NOT NULL, 
verdict CHAR(1) NOT NULL, comment CHAR(40), file BLOB NOT NULL, user_id INT(5) NOT NULL, proposal_id INT(5)
NOT NULL, FOREIGN KEY (user_id) REFERENCES users(user_id), FOREIGN KEY (proposal_id) REFERENCES proposals(proposal_id), 
PRIMARY KEY (review_id)); 

CREATE TABLE proposes(proposes_id INT(5) AUTO_INCREMENT NOT NULL, proposal_id INT(5) NOT NULL, 
proponent_id INT(5) NOT NULL, FOREIGN KEY (proposal_id) REFERENCES proposals(proposal_id), 
FOREIGN KEY (proponent_id) REFERENCES proponent(proponent_id), PRIMARY KEY (proposes_id));

insert into users(username, password) values('adelen', SUBSTRING(md5('12345') FROM 1 FOR 20));
insert into users(username, password) values('elijah', SUBSTRING(md5('12345') FROM 1 FOR 20));
insert into users(username, password) values('josh', SUBSTRING(md5('12345') FROM 1 FOR 20));
insert into users(username, password) values('carmeli', SUBSTRING(md5('12345') FROM 1 FOR 20));
insert into users(username, password) values('noel', SUBSTRING(md5('12345') FROM 1 FOR 20));
insert into users(username, password) values('ray', SUBSTRING(md5('12345') FROM 1 FOR 20));

insert into user_roles(usertype, user_id) values('P', 1);
insert into user_roles(usertype, user_id) values('P', 2);
insert into user_roles(usertype, user_id) values('P', 3);
insert into user_roles(usertype, user_id) values('P', 4);
insert into user_roles(usertype, user_id) values('P', 5);
insert into user_roles(usertype, user_id) values('P', 6);