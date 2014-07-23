
create database elvis_store;

use elvis_store;

create table email_list
(
	id int primary key auto_increment
,	first_name varchar(30)
,	last_name	varchar(30)
,	email	varchar(60)
);
