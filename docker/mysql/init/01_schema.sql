-- ─────────────────────────────────────────────────────
-- narita-kizai.com ローカル開発用スキーマ
-- ─────────────────────────────────────────────────────
SET NAMES utf8mb4;
CREATE DATABASE IF NOT EXISTS narita_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE narita_db;

-- NEWS カテゴリ
CREATE TABLE IF NOT EXISTS news_categories (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  name       VARCHAR(100) NOT NULL,
  sort_order INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- NEWS
CREATE TABLE IF NOT EXISTS news (
  id           INT AUTO_INCREMENT PRIMARY KEY,
  title        VARCHAR(255) NOT NULL,
  excerpt      TEXT DEFAULT NULL,
  image        VARCHAR(500) DEFAULT NULL,
  category     VARCHAR(100) DEFAULT NULL,
  link_url     VARCHAR(500) DEFAULT NULL,
  link_external TINYINT(1) NOT NULL DEFAULT 0,
  published_at DATE NOT NULL,
  created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- MAKERS
CREATE TABLE IF NOT EXISTS makers (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  row_group  VARCHAR(20)  NOT NULL COMMENT 'あかさたな行',
  kana_group VARCHAR(10)  NOT NULL COMMENT '個別かな',
  name       VARCHAR(255) NOT NULL,
  url        VARCHAR(500) DEFAULT NULL,
  sort_order INT          NOT NULL DEFAULT 0,
  created_at TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- サンプルNEWS（管理画面から追加・編集可）
INSERT INTO news_categories (name, sort_order) VALUES
  ('お知らせ', 1), ('採用情報', 2), ('イベント', 3);

INSERT INTO news (title, category, link_url, link_external, published_at) VALUES
  ('ウェブサイトをリニューアルしました', 'お知らせ', '/news.php', 0, '2025-04-01'),
  ('2025年度 新卒採用情報を公開しました', '採用情報', '/recruit.php', 0, '2025-03-01');
