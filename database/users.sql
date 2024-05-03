-- Active: 1714481719680@@127.0.0.1@3308@getkeys
CREATE TABLE users(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    create_time DATETIME COMMENT 'Create Time',
    email VARCHAR(120) NOT NULL UNIQUE,
    password VARCHAR(80) NOT NULL
);

INSERT INTO users (email, create_time, password) VALUES
('admin@admin.com', NOW(), 'admin123'),
('mohamed@mohamed.com', NOW(), 'mohamed');