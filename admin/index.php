<?php
session_start();
require_once dirname(__DIR__).'/db.php';

if (isset($_SESSION['admin'])) {
    header('Location: /admin/news.php'); exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (hash_equals(ADMIN_PASSWORD, $_POST['password'] ?? '')) {
        $_SESSION['admin'] = true;
        session_regenerate_id(true);
        header('Location: /admin/news.php'); exit;
    }
    $error = 'パスワードが正しくありません';
}
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>管理画面 – 成田機材</title>
<style>
* { box-sizing: border-box; margin: 0; padding: 0; }
body { font-family: 'Noto Sans JP', sans-serif; background: #1a2744; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
.box { background: #fff; padding: 48px 40px; width: 360px; border-radius: 4px; }
.box-title { font-size: 20px; font-weight: 700; color: #1a2744; margin-bottom: 4px; }
.box-sub   { font-size: 11px; color: #999; letter-spacing: 0.15em; margin-bottom: 36px; }
label { display: block; font-size: 11px; font-weight: 700; color: #555; margin-bottom: 6px; letter-spacing: 0.08em; }
input[type=password] { width: 100%; padding: 12px 14px; border: 1px solid #ddd; border-radius: 2px; font-size: 15px; outline: none; transition: border-color 0.2s; }
input[type=password]:focus { border-color: #c8a95a; }
.btn { width: 100%; padding: 14px; background: #c8a95a; color: #fff; border: none; font-size: 13px; font-weight: 700; letter-spacing: 0.15em; cursor: pointer; margin-top: 24px; border-radius: 2px; transition: background 0.2s; }
.btn:hover { background: #b8992a; }
.error { color: #c04040; font-size: 13px; margin-top: 14px; }
</style>
</head>
<body>
<div class="box">
  <div class="box-title">成田機材</div>
  <div class="box-sub">NEWS MANAGEMENT</div>
  <form method="post">
    <label>パスワード</label>
    <input type="password" name="password" autofocus required>
    <?php if ($error): ?>
      <div class="error"><?= e($error) ?></div>
    <?php endif; ?>
    <button type="submit" class="btn">ログイン</button>
  </form>
</div>
</body>
</html>
