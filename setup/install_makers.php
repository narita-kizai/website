<?php
/**
 * メーカーテーブル作成 & CSVインポート
 * 実行後は必ずこのファイルを削除してください
 */
require_once dirname(__DIR__).'/db.php';

$pdo = db();
if (!$pdo) { die('DB接続失敗'); }

// ─── テーブル作成 ───────────────────────────────
$pdo->exec("
CREATE TABLE IF NOT EXISTS makers (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  row_group  VARCHAR(20)  NOT NULL COMMENT 'あかさたな行（あ行・か行 etc）',
  kana_group VARCHAR(10)  NOT NULL COMMENT '個別かな（あ・い・う etc）',
  name       VARCHAR(255) NOT NULL COMMENT '会社名',
  url        VARCHAR(500) DEFAULT NULL COMMENT 'HP URL',
  sort_order INT          NOT NULL DEFAULT 0,
  created_at TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

// ─── 既存データ削除（再実行対応） ───────────────
$pdo->exec("TRUNCATE TABLE makers");

// ─── CSV読み込み ────────────────────────────────
$csvFile = __DIR__.'/makers_import.csv';
if (!file_exists($csvFile)) {
    die("CSVファイルが見つかりません: $csvFile");
}

$handle = fopen($csvFile, 'r');
if (!$handle) { die('CSVオープン失敗'); }

$stmt = $pdo->prepare(
    "INSERT INTO makers (row_group, kana_group, name, url, sort_order)
     VALUES (:row_group, :kana_group, :name, :url, :sort_order)"
);

$order = 0;
while (($row = fgetcsv($handle)) !== false) {
    // 空行スキップ
    if (count($row) < 3 || trim($row[0]) === '') continue;

    $rowGroup  = trim($row[0]);
    $kanaGroup = trim($row[1]);
    $name      = trim($row[2]);
    $url       = isset($row[3]) ? trim($row[3]) : '';

    if ($name === '') continue;

    $stmt->execute([
        ':row_group'  => $rowGroup,
        ':kana_group' => $kanaGroup,
        ':name'       => $name,
        ':url'        => $url ?: null,
        ':sort_order' => ++$order,
    ]);
}
fclose($handle);

$count = $pdo->query("SELECT COUNT(*) FROM makers")->fetchColumn();
echo "完了: {$count}件のメーカーをインポートしました。\n";
echo "このファイル（setup/install_makers.php）と makers_import.csv を必ず削除してください。\n";
