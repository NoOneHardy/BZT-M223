DROP DATABASE IF EXISTS db;
CREATE DATABASE db;

USE db;

CREATE TABLE car (
    id int primary key auto_increment,
    name varchar(255),
    brand varchar(255),
    price float,
    fuel_type varchar(255),
    color int,
    type varchar(255),
    tank float,
    manufacturing_date date,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    is_active boolean default TRUE
);

CREATE TABLE customer (
    id int primary key auto_increment,
    name varchar(255),
    first_name varchar(255),
    address varchar(255),
    zip int,
    city varchar(255),
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    is_active boolean default TRUE
);

CREATE TABLE reservation (
    id int primary key auto_increment,
    customer_id int,
    car_id int,
    start_date datetime,
    end_date datetime,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    is_active boolean default TRUE,
    constraint foreign key fk_customer_id(customer_id) references customer(id) on delete set null,
    constraint foreign key fk_car_id(car_id) references car(id) on delete set null
);

INSERT INTO customer (name, first_name, address, zip, city, created_at, updated_at, deleted_at, is_active)
VALUES ('Firma', 'Admin', 'Firmenstrasse 12', 1000, 'Firmenstadt', DATE('2025-01-10T10:00:00'), DATE('2025-01-10T10:00:00'), NULL, TRUE);
