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
CREATE TABLE IF NOT EXISTS HUMIDTABLE(
	humiddate date NOT NULL, 
	region_code CHAR(4), 
	relative_humidity FLOAT(4), 
	primary key(humiddate, region_code), 
	foreign key(region_code) references region(region_code));

CREATE TABLE IF NOT EXISTS PRECIPITAIONTABLE (
	raindate date NOT NULL,
	region_code CHAR(4), 
	precipitation FLOAT(4), 
	primary key(raindate, region_code),
	foreign key(region_code) references region(region_code));

CREATE TABLE IF NOT EXISTS UVTABLE (
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

 CREATE TABLE tem_comment(
    nickname varchar(20) NOT NULL,
    passwd varchar(20) NOT NULL,
    region_code char(4) NOT NULL,
    user_sensory_tem varchar(10),
    user_clothes varchar(10),
    PRIMARY KEY(nickname),
    FOREIGN KEY(region_code) REFERENCES region(region_code)
);       

 CREATE TABLE visibility(
    vdate datetime NOT NULL,
    region_code char(4) NOT NULL,
    visi_dist int,
    PRIMARY KEY(vdate, region_code),
    FOREIGN KEY(region_code) REFERENCES region(region_code)
);     

