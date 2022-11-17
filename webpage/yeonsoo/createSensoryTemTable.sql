 CREATE TABLE sensory_temperature(
    sdate data NOT NULL,
    region_code varchar(4) NOT NULL,
    sensory_tem DECIMAL(3,1),
    wind DECIMAL(4,1),
    PRIMARY KEY(sdate, region_code),
    FOREIGN KEY(region_code) REFERENCES region(region_code)
);                              



INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-17",'A001','6.4','20.5');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-18",'A001','3','9.4');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-19",'A001','2.4','8.6');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-20",'A001','4.1','9.4');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-21",'A001','7.4','9');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-24",'A001','4.7','19.1');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-25",'A001','3.9','10.4');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-26",'A001','5.6','14.8');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-27",'A001','7.5','8.3');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-28",'A001','7.1','8.3');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-17",'A002','8.9','7.9');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-18",'A002','3.7','10.1');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-19",'A002','2.4','22');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-20",'A002','-2.9','20.2');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-21",'A002','-1.7','7.6');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-24",'A002','1.8','7.6');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-25",'A002','4.3','9');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-26",'A002','8.3','9.7');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-27",'A002','5','9.7');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-28",'A002','7.6','7.9');
INSERT INTO sensory_temperature(sdate, region_code, sensory_tem, wind) VALUES("2022-10-19",'A003','7.2','15.8');

insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-08", "A003",9.2,5);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-12", "A004",6,6.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-18", "A003",5.3,13.3);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-19", "A003",4.1,4);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-20", "A004",2.5,5.8);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-21", "A003",6.9,5);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-24", "A003",7,6.5);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-25", "A003",3.6,8.6);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-26", "A004",2.9,6.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-27", "A004",9.8,4.7);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-28", "A003",5.5,6.5);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-29", "A004",8.5,5);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-30", "A004",8.5,8.6);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-31", "A003",5.7,7.9);

insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-10", "B001",4.3,42.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-11", "B001",4.2,28.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-12", "B001",6.6,11.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-17", "B002",5.5,34.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-18", "B002",3.1,20.9);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-19", "B001",5,13.3);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-20", "B002",7.5,6.8);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-21", "B001",8.9,8.6);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-24", "B002",4.3,19.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-25", "B002",3.4,12.6);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-26", "B002",6.9,10.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-27", "B001",7.7,10.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-28", "B002",7.2,9.4);

insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-08", "B003",8.9,7.9);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-10", "B004",5.9,23.8);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-11", "B003",7.1,8.6);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-12", "B003",4.2,7.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-13", "B004",7.9,9);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-17", "B003",4.9,10.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-18", "B004",2.7,6.8);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-19", "B004",0.3,6.8);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-20", "B003",1.4,7.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-21", "B003",4.9,7.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-22", "B004",7.2,8.3);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-24", "B003",4,8.6);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-25", "B003",0.3,7.9);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-26", "B004",3,6.5);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-27", "B004",5.1,7.6);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-28", "B004",7,5);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-29", "B003",6.6,7.9);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-30", "B003",7.2,7.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-31", "B004",8.6,7.2);

insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-08", "C001",7,4.3);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-10", "C001",6.1,20.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-11", "C002",6.5,3.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-12", "C002",3.8,5.8);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-13", "C001",6,5.4);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-14", "C001",7.6,5.4);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-17", "C002",5,5);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-18", "C002",0.6,3.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-19", "C001",-1.9,4.7);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-20", "C001",-0.9,4.3);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-21", "C002",3.1,4);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-22", "C002",7.2,4);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-23", "C001",4.5,4.3);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-24", "C002",1.7,5);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-25", "C001",-1.5,3.6);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-26", "C002",-0.2,3.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-27", "C002",3.7,2.9);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-28", "C001",1.6,4.7);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-29", "C002",7.8,2.9);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-30", "C002",3.1,2.9);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-31", "C001",5.1,3.2);


insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-12", "C003",8.3,11.9);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-18", "C003",5.1,15.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-19", "C004",4.1,16.6);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-20", "C003",6.4,4);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-21", "C003",7.5,5.8);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-25", "C004",6.7,14.8);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-26", "C003",7.3,10.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-28", "C004",9.3,5);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-31", "C004",9.2,7.2);

insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-08", "D001",8.5,7.6);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-10", "D002",5.8,38.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-12", "D001",5.2,11.9);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-17", "D001",6.3,11.5);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-18", "D002",2.4,6.8);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-19", "D003",2.3,5.8);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-20", "D002",2.5,10.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-21", "D003",6.6,7.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-23", "D003",9.3,6.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-24", "D003",5.6,10.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-25", "D002",3.3,11.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-26", "D001",6,10.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-27", "D003",6.5,8.6);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-28", "D003",5.9,6.8);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-29", "D001",7,7.9);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-30", "D003",7.2,7.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-31", "D002",8.7,8.6);

insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-01", "A001",8.5,7.6);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-01", "B002",5.8,38.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-01", "C001",5.2,11.9);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-01", "D001",6.3,11.5);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-01", "H002",2.4,6.8);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-01", "E003",2.3,5.8);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-02", "E002",2.5,10.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-02", "E003",6.6,7.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-02", "A003",9.3,6.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-02", "B003",5.6,10.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-02", "C002",3.3,11.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-02", "D001",6,10.1);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-03", "H003",6.5,8.6);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-03", "A001",5.9,6.8);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-03", "B001",7,7.9);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-03", "C003",7.2,7.2);
insert into sensory_temperature(sdate, region_code, sensory_tem, wind) values ("2022-10-03", "H002",8.7,8.6);
