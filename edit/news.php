<?php
session_start();
require_once dirname(__DIR__).'/db.php';

// 認証チェック
if (!isset($_SESSION['admin'])) {
    header('Location: /edit/'); exit;
}

// CSRFトークン
if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

$action = $_GET['action'] ?? 'list';

// ─── カテゴリ一覧 ───
$cats = db()->query("SELECT name FROM news_categories ORDER BY sort_order, name")
            ->fetchAll(PDO::FETCH_COLUMN);

// ─── POST処理 ───
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '')) {
        die('不正なリクエストです');
    }
    $postAction = $_POST['action'] ?? '';

    // 削除
    if ($postAction === 'delete') {
        $s = db()->prepare("DELETE FROM news WHERE id = ?");
        $s->execute([(int)$_POST['id']]);
        header('Location: /edit/news.php?msg=deleted'); exit;
    }

    // 保存（追加・更新）
    if ($postAction === 'save') {
        $id       = (int)($_POST['id'] ?? 0);
        $title    = trim($_POST['title']    ?? '');
        $excerpt  = trim($_POST['excerpt']  ?? '');
        $image    = trim($_POST['image']    ?? '');
        $category = trim($_POST['category'] ?? '');
        $link_url = trim($_POST['link_url'] ?? '');
        $external = isset($_POST['link_external']) ? 1 : 0;
        $pub_date = $_POST['published_at'] ?? date('Y-m-d');

        // 新カテゴリ登録
        if ($category === '__new__') {
            $newcat = trim($_POST['new_category'] ?? '');
            if ($newcat !== '') {
                $s = db()->prepare(
                    "INSERT IGNORE INTO news_categories (name, sort_order)
                     VALUES (?, (SELECT COALESCE(MAX(t.sort_order),0)+1 FROM news_categories AS t))"
                );
                $s->execute([$newcat]);
                $category = $newcat;
            }
        }

        if ($id > 0) {
            $s = db()->prepare(
                "UPDATE news SET title=?, excerpt=?, image=?, category=?, link_url=?, link_external=?, published_at=?, updated_at=NOW()
                 WHERE id=?"
            );
            $s->execute([$title, $excerpt, $image, $category, $link_url, $external, $pub_date, $id]);
        } else {
            $s = db()->prepare(
                "INSERT INTO news (title, excerpt, image, category, link_url, link_external, published_at)
                 VALUES (?,?,?,?,?,?,?)"
            );
            $s->execute([$title, $excerpt, $image, $category, $link_url, $external, $pub_date]);
        }
        header('Location: /edit/news.php?msg=saved'); exit;
    }

    // カテゴリ削除
    if ($postAction === 'cat_delete') {
        $s = db()->prepare("DELETE FROM news_categories WHERE name = ?");
        $s->execute([trim($_POST['cat_name'] ?? '')]);
        header('Location: /edit/news.php?action=cats&msg=cat_deleted'); exit;
    }
}

// ─── データ取得 ───
$item = null;
if ($action === 'edit') {
    $s = db()->prepare("SELECT * FROM news WHERE id = ?");
    $s->execute([(int)($_GET['id'] ?? 0)]);
    $item = $s->fetch();
    if (!$item) { header('Location: /edit/news.php'); exit; }
}
if ($action === 'list') {
    $items = db()->query("SELECT * FROM news ORDER BY published_at DESC, id DESC")->fetchAll();
}

