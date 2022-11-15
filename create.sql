/*YEONHUI*/
create table temperature(
    mdate date,
    region_code char(4),
    avg_temperature numeric(3,1),
    min_temperature numeric(3,1),
    max_temperature numeric(3,1),
    primary key (mdate, region_code), 
    foreign key (region_code) references region);

/*YEONHUI*/
create table typhoon(
    typhoon_name varchar(20),
    country varchar(20),
    used boolean default 0, 
    primary key (typhoon_name));

/*YEONHUI*/
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
