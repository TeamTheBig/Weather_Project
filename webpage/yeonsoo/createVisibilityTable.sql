 CREATE TABLE visibility(
    vdate datetime NOT NULL,
    region_code char(4) NOT NULL,
    visi_dist int,
    PRIMARY KEY(vdate, region_code),
    FOREIGN KEY(region_code) REFERENCES region(region_code)
);     


insert into visibility( visi_dist, region_code, vdate) values (4574,'A001','2022-10-01 01:00:00');
insert into visibility( visi_dist, region_code, vdate) values (5000,"A001","2022-10-01 02:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5000,"A001","2022-10-01 03:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5000,"A001","2022-10-01 04:00:00");
insert into visibility( visi_dist, region_code, vdate) values (4998,"A001","2022-10-01 05:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5000,"A001","2022-10-01 06:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5000,"A001","2022-10-01 07:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5000,"A001","2022-10-01 08:00:00");
insert into visibility( visi_dist, region_code, vdate) values (4974,"A001","2022-10-01 09:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5000,"A001","2022-10-01 10:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5000,"A001","2022-10-01 11:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5000,"A001","2022-10-01 12:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5000,"A001","2022-10-01 13:00:00");

insert into visibility( visi_dist, region_code, vdate) values (452,'A001','2022-10-05 03:00:00');
insert into visibility( visi_dist, region_code, vdate) values (385,"A001","2022-10-05 04:00:00");
insert into visibility( visi_dist, region_code, vdate) values (300,"A001","2022-10-05 05:00:00");
insert into visibility( visi_dist, region_code, vdate) values (120,"A001","2022-10-05 06:00:00");
insert into visibility( visi_dist, region_code, vdate) values (510,"A001","2022-10-05 07:00:00");
insert into visibility( visi_dist, region_code, vdate) values (339,"A001","2022-10-05 08:00:00");
insert into visibility( visi_dist, region_code, vdate) values (292,"A001","2022-10-05 09:00:00");
insert into visibility( visi_dist, region_code, vdate) values (384,"A001","2022-10-05 10:00:00");
insert into visibility( visi_dist, region_code, vdate) values (468,"A001","2022-10-05 11:00:00");
insert into visibility( visi_dist, region_code, vdate) values (1284,"A001","2022-10-05 12:00:00");
insert into visibility( visi_dist, region_code, vdate) values (300,"A001","2022-10-05 13:00:00");
insert into visibility( visi_dist, region_code, vdate) values (359,"A001","2022-10-05 14:00:00");
insert into visibility( visi_dist, region_code, vdate) values (206,"A001","2022-10-05 15:00:00");
insert into visibility( visi_dist, region_code, vdate) values (320,'A001','2022-10-05 16:00:00');
insert into visibility( visi_dist, region_code, vdate) values (1623,"A001","2022-10-05 17:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2524,"A001","2022-10-05 18:00:00");

insert into visibility( visi_dist, region_code, vdate) values (150,"A002","2022-10-03 17:00:00");
insert into visibility( visi_dist, region_code, vdate) values (500,"A002","2022-10-03 18:00:00");
insert into visibility( visi_dist, region_code, vdate) values (500,"A002","2022-10-03 19:00:00");
insert into visibility( visi_dist, region_code, vdate) values (300,"A002","2022-10-03 20:00:00");
insert into visibility( visi_dist, region_code, vdate) values (150,"A002","2022-10-03 21:00:00");
insert into visibility( visi_dist, region_code, vdate) values (300,"A002","2022-10-03 22:00:00");
insert into visibility( visi_dist, region_code, vdate) values (150,"A002","2022-10-03 23:00:00");
insert into visibility( visi_dist, region_code, vdate) values (300,"A002","2022-10-04 00:00:00");
insert into visibility( visi_dist, region_code, vdate) values (300,"A003","2022-10-04 01:00:00");
insert into visibility( visi_dist, region_code, vdate) values (150,"A003","2022-10-04 02:00:00");
insert into visibility( visi_dist, region_code, vdate) values (600,"A003","2022-10-04 03:00:00");
insert into visibility( visi_dist, region_code, vdate) values (800,"A003","2022-10-04 04:00:00");
insert into visibility( visi_dist, region_code, vdate) values (800,"A003","2022-10-04 05:00:00");
insert into visibility( visi_dist, region_code, vdate) values (600,"A003","2022-10-04 06:00:00");
insert into visibility( visi_dist, region_code, vdate) values (600,"A003","2022-10-04 07:00:00");
insert into visibility( visi_dist, region_code, vdate) values (700,"A003","2022-10-04 08:00:00");
insert into visibility( visi_dist, region_code, vdate) values (700,"A003","2022-10-04 09:00:00");
insert into visibility( visi_dist, region_code, vdate) values (1100,"A003","2022-10-04 10:00:00");

insert into visibility( visi_dist, region_code, vdate) values (1400,"A002","2022-10-05 21:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2000,"A002","2022-10-06 00:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2000,"A002","2022-10-06 03:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2000,"A002","2022-10-06 04:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2000,"A002","2022-10-06 05:00:00");
insert into visibility( visi_dist, region_code, vdate) values (1800,"A002","2022-10-06 06:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2000,"A002","2022-10-06 07:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2000,"A002","2022-10-06 08:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2000,"A003","2022-10-06 09:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2000,"A003","2022-10-06 10:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2000,"A003","2022-10-06 11:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2000,"A003","2022-10-06 12:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2000,"A003","2022-10-06 13:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2000,"A003","2022-10-06 14:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2000,"A003","2022-10-06 15:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2000,"A003","2022-10-06 16:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2000,"A003","2022-10-06 17:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2000,"A003","2022-10-06 18:00:00");

insert into visibility( visi_dist, region_code, vdate) values (3277,"A004","2022-10-05 07:00:00");
insert into visibility( visi_dist, region_code, vdate) values (3434,"A004","2022-10-05 08:00:00");
insert into visibility( visi_dist, region_code, vdate) values (4463,"A004","2022-10-05 09:00:00");
insert into visibility( visi_dist, region_code, vdate) values (4820,"A004","2022-10-05 10:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A004","2022-10-05 11:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A005","2022-10-05 12:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A005","2022-10-05 13:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A005","2022-10-05 14:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A005","2022-10-05 15:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A005","2022-10-05 16:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A005","2022-10-05 17:00:00");
insert into visibility( visi_dist, region_code, vdate) values (4994,"A006","2022-10-05 18:00:00");
insert into visibility( visi_dist, region_code, vdate) values (3681,"A006","2022-10-05 19:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2838,"A006","2022-10-05 20:00:00");
insert into visibility( visi_dist, region_code, vdate) values (3375,"A006","2022-10-05 21:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2520,"A006","2022-10-05 22:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2621,"A006","2022-10-05 23:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2748,"A006","2022-10-06 00:00:00");

insert into visibility( visi_dist, region_code, vdate) values (5009,"A004","2022-10-12 12:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A004","2022-10-12 13:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A004","2022-10-12 14:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A007","2022-10-12 15:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A007","2022-10-12 16:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A007","2022-10-12 17:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A007","2022-10-12 18:00:00");
insert into visibility( visi_dist, region_code, vdate) values (4879,"A007","2022-10-12 19:00:00");
insert into visibility( visi_dist, region_code, vdate) values (3232,"A007","2022-10-12 20:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2509,"A007","2022-10-12 21:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2440,"A008","2022-10-12 22:00:00");
insert into visibility( visi_dist, region_code, vdate) values (4240,"A008","2022-10-12 23:00:00");
insert into visibility( visi_dist, region_code, vdate) values (3419,"A008","2022-10-13 00:00:00");
insert into visibility( visi_dist, region_code, vdate) values (3455,"A008","2022-10-13 01:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2550,"A008","2022-10-13 02:00:00");
insert into visibility( visi_dist, region_code, vdate) values (3077,"A008","2022-10-13 03:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2790,"A008","2022-10-13 04:00:00");
insert into visibility( visi_dist, region_code, vdate) values (441,"A008","2022-10-13 05:00:00");
insert into visibility( visi_dist, region_code, vdate) values (92,"A008","2022-10-13 06:00:00");

insert into visibility( visi_dist, region_code, vdate) values (5009,"A004","2022-10-12 12:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A004","2022-10-12 13:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A004","2022-10-12 14:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A007","2022-10-12 15:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A007","2022-10-12 16:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A007","2022-10-12 17:00:00");
insert into visibility( visi_dist, region_code, vdate) values (5009,"A007","2022-10-12 18:00:00");
insert into visibility( visi_dist, region_code, vdate) values (4879,"A007","2022-10-12 19:00:00");
insert into visibility( visi_dist, region_code, vdate) values (3232,"A007","2022-10-12 20:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2509,"A007","2022-10-12 21:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2440,"A008","2022-10-12 22:00:00");
insert into visibility( visi_dist, region_code, vdate) values (4240,"A008","2022-10-12 23:00:00");
insert into visibility( visi_dist, region_code, vdate) values (3419,"A008","2022-10-13 00:00:00");
insert into visibility( visi_dist, region_code, vdate) values (3455,"A008","2022-10-13 01:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2550,"A008","2022-10-13 02:00:00");
insert into visibility( visi_dist, region_code, vdate) values (3077,"A008","2022-10-13 03:00:00");
insert into visibility( visi_dist, region_code, vdate) values (2790,"A008","2022-10-13 04:00:00");
insert into visibility( visi_dist, region_code, vdate) values (441,"A008","2022-10-13 05:00:00");
insert into visibility( visi_dist, region_code, vdate) values (92,"A008","2022-10-13 06:00:00");
