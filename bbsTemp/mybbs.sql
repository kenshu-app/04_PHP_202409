CREATE DATABASE mybbs CHARACTER SET UTF8 COLLATE utf8_general_ci;

GRANT SELECT, INSERT, UPDATE, DELETE
ON mybbs.*
TO bbsuser@localhost
IDENTIFIED BY 'abcd';

USE mybbs;

CREATE TABLE posts (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  message TEXT NOT NULL,
  created_at DATETIME NOT NULL
);

INSERT INTO posts (name, message, created_at) VALUES 
('たろう', 'こんにちは！今日もいい天気ですね！', '2020-03-28 11:00:00'),
('はなこ', 'あしたから旅行に行ってきます。おみやげ買ってくるね！', '2020-04-12 22:41:00'),
('じろう', 'いってらっしゃい～', '2020-05-02 08:21:00');

SELECT * FROM posts;
