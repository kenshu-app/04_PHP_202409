-- 練習問題.05-2
CREATE TABLE goods
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  maker VARCHAR(20) NOT NULL,
  name VARCHAR(50) NOT NULL,
  price INT NOT NULL
);

CREATE TABLE sales
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  goods_id INT,
  count INT NOT NULL,
  created_at DATETIME NOT NULL,
  CONSTRAINT fk_goods_id
  FOREIGN KEY (goods_id)
  REFERENCES goods (id)
  ON DELETE SET NULL ON UPDATE CASCADE
);

--
-- データの登録
--
INSERT INTO goods (maker,name,price) VALUES ('BILOT','万年筆',10500);
INSERT INTO goods (maker,name,price) VALUES ('UNITED','カードホルダー',1260);
INSERT INTO goods (maker,name,price) VALUES ('NEVA','システム手帳',8400);
INSERT INTO goods (maker,name,price) VALUES ('PARKER','ペンケース',2480);
INSERT INTO goods (maker,name,price) VALUES ('SAILOR','インク',680);
INSERT INTO goods (maker,name,price) VALUES ('PELIKAN','多機能ペン',1860);

INSERT INTO sales (id,goods_id,count,created_at) VALUES (1001,1,2,'2020-07-12');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1002,2,1,'2020-07-13');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1003,3,2,'2020-07-14');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1004,2,3,'2020-07-14');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1005,4,2,'2020-07-15');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1006,3,1,'2020-07-17');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1007,2,4,'2020-07-18');

INSERT INTO goods (maker,name,price) VALUES ('TWSBI','万年筆A型',2970);
INSERT INTO goods (maker,name,price) VALUES ('ZEBRA','カードホルダー',29620);
INSERT INTO goods (maker,name,price) VALUES ('ASKUL','システム手帳',21480);
INSERT INTO goods (maker,name,price) VALUES ('ZEBRA','ペンケース',26440);
INSERT INTO goods (maker,name,price) VALUES ('PELIKAN','インク',930);
INSERT INTO goods (maker,name,price) VALUES ('LAMY','多機能ペン',8990);
INSERT INTO goods (maker,name,price) VALUES ('KAWECO','レターオープナー',24300);
INSERT INTO goods (maker,name,price) VALUES ('FABER-CASTELL','シザーズ',29990);
INSERT INTO goods (maker,name,price) VALUES ('PLATINUM','カラーペンシル',1830);
INSERT INTO goods (maker,name,price) VALUES ('KAWECO','ファウンテンペン',20720);
INSERT INTO goods (maker,name,price) VALUES ('ASKUL','ノックボールペン',1290);
INSERT INTO goods (maker,name,price) VALUES ('SAILOR','ブックダーツ',15230);
INSERT INTO goods (maker,name,price) VALUES ('MONTBLANC','レトロクリップ',30920);
INSERT INTO goods (maker,name,price) VALUES ('KOKUYO','ゴールドピン',30420);
INSERT INTO goods (maker,name,price) VALUES ('PELIKAN','テープディスペンサー',16310);
INSERT INTO goods (maker,name,price) VALUES ('MONTBLANC','フレーズデータースタンプ',2510);
INSERT INTO goods (maker,name,price) VALUES ('BILOT','レタースケール',5650);
INSERT INTO goods (maker,name,price) VALUES ('KOKUYO','クリップボード',21610);
INSERT INTO goods (maker,name,price) VALUES ('PARKER','ドキュメントケース',5650);
INSERT INTO goods (maker,name,price) VALUES ('TONBOW','カップホルダー',1860);
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1008,4,6,'1991-12-19');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1009,19,10,'1959-04-13');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1010,5,7,'1992-11-13');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1011,13,5,'1968-05-21');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1012,3,9,'1984-12-02');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1013,18,8,'1951-10-28');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1014,25,5,'1984-03-12');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1015,5,1,'1991-10-16');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1016,22,6,'1990-01-13');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1017,21,3,'1950-11-26');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1018,10,7,'1990-06-15');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1019,0,3,'1971-10-30');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1020,26,5,'1979-06-02');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1021,3,2,'1967-05-16');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1022,20,9,'2004-06-29');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1023,11,2,'1959-11-29');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1024,14,5,'1961-09-19');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1025,14,4,'1987-07-11');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1026,29,10,'2000-06-25');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1027,1,5,'1946-05-30');
INSERT INTO sales (id,goods_id,count,created_at) VALUES (1028,29,3,'2003-10-09');

