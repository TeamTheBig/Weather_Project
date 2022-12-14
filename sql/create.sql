/*Hyuna*/
CREATE TABLE REGION (
	REGION_CODE CHAR(4) NOT NULL, 
	ADMINISTRATIVE_AREA VARCHAR(20) NOT NULL,
	CITY VARCHAR(20) NOT NULL,
	PRIMARY KEY(REGION_CODE)
);

CREATE TABLE FINE_DUST (
	DATES DATE NOT NULL,
	REGION_CODE CHAR(4) NOT NULL, 
	FINE_DUST INT NOT NULL,
	ULTRAFINE_DUST INT NOT NULL,
	PRIMARY KEY(DATES, REGION_CODE),
	FOREIGN KEY(region_code) REFERENCES region(region_code)
);

CREATE TABLE OZONE (
	DATES DATE NOT NULL,
	REGION_CODE CHAR(4) NOT NULL, 
	OZONE NUMERIC(4,3) NOT NULL,
	PRIMARY KEY(DATES, REGION_CODE),
	FOREIGN KEY(region_code) REFERENCES region(region_code)
);

CREATE TABLE USER_SATISFACTION(
    USERID INT(20) AUTO_INCREMENT PRIMARY KEY,
    NICKNAME VARCHAR(20),
	USER_SATISFACTION VARCHAR(20)
);

CREATE VIEW AVG_OZONE AS(
SELECT REGION.CITY AS CITY, AVG(OZONE.OZONE) AS AVG_OZONE
FROM OZONE, REGION
WHERE REGION.REGION_CODE = OZONE.REGION_CODE
GROUP BY REGION.CITY);

CREATE VIEW AVG_FINE_DUST AS(
SELECT REGION.CITY AS CITY, AVG(FINE_DUST.FINE_DUST) AS AVG_FINE_DUST, AVG(FINE_DUST.ULTRAFINE_DUST) AS AVG_ULTRAFINE_DUST
FROM FINE_DUST, REGION
WHERE REGION.REGION_CODE = FINE_DUST.REGION_CODE
GROUP BY REGION.CITY);

CREATE VIEW AVG_FINE_DUST_BY_DATES AS(
SELECT FINE_DUST.DATES AS DATES, REGION.CITY AS CITY, AVG(FINE_DUST.FINE_DUST) AS AVG_FINE_DUST, AVG(FINE_DUST.ULTRAFINE_DUST) AS AVG_ULTRAFINE_DUST
FROM FINE_DUST, REGION
WHERE REGION.REGION_CODE = FINE_DUST.REGION_CODE
GROUP BY DATES, REGION.CITY
WITH ROLLUP);
/*GROUP BY ROLLUP(DATES, REGION.CITY));*/

CREATE VIEW AVG_OZONE_BY_DATES AS(
SELECT OZONE.DATES AS DATES, REGION.CITY AS CITY, AVG(OZONE.OZONE) AS AVG_OZONE
FROM OZONE, REGION
WHERE REGION.REGION_CODE = OZONE.REGION_CODE
GROUP BY DATES, REGION.CITY
WITH ROLLUP);
/*GROUP BY ROLLUP(DATES, REGION.CITY));*/


/*YEONHUI*/
create table temperature(
    mdate date,
    region_code char(4),
    avg_temperature numeric(3,1),
    min_temperature numeric(3,1),
    max_temperature numeric(3,1),
    primary key (mdate, region_code), 
    foreign key (region_code) references region(region_code));

create table typhoon(
    typhoon_name varchar(20),
    country varchar(20),
    used boolean default 0, 
    primary key (typhoon_name));

create table new_typhoon_name(
    comment_id int auto_increment,
    passwd varchar(20) not null,
    typhoon_name varchar(20) not null,
    primary key (comment_id));


/*Min Ji*/
CREATE TABLE HUMIDTABLE(
	humiddate date NOT NULL, 
	region_code CHAR(4), 
	relative_humidity FLOAT(4), 
	primary key(humiddate, region_code), 
	foreign key(region_code) references region(region_code));

CREATE TABLE PRECIPITAIONTABLE (
	raindate date NOT NULL,
	region_code CHAR(4), 
	precipitation FLOAT(4), 
	primary key(raindate, region_code),
	foreign key(region_code) references region(region_code));

CREATE TABLE UVTABLE (
	uvdate date NOT NULL,
	region_code CHAR(4), 
	insolation FLOAT(4), 
	primary key(uvdate, region_code), 
	foreign key(region_code) references region(region_code));



/*Yeonsoo*/
 CREATE TABLE sensory_temperature(
    sdate date NOT NULL,
    region_code char(4) NOT NULL,
    sensory_tem DECIMAL(3,1),
    wind DECIMAL(4,1),
    PRIMARY KEY(sdate, region_code),
    FOREIGN KEY(region_code) REFERENCES region(region_code)
);                              

 CREATE TABLE comment(
    nickname varchar(20) NOT NULL,
    passwd varchar(20) NOT NULL,
    user_comment varchar(100),
    PRIMARY KEY(nickname)
);                              

         

 CREATE TABLE visibility(
    vdate datetime NOT NULL,
    region_code char(4) NOT NULL,
    visi_dist int,
    PRIMARY KEY(vdate, region_code),
    FOREIGN KEY(region_code) REFERENCES region(region_code)
);     
