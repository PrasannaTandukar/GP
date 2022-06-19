-- Create students table
CREATE TABLE students (
    id INT UNSIGNED AUTO_INCREMENT,
    firstname VARCHAR(35) NOT NULL,
    lastname VARCHAR(35) NOT NULL,
    gender CHAR NOT NULL,
    contact VARCHAR(10) NOT NULL,
    email VARCHAR(50) NOT NULL,
    country VARCHAR(50) NOT NULL,
    city VARCHAR(50) NOT NULL,
    date_of_birth DATE NOT NULL,
    date_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    course_id INT UNSIGNED NOT NULL,
    CONSTRAINT pk_students PRIMARY KEY (id)
);

-- Create attendances table
CREATE TABLE attendances (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    attendance_date DATE NOT NULL,
    student_id INT UNSIGNED NOT NULL,
    CONSTRAINT pk_attendances PRIMARY KEY (id)
);

-- Create courses table
CREATE TABLE courses (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    CONSTRAINT pk_courses PRIMARY KEY (id)
);

-- Create modules table
CREATE TABLE modules (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    CONSTRAINT pk_modules PRIMARY KEY (id)
);

CREATE TABLE course_modules (
    course_id INT UNSIGNED NOT NULL,
    module_id INT UNSIGNED NOT NULL
);

CREATE TABLE student_modules (
    student_id INT UNSIGNED NOT NULL,
    module_id INT UNSIGNED NOT NULL
);

-- Create assignments table
CREATE TABLE assignments (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(40) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    module_id INT UNSIGNED NOT NULL,
    CONSTRAINT pk_assignments PRIMARY KEY (id)
);

-- Create diaries table
CREATE TABLE diaries (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    content TEXT NOT NULL,
    date_posted DATE NOT NULL,
    student_id INT UNSIGNED NOT NULL,
    CONSTRAINT pk_diaries PRIMARY KEY (id)
);

-- Create users table
CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL,
    CONSTRAINT pk_users PRIMARY KEY (id)
);

-- Add foreign key
ALTER TABLE students
ADD CONSTRAINT fk_s_courses
FOREIGN KEY (course_id) REFERENCES courses(id)
ON DELETE CASCADE;

ALTER TABLE attendances
ADD CONSTRAINT fk_a_students
FOREIGN KEY (student_id) REFERENCES students(id)
ON DELETE CASCADE;

ALTER TABLE course_modules
ADD CONSTRAINT fk_c_courses
FOREIGN KEY (course_id) REFERENCES courses(id)
ON DELETE CASCADE;

ALTER TABLE course_modules
ADD CONSTRAINT fk_c_modules
FOREIGN KEY (module_id) REFERENCES modules(id)
ON DELETE CASCADE;

ALTER TABLE student_modules
ADD CONSTRAINT fk_s_students
FOREIGN KEY (student_id) REFERENCES students(id)
ON DELETE CASCADE;

ALTER TABLE student_modules
ADD CONSTRAINT fk_s_modules
FOREIGN KEY (module_id) REFERENCES modules(id)
ON DELETE CASCADE;

ALTER TABLE assignments
ADD CONSTRAINT fk_a_modules
FOREIGN KEY (module_id) REFERENCES modules(id)
ON DELETE CASCADE;

ALTER TABLE diaries
ADD CONSTRAINT fk_d_students
FOREIGN KEY (student_id) REFERENCES students(id);

-- Insert data
INSERT INTO users (username, password, role)
VALUES ("admin", "root", "admin");