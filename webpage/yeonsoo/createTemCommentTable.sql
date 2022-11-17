 CREATE TABLE comment(
    nickname varchar(20) NOT NULL,
    passwd varchar(20) NOT NULL,
    user_comment varchar(100),
    PRIMARY KEY(nickname)
);                              

insert into comment(nickname, passwd, user_comment ) values ('dghjj','1111','I think it was colder than that information.');
insert into comment(nickname, passwd, user_comment ) values ('sdfgh','1111','Good data!');
insert into comment(nickname, passwd, user_comment ) values ('apple','1111', 'Hi guys~');
insert into comment(nickname, passwd, user_comment ) values ('kiwi','1111','I want to go to Busan!!');
insert into comment(nickname, passwd, user_comment ) values ('BMW','1111', 'It is too cold here');