$msgs = [
    'saved'       => ['green', '保存しました'],
    'deleted'     => ['orange','削除しました'],
    'cat_deleted' => ['orange','カテゴリを削除しました'],
];
$msgText = $msgs[$_GET['msg'] ?? ''] ?? null;
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NEWS管理 – 成田機材</title>
<style>
* { box-sizing: border-box; margin: 0; padding: 0; }
body { font-family: 'Noto Sans JP', Arial, sans-serif; background: #f5f5f3; color: #2a2a28; font-size: 14px; line-height: 1.6; }
a { color: #1a2744; text-decoration: none; }

/* ─ ヘッダー ─ */
.adm-header { background: #1a2744; color: #fff; display: flex; align-items: center; justify-content: space-between; padding: 0 28px; height: 54px; }
.adm-header-title { font-size: 15px; font-weight: 700; letter-spacing: 0.06em; }
.adm-header-nav { display: flex; gap: 4px; }
.adm-header-nav a { color: rgba(255,255,255,0.65); font-size: 12px; padding: 6px 12px; border-radius: 2px; transition: color 0.2s, background 0.2s; }
.adm-header-nav a:hover { color: #fff; background: rgba(255,255,255,0.1); }
.adm-header-nav a.active { color: #c8a95a; }

/* ─ レイアウト ─ */
.adm-body { max-width: 960px; margin: 36px auto; padding: 0 20px; }
.adm-card { background: #fff; border-radius: 3px; box-shadow: 0 1px 6px rgba(0,0,0,0.07); padding: 32px 36px; }
.adm-title { font-size: 17px; font-weight: 700; color: #1a2744; margin-bottom: 24px; display: flex; align-items: center; gap: 14px; }
.adm-title a { font-size: 12px; font-weight: 400; color: #c8a95a; }

/* ─ フラッシュ ─ */
.flash { padding: 11px 16px; border-radius: 3px; margin-bottom: 20px; font-size: 13px; }
.flash.green  { background: #e8f5e9; color: #2e7d32; border-left: 3px solid #4caf50; }
.flash.orange { background: #fff3e0; color: #e65100; border-left: 3px solid #ff9800; }

/* ─ テーブル ─ */
.adm-table { width: 100%; border-collapse: collapse; font-size: 13px; }
.adm-table th { text-align: left; padding: 9px 12px; background: #f0efe9; color: #1a2744; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; white-space: nowrap; }
.adm-table td { padding: 11px 12px; border-bottom: 1px solid #eee; vertical-align: middle; }
.adm-table tr:hover td { background: #fafaf8; }
.cat-badge { font-size: 11px; background: #1a2744; color: #c8a95a; padding: 2px 9px; border-radius: 10px; white-space: nowrap; }
.t-title { font-weight: 500; }
.t-date  { white-space: nowrap; color: #888; font-size: 12px; }

/* ─ ボタン ─ */
.btn-add  { display: inline-block; padding: 10px 22px; background: #c8a95a; color: #fff; font-size: 13px; font-weight: 700; letter-spacing: 0.08em; border-radius: 2px; margin-bottom: 18px; transition: background 0.2s; }
.btn-add:hover { background: #b8992a; }
.btn-edit { padding: 5px 12px; background: #1a2744; color: #fff; border-radius: 2px; font-size: 12px; white-space: nowrap; display: inline-block; transition: background 0.2s; }
.btn-edit:hover { background: #243460; }
.btn-del  { padding: 5px 10px; background: #fff; color: #c62828; border: 1px solid #ef9a9a; border-radius: 2px; font-size: 12px; cursor: pointer; transition: background 0.2s; }
.btn-del:hover { background: #fce4e4; }
.btn-save   { padding: 12px 32px; background: #c8a95a; color: #fff; border: none; font-size: 14px; font-weight: 700; letter-spacing: 0.08em; cursor: pointer; border-radius: 2px; transition: background 0.2s; }
.btn-save:hover { background: #b8992a; }
.btn-cancel { padding: 12px 24px; background: #fff; color: #555; border: 1px solid #ddd; font-size: 14px; border-radius: 2px; cursor: pointer; text-decoration: none; display: inline-block; transition: background 0.2s; }
.btn-cancel:hover { background: #f5f5f3; }

/* ─ フォーム ─ */
.form-row { margin-bottom: 20px; }
.form-row label { display: block; font-size: 11px; font-weight: 700; color: #555; margin-bottom: 6px; letter-spacing: 0.08em; }
.form-row input[type=text],
.form-row input[type=date],
.form-row textarea,
.form-row select { width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 2px; font-size: 14px; font-family: inherit; outline: none; transition: border-color 0.2s; background: #fff; }
.form-row input:focus, .form-row textarea:focus, .form-row select:focus { border-color: #c8a95a; }
.form-row textarea { min-height: 90px; resize: vertical; line-height: 1.7; }
.form-row .hint { font-size: 11px; color: #aaa; margin-top: 5px; }
.check-label { display: flex; align-items: center; gap: 8px; font-size: 14px; cursor: pointer; font-weight: 400 !important; }
.form-cols { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
.form-actions { display: flex; gap: 12px; margin-top: 28px; align-items: center; }
#new-cat-row { display: none; margin-top: 8px; }
#new-cat-row input { width: 100%; padding: 8px 10px; border: 1px solid #c8a95a; border-radius: 2px; font-size: 13px; }

/* ─ カテゴリ管理 ─ */
.cats-list { list-style: none; }
.cats-list li { display: flex; align-items: center; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #eee; }
.cats-list .cat-name { font-weight: 500; }
</style>
</head>
<body>

<!-- ヘッダー -->
<div class="adm-header">
  <div class="adm-header-title">成田機材 / NEWS管理</div>
  <nav class="adm-header-nav">
    <a href="/edit/news.php" class="<?= $action === 'list' || $action === 'add' || $action === 'edit' ? 'active' : '' ?>">ニュース</a>
    <a href="/edit/news.php?action=cats" class="<?= $action === 'cats' ? 'active' : '' ?>">カテゴリ</a>
    <a href="https://narita-kizai.com/news.php" target="_blank">サイトを確認</a>
    <a href="/edit/logout.php">ログアウト</a>
  </nav>
</div>

<div class="adm-body">

<?php if ($msgText): ?>
  <div class="flash <?= $msgText[0] ?>"><?= e($msgText[1]) ?></div>
<?php endif; ?>

<?php if ($action === 'list'): ?>
<!-- ─── 一覧 ─── -->
<a href="/edit/news.php?action=add" class="btn-add">＋ 新規追加</a>
<div class="adm-card">
  <div class="adm-title">ニュース一覧</div>
  <table class="adm-table">
    <thead>
      <tr>
        <th style="width:110px">日付</th>
        <th style="width:100px">カテゴリ</th>
        <th>タイトル</th>
        <th style="width:100px"></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $it): ?>
      <tr>
        <td class="t-date"><?= e(formatDate($it['published_at'])) ?></td>
        <td><span class="cat-badge"><?= e($it['category']) ?></span></td>
        <td class="t-title"><?= e($it['title']) ?></td>
        <td style="white-space:nowrap">
          <a href="/edit/news.php?action=edit&id=<?= $it['id'] ?>" class="btn-edit">編集</a>
          &nbsp;
          <form method="post" style="display:inline" onsubmit="return confirm('「<?= e(mb_substr($it['title'],0,20)) ?>」を削除しますか？')">
            <input type="hidden" name="csrf"   value="<?= e($_SESSION['csrf']) ?>">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id"     value="<?= $it['id'] ?>">
            <button type="submit" class="btn-del">削除</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    <?php if (empty($items)): ?>
      <tr><td colspan="4" style="text-align:center;color:#bbb;padding:36px">記事がありません</td></tr>
    <?php endif; ?>
    </tbody>
  </table>
</div>

<?php elseif ($action === 'add' || $action === 'edit'): ?>
<!-- ─── 追加・編集 ─── -->
<div class="adm-card">
  <div class="adm-title">
    <?= $action === 'add' ? '新規追加' : '編集' ?>
    <a href="/edit/news.php">← 一覧に戻る</a>
  </div>
  <form method="post">
    <input type="hidden" name="csrf"   value="<?= e($_SESSION['csrf']) ?>">
    <input type="hidden" name="action" value="save">
    <input type="hidden" name="id"     value="<?= $item ? $item['id'] : 0 ?>">

    <div class="form-cols">
      <div class="form-row">
        <label>公開日</label>
        <input type="date" name="published_at"
               value="<?= e($item ? $item['published_at'] : date('Y-m-d')) ?>" required>
      </div>
      <div class="form-row">
        <label>カテゴリ</label>
        <select name="category" id="cat-select"
                onchange="document.getElementById('new-cat-row').style.display=this.value==='__new__'?'block':'none'">
          <?php foreach ($cats as $c): ?>
            <option value="<?= e($c) ?>" <?= ($item && $item['category']===$c) ? 'selected' : '' ?>><?= e($c) ?></option>
          <?php endforeach; ?>
          <option value="__new__">＋ 新しいカテゴリを追加…</option>
        </select>
        <div id="new-cat-row">
          <input type="text" name="new_category" placeholder="新しいカテゴリ名">
        </div>
      </div>
    </div>

    <div class="form-row">
      <label>タイトル</label>
      <input type="text" name="title"
             value="<?= e($item ? $item['title'] : '') ?>" required maxlength="255">
    </div>

    <div class="form-row">
      <label>概要文</label>
      <textarea name="excerpt"><?= e($item ? $item['excerpt'] : '') ?></textarea>
    </div>

    <div class="form-cols">
      <div class="form-row">
        <label>画像パス</label>
        <input type="text" name="image"
               value="<?= e($item ? $item['image'] : '') ?>"
               placeholder="/image.jpg">
        <p class="hint">FTPでアップロード後、/から始まるパスを入力してください</p>
      </div>
      <div class="form-row">
        <label>リンク先URL</label>
        <input type="text" name="link_url"
               value="<?= e($item ? $item['link_url'] : '') ?>"
               placeholder="/recruit.php または https://…">
      </div>
    </div>

    <div class="form-row">
      <label class="check-label">
        <input type="checkbox" name="link_external" value="1"
               <?= ($item && $item['link_external']) ? 'checked' : '' ?>>
        外部リンク（別タブで開く）
      </label>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn-save">保存する</button>
      <a href="/edit/news.php" class="btn-cancel">キャンセル</a>
    </div>
  </form>
</div>

<?php elseif ($action === 'cats'): ?>
<!-- ─── カテゴリ管理 ─── -->
<div class="adm-card">
  <div class="adm-title">
    カテゴリ管理
    <a href="/edit/news.php">← ニュース一覧</a>
  </div>
  <ul class="cats-list">
    <?php foreach ($cats as $c): ?>
    <li>
      <span class="cat-name"><?= e($c) ?></span>
      <form method="post" onsubmit="return confirm('「<?= e($c) ?>」を削除しますか？\n（このカテゴリの記事は残ります）')">
        <input type="hidden" name="csrf"     value="<?= e($_SESSION['csrf']) ?>">
        <input type="hidden" name="action"   value="cat_delete">
        <input type="hidden" name="cat_name" value="<?= e($c) ?>">
        <button type="submit" class="btn-del">削除</button>
      </form>
    </li>
    <?php endforeach; ?>
    <?php if (empty($cats)): ?>
      <li style="color:#bbb;padding:20px 0">カテゴリがありません</li>
    <?php endif; ?>
  </ul>
  <p style="margin-top:20px;font-size:12px;color:#aaa">新しいカテゴリはニュース編集画面のカテゴリ選択から追加できます</p>
</div>

<?php endif; ?>
</div><!-- /adm-body -->
</body>
</html>
