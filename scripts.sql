CREATE DATABASE rsportal;

USE rsportal;
CREATE TABLE users(user_id INT(5) AUTO_INCREMENT NOT NULL, 
username VARCHAR(20) NOT NULL, password VARCHAR(20) NOT NULL, PRIMARY KEY (user_id));

CREATE TABLE proposals(proposal_id INT(5) AUTO_INCREMENT NOT NULL,
title VARCHAR(20) NOT NULL, proposal BLOB NOT NULL, abstract TEXT NOT NULL, fundingreq NUMERIC(12,2) NOT NULL, 
status VARCHAR(50) default 'NOT FINAL', status_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, startdate DATE NOT NULL, enddate DATE NOT NULL, PRIMARY KEY (proposal_id));

CREATE TABLE updesignation(updesignation_id INT(5) AUTO_INCREMENT NOT NULL, 
title VARCHAR(30) NOT NULL, description TEXT, PRIMARY KEY (updesignation_id));

CREATE TABLE proponent(proponent_id INT(5) AUTO_INCREMENT NOT NULL, user_id INTEGER NOT NULL, lastname VARCHAR(50) NOT NULL, middlename VARCHAR(50) NOT NULL, firstname VARCHAR(50) NOT NULL,
emailadd VARCHAR(20), contactnum VARCHAR(20), officeadd VARCHAR(30), updesignation_id INT(5) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(user_id),
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

insert into proposals(title, proposal, abstract, fundingreq, startdate, enddate) values('Test 1', 'PROPOSAL 1', 'ASDF', 10000, now(), now());
insert into proposals(title, proposal, abstract, fundingreq, startdate, enddate) values('Test 2', 'PROPOSAL 2', 'ASDF2', 20000, now(), now());
insert into proposals(title, proposal, abstract, fundingreq, startdate, enddate) values('Test 3', 'PROPOSAL 3', 'ASDF3', 30000, now(), now());
insert into proposals(title, proposal, abstract, fundingreq, startdate, enddate) values('Test 4', 'PROPOSAL 4', 'ASDF4', 40000, now(), now());
insert into proposals(title, proposal, abstract, fundingreq, startdate, enddate) values('Test 5', 'PROPOSAL 5', 'ASDF5', 50000, now(), now());
insert into proposals(title, proposal, abstract, fundingreq, startdate, enddate) values('Test 6', 'PROPOSAL 6', 'ASDF6', 60000, now(), now());


insert into updesignation(title, description) values('Student', 'Simple student');
insert into updesignation(title, description) values('Professor', 'Professor');
insert into updesignation(title, description) values('Assistant Professor', 'Asst. Prof');
insert into updesignation(title, description) values('Instructor', 'Instructor');

insert into proponent(user_id, lastname, firstname, middlename, emailadd, contactnum, officeadd, updesignation_id) values(4, 'Sison', 'Flor Marie Carmeli', 'Yap', 'flos@yahoo.com', '12345', 'Quezon CIty', 1);
insert into proponent(user_id, lastname, firstname, middlename, emailadd, contactnum, officeadd, updesignation_id) values(3, 'Castaneda', 'Joshua', 'Vicencio', 'thejosh223@yahoo.com', '12345', 'Quezon CIty', 1);
insert into proponent(user_id, lastname, firstname, middlename, emailadd, contactnum, officeadd, updesignation_id) values(1, 'Festin', 'Adelen Victoria', 'Po', 'festin@yahoo.com', '12345', 'Quezon CIty', 1);
insert into proponent(user_id, lastname, firstname, middlename, emailadd, contactnum, officeadd, updesignation_id) values(2, 'Cayabyab', 'ELijah Joshua', 'Barboza', 'ej@yahoo.com', '12345', 'Quezon CIty', 1);
insert into proponent(user_id, lastname, firstname, middlename, emailadd, contactnum, officeadd, updesignation_id) values(5, 'Sison', 'Noel Nicanor II', 'Yap', 'noelsison@yahoo.com', '12345', 'Quezon CIty', 1);
insert into proponent(user_id, lastname, firstname, middlename, emailadd, contactnum, officeadd, updesignation_id) values(6, 'Torres', 'Ray', 'Camille', 'rc@yahoo.com', '12345', 'Quezon CIty', 1);


insert into proposes(proposal_id, proponent_id) values(1,1);
insert into proposes(proposal_id, proponent_id) values(2,2);
insert into proposes(proposal_id, proponent_id) values(3,3);
insert into proposes(proposal_id, proponent_id) values(4,4);
insert into proposes(proposal_id, proponent_id) values(5,5);
insert into proposes(proposal_id, proponent_id) values(6,6);

 update proposals set status = 'APPROVED' where proposal_id in (1,3,5);
 insert into proposes(proposal_id, proponent_id) values(1,4);
 



--make trigger for approve
-- make trigger to change date

--mysql> select proposal_id, title, status_date from proposals where status = 'APPROVED';

--select proposal, lastname from proposals join proposes using (proposal_id) join proponent using (proponent_id) where status = 'APPROVED';