<?php
// ─── テーブル作成スクリプト ───────────────────────────────
// 使用後はこのファイルをサーバーから削除してください
require_once dirname(__DIR__).'/db.php';

$sqls = [
    // カテゴリテーブル
    "CREATE TABLE IF NOT EXISTS news_categories (
        id         INT         AUTO_INCREMENT PRIMARY KEY,
        name       VARCHAR(50) NOT NULL UNIQUE,
        sort_order INT         DEFAULT 0
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",

    // ニューステーブル
    "CREATE TABLE IF NOT EXISTS news (
        id            INT          AUTO_INCREMENT PRIMARY KEY,
        title         VARCHAR(255) NOT NULL,
        excerpt       TEXT,
        image         VARCHAR(255) DEFAULT '',
        category      VARCHAR(50)  NOT NULL DEFAULT 'ご案内',
        link_url      VARCHAR(500) DEFAULT '',
        link_external TINYINT(1)   DEFAULT 0,
        published_at  DATE         NOT NULL,
        created_at    TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
        updated_at    TIMESTAMP    DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",

    // 初期カテゴリ
    "INSERT IGNORE INTO news_categories (name, sort_order) VALUES ('採用情報', 1), ('ご案内', 2)",

    // 既存記事の移行
    "INSERT IGNORE INTO news (id, title, excerpt, image, category, link_url, link_external, published_at) VALUES
        (1, 'バイトルにて正社員を募集しています',
            '本店・富里営業部で正社員を募集中です。バイトルからご応募ください。',
            '/bitle2.jpg', '採用情報', 'https://www.baitoru.com/cjlist500896/', 1, '2026-03-25'),
        (2, '現在、正社員を募集中です',
            'ただいま本店・富里営業部で正社員（営業職・配送職）を募集しております。',
            '/mens.jpg', '採用情報', '/recruit.php', 0, '2026-02-19'),
        (3, 'ステンレス配管のベンカン様に紹介していただきました',
            'ベンカン様のホームページの「皆様の声」で当社を紹介していただきました。',
            '/boss_benkan.jpg', 'ご案内', 'https://www.benkan.co.jp/voice/10451.html', 1, '2018-05-10')",
];

$ok = true;
$log = [];
try {
    foreach ($sqls as $sql) {
        db()->exec($sql);
        $log[] = ['ok', mb_substr(trim($sql), 0, 60).'…'];
    }
} catch (Exception $e) {
    $ok = false;
    $log[] = ['err', $e->getMessage()];
}
?><!DOCTYPE html>
<html lang="ja">
<head><meta charset="UTF-8"><title>DB初期化</title>
<style>body{font-family:sans-serif;padding:40px;max-width:600px}
.ok{color:#2e7d32}.err{color:#c62828}
.warn{background:#fff3cd;border:1px solid #ffc107;padding:16px;border-radius:4px;margin-top:24px;font-size:14px}</style>
</head><body>
<h2>DB初期化</h2>
<?php foreach ($log as [$type, $msg]): ?>
  <p class="<?= $type ?>"><?= $type === 'ok' ? '✓' : '✗' ?> <?= htmlspecialchars($msg) ?></p>
<?php endforeach; ?>
<?php if ($ok): ?>
  <p class="ok" style="font-weight:bold;margin-top:16px">✓ 完了しました。</p>
  <div class="warn">⚠️ セキュリティのため、<strong>このファイル（setup/install.php）をサーバーから削除</strong>してください。</div>
<?php endif; ?>
</body></html>
