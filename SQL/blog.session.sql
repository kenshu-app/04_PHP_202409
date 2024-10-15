-- 練習問題.02-2
CREATE TABLE categories (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL
);

CREATE TABLE articles (
  id SERIAL PRIMARY KEY,
  category_id INT NOT NULL,
  title VARCHAR(100) NOT NULL,
  article TEXT NOT NULL,
  created_at TIMESTAMP NOT NULL
);

SHOW TABLES;

DESC articles;
DESC categories;

-- 練習問題.03-4
INSERT INTO categories (name) VALUES ('お知らせ'), ('日記');
INSERT INTO articles (id, category_id, title, article, created_at) VALUES 
(1, 1, 'ブログ始めました', 'いつまで続くか分かりませんが、お付き合いください。', '2025-10-01 20:23:12'), 
(2, 2, '犬も歩けば', '今日、犬が棒にぶつかる瞬間を目撃しました。そういうことってあるんだな、と思いました。', '2025-10-05 20:13:22'), 
(3, 2, '歯医者', '今日は歯医者に行きました。歯医者は毎回恐くてドキドキします', '2025-12-04 19:35:32'), 
(4, 1, '展示会やります！', '来年1月15日、代官山Galleria Artistaで行われる展示会に出品することが決まりました！', '2025-12-21 21:15:30');

INSERT INTO categories (name) VALUES ('趣味');
INSERT INTO categories (name) VALUES ('ペット');
INSERT INTO categories (name) VALUES ('読書');
INSERT INTO categories (name) VALUES ('映画');
INSERT INTO categories (name) VALUES ('音楽');
INSERT INTO categories (name) VALUES ('旅行');
INSERT INTO categories (name) VALUES ('買い物');
INSERT INTO categories (name) VALUES ('散歩');
INSERT INTO articles (category_id,title,article,created_at) VALUES (8,'自分たちの思いをセールにこめて','ほうものができました。「ぼくの方へ走り。','2010-10-04 13:04:27');
INSERT INTO articles (category_id,title,article,created_at) VALUES (8,'自分たちの思いをセールにこめて','こかできます。ごらんなその街燈がいつか。','2012-06-16 07:16:12');
INSERT INTO articles (category_id,title,article,created_at) VALUES (3,'まだペットのトイレで消耗してるの？','うらだを半分はまるくネオン燈とうの幸福。','2020-01-05 05:05:25');
INSERT INTO articles (category_id,title,article,created_at) VALUES (9,'散歩して良かったなと思える4のメリット','とうの方へ向むこう。ただいて、勢いきな。','2010-12-23 08:23:37');
INSERT INTO articles (category_id,title,article,created_at) VALUES (7,'恋人との旅行を楽しくするテクニック！','まつり込こめたいてあるように立って行き。','2019-02-27 18:27:40');
INSERT INTO articles (category_id,title,article,created_at) VALUES (9,'いつも使っている靴の意外な活用法とは','指さしまいましたとよろこんなはねあがる。','2019-09-12 20:12:38');
INSERT INTO articles (category_id,title,article,created_at) VALUES (4,'どうして読書が一部に人気なのか','の高いか。それはほんとうだったろうとし。','2023-02-20 02:20:44');
INSERT INTO articles (category_id,title,article,created_at) VALUES (10,'やっぱりあった！運動の暗黙ルール6','リイのようすっかささぎがあっとたちは、。','2022-07-04 23:04:19');
INSERT INTO articles (category_id,title,article,created_at) VALUES (4,'ほとんどの人が気づいていない出版社のヒミツ','うだ、やされ、汽車だったはジョバンニは。','2016-07-31 02:31:15');
INSERT INTO articles (category_id,title,article,created_at) VALUES (7,'実際に旅行で散財する人の声を聞いてみた','れいなずきました。河原かわが見えないう。','2010-08-23 18:23:37');
INSERT INTO articles (category_id,title,article,created_at) VALUES (2,'初心者が考える高い理想的な趣味','おいておりのようでを組んで男の子供が瓜。','2022-11-05 19:05:48');
INSERT INTO articles (category_id,title,article,created_at) VALUES (2,'どんな趣味も公認化してしまう裏技5選','わらっているんで、いました。ジョバンニ。','2015-11-06 11:06:32');
INSERT INTO articles (category_id,title,article,created_at) VALUES (1,'いつかは自分に返る、人生を見返す日記活用術','をうごうした。また遠くで鳴りまえたよう。','2024-07-17 18:17:42');
INSERT INTO articles (category_id,title,article,created_at) VALUES (7,'放っておいてはダメ！旅行から現実に戻る方法','さいわいにじぶんいったりしないねえ、三。','2011-07-26 08:26:43');
INSERT INTO articles (category_id,title,article,created_at) VALUES (8,'自分たちの思いをセールにこめて','もうそう、ほんもあつくしく振ふりかえし。','2012-09-18 08:18:15');
INSERT INTO articles (category_id,title,article,created_at) VALUES (9,'大切な人にありがとうを伝える散歩とは','「ぼく岸きしだ。だまっくりでもそんなの。','2019-11-19 23:19:05');
INSERT INTO articles (category_id,title,article,created_at) VALUES (5,'映画の翻訳の良し悪しについて','チも置おきく手をつきで、それかの樽たる。','2019-01-24 19:24:17');
INSERT INTO articles (category_id,title,article,created_at) VALUES (8,'自分たちの思いをセールにこめて','ことも言いいろに人の、かたまりました。。','2012-03-26 22:26:46');
INSERT INTO articles (category_id,title,article,created_at) VALUES (5,'映画の番宣で大満足！その理由とは','「もって、高く星あかして死んだもうその。','2015-02-22 01:22:26');
INSERT INTO articles (category_id,title,article,created_at) VALUES (9,'散歩して良かったなと思える4のメリット','れば見るだろうのさい」鳥捕とりは、夜の。','2012-06-27 15:27:54');

