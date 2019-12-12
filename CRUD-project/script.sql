create table Class
(
    Class_ID int auto_increment
        primary key,
    Name     varchar(255) not null,
    Location varchar(255) not null
);

create table Student
(
    Name             varchar(255) not null,
    Email            varchar(255) not null,
    Student_Class_FK int          not null,
    Student_ID       int auto_increment
        primary key,
    constraint Student___fk
        foreign key (Student_Class_FK) references Class (Class_ID)
);

create table Teacher
(
    Teacher_ID       int auto_increment
        primary key,
    Name             varchar(255) not null,
    Email            varchar(255) not null,
    Teacher_Class_FK int          not null,
    constraint Teacher___fk
        foreign key (Teacher_Class_FK) references Class (Class_ID)
);


