/*Creating database school*/
create database BlueStar
default character set utf8;

create table address(
    id int not null primary key auto_increment,
    country varchar(30),
    state varchar(20),
    city varchar(30),
    ba varchar(20),
    dwelling varchar(30),
    id_references int
);

create table feedback(
    id int not null primary key auto_increment,
    id_client int,
    id_product int,
    coment text,
    date varchar(10),
    alter_date timestamp,
    foreign key(id_client) references client(id),
    foreign key(id_product) references product(id)  
);

create table account(
    id int not null primary key auto_increment,
    id_client int,
    card int,
    cvc int,
    alter_date timestamp,
    foreign key(id_client) references client(id)
);

create table client(
    id int not null primary key auto_increment,
    photo varchar(50),
    name varchar(30),
    email varchar(30),
    phone int(9),
    birth varchar(10),
    sex varchar(10),
    password varchar(30),
    date varchar(10),
    alter_date timestamp
);

create table product(
    id int not null primary key auto_increment,
    photo varchar(50),
    mark varchar(20),
    model varchar(20),
    price int,
    length varchar(10),
    category varchar(20),
    stock int,
    buies int,
    date varchar(10),
    alter_date timestamp
);

create table buy_product(
    id int not null primary key auto_increment,
    id_buy int,
    photo varchar(100),
    category varchar(30),
    type varchar(30),
    model varchar(30),
    mark varchar(30),
    price int,
    amount int,
    cost int,
    foreign key(id_buy) references buy(id),
    foreign key(id_product) references product(id)
);

create table buy(
    id int not null primary key auto_increment,
    id_client int,
    client_photo varchar(100),
    value int,
    date varchar(10),
    alter_date timestamp,
    foreign key(id_client) references client(id)
);

create table shop(
    id int not null primary key auto_increment,
    name varchar(50),
    propietary varchar(30),
    email varchar(30),
    phone int(9),
    nif varchar(50),
    date varchar(10),
    alter_date timestamp
);
