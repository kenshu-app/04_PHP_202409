-- 練習問題.01-1
SHOW DATABASES;

DROP DATABASE mydb;

CREATE DATABASE mydb
CHARACTER SET utf8
COLLATE utf8_general_ci;

SHOW DATABASES;


-- 練習問題.01-2
CREATE DATABASE blog
CHARACTER SET utf8
COLLATE utf8_general_ci;

SHOW DATABASES;

-- 練習問題.02-1
CREATE TABLE members (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(10) NOT NULL,
  age int DEFAULT NULL,
  address VARCHAR(255) DEFAULT NULL,
  created_at DATETIME NOT NULL
);

DESC members;

-- 練習問題.03-1
INSERT INTO members (id, name, age, address, created_at) VALUES (NULL, '山田太郎', 20, '東京都', '2024-10-08');
INSERT INTO members (name, age, created_at) VALUES ('鈴木次郎', 34, NOW());
INSERT INTO members (name, age, address, created_at) VALUES ('田中三郎','53','東京都', NOW()), ('佐藤四朗','27','熊本県', NOW()), ('加藤五郎','18','青森県', NOW());

SELECT * FROM members;

INSERT INTO members (name,age,address,created_at) VALUES ('山岸淳',93,'大阪府','2024-03-29 03:29:28');
INSERT INTO members (name,age,address,created_at) VALUES ('若松明美',57,'奈良県','2014-03-19 00:19:48');
INSERT INTO members (name,age,address,created_at) VALUES ('近藤花子',90,'岩手県','2012-09-20 06:20:11');
INSERT INTO members (name,age,address,created_at) VALUES ('石田真綾',71,'岐阜県','2015-09-20 02:20:21');
INSERT INTO members (name,age,address,created_at) VALUES ('山岸加奈',26,'栃木県','2010-04-29 13:29:17');
INSERT INTO members (name,age,address,created_at) VALUES ('加藤修平',61,'青森県','2021-10-27 21:27:09');
INSERT INTO members (name,age,address,created_at) VALUES ('渚和也',62,'神奈川県','2021-04-18 19:18:37');
INSERT INTO members (name,age,address,created_at) VALUES ('松本里佳',94,'茨城県','2015-01-27 16:27:11');
INSERT INTO members (name,age,address,created_at) VALUES ('小林知実',54,'佐賀県','2017-05-21 17:21:40');
INSERT INTO members (name,age,address,created_at) VALUES ('加納桃子',5,'香川県','2014-10-29 10:29:57');
INSERT INTO members (name,age,address,created_at) VALUES ('宇野裕樹',89,'埼玉県','2014-11-12 05:12:06');
INSERT INTO members (name,age,address,created_at) VALUES ('工藤翼',24,'岐阜県','2010-10-22 08:22:35');
INSERT INTO members (name,age,address,created_at) VALUES ('杉山翔太',92,'福島県','2014-10-08 01:08:29');
INSERT INTO members (name,age,address,created_at) VALUES ('西之園太郎',4,'香川県','2019-10-27 19:27:04');
INSERT INTO members (name,age,address,created_at) VALUES ('宮沢晃',29,'富山県','2016-12-27 13:27:09');
INSERT INTO members (name,age,address,created_at) VALUES ('江古田裕太',21,'栃木県','2010-03-02 05:02:33');
INSERT INTO members (name,age,address,created_at) VALUES ('佐々木健一',77,'長崎県','2016-11-17 02:17:59');
INSERT INTO members (name,age,address,created_at) VALUES ('井上直人',24,'栃木県','2022-12-27 12:27:47');
INSERT INTO members (name,age,address,created_at) VALUES ('佐藤聡太郎',16,'山梨県','2023-01-06 23:06:07');
INSERT INTO members (name,age,address,created_at) VALUES ('山本真綾',66,'奈良県','2020-04-10 20:10:59');

-- 練習問題.03-2
-- idが3のnameとageのカラムだけを表示する。
SELECT name, age FROM members WHERE id=3;
-- 20歳以上30歳以下の全カラムを比較演算子を使用せずに表示する。
SELECT * FROM members WHERE age BETWEEN 20 AND 30;
-- 東京都在住の成人の名前を表示する。
SELECT name FROM members WHERE address='東京都' AND age>=20;

-- 練習問題.03-3
-- 「idが2」の人の住所がNULLなので「大阪府」に変更する。
UPDATE members SET address='大阪府' WHERE id=2;
-- 年齢が90歳以上の全てのカラムを表示する。(いなければ85歳以上)
SELECT * FROM members WHERE age>=90;
-- 年齢が90歳以上のレコードを１件削除して、一覧を表示する。
DELETE FROM members WHERE id=6;
-- 削除された欠番idを指定し、新たなレコード「吉田花子 93歳 東京都」を1件追加する。
INSERT INTO members (id, name, age, address, created_at) VALUES (6, '吉田花子', 93, '東京都', NOW());
SELECT * FROM members;

-- 練習問題.04-1
-- 平均年齢の小数点以下を四捨五入して、その後に名前のカラムも追加して表示する。
-- 現状はカラム同士の整合性がなくても問題無い。
SELECT FORMAT(AVG(age), 0), name FROM members;
-- idの5に対し登録日時から10年を引いた年数 を表示する。
SELECT DATE_SUB(created_at, INTERVAL 10 YEAR) FROM members WHERE id=5;

-- 練習問題.04-2
-- 年齢を元にした合計と、その行数を合わせて表示する。
SELECT SUM(age), COUNT(*) FROM members;
-- 20歳から40歳まで何人いるか人数を表示する。
SELECT COUNT(*) FROM members WHERE age BETWEEN 20 AND 40;
-- 幾つ(何種類)の都道府県の人が存在するか一意の人数を表示する。
SELECT COUNT(DISTINCT(address)) FROM members;

-- 練習問題.04-3
-- 同年齢の人がそれぞれ何人いるかを年齢と合わせて表示する。
SELECT age, COUNT(*) FROM members GROUP BY age;

-- 練習問題.04-4
-- 住所の重複件数が2件以上だけを選択し、
-- 住所と重複件数と(重複行の)平均年齢を小数点以下を四捨五入して表示する。
SELECT 
  address, 
  COUNT(*),
  FORMAT(AVG(age), 0)
FROM members
GROUP BY address
ORDER BY COUNT(*)>=2;

-- 練習問題.04-5
-- 年齢を小さい順に並び替えたときの4番目以降の2人を表示する。
SELECT * FROM members ORDER BY age LIMIT 3, 2;
