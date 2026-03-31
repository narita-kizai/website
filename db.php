<?php
// ─── DB接続設定 ───────────────────────────────────────────
define('DB_HOST',    'mysql80.narita-kizai.sakura.ne.jp');
define('DB_NAME',    'narita-kizai_db');
define('DB_USER',    'narita-kizai_db');
define('DB_PASS',    '6nMt6qmChtTk');
define('DB_CHARSET', 'utf8mb4');

// ─── 管理画面パスワード ──────────────────────────────────
// ここを変更してください
define('ADMIN_PASSWORD', 'narita2025');

// ─── PDO接続（シングルトン） ─────────────────────────────
function db(): ?PDO {
    static $pdo = null;
    static $failed = false;
    if ($failed) return null;
    if ($pdo === null) {
        try {
            $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET;
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (Exception $e) {
            $failed = true;
            return null;
        }
    }
    return $pdo;
}

// ─── 共通ユーティリティ ──────────────────────────────────
function e(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
function formatDate(string $d): string {
    $t = strtotime($d);
    return $t ? date('Y年n月j日', $t) : $d;
}
