CREATE DATABASE projects_db;

USE projects_db;

CREATE TABLE users_tbl ( 
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users_tbl (username, password) VALUES ('admin', 'admin123');
 
CREATE TABLE projects_tbl (
    proj_id INT AUTO_INCREMENT PRIMARY KEY,
    proj_title VARCHAR(255) NOT NULL,
    proj_start_date DATE NOT NULL, 
    proj_end_date DATE NOT NULL,
    proj_budget DECIMAL(10, 2) NOT NULL,
    proj_description TEXT NOT NULL,
    proj_is_done BOOLEAN NOT NULL DEFAULT FALSE,
    proj_is_visible BOOLEAN NOT NULL DEFAULT TRUE,
    proj_type VARCHAR(255) NOT NULL
);
