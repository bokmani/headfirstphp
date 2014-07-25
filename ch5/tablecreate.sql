
create database guitarwarsdb;

use guitarwarsdb;

show tables;

create table guitarwars
(
	id int primary key auto_increment
,	date	datetime
,	name	varchar(30)
,	score	int
,	screenshot	varchar(100)
);

describe guitarwars;

select * from guitarwars;