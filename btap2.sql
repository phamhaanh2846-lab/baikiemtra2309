CREATE DATABASE IF NOT EXISTS quanly_hocsinh;

USE quanly_hocsinh;

CREATE TABLE students (
    id INT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    grade FLOAT
);

INSERT INTO students (id, name, age, grade) VALUES
(1, 'Nguyen Van An', 20, 8.5),
(2, 'Tran Thi Binh', 19, 9.2),
(3, 'Le Van Nam', 20, 7.8);