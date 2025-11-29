create table blackjack._user (
    id serial unique primary key,
    username varchar(20) unique not null,
    display_name varchar(20),
    password varchar(256) not null,
    balance int default 200,
    created_at timestamptz default now()
);