SELECT * FROM categories;
SELECT * FROM articles;

-- 2025年12月1日以降に投稿した記事の全カラムを表示する。
SELECT * FROM articles WHERE created_at>='2025-12-01';
-- 2025年10月中(11月1日未満)に投稿した記事の全カラムを表示する。
SELECT * FROM articles WHERE created_at>='2025-10-01' AND created_at<'2025-11-01';
-- カテゴリテーブルの「お知らせ」に相当する記事の全カラムを表示。
SELECT * FROM articles WHERE category_id=1;

-- 練習問題.04-6
-- 投稿日時を新しい順に並べ替え、全カラムを取得する。
SELECT * FROM articles ORDER BY created_at DESC;
-- 最新3件を投稿日時の新しい順で並び替え、
-- 全カラムを見やすい表示形式に変更して表示する。
SELECT * FROM articles ORDER BY created_at DESC LIMIT 3;
-- articlesテーブル内のカテゴリーのIDと
-- カテゴリーのIDをグループ化した
-- 各記事件数の結果に対して3以上を表示。
-- その結果に対し件数の多い順に並び変えて表示する。
SELECT
  category_id,
  COUNT(*)
FROM articles 
GROUP BY category_id
ORDER BY COUNT(*) DESC 
LIMIT 3;

-- 練習問題.04-7
-- articles内の同じカテゴリーIDでグループ化し、
-- グループ化した全てのタイトルを/区切り、
-- カテゴリーID(カラム名カテゴリー番号)と合計件数の多い順で、
-- (カラム名件数)と各タイトル(カラム名タイトル)を合わせて表示する。
SELECT 
  category_id AS 'カテゴリー番号',
  COUNT(*) AS '件数',
  GROUP_CONCAT(title SEPARATOR ' / ') AS 'タイトル'
FROM articles
GROUP BY category_id
ORDER BY COUNT(*) DESC;

-- 練習問題.04-8
-- articles内の2010年以降のカテゴリーID(カラム名カテゴリー番号)の
-- 合計件数(カラム名件数)が1件は「少ない」2件は「普通」3件以上は「多い」 を
-- 条件に応じた結果を「分類」として表示し、
-- 上から合計件数の多い順にカテゴリーIDと共に表示する。
SELECT 
  category_id AS 'カテゴリー番号',
  COUNT(*) AS '件数',
  CASE
    WHEN COUNT(*)=1 THEN '少ない'
    WHEN COUNT(*)=2 THEN '普通'
    ELSE '多い'
  END AS '分類'
FROM articles
WHERE created_at>='2010-01-01'
GROUP BY category_id
ORDER BY COUNT(*) DESC;

-- 練習問題.05-1
-- categoriesとarticlesテーブルを省略形式で結合し、
-- 登録日時の新しい順に、外部参照とそのカラムに連携したIDを除く、
-- それ以外の全カラムを表示する。
SELECT 
  a.id,
  c.name,
  a.title,
  a.article,
  a.created_at
FROM categories c
JOIN articles a
ON c.id = a.category_id
ORDER BY a.created_at DESC;

-- 練習問題.05-2
CREATE DATABASE shop CHARACTER SET utf8 COLLATE utf8_general_ci;
SHOW DATABASES;

-- 練習問題.05-5
-- articles内で同じカテゴリーでグループ化し、
-- グループ化した全てのタイトルを/区切り、
-- カテゴリー名(カラム名カテゴリー)と
-- 合計件数(カラム名投稿数)と
-- 各タイトル(カラム名ブログタイトル)を合わせて、
-- カテゴリーの登録件数分の多い順で5件分のみ表示
SELECT 
  c.name AS 'カテゴリー',
  COUNT(*) AS '投稿数',
  GROUP_CONCAT(a.title SEPARATOR ' / ') AS 'ブログタイトル'
FROM categories c
JOIN articles a
ON c.id = a.category_id
GROUP BY a.category_id
ORDER BY COUNT(*) DESC
LIMIT 5;
