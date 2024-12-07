
CREATE SCHEMA cloudtech;
USE cloudtech;

CREATE TABLE users(
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    date_created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE services(
    serviceId INT(11) NOT NULL AUTO_INCREMENT,
    serviceName VARCHAR(255) NOT NULL,
    serviceDescription VARCHAR(255) NOT NULL,
    serviceCategory VARCHAR(255) NOT NULL,
    servicePrice decimal (19,4),
    serviceCurrency varchar(30),
    date_created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (serviceId)
);

INSERT INTO `services` VALUES 
(1,'Ubuntu micro server','1gb ram, 1vCPU','IaaS',4.9900,'CAD','2024-11-21 13:08:01'),
    (2,'Ubuntu Mini server','2gb ram, 1vCPU','IaaS',6.9900,'CAD','2024-11-21 13:08:20'),
    (3,'Fedora micro server','1gb ram, 1vCPU Fedora Linux','IaaS',5.4500,'CAD','2024-11-21 13:09:00'),
    (4,'Bugs away','CI/CD project vulnerability scanning tool','SaaS',29.9500,'CAD','2024-11-21 13:10:04');

INSERT INTO `services` (serviceName, serviceDescription, serviceCategory, servicePrice, serviceCurrency) VALUES 
('Rubbery String Pods','Web Application Deployment Service','PaaS',20.49,'CAD');


CREATE TABLE payment(
    paymentId INT(11) NOT NULL AUTO_INCREMENT,
    serviceId INT(11) NOT NULL,
    userId INT (11) NOT NULL,
    price DECIMAL (19,4) NOT NULL,
    quantity INT (11) NOT NULL,
    currency varchar(30) NOT NULL,
    date_created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    -- FOREIGN KEY (userId) REFERENCES users(id),
    -- FOREIGN KEY (serviceId) REFERENCES services(serviceId),
    PRIMARY KEY (paymentId)
);

