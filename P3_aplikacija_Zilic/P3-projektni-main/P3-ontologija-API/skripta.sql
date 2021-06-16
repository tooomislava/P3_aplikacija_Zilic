create database tzilic_20_20 default character set utf8;

use tzilic_20_20;

create table ontologija(
    sifra int not null primary key auto_increment,
    glumac varchar(255),
    drzava varchar(255),
    godina int,
    nagrada varchar(255),
    heroj varchar(255)
);


drop table ontologija;

insert into ontologija(sifra, glumac, drzava, godina, nagrada, heroj) values (2, "testni glumac","testna drzava", 1980 ,"testna nagrada","testni heroj");


select * from ontologija 

DELETE FROM ontologija
WHERE sifra = 1;