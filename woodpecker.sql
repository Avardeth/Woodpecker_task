use woodpecker;

create table if not exists users (
    id int(10) not null auto_increment,
    name varchar(100),
    username varchar(100) not null,
    email varchar(100),
    last_login date,
    primary key(id)
);

create table if not exists login (
    id int(10) not null auto_increment,
    username varchar(100) not null,
    password varchar(100) not null,
    joined date,
    primary key(id)
);