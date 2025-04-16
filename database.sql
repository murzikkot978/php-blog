drop table if exists users;
drop table if exists blog;

create table users
(
    id       integer primary key autoincrement,
    name     text not null,
    email    text not null unique,
    password text not null,
    admin    int not null
);

create table blog
(
    id        integer primary key autoincrement,
    title     text    not null,
    image     text    not null,
    content   text    not null,
    create_at datetime default current_timestamp,
    user_id   INTEGER not null,
    FOREIGN KEY (user_id) REFERENCES users (id)
);