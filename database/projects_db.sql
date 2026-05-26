DROP DATABASE IF EXISTS projects_db;
CREATE DATABASE IF NOT EXISTS projects_db;
USE projects_db;

CREATE TABLE IF NOT EXISTS users_tbl ( 
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users_tbl (username, password) VALUES ('admin', '$2y$10$ashltEzuZkysdAoAdGqRPu.cehasqKapSpQ4fZ0suvjoMNekiIhCy');
 
CREATE TABLE IF NOT EXISTS projects_tbl (
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

CREATE TABLE projects_tbl (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    title       VARCHAR(255) NOT NULL,
    start_date  DATE NOT NULL,
    end_date    DATE NOT NULL,
    budget      DECIMAL(10,2) NOT NULL,
    description TEXT NOT NULL,
    is_done     TINYINT(1) DEFAULT 0,
    is_visible  TINYINT(1) DEFAULT 1,
    type        VARCHAR(50) NOT NULL
);