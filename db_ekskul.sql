
CREATE DATABASE IF NOT EXISTS db_ekskul;
USE db_ekskul;

SET FOREIGN_KEY_CHECKS=0;

-- Table: students
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `nim` VARCHAR(30) NOT NULL UNIQUE,
  `phone` VARCHAR(20),
  `join_date` DATE,
  `email` VARCHAR(100),
  `gender` ENUM('L','P'),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `students` (`name`, `nim`, `phone`, `join_date`, `email`, `gender`) VALUES
('Karina', 'SOPA101', '081200000001', '2022-03-01', 'karina@sopa.kr', 'P'),
('Winter', 'SOPA102', '081200000002', '2022-03-02', 'winter@sopa.kr', 'P'),
('Giselle', 'SOPA103', '081200000003', '2022-03-03', 'giselle@sopa.kr', 'P'),
('Ningning', 'SOPA104', '081200000004', '2022-03-04', 'ningning@sopa.kr', 'P'),
('Heeseung', 'SOPA105', '081200000005', '2022-03-05', 'heeseung@sopa.kr', 'L'),
('Jay', 'SOPA106', '081200000006', '2022-03-06', 'jay@sopa.kr', 'L'),
('Jake', 'SOPA107', '081200000007', '2022-03-07', 'jake@sopa.kr', 'L'),
('Sunghoon', 'SOPA108', '081200000008', '2022-03-08', 'sunghoon@sopa.kr', 'L'),
('Sunoo', 'SOPA109', '081200000009', '2022-03-09', 'sunoo@sopa.kr', 'L'),
('Jungwon', 'SOPA110', '081200000010', '2022-03-10', 'jungwon@sopa.kr', 'L'),
('Ni-ki', 'SOPA111', '081200000011', '2022-03-11', 'niki@sopa.kr', 'L'),
('Yujin', 'SOPA112', '081200000012', '2022-03-12', 'yujin@sopa.kr', 'P'),
('Wonyoung', 'SOPA113', '081200000013', '2022-03-13', 'wonyoung@sopa.kr', 'P'),
('Gaeul', 'SOPA114', '081200000014', '2022-03-14', 'gaeul@sopa.kr', 'P'),
('Rei', 'SOPA115', '081200000015', '2022-03-15', 'rei@sopa.kr', 'P'),
('Liz', 'SOPA116', '081200000016', '2022-03-16', 'liz@sopa.kr', 'P'),
('Leeseo', 'SOPA117', '081200000017', '2022-03-17', 'leeseo@sopa.kr', 'P');

-- Table: clubs
DROP TABLE IF EXISTS `clubs`;
CREATE TABLE `clubs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `description` TEXT,
  `coach` VARCHAR(100),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `clubs` (`name`, `description`, `coach`) VALUES
('Dance Performance', 'Ekskul tari modern dan K-pop untuk pentas seni.', 'Ms. Hwang'),
('Vocal Class', 'Ekskul pelatihan vokal untuk penyanyi solo dan grup.', 'Mr. Park'),
('Drama & Acting', 'Ekskul seni peran dan teater panggung.', 'Mrs. Kim'),
('Broadcasting', 'Ekskul penyiaran dan produksi media sekolah.', 'Mr. Seo');

-- Table: club_members
DROP TABLE IF EXISTS `club_members`;
CREATE TABLE `club_members` (
  `student_id` INT,
  `club_id` INT,
  `join_date` DATE,
  PRIMARY KEY (`student_id`, `club_id`),
  FOREIGN KEY (`student_id`) REFERENCES `students`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`club_id`) REFERENCES `clubs`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `club_members` (`student_id`, `club_id`, `join_date`) VALUES
(1, 1, '2022-04-01'), (2, 2, '2022-04-02'), (3, 2, '2022-04-03'), (4, 1, '2022-04-04'),
(5, 2, '2022-04-05'), (6, 4, '2022-04-06'), (7, 1, '2022-04-07'), (8, 3, '2022-04-08'),
(9, 2, '2022-04-09'), (10, 4, '2022-04-10'), (11, 1, '2022-04-11'), (12, 4, '2022-04-12'),
(13, 1, '2022-04-13'), (14, 3, '2022-04-14'), (15, 2, '2022-04-15'), (16, 2, '2022-04-16'), (17, 1, '2022-04-17');

-- Table: club_events
DROP TABLE IF EXISTS `club_events`;
CREATE TABLE `club_events` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `club_id` INT,
  `event_name` VARCHAR(100),
  `event_date` DATE,
  `location` VARCHAR(100),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`club_id`) REFERENCES `clubs`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `club_events` (`club_id`, `event_name`, `event_date`, `location`) VALUES
(1, 'Dance Showcase 2024', '2024-09-10', 'SOPA Hall'),
(2, 'Vocal Harmony Concert', '2024-10-05', 'Studio B'),
(3, 'Drama Festival', '2024-11-12', 'Aula Teater'),
(4, 'School Radio Launch', '2024-12-01', 'Broadcasting Room');

SET FOREIGN_KEY_CHECKS=1;
