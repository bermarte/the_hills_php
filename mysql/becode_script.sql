create table student
(
    id                 int auto_increment
        primary key,
    last_name          varchar(255)                          null,
    first_name         varchar(255)                          null,
    user_name          varchar(255)                          null,
    gender             varchar(255)                          null,
    linkedin           varchar(255)                          null,
    email              varchar(255)                          null,
    preferred_language varchar(255)                          null,
    avatar             varchar(255)                          null,
    video              varchar(255)                          null,
    quote              varchar(255)                          null,
    quote_author       varchar(255)                          null,
    created_at         timestamp default current_timestamp() not null on update current_timestamp(),
    github             varchar(255)                          null,
    password           text                                  not null,
    constraint student_create_at_uindex
        unique (created_at),
    constraint student_password_uindex
        unique (password) using hash
);


