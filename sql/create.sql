/*YEONHUI*/
create table temperature(
    mdate date,
    region_code char(4),
    avg_temperature numeric(3,1),
    min_temperature numeric(3,1),
    max_temperature numeric(3,1),
    primary key (mdate, region_code), 
    foreign key (region_code) references region);

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
CREATE TABLE IF NOT EXISTS HUMIDTABLE (humiddate date NOT NULL, 
    region_code VARCHAR(4), relative_humidity FLOAT(4), primary key(humiddate, region_code), foreign key(region_code));

CREATE TABLE IF NOT EXISTS PRECIPITAIONTABLE (raindate date NOT NULL, 
    region_code Foreign Key VARCHAR(4), precipitation FLOAT(4), primary key(raindate, region_code), foreign key(region_code));

CREATE TABLE IF NOT EXISTS UVTABLE (uvdate date NOT NULL, 
    region_code Foreign Key VARCHAR(4), insolation FLOAT(4), primary key(uvdate, region_code), foreign key(region_code));


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
	PRIMARY KEY(DATES, REGION_CODE)
);

CREATE TABLE OZONE (
	DATES DATE NOT NULL,
	REGION_CODE CHAR(4) NOT NULL, 
	OZONE FLOAT NOT NULL,
	PRIMARY KEY(DATES, REGION_CODE)
);


/*Yeonsoo*/

 CREATE TABLE sensory_temperature(
    date date NOT NULL,
    region_code varchar(4) NOT NULL,
    sensory_tem DECIMAL(3,1),
    wind DECIMAL(4,1),
    PRIMARY KEY(date, region_code),
    FOREIGN KEY(region_code) REFERENCES region(region_code)
);                              

 CREATE TABLE tem_comment(
    comment_id varchar(5) NOT NULL,
    passwd int NOT NULL,
    date date,
    region_code varchar(4),
    user_sensory_tem varchar(10),
    user_clothes varchar(10),
    PRIMARY KEY(comment_id),
    FOREIGN KEY(region_code) REFERENCES region(region_code)
);       

 CREATE TABLE visibility(
    date datetime NOT NULL,
    region_code varchar(4),
    visi_dist int,
    PRIMARY KEY(date, region_code),
    FOREIGN KEY(region_code) REFERENCES region(region_code)
);     

