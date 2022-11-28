CREATE DATABASE todolist;

CREATE TABLE list (
    id int(11) primary key auto_increment, 
    nama varchar(50) not null,
    pekerjaan varchar(200) not null,
    keterangan varchar(20) not null
    );


insert into list (id,nama,pekerjaan,keterangan) values ('2022001','Retno','Membuat publikasi ilmiah','dalam proses');
insert into list (id,nama,pekerjaan,keterangan) values ('2022002','Winarsih','Membuat fitur website','dalam proses');