-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS booking_ub;

-- Use the database
USE booking_ub;

-- Create the booking table
CREATE TABLE IF NOT EXISTS booking_ub (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone_no VARCHAR(20) NOT NULL,
    service_name VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the feedback table
CREATE TABLE IF NOT EXISTS feedback_ub (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    rating INT NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); 