create database id19011159_bahox_software_dentist_erp_db;
use id19011159_bahox_software_dentist_erp_db;
create table authorities(
	a_id int not null AUTO_INCREMENT,
    a_name varchar(100) not null,
	a_surname varchar(100) not null,
    a_tcno varchar(11) not null unique,
	a_tel varchar(14) not null ,
    a_email varchar(100) not null,
    a_username varchar(100) not null unique,
    a_pass varchar(34) not null ,
    a_secr_level int not null,
    a_last_login datetime ,
    a_first_registration_date date default CURRENT_TIMESTAMP,
    
    PRIMARY KEY(a_id)
);

create table customer(
	c_id int not null AUTO_INCREMENT,
    c_name varchar(100) not null,
	c_surname varchar(100) not null,
    c_tcno varchar(11) not null unique,
    c_tel varchar(14) not null ,
	c_email varchar(100) not null,
    c_username varchar(100) not null unique,
    c_pass varchar(34) not null,
    c_last_login datetime,
    c_first_registration_date date default CURRENT_TIMESTAMP,
    
    PRIMARY KEY(c_id)
);


create table customer_examination(
	examination_id int not null AUTO_INCREMENT,
    c_id int not null,
	examination_summary varchar(1000) default "muayene",
    examination_price int not null default 0,
    examination_price_paided int not null default 0,
    examination_price_payable int not null default 0,
    
    examination_date datetime default current_timestamp,
    
    PRIMARY KEY(examination_id),
    foreign key (c_id) references customer(c_id)
);

create table examination_processed(
	examination_id int not null,
    
    examination_price int default 400,
    
    additional_actions varchar(1000),
    additional_actions_price int,
    
    tooth1 boolean default false,
    explanation_1 varchar(240) default ' ',
    price_1 int default 0,
    tooth2 boolean default false,
    explanation_2 varchar(240) default ' ',
    price_2 int default 0,
    tooth3 boolean default false,
    explanation_3 varchar(240) default ' ',
    price_3 int default 0,
    tooth4 boolean default false,
    explanation_4 varchar(240) default ' ',
    price_4 int default 0,
    tooth5 boolean default false,
    explanation_5 varchar(240) default ' ',
    price_5 int default 0,
    tooth6 boolean default false,
    explanation_6 varchar(240) default ' ',
    price_6 int default 0,
    tooth7 boolean default false,
    explanation_7 varchar(240) default ' ',
    price_7 int default 0,
    tooth8 boolean default false,
    explanation_8 varchar(240) default ' ',
    price_8 int default 0,
    
    tooth9 boolean default false,
    explanation_9 varchar(240) default ' ',
    price_9 int default 0,
    tooth10 boolean default false,
    explanation_10 varchar(240) default ' ',
    price_10 int default 0,
    tooth11 boolean default false,
    explanation_11 varchar(240) default ' ',
    price_11 int default 0,
    tooth12 boolean default false,
    explanation_12 varchar(240) default ' ',
    price_12 int default 0,
    tooth13 boolean default false,
    explanation_13 varchar(240) default ' ',
    price_13 int default 0,
    tooth14 boolean default false,
    explanation_14 varchar(240) default ' ',
    price_14 int default 0,
    tooth15 boolean default false,
    explanation_15 varchar(240) default ' ',
    price_15 int default 0,
    tooth16 boolean default false,
    explanation_16 varchar(240) default ' ',
    price_16 int default 0,
    
    tooth17 boolean default false,
    explanation_17 varchar(240) default ' ',
    price_17 int default 0,
    tooth18 boolean default false,
    explanation_18 varchar(240) default ' ',
    price_18 int default 0,
    tooth19 boolean default false,
    explanation_19 varchar(240) default ' ',
    price_19 int default 0,
    tooth20 boolean default false,
    explanation_20 varchar(240) default ' ',
    price_20 int default 0,
    tooth21 boolean default false,
    explanation_21 varchar(240) default ' ',
    price_21 int default 0,
    tooth22 boolean default false,
    explanation_22 varchar(240) default ' ',
    price_22 int default 0,
    tooth23 boolean default false,
    explanation_23 varchar(240) default ' ',
    price_23 int default 0,
    tooth24 boolean default false,
    explanation_24 varchar(240) default ' ',
    price_24 int default 0,
    
    tooth25 boolean default false,
    explanation_25 varchar(240) default ' ',
    price_25 int default 0,
    tooth26 boolean default false,
    explanation_26 varchar(240) default ' ',
    price_26 int default 0,
    tooth27 boolean default false,
    explanation_27 varchar(240) default ' ',
    price_27 int default 0,
    tooth28 boolean default false,
    explanation_28 varchar(240) default ' ',
    price_28 int default 0,
    tooth29 boolean default false,
    explanation_29 varchar(240) default ' ',
    price_29 int default 0,
    tooth30 boolean default false,
    explanation_30 varchar(240) default ' ',
    price_30 int default 0,
    tooth31 boolean default false,
    explanation_31 varchar(240) default ' ',
    price_31 int default 0,
    tooth32 boolean default false,
    explanation_32 varchar(240) default ' ',
    price_32 int default 0,
    
    PRIMARY KEY(examination_id),
    foreign key (examination_id) references customer_examination(examination_id)
);


DELIMITER $$
create trigger examination_paided_payale_sync before update on customer_examination
for each row
	begin
		SET new.examination_price_payable = new.examination_price-new.examination_price_paided;
	end$$
DELIMITER ;


DELIMITER $$
create trigger examination_price_sync after update on examination_processed
for each row
	begin
		UPDATE customer_examination SET examination_price = new.examination_price WHERE (examination_id = new.examination_id);
	end$$
DELIMITER ;