SELECT * FROM goods;
SELECT * FROM sales;

DELETE FROM goods WHERE id=25;
SELECT * FROM goods;
SELECT * FROM sales;

SELECT 
  s.id, 
  g.maker, 
  g.name,
  -- g.price, 
  s.count, 
  s.created_at
FROM goods g 
JOIN sales s
ON s.goods_id = g.id;

-- 練習問題.05-4
-- 商品ごとの販売した合計個数を表示
SELECT 
  g.maker AS 'メーカー', 
  g.name AS '商品名',
  SUM(s.count) AS '販売実績'
FROM goods g 
JOIN sales s
ON s.goods_id = g.id
GROUP BY g.name;

-- 一番右に「合計料金」のカラムを加える
SELECT 
  g.maker AS 'メーカー', 
  g.name AS '商品名',
  SUM(s.count) AS '販売実績',
  SUM(s.count) * g.price AS '合計料金'
FROM goods g 
JOIN sales s
ON s.goods_id = g.id
GROUP BY g.name;

-- 最も合計の売上が良かった商品から順番に上位3件を表示
SELECT 
  g.maker AS 'メーカー', 
  g.name AS '商品名',
  SUM(s.count) AS '販売実績',
  SUM(s.count) * g.price AS '合計料金'
FROM goods g 
JOIN sales s
ON s.goods_id = g.id
GROUP BY g.name
ORDER BY SUM(s.count) * g.price DESC
LIMIT 3;

-- Macの場合はGROUP BYに指定したカラム(goods.name)
-- 以外のgoodsのカラムは全てANY_VALUEでラップする必要がある。
SELECT
    ANY_VALUE(g.maker) AS 'メーカー',
    g.name  AS '商品名',
    SUM(s.count) AS '販売実績',
    SUM(s.count) * ANY_VALUE(g.price)  AS '合計料金'
FROM goods g
JOIN sales s
ON s.goods_id = g.id
GROUP BY g.name
ORDER BY SUM(s.count) * ANY_VALUE(g.price) DESC
LIMIT 3;

-- 合計の売上が20万円以上の場合は「販売御礼！」、
-- 10万から20万の間であれば「現状維持」、
-- それ以外であれば「仕入れ再検討」という分類を
-- 「販売状態」というカラムに、上位3件ではなく全てのレコードを表示
SELECT 
  g.maker AS 'メーカー', 
  g.name AS '商品名',
  SUM(s.count) AS '販売実績',
  SUM(s.count) * g.price AS '合計料金',
  CASE
    WHEN (SUM(s.count) * g.price)>=200000 THEN '販売御礼！'
    WHEN (SUM(s.count) * g.price)>=100000 THEN '現状維持'
    ELSE '仕入れ再検討'
  END AS '販売状態'
FROM goods g 
JOIN sales s
ON s.goods_id = g.id
GROUP BY g.name
ORDER BY SUM(s.count) * g.price DESC;

-- それぞれの分類が合計何件あるか分類個数を「合計数」として表示
WITH sub_query AS (
    SELECT 
      CASE
        WHEN (SUM(s.count) * g.price)>=200000 THEN '販売御礼！'
        WHEN (SUM(s.count) * g.price)>=100000 THEN '現状維持'
        ELSE '仕入れ再検討'
      END AS result
    FROM goods g 
    JOIN sales s
    ON s.goods_id = g.id
    GROUP BY g.name
)
SELECT 
  result AS '販売状態 ', 
  COUNT(result) AS '合計数' 
FROM sub_query 
GROUP BY result 
ORDER BY COUNT(result) DESC